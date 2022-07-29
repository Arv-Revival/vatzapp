<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use App\Models\EntryStatus;
use App\Models\Expenditure;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ExpenditureController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => []]);
    }

    /**
     * @OA\Post(
     *     path="/api/expenditure/create",
     *     tags={"Expenditure"},
     *     summary="Create expenditure entry",
     *     description="Create expenditure entry.",
     *     operationId="expenditure_create",
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\RequestBody(
     *         description="Create expenditure input",
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/CreateExpenditureInput")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Expenditure entry created or updated successfully.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=201),
     *             @OA\Property(property="message", type="string", example="Expenditure entry created or updated successfully."),
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
                'invoice_group_id' => 'required',
                'invoice_sub_group_id' => 'required',
                'invoice_item_id' => 'required',
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
        $existingExpenditure = Expenditure::where('entry_id', '=', $request->entry_id)
            ->where('deleted_at', null)
            ->first();
        if (!$existingExpenditure) {
            if (!(($entry->entry_status_id == EntryStatus::ENTRY_PENDING) || ($entry->entry_status_id == EntryStatus::ENTRY_VALIDATOR_REJECTED)))
                return $this->send_error_response('Cannot create new expenditure entry without proper status.', 405);
            Expenditure::create(
                [
                    'entry_id' =>  $request->entry_id,
                    'invoice_date' =>  $request->invoice_date,
                    'amount' =>  $request->amount,
                    'vat_amount' =>  $request->vat_amount,
                    'invoice_number' =>  $request->invoice_number,
                    'invoice_group_id' =>  $request->invoice_group_id,
                    'invoice_sub_group_id' =>  $request->invoice_sub_group_id,
                    'invoice_item_id' =>  $request->invoice_item_id,
                    'comments' =>  $request->input("comments"),
                ]
            );
        } else {
            if ($entry->entry_status_id != EntryStatus::ENTRY_CHECKER_IN_PROGRESS)
                return $this->send_error_response('Cannot update expenditure entry without proper status.', 405);
            $existingExpenditure->invoice_date = $request->invoice_date;
            $existingExpenditure->amount = $request->amount;
            $existingExpenditure->invoice_number = $request->invoice_number;
            $existingExpenditure->invoice_group_id = $request->invoice_group_id;
            $existingExpenditure->invoice_sub_group_id = $request->invoice_sub_group_id;
            $existingExpenditure->invoice_item_id = $request->invoice_item_id;
            if ($request->input("vat_amount"))
                $existingExpenditure->vat_amount =  $request->vat_amount;
            if ($request->input("comments"))
                $existingExpenditure->comments =  $request->input("comments");
            $existingExpenditure->save();
        }
        $entry->entry_status_id = EntryStatus::ENTRY_VALIDATOR_IN_PROGRESS;
        $entry->entry_type = Entry::EXPENDITURE_ENTRY;
        $entry->save();
        return $this->send_response(
            'Expenditure entry created or updated successfully.',
            null,
            201
        );
    }
    /**
     * @OA\Get(
     *     path="/api/expenditure/get",
     *     tags={"Expenditure"},
     *     summary="Get expenditure entry.",
     *     operationId="expenditure_get",
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
     *         description="Successfully sent expenditure entry data",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Successfully sent expenditure entry data."),
     *             @OA\Property(property="payload", type="object", ref="#/components/schemas/GetExpenditureEntryOutput")
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

            $expenditure_entry = DB::table('entries')
                ->select(
                    'users.name',
                    'files.file_path',
                    'entries.created_at',
                    'entries.id',
                    'entries.comment',
                    'expenditures.invoice_date',
                    'expenditures.amount',
                    'expenditures.vat_amount',
                    'expenditures.comments',
                    'expenditures.invoice_number',
                    'expenditures.invoice_group_id',
                    'invoice_groups.name as invoice_group_name',
                    'expenditures.invoice_sub_group_id',
                    'invoice_sub_groups.name as invoice_sub_group_name',
                    'expenditures.invoice_item_id',
                    'invoice_items.name as invoice_item_name',
                )
                ->join('users', 'users.id', '=', 'entries.client_user_id')
                ->join('files', 'files.id', '=', 'entries.file_id')
                ->join('expenditures', 'expenditures.entry_id', '=', 'entries.id')
                ->join('invoice_groups', 'invoice_groups.id', '=', 'expenditures.invoice_group_id')
                ->join('invoice_sub_groups', 'invoice_sub_groups.id', '=', 'expenditures.invoice_sub_group_id')
                ->join('invoice_items', 'invoice_items.id', '=', 'expenditures.invoice_item_id')
                ->where('entries.id', '=',  $request->entry_id)
                ->where('entries.entry_type', '=',  ENTRY::EXPENDITURE_ENTRY)
                ->where('entries.deleted_at', null)
                ->where('expenditures.deleted_at', null)
                ->first();

            return $this->send_response('Successfully sent expenditure entry data', $expenditure_entry, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Successfully sent expenditure entry data', null);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/expenditure/clientexpenditurereport",
     *     tags={"Expenditure"},
     *     summary="Get client expenditure report",
     *     operationId="expenditure_client_expenditure_report",
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\Response(
     *         response=200,
     *         description="Successfully sent expenditures report data",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Successfully sent expenditures report data."),
     *             @OA\Property(property="payload", type="array",
     *                  @OA\Items(ref="#/components/schemas/GetClientExpendituresReportOutput")
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
    public function client_expenditure_report(Request $request)
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
                    'expenditures.invoice_number',
                    'expenditures.invoice_group_id',
                    'expenditures.invoice_sub_group_id',
                    'expenditures.amount',
                    'invoice_groups.name as invoice_group_name',
                    'invoice_sub_groups.name as invoice_sub_group_name',
                    'invoice_items.name as invoice_item_name',
                )
                ->selectRaw('DATE(expenditures.invoice_date) as invoice_date')
                ->join('expenditures', 'expenditures.entry_id', '=', 'entries.id')
                ->join('files', 'files.id', '=', 'entries.file_id')
                ->join('invoice_groups', 'invoice_groups.id', '=', 'expenditures.invoice_group_id')
                ->join('invoice_sub_groups', 'invoice_sub_groups.id', '=', 'expenditures.invoice_sub_group_id')
                ->join('invoice_items', 'invoice_items.id', '=', 'expenditures.invoice_item_id')
                ->where('entries.client_user_id', '=',  $user->id)
                ->where('entries.entry_status_id', '=',  EntryStatus::ENTRY_APPROVED)
                ->whereRaw('YEAR(expenditures.invoice_date) >= ' . $start_period_date->format("Y"))
                ->whereRaw('MONTH(expenditures.invoice_date) >= ' . $start_period_date->format("m"))
                ->whereRaw('YEAR(expenditures.invoice_date) <= ' . $end_period_date->format("Y"))
                ->whereRaw('MONTH(expenditures.invoice_date) <= ' . $end_period_date->format("m"))
                ->where('entries.entry_type', '=',  ENTRY::EXPENDITURE_ENTRY)
                ->where('entries.deleted_at', null)
                ->where('expenditures.deleted_at', null)
                ->get();
            return $this->send_response('Successfully sent expenditures report data', $entries, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Could not get expenditures report data', null);
        }
    }

    protected function guard()
    {
        return Auth::guard('api');
    }
}
