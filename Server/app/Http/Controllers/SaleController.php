<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use App\Models\EntryStatus;
use App\Models\Sale;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SaleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => []]);
    }

    /**
     * @OA\Post(
     *     path="/api/sale/create",
     *     tags={"Sale"},
     *     summary="Create sale entry",
     *     description="Create sale entry.",
     *     operationId="sale_create",
     *     security={
     *         {"bearer": {}}
     *     }, 
     *     @OA\RequestBody(
     *         description="Create sale input",
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/CreateSaleInput")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Sale entry created or updated successfully.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=201),
     *             @OA\Property(property="message", type="string", example="Sale entry created or updated successfully."),
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
                'invoice_date' => 'required',
                'amount' => 'required',
                'invoice_number' => 'required',
                'amount_exclude_vat' => 'required',
                'vat_amount' => 'required',
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

        $existingSale = Sale::where('entry_id', '=', $request->entry_id)
            ->where('deleted_at', null)
            ->first();

        if (!$existingSale) {

            if (!(($entry->entry_status_id == EntryStatus::ENTRY_PENDING) || ($entry->entry_status_id == EntryStatus::ENTRY_VALIDATOR_REJECTED)))
                return $this->send_error_response('Cannot create new sale entry without proper status.', 405);

            Sale::create(
                [
                    'entry_id' =>  $request->entry_id,
                    'invoice_date' =>  $request->invoice_date,
                    'amount' =>  $request->amount,
                    'invoice_number' =>  $request->invoice_number,
                    'amount_exclude_vat' =>  $request->amount_exclude_vat,
                    'vat_amount' =>  $request->vat_amount,
                    'comments' =>  $request->input("comments"),
                ]
            );
        } else {

            if ($entry->entry_status_id != EntryStatus::ENTRY_CHECKER_IN_PROGRESS)
                return $this->send_error_response('Cannot update sale entry without proper status.', 405);

            $existingSale->invoice_date =  $request->invoice_date;
            $existingSale->amount =  $request->amount;
            $existingSale->invoice_number =  $request->invoice_number;
            $existingSale->amount_exclude_vat =  $request->amount_exclude_vat;
            $existingSale->vat_amount =  $request->vat_amount;

            if ($request->input("comments"))
                $existingSale->comments =  $request->input("comments");

            $existingSale->save();
        }

        $entry->entry_status_id = EntryStatus::ENTRY_VALIDATOR_IN_PROGRESS;
        $entry->entry_type = Entry::SALE_ENTRY;
        $entry->save();

        return $this->send_response(
            'Sale entry created or updated successfully.',
            null,
            201
        );
    }

    /**
     * @OA\Get(
     *     path="/api/sale/get",
     *     tags={"Sale"},
     *     summary="Get sale entry.",
     *     operationId="sale_get",
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
     *         description="Successfully sent sale entry data",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Successfully sent sale entry data."),
     *             @OA\Property(property="payload", type="object", ref="#/components/schemas/GetSaleEntryOutput")         
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

            $sale_entry = DB::table('entries')
                ->select(
                    'users.name',
                    'files.file_path',
                    'entries.created_at',
                    'entries.id',
                    'entries.comment',
                    'sales.invoice_date',
                    'sales.amount',
                    'sales.comments',
                    'sales.invoice_number',
                    'sales.amount_exclude_vat',
                    'sales.vat_amount',
                )
                ->join('users', 'users.id', '=', 'entries.client_user_id')
                ->join('files', 'files.id', '=', 'entries.file_id')
                ->join('sales', 'sales.entry_id', '=', 'entries.id')
                ->where('entries.id', '=',  $request->entry_id)
                ->where('entries.entry_type', '=',  ENTRY::SALE_ENTRY)
                ->where('entries.deleted_at', null)
                ->where('sales.deleted_at', null)
                ->first();

            return $this->send_response('Successfully sent sale entry data', $sale_entry, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Successfully sent sale entry data', null);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/sale/clientsalesreport",
     *     tags={"Sale"},
     *     summary="Get client sales report",
     *     operationId="sale_client_sales_report",
     *     security={
     *         {"bearer": {}}
     *     }, 
     *     @OA\Response(
     *         response=200,
     *         description="Successfully sent sales report data",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Successfully sent sales report data."),
     *             @OA\Property(property="payload", type="array", 
     *                  @OA\Items(ref="#/components/schemas/GetClientSalesReportOutput")         
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
    public function client_sales_report(Request $request)
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
                    'sales.invoice_number',
                    'sales.amount_exclude_vat',
                    'sales.vat_amount',
                    'sales.amount'
                )
                ->selectRaw('DATE(sales.invoice_date) as invoice_date')
                ->join('sales', 'sales.entry_id', '=', 'entries.id')
                ->join('files', 'files.id', '=', 'entries.file_id')
                ->where('entries.client_user_id', '=',  $user->id)
                ->where('entries.entry_status_id', '=',  EntryStatus::ENTRY_APPROVED)
                ->whereRaw('YEAR(sales.invoice_date) >= ' . $start_period_date->format("Y"))
                ->whereRaw('MONTH(sales.invoice_date) >= ' . $start_period_date->format("m"))
                ->whereRaw('YEAR(sales.invoice_date) <= ' . $end_period_date->format("Y"))
                ->whereRaw('MONTH(sales.invoice_date) <= ' . $end_period_date->format("m"))
                ->where('entries.entry_type', '=',  ENTRY::SALE_ENTRY)
                ->where('entries.deleted_at', null)
                ->where('sales.deleted_at', null)
                ->get();

            return $this->send_response('Successfully sent sales report data', $entries, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Could not get sales report data', null);
        }
    }

    protected function guard()
    {
        return Auth::guard('api');
    }
}
