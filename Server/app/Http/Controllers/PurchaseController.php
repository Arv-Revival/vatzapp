<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Entry;
use App\Models\EntryStatus;
use App\Models\PurchaseDetail;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PurchaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => []]);
    }

    /**
     * @OA\Post(
     *     path="/api/purchase/create",
     *     tags={"Purchase"},
     *     summary="Create purchase entry",
     *     description="Create purchase entry.",
     *     operationId="purchase_create",
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\RequestBody(
     *         description="Create purchase input",
     *         required=true,
     *         @OA\JsonContent(
     *              allOf={
     *                  @OA\Schema(ref="#/components/schemas/CreatePurchaseInput"),
     *                  @OA\Schema(
     *                      @OA\Property(property="purchase_details", type="array",
     *                          @OA\Items(ref="#/components/schemas/CreatePurchaseDetailInput")
     *                      ),
     *                  ),
     *              }
     *          )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Purchase entry created or updated successfully.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=201),
     *             @OA\Property(property="message", type="string", example="Purchase entry created or updated successfully."),
     *             @OA\Property(property="payload", type="object")
     *         ),
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Validation error.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=400),
     *             @OA\Property(property="message", type="string", example="Validation error."),
     *             @OA\Property(property="payload", type="object")
     *         ),
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="No user found as logged in",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=401),
     *             @OA\Property(property="message", type="string", example="No user found as logged in."),
     *             @OA\Property(property="payload", type="object")
     *         ),
     *     ),
     *     @OA\Response(
     *         response=402,
     *         description="Entry can create checker user only.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=402),
     *             @OA\Property(property="message", type="string", example="Entry can create checker user only."),
     *             @OA\Property(property="payload", type="object")
     *         ),
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Could not find the entry.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=403),
     *             @OA\Property(property="message", type="string", example="Could not find the entry."),
     *             @OA\Property(property="payload", type="object")
     *         ),
     *     ),
     *     @OA\Response(
     *         response=405,
     *         description="Please wait for validator validating the status.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=405),
     *             @OA\Property(property="message", type="string", example="Please wait for validator validating the status."),
     *             @OA\Property(property="payload", type="object")
     *         ),
     *     ),
     * )
     */
    public function create(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'entry_id' => 'required|numeric|min:1',
                'supplier_id' => 'required|numeric|min:1',
                'invoice_date' => 'required',
                'invoice_number' => 'required',

                'sub_total' => 'required',
                'discount' => 'required',
                'vat_amount' => 'required',
                'total_amount' => 'required',

                'purchase_details' => 'required|array',
            ]
        );

        if ($validator->fails()) {
            $error = $validator->errors()->all()[0];
            return $this->send_validation_error_response($error);
        }

        $user = $this->guard('api')->user();

        if (!$user)
            return $this->send_error_response('No user found as logged in', 401);

        if (!($user->isChecker() || $user->isSuperAdmin() || $user->isAdmin()))
            return $this->send_error_response('Entry can add checker/admin user only.', 402);

        $entry = Entry::find($request->entry_id);

        if (!$entry)
            return $this->send_error_response('Could not find the entry', 403);

        $existingPurchase = Purchase::where('entry_id', '=', $request->entry_id)
            ->where('deleted_at', null)
            ->first();
        $purchase_id = null;

        if (!$existingPurchase) {

            if (!(($entry->entry_status_id == EntryStatus::ENTRY_PENDING) || ($entry->entry_status_id == EntryStatus::ENTRY_VALIDATOR_REJECTED)))
                return $this->send_error_response('Cannot create new purchase entry without proper status.', 405);

            $purchase = Purchase::create(
                [
                    'entry_id' =>  $request->entry_id,
                    'supplier_id' =>  $request->supplier_id,
                    'invoice_date' =>  $request->invoice_date,
                    'invoice_number' =>  $request->invoice_number,
                    'sub_total' => $request->sub_total,
                    'discount' => $request->discount,
                    'vat_amount' => $request->vat_amount,
                    'total_amount' => $request->total_amount,
                ]
            );

            $purchase_id = $purchase->id;
        } else {

            if ($entry->entry_status_id != EntryStatus::ENTRY_CHECKER_IN_PROGRESS)
                return $this->send_error_response('Cannot update purchase entry without proper status.', 405);

            $existingPurchase->supplier_id =  $request->supplier_id;
            $existingPurchase->invoice_date =  $request->invoice_date;
            $existingPurchase->invoice_number =  $request->invoice_number;
            $existingPurchase->sub_total = $request->sub_total;
            $existingPurchase->discount = $request->discount;
            $existingPurchase->vat_amount = $request->vat_amount;
            $existingPurchase->total_amount = $request->total_amount;

            $existingPurchase->save();

            $purchase_id = $existingPurchase->id;

            PurchaseDetail::where('purchase_id', '=', $purchase_id)->delete();
        }

        foreach ($request->purchase_details as $purchase_detail) {
            PurchaseDetail::create(
                [
                    'purchase_id' => $purchase_id,
                    'invoice_group_id' => $purchase_detail["invoice_group_id"],
                    'invoice_sub_group_id' => $purchase_detail["invoice_sub_group_id"],
                    'invoice_item_id' => $purchase_detail["invoice_item_id"],
                    'price' => $purchase_detail["price"],
                    'qty' => $purchase_detail["qty"],
                    'vat_percentage' => $purchase_detail["vat_percentage"],
                    'amount' => $purchase_detail["amount"],
                ]
            );
        }

        $entry->entry_status_id = EntryStatus::ENTRY_VALIDATOR_IN_PROGRESS;
        $entry->entry_type = Entry::PURCHASE_ENTRY;
        $entry->save();

        return $this->send_response(
            'Purchase entry created or updated successfully.',
            null,
            201
        );
    }

    /**
     * @OA\Get(
     *     path="/api/purchase/get",
     *     tags={"Purchase"},
     *     summary="Get purchase entry.",
     *     operationId="purchase_get",
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\Parameter(
     *         name="entry_id",
     *         in="query",
     *         description="Entry ID",
     *         required=true,
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successfully sent purchase entry data",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Successfully sent purchase entry data."),
     *             @OA\Property(property="payload", type="object",
     *                  @OA\Property(property="header", type="object",
     *                      ref="#/components/schemas/GetPurchaseHeaderEntryOutput"
     *                  ),
     *                  @OA\Property(property="details", type="array",
     *                      @OA\Items(ref="#/components/schemas/GetPurchaseDetailEntryOutput")
     *                  ),
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="No user found as logged in",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=401),
     *             @OA\Property(property="message", type="string", example="No user found as logged in."),
     *             @OA\Property(property="payload", type="object")
     *         )
     *     ),
     * )
     */
    public function get(Request $request)
    {
        try {

            $validator = Validator::make(
                $request->all(),
                [
                    'entry_id' => 'required|numeric|min:1',
                ]
            );

            if ($validator->fails()) {
                $error = $validator->errors()->all()[0];
                return $this->send_validation_error_response($error);
            }

            $user = $this->guard('api')->user();

            if (!$user)
                return $this->send_error_response('No user found as logged in', 401);

            $purchase_header = DB::table('entries')
                ->select(
                    'purchases.id as purchase_id',
                    'users.name',
                    'sup.id as supplier_id',
                    'sup.name as supplier_name',
                    'suppliers.trn as supplier_trn',
                    'files.file_path',
                    'entries.created_at',
                    'entries.id',
                    'entries.comment',
                    'purchases.invoice_date',
                    'purchases.invoice_number',
                    'purchases.sub_total',
                    'purchases.discount',
                    'purchases.vat_amount',
                    'purchases.total_amount',
                )
                ->join('users', 'users.id', '=', 'entries.client_user_id')
                ->join('files', 'files.id', '=', 'entries.file_id')
                ->join('purchases', 'purchases.entry_id', '=', 'entries.id')
                ->join('users as sup', 'sup.id', '=', 'purchases.supplier_id')
                ->join('suppliers', 'suppliers.user_id', '=', 'purchases.supplier_id')
                ->where('entries.id', '=',  $request->entry_id)
                ->where('entries.entry_type', '=',  ENTRY::PURCHASE_ENTRY)
                ->where('entries.deleted_at', null)
                ->where('purchases.deleted_at', null)
                ->first();

            $purchase_details = PurchaseDetail::where('purchase_details.purchase_id', '=', $purchase_header->purchase_id)
                ->get();

            $purchase_entry = [
                "header" => $purchase_header,
                "details" => $purchase_details,
            ];

            return $this->send_response('Successfully sent purchase entry data', $purchase_entry, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Successfully sent purchase entry data', null);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/purchase/clientpurchasesreport",
     *     tags={"Purchase"},
     *     summary="Get client purchases report",
     *     operationId="purchase_client_purchases_report",
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\Response(
     *         response=200,
     *         description="Successfully sent purchases report data",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Successfully sent purchases report data."),
     *             @OA\Property(property="payload", type="array",
     *                  @OA\Items(ref="#/components/schemas/GetClientPurchaseReportOutput")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="No user found as logged in",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=401),
     *             @OA\Property(property="message", type="string", example="No user found as logged in."),
     *             @OA\Property(property="payload", type="object")
     *         )
     *     ),
     *     @OA\Response(
     *         response=402,
     *         description="The user must be client type",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=402),
     *             @OA\Property(property="message", type="string", example="The user must be client type."),
     *             @OA\Property(property="payload", type="object")
     *         )
     *     ),
     *     @OA\Response(
     *         response=406,
     *         description="No client information found.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=406),
     *             @OA\Property(property="message", type="string", example="No client information found."),
     *             @OA\Property(property="payload", type="object")
     *         )
     *     ),
     * )
     */
    public function client_purchases_report(Request $request)
    {
        try {

            $user = $this->guard('api')->user();

            if (!$user)
                return $this->send_error_response('No user found as logged in', 401);

            if (!$user->isClient())
                return $this->send_error_response('The user must be client type', 402);

            $client = Client::where('user_id', '=', $user->id)->first();

            if (!$client)
                return $this->send_error_response('No client information found.', 406);

            $current_vat_period = $client->get_current_vat_period();
            $start_period_date = $current_vat_period->start_period_date;
            $end_period_date = $current_vat_period->end_period_date;

            $entries = DB::table('entries')
                ->select(
                    'entries.id',
                    'files.file_path',
                    'users.name as supplier_name',
                    'suppliers.trn',
                    'purchases.invoice_number',
                    DB::raw('(purchases.total_amount - purchases.vat_amount) as amount_exclude_vat'),
                    'purchases.vat_amount',
                    'purchases.total_amount as amount'
                )
                ->selectRaw('DATE(purchases.invoice_date) as invoice_date')
                ->join('purchases', 'purchases.entry_id', '=', 'entries.id')
                ->join('files', 'files.id', '=', 'entries.file_id')
                ->join('users', 'users.id', '=', 'purchases.supplier_id')
                ->join('suppliers', 'suppliers.user_id', '=', 'purchases.supplier_id')
                ->where('entries.client_user_id', '=',  $user->id)
                ->where('entries.entry_status_id', '=',  EntryStatus::ENTRY_APPROVED)
                ->whereRaw('YEAR(purchases.invoice_date) >= ' . $start_period_date->format("Y"))
                ->whereRaw('MONTH(purchases.invoice_date) >= ' . $start_period_date->format("m"))
                ->whereRaw('YEAR(purchases.invoice_date) <= ' . $end_period_date->format("Y"))
                ->whereRaw('MONTH(purchases.invoice_date) <= ' . $end_period_date->format("m"))
                ->where('entries.entry_type', '=',  ENTRY::PURCHASE_ENTRY)
                ->where('entries.deleted_at', null)
                ->where('purchases.deleted_at', null)
                ->get();

            return $this->send_response('Successfully sent purchases report data', $entries, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Could not get purchases report data', null);
        }
    }

    protected function guard()
    {
        return Auth::guard('api');
    }
}
