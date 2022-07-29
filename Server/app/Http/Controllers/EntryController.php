<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Client;
use App\Models\Entry;
use App\Models\EntryStatus;
use App\Models\Expenditure;
use App\Models\Sale;
use App\Models\InvoiceGroup;
use App\Models\Purchase;
use App\Models\PurchaseDetail;
use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Checker;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EntryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['get_invoice_exp_groups']]);
    }

    /**
     * @OA\Post(
     *     path="/api/entry/create",
     *     tags={"Entry"},
     *     summary="Create entry",
     *     description="Create entry.",
     *     operationId="entry_create",
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\RequestBody(
     *         description="Create entry input",
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(
     *                  property="file_id_list",
     *                  type="array",
     *                  @OA\Items(
     *                      type="integer", example=1
     *                  )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Entries created successfully.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=201),
     *             @OA\Property(property="message", type="string", example="Entries created successfully."),
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
     *         response=402,
     *         description="Entry can create client user only.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=402),
     *             @OA\Property(property="message", type="string", example="Entry can create client user only."),
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
     *         )
     *     ),
     * )
     */
    public function create(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'file_id_list' => 'required|array',
                'file_id_list.*' => 'integer',
            ]
        );

        if ($validator->fails()) {
            $error = $validator->errors()->all()[0];
            return $this->send_validation_error_response($error);
        }

        $user = $this->guard('api')->user();

        if (!$user)
            return $this->send_error_response('No user found as logged in', 401);

        if (!$user->isClient())
            return $this->send_response('Entry can add client user only.', $user, 402);

        foreach ($request->file_id_list as $file_id) {
            Entry::create(
                [
                    'client_user_id' => $user->id,
                    'file_id'  => $file_id,
                ]
            );
        }

        return $this->send_response(
            'Entries created successfully.',
            null,
            201
        );
    }

    /**
     * @OA\Get(
     *     path="/api/entry/clientpendinglist",
     *     tags={"Entry"},
     *     summary="Get pending entries for a specific client user.
     *                  Status ID
     *                      1:Penidng,
     *                      5:Penidng (Validator rejected)
     *                  ",
     *     operationId="entry_client_pending_list",
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\Parameter(
     *         name="row_count",
     *         in="query",
     *         description="Row limit count",
     *         required=false,
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successfully sent entry data",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Successfully sent entry data."),
     *             @OA\Property(property="payload", type="array",
     *                  @OA\Items(ref="#/components/schemas/GetClientPendingEntriesOutput")
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
     * )
     */
    public function client_pending_list(Request $request)
    {
        try {
            $user = $this->guard('api')->user();
            if (!$user)
                return $this->send_error_response('No user found as logged in', 401);
            if (!$user->isClient())
                return $this->send_error_response('The user must be client type', 402);
            $pending_entries = DB::table('entries')
                ->select('files.file_path', 'entries.id', 'entries.entry_status_id')
                ->selectRaw('DATE(entries.created_at) as created_at')
                ->join('files', 'files.id', '=', 'entries.file_id')
                ->where('entries.client_user_id', '=',  $user->id)
                ->where('entries.deleted_at', null)
                ->where(function ($query) {
                    $query->orWhere('entries.entry_status_id', '=',  EntryStatus::ENTRY_PENDING)
                        ->orWhere('entries.entry_status_id', '=',  EntryStatus::ENTRY_VALIDATOR_REJECTED);
                })
                ->orderBy('entries.updated_at', 'DESC');

            if ($request->input("row_count") > 0) {
                $pending_entries->limit($request->input("row_count"));
            }

            $entries = $pending_entries->get();

            return $this->send_response('Pending entries data', $entries, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Could not get pending entries data', null);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/entry/clientdaywisesummary",
     *     tags={"Entry"},
     *     summary="Client daywise summary report.",
     *     operationId="entry_client_daywise_summary",
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\Parameter(
     *         name="row_count",
     *         in="query",
     *         description="Row limit count",
     *         required=false,
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Client daywise summary report",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Client daywise summary report."),
     *             @OA\Property(property="payload", type="array",
     *                  @OA\Items(ref="#/components/schemas/GetClientDaywiseSummaryOutput")
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
     * )
     */
    public function client_daywise_summary(Request $request)
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
            $row_count = $request->input("row_count");
            // Sale
            $sale_entries = DB::table('sales')
                ->selectRaw('DATE(sales.invoice_date) as invoice_date, SUM(sales.amount) sale_amount, 0 as purchase_amount, 0 as expenditure_amount')
                ->join('entries', 'entries.id', '=', 'sales.entry_id')
                ->groupByRaw('DATE(sales.invoice_date)')
                ->where('entries.entry_status_id', '=',  EntryStatus::ENTRY_APPROVED)
                ->where('entries.client_user_id', '=',  $user->id)
                ->where('entries.deleted_at', null)
                ->whereRaw('YEAR(sales.invoice_date) >= ' . $start_period_date->format("Y"))
                ->whereRaw('MONTH(sales.invoice_date) >= ' . $start_period_date->format("m"))
                ->whereRaw('YEAR(sales.invoice_date) <= ' . $end_period_date->format("Y"))
                ->whereRaw('MONTH(sales.invoice_date) <= ' . $end_period_date->format("m"))
                ->where('sales.deleted_at', null);

            // Expenditure
            $expenditure_entries = DB::table('expenditures')
                ->selectRaw('DATE(expenditures.invoice_date) as invoice_date, 0 as sale_amount, 0 as purchase_amount, SUM(expenditures.amount) expenditure_amount')
                ->join('entries', 'expenditures.entry_id', '=', 'entries.id')
                ->groupByRaw('DATE(expenditures.invoice_date)')
                ->where('entries.entry_status_id', '=',  EntryStatus::ENTRY_APPROVED)
                ->where('entries.client_user_id', '=',  $user->id)
                ->where('entries.deleted_at', null)
                ->whereRaw('YEAR(expenditures.invoice_date) >= ' . $start_period_date->format("Y"))
                ->whereRaw('MONTH(expenditures.invoice_date) >= ' . $start_period_date->format("m"))
                ->whereRaw('YEAR(expenditures.invoice_date) <= ' . $end_period_date->format("Y"))
                ->whereRaw('MONTH(expenditures.invoice_date) <= ' . $end_period_date->format("m"))
                ->where('expenditures.deleted_at', null);

            // Purchase
            $purchase_entries = DB::table('purchases')
                ->selectRaw('DATE(purchases.invoice_date) as invoice_date, 0 as sale_amount, SUM(purchases.total_amount) purchase_amount, 0 as expenditure_amount')
                ->join('entries', 'purchases.entry_id', '=', 'entries.id')
                ->groupByRaw('DATE(purchases.invoice_date)')
                ->where('entries.entry_status_id', '=',  EntryStatus::ENTRY_APPROVED)
                ->where('entries.client_user_id', '=',  $user->id)
                ->where('entries.deleted_at', null)
                ->whereRaw('YEAR(purchases.invoice_date) >= ' . $start_period_date->format("Y"))
                ->whereRaw('MONTH(purchases.invoice_date) >= ' . $start_period_date->format("m"))
                ->whereRaw('YEAR(purchases.invoice_date) <= ' . $end_period_date->format("Y"))
                ->whereRaw('MONTH(purchases.invoice_date) <= ' . $end_period_date->format("m"))
                ->where('purchases.deleted_at', null);


            if ($row_count > 0) {
                $sale_entries->limit($row_count);
                $expenditure_entries->limit($row_count);
                $purchase_entries->limit($row_count);

                $subQuery = $sale_entries->union($expenditure_entries)->union($purchase_entries);

                $entries = DB::table(DB::raw("({$subQuery->toSql()}) as summary"))
                    ->mergeBindings($subQuery)
                    ->selectRaw('summary.invoice_date, SUM(summary.sale_amount) as sale_amount,SUM(summary.purchase_amount) as purchase_amount,SUM(summary.expenditure_amount) as expenditure_amount')
                    ->limit($request->input("row_count"))
                    ->groupBy('summary.invoice_date')
                    ->orderBy('summary.invoice_date', 'DESC')
                    ->get();
            } else {
                $subQuery = $sale_entries->union($expenditure_entries)->union($purchase_entries);

                $entries = DB::table(DB::raw("({$subQuery->toSql()}) as summary"))
                    ->mergeBindings($subQuery)
                    ->selectRaw('summary.invoice_date, SUM(summary.sale_amount) as sale_amount,SUM(summary.purchase_amount) as purchase_amount,SUM(summary.expenditure_amount) as expenditure_amount')
                    ->groupBy('summary.invoice_date')
                    ->orderBy('summary.invoice_date', 'DESC')
                    ->get();
            }

            return $this->send_response('Client daywise summary report with in current VAT period', $entries, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Could not get entries', null);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/entry/clientmonthwisegraph",
     *     tags={"Entry"},
     *     summary="Client monthwise graph report.",
     *     operationId="entry_client_monthwise_graph",
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\Response(
     *         response=200,
     *         description="Client monthwise graph report",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Client monthwise graph report."),
     *             @OA\Property(property="payload", type="array",
     *                  @OA\Items(ref="#/components/schemas/GetClientMonthwiseGraphOutput")
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
     * )
     */
    public function client_monthwise_graph(Request $request)
    {
        try {

            $user = $this->guard('api')->user();

            if (!$user)
                return $this->send_error_response('No user found as logged in', 401);

            if (!$user->isClient())
                return $this->send_error_response('The user must be client type', 402);

            // Sale
            $sale_entries = DB::table('sales')
                ->selectRaw('DATE(sales.invoice_date) as invoice_date, SUM(sales.amount) sale_amount, 0 as purchase_amount, 0 as expenditure_amount')
                ->join('entries', 'entries.id', '=', 'sales.entry_id')
                ->groupByRaw('DATE(sales.invoice_date)')
                ->where('entries.entry_status_id', '=',  EntryStatus::ENTRY_APPROVED)
                ->where('entries.client_user_id', '=',  $user->id)
                ->whereRaw('YEAR(sales.invoice_date) = YEAR(NOW())')
                ->where('entries.deleted_at', null)
                ->where('sales.deleted_at', null);

            // Expenditure
            $expenditure_entries = DB::table('expenditures')
                ->selectRaw('DATE(expenditures.invoice_date) as invoice_date, 0 as sale_amount, 0 as purchase_amount, SUM(expenditures.amount) expenditure_amount')
                ->join('entries', 'expenditures.entry_id', '=', 'entries.id')
                ->groupByRaw('DATE(expenditures.invoice_date)')
                ->where('entries.entry_status_id', '=',  EntryStatus::ENTRY_APPROVED)
                ->where('entries.client_user_id', '=',  $user->id)
                ->whereRaw('YEAR(expenditures.invoice_date) = YEAR(NOW())')
                ->where('entries.deleted_at', null)
                ->where('expenditures.deleted_at', null);

            // Purchase
            $purchase_entries = DB::table('purchases')
                ->selectRaw('DATE(purchases.invoice_date) as invoice_date, 0 as sale_amount, SUM(purchases.total_amount) purchase_amount, 0 as expenditure_amount')
                ->join('entries', 'purchases.entry_id', '=', 'entries.id')
                ->groupByRaw('DATE(purchases.invoice_date)')
                ->where('entries.entry_status_id', '=',  EntryStatus::ENTRY_APPROVED)
                ->where('entries.client_user_id', '=',  $user->id)
                ->whereRaw('YEAR(purchases.invoice_date) = YEAR(NOW())')
                ->where('entries.deleted_at', null)
                ->where('purchases.deleted_at', null);

            $subQuery = $sale_entries->union($expenditure_entries)->union($purchase_entries);

            $entries = DB::table(DB::raw("({$subQuery->toSql()}) as summary"))
                ->mergeBindings($subQuery)
                ->selectRaw('DATE_FORMAT(summary.invoice_date, \'%b\') as month, SUM(summary.sale_amount) as sale_amount,SUM(summary.purchase_amount) as purchase_amount,SUM(summary.expenditure_amount) as expenditure_amount')
                ->groupByRaw('DATE_FORMAT(summary.invoice_date, \'%b\')')
                ->orderByRaw('DATE_FORMAT(summary.invoice_date, \'%b\')')
                ->get();

            return $this->send_response('Client monthwise graph report', $entries, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Could not get entries', null);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/entry/clientrecentlist",
     *     tags={"Entry"},
     *     summary="Get recent entries for a specific client user.
     *                  Status ID (2|3: In Progress, 4:Approved)",
     *     operationId="entry_client_recent_list",
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\Parameter(
     *         name="row_count",
     *         in="query",
     *         description="Row limit count",
     *         required=false,
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successfully sent entry data",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Successfully sent entry data."),
     *             @OA\Property(property="payload", type="array",
     *                  @OA\Items(ref="#/components/schemas/GetClientRecentEntriesOutput")
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
     * )
     */
    public function client_recent_list(Request $request)
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

            $row_count = $request->input("row_count");

            // Sale
            $sale_entries = DB::table('entries')
                ->select(
                    'files.file_path',
                    'entries.id',
                    'invoice_number',
                    'amount',
                    'entries.entry_status_id',
                    'entries.requested_for_delete',
                    'entries.comment',
                    'entries.updated_at',
                )
                ->selectRaw('DATE(invoice_date) as invoice_date, DATE(entries.created_at) as created_at')
                ->join('files', 'files.id', '=', 'entries.file_id')
                ->join('sales', 'entry_id', '=', 'entries.id')
                ->where('entries.client_user_id', '=',  $user->id)
                ->where('entries.entry_status_id', '!=',  EntryStatus::ENTRY_PENDING)
                ->where('entries.entry_status_id', '!=',  EntryStatus::ENTRY_VALIDATOR_REJECTED)
                ->where('entries.deleted_at', null)
                ->where('sales.deleted_at', null)
                ->whereRaw('YEAR(sales.invoice_date) >= ' . $start_period_date->format("Y"))
                ->whereRaw('MONTH(sales.invoice_date) >= ' . $start_period_date->format("m"))
                ->whereRaw('YEAR(sales.invoice_date) <= ' . $end_period_date->format("Y"))
                ->whereRaw('MONTH(sales.invoice_date) <= ' . $end_period_date->format("m"))
                ->where('entries.entry_type', '=',  ENTRY::SALE_ENTRY);

            // Expenditure
            $expenditure_entries = DB::table('entries')
                ->select(
                    'files.file_path',
                    'entries.id',
                    'invoice_number',
                    'amount',
                    'entries.entry_status_id',
                    'entries.requested_for_delete',
                    'entries.comment',
                    'entries.updated_at',
                )
                ->selectRaw('DATE(invoice_date) as invoice_date, DATE(entries.created_at) as created_at')
                ->join('expenditures', 'expenditures.entry_id', '=', 'entries.id')
                ->join('files', 'files.id', '=', 'entries.file_id')
                ->where('entries.client_user_id', '=',  $user->id)
                ->where('entries.entry_status_id', '!=',  EntryStatus::ENTRY_PENDING)
                ->where('entries.entry_status_id', '!=',  EntryStatus::ENTRY_VALIDATOR_REJECTED)
                ->where('entries.deleted_at', null)
                ->where('expenditures.deleted_at', null)
                ->whereRaw('YEAR(expenditures.invoice_date) >= ' . $start_period_date->format("Y"))
                ->whereRaw('MONTH(expenditures.invoice_date) >= ' . $start_period_date->format("m"))
                ->whereRaw('YEAR(expenditures.invoice_date) <= ' . $end_period_date->format("Y"))
                ->whereRaw('MONTH(expenditures.invoice_date) <= ' . $end_period_date->format("m"))
                ->where('entries.entry_type', '=',  ENTRY::EXPENDITURE_ENTRY);

            // Purchase
            $purchases_entries = DB::table('entries')
                ->select(
                    'files.file_path',
                    'entries.id',
                    'invoice_number',
                    'total_amount as amount',
                    'entries.entry_status_id',
                    'entries.requested_for_delete',
                    'entries.comment',
                    'entries.updated_at',
                )
                ->selectRaw('DATE(invoice_date) as invoice_date, DATE(entries.created_at) as created_at')
                ->join('files', 'files.id', '=', 'entries.file_id')
                ->join('purchases', 'entry_id', '=', 'entries.id')
                ->where('entries.client_user_id', '=',  $user->id)
                ->where('entries.entry_status_id', '!=',  EntryStatus::ENTRY_PENDING)
                ->where('entries.entry_status_id', '!=',  EntryStatus::ENTRY_VALIDATOR_REJECTED)
                ->where('entries.deleted_at', null)
                ->where('purchases.deleted_at', null)
                ->whereRaw('YEAR(purchases.invoice_date) >= ' . $start_period_date->format("Y"))
                ->whereRaw('MONTH(purchases.invoice_date) >= ' . $start_period_date->format("m"))
                ->whereRaw('YEAR(purchases.invoice_date) <= ' . $end_period_date->format("Y"))
                ->whereRaw('MONTH(purchases.invoice_date) <= ' . $end_period_date->format("m"))
                ->where('entries.entry_type', '=',  ENTRY::PURCHASE_ENTRY);

            $entries_query = $sale_entries->union($expenditure_entries)->union($purchases_entries)
                ->orderBy('updated_at', 'DESC');

            if ($row_count > 0) {
                $entries_query->limit($request->input("row_count"));
            }

            $entries = $entries_query->get();

            return $this->send_response('Recent entries data', $entries, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Could not get recent entries data', null);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/entry/clientapprovedlist",
     *     tags={"Entry"},
     *     summary="Get approved entries for a specific client user.",
     *     operationId="entry_client_approved_list",
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\Parameter(
     *         name="row_count",
     *         in="query",
     *         description="Row limit count",
     *         required=false,
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successfully sent entry data",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Successfully sent entry data."),
     *             @OA\Property(property="payload", type="array",
     *                  @OA\Items(ref="#/components/schemas/GetClientApprovedEntriesOutput")
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
    public function client_approved_list(Request $request)
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

            $row_count = $request->input("row_count");

            // Sale
            $sale_entries = DB::table('entries')
                ->select(
                    'files.file_path',
                    'entries.id',
                    'invoice_number',
                    'amount',
                    'entries.entry_status_id',
                    'entries.requested_for_delete',
                    'entries.comment',
                    'entries.updated_at',
                )
                ->selectRaw('DATE(invoice_date) as invoice_date, DATE(entries.created_at) as created_at')
                ->join('files', 'files.id', '=', 'entries.file_id')
                ->join('sales', 'entry_id', '=', 'entries.id')
                ->where('entries.client_user_id', '=',  $user->id)
                ->where('entries.entry_status_id', '=',  EntryStatus::ENTRY_APPROVED)
                ->where('entries.deleted_at', null)
                ->where('sales.deleted_at', null)
                ->whereRaw('YEAR(sales.invoice_date) >= ' . $start_period_date->format("Y"))
                ->whereRaw('MONTH(sales.invoice_date) >= ' . $start_period_date->format("m"))
                ->whereRaw('YEAR(sales.invoice_date) <= ' . $end_period_date->format("Y"))
                ->whereRaw('MONTH(sales.invoice_date) <= ' . $end_period_date->format("m"))
                ->where('entries.entry_type', '=',  ENTRY::SALE_ENTRY);

            // Expenditure
            $expenditure_entries = DB::table('entries')
                ->select(
                    'files.file_path',
                    'entries.id',
                    'invoice_number',
                    'amount',
                    'entries.entry_status_id',
                    'entries.requested_for_delete',
                    'entries.comment',
                    'entries.updated_at',
                )
                ->selectRaw('DATE(invoice_date) as invoice_date, DATE(entries.created_at) as created_at')
                ->join('expenditures', 'expenditures.entry_id', '=', 'entries.id')
                ->join('files', 'files.id', '=', 'entries.file_id')
                ->where('entries.client_user_id', '=',  $user->id)
                ->where('entries.entry_status_id', '=',  EntryStatus::ENTRY_APPROVED)
                ->where('entries.deleted_at', null)
                ->where('expenditures.deleted_at', null)
                ->whereRaw('YEAR(expenditures.invoice_date) >= ' . $start_period_date->format("Y"))
                ->whereRaw('MONTH(expenditures.invoice_date) >= ' . $start_period_date->format("m"))
                ->whereRaw('YEAR(expenditures.invoice_date) <= ' . $end_period_date->format("Y"))
                ->whereRaw('MONTH(expenditures.invoice_date) <= ' . $end_period_date->format("m"))
                ->where('entries.entry_type', '=',  ENTRY::EXPENDITURE_ENTRY);

            // Purchase
            $purchases_entries = DB::table('entries')
                ->select(
                    'files.file_path',
                    'entries.id',
                    'invoice_number',
                    'total_amount as amount',
                    'entries.entry_status_id',
                    'entries.requested_for_delete',
                    'entries.comment',
                    'entries.updated_at',
                )
                ->selectRaw('DATE(invoice_date) as invoice_date, DATE(entries.created_at) as created_at')
                ->join('files', 'files.id', '=', 'entries.file_id')
                ->join('purchases', 'entry_id', '=', 'entries.id')
                ->where('entries.client_user_id', '=',  $user->id)
                ->where('entries.entry_status_id', '=',  EntryStatus::ENTRY_APPROVED)
                ->where('entries.deleted_at', null)
                ->where('purchases.deleted_at', null)
                ->whereRaw('YEAR(purchases.invoice_date) >= ' . $start_period_date->format("Y"))
                ->whereRaw('MONTH(purchases.invoice_date) >= ' . $start_period_date->format("m"))
                ->whereRaw('YEAR(purchases.invoice_date) <= ' . $end_period_date->format("Y"))
                ->whereRaw('MONTH(purchases.invoice_date) <= ' . $end_period_date->format("m"))
                ->where('entries.entry_type', '=',  ENTRY::PURCHASE_ENTRY);

            $entries_query = $sale_entries->union($expenditure_entries)->union($purchases_entries)
                ->orderBy('updated_at', 'DESC');

            if ($row_count > 0) {
                $entries_query->limit($request->input("row_count"));
            }

            $entries = $entries_query->get();

            return $this->send_response('Approved entries data', $entries, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Could not get approved entries data', null);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/entry/clientrejectedlist",
     *     tags={"Entry"},
     *     summary="Get rejected entries for a specific client user.",
     *     operationId="entry_client_rejected_list",
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\Parameter(
     *         name="row_count",
     *         in="query",
     *         description="Row limit count",
     *         required=false,
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successfully sent entry data",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Successfully sent entry data."),
     *             @OA\Property(property="payload", type="array",
     *                  @OA\Items(ref="#/components/schemas/GetClientRejectedEntriesOutput")
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
     * )
     */
    public function client_rejected_list(Request $request)
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

            $row_count = $request->input("row_count");

            // Rejected enteries
            $rejected_entries = DB::table('entries')
                ->select(
                    'files.file_path',
                    'entries.id',
                    'entries.entry_status_id',
                    'entries.requested_for_delete',
                    'entries.comment',
                    'entries.client_user_id',
                )
                ->selectRaw('DATE(entries.created_at) as created_at')
                ->join('files', 'files.id', '=', 'entries.file_id')
                ->where('entries.client_user_id', '=',  $user->id)
                ->where('entries.entry_status_id', '=',  EntryStatus::ENTRY_VALIDATOR_REJECTED)
                ->where('entries.deleted_at', null)
                ->whereRaw('YEAR(entries.created_at) >= ' . $start_period_date->format("Y"))
                ->whereRaw('MONTH(entries.created_at) >= ' . $start_period_date->format("m"))
                ->whereRaw('YEAR(entries.created_at) <= ' . $end_period_date->format("Y"))
                ->whereRaw('MONTH(entries.created_at) <= ' . $end_period_date->format("m"))
                ->orderBy('entries.updated_at', 'DESC');

            if ($row_count > 0) {
                $rejected_entries->limit($row_count);
            }

            $entries = $rejected_entries->get();

            return $this->send_response('Rejected entries data', $entries, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Could not get rejected entries data', null);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/entry/clientdeleteentry",
     *     tags={"Entry"},
     *     summary="Client delete entry",
     *     description="Client delete entry.",
     *     operationId="entry_client_delete_entry",
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
     *         description="Entry has been deleted successfully.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Entry has been deleted successfully."),
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
     *         description="Client can only delete pending entry.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=402),
     *             @OA\Property(property="message", type="string", example="Client can only delete pending entry."),
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
     *         description="The entry has beed processing. Could not delete at this time.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=405),
     *             @OA\Property(property="message", type="string", example="The entry has beed processing. Could not delete at this time."),
     *             @OA\Property(property="payload", type="object")
     *         ),
     *     ),
     * )
     */
    public function client_delete_entry(Request $request)
    {
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

        if (!$user->isClient())
            return $this->send_response('Client can only delete pending entry.', $user, 402);

        $entry = Entry::find($request->entry_id);

        if (!$entry)
            return $this->send_error_response('Could not find the entry.', 403);

        if (!($entry->entry_status_id == EntryStatus::ENTRY_PENDING || $entry->entry_status_id == EntryStatus::ENTRY_VALIDATOR_REJECTED))
            return $this->send_error_response('The entry has been initiated processing. Could not delete at this time.', 405);

        $entry->delete();

        return $this->send_response(
            'Entry has been deleted successfully.',
            null,
            200
        );
    }

    /**
     * @OA\Post(
     *     path="/api/entry/clientrequestfordelete",
     *     tags={"Entry"},
     *     summary="Client request for delete entry",
     *     description="Client request for delete entry.",
     *     operationId="entry_client_request_for_delete",
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\Parameter(
     *         name="entry_id",
     *         in="query",
     *         description="Entry ID",
     *         required=true,
     *     ),
     *     @OA\Parameter(
     *         name="comment",
     *         in="query",
     *         description="Comment",
     *         required=true,
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="The request for delete has been done successfully.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="The request for delete has been done successfully."),
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
     *         description="Only client can do request.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=402),
     *             @OA\Property(property="message", type="string", example="Only client can do request."),
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
     *         description="The entry has beed approved. Could not delete at this time..",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=405),
     *             @OA\Property(property="message", type="string", example="The entry has beed approved. Could not delete at this time.."),
     *             @OA\Property(property="payload", type="object")
     *         ),
     *     ),
     * )
     */
    public function client_request_for_delete(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'entry_id' => 'required|numeric|min:1',
                'comment' => 'required',
            ]
        );

        if ($validator->fails()) {
            $error = $validator->errors()->all()[0];
            return $this->send_validation_error_response($error);
        }

        $user = $this->guard('api')->user();

        if (!$user)
            return $this->send_error_response('No user found as logged in', 401);

        if (!$user->isClient())
            return $this->send_response('Only client can do request.', $user, 402);

        $entry = Entry::find($request->entry_id);

        if (!$entry)
            return $this->send_error_response('Could not find the entry.', 403);

        if ($entry->entry_status_id == EntryStatus::ENTRY_APPROVED)
            return $this->send_error_response('The entry has been approved. Could not delete at this time.', 405);

        if ($entry->entry_status_id == EntryStatus::ENTRY_PENDING) {
            $entry->delete();
            return $this->send_response(
                'Since the entry is in pending status it has been deleted successfully.',
                null,
                200
            );
        }

        $entry->requested_for_delete = true;
        $entry->comment = $request->comment;
        $entry->save();

        return $this->send_response(
            'The request for delete has been done successfully.',
            null,
            200
        );
    }

    /**
     * @OA\Get(
     *     path="/api/entry/checkerpendinglist",
     *     tags={"Entry"},
     *     summary="Get pending entries for a specific checker user.
     *                  entry_status_id:
     *                      1:Pending
     *                      2:Recheck,
     *                      5:Rejected
     *                  Entry Type:
     *                      1: Sale
     *                      2: Purchase
     *                      3: Expenditure",
     *     operationId="entry_checker_pending_list",
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\Parameter(
     *         name="row_count",
     *         in="query",
     *         description="Row limit count",
     *         required=false,
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successfully sent entry data",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Successfully sent entry data."),
     *             @OA\Property(property="payload", type="array",
     *                  @OA\Items(ref="#/components/schemas/GetCheckerPendingEntriesOutput")
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
     *         description="The user must be checker type",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=402),
     *             @OA\Property(property="message", type="string", example="The user must be checker type."),
     *             @OA\Property(property="payload", type="object")
     *         )
     *     ),
     * )
     */
    public function checker_pending_list(Request $request)
    {
        try {

            $user = $this->guard('api')->user();

            if (!$user)
                return $this->send_error_response('No user found as logged in', 401);

            if (!$user->isChecker())
                return $this->send_error_response('The user must be checker type', 402);

            $entries_query = DB::table('entries')
                ->select(
                    'users.name',
                    'files.file_path',
                    'entries.id',
                    'entries.entry_status_id',
                    'entries.entry_type',
                    'clients.vat_percentage',
                    'entries.comment',
                    'entries.client_user_id',
                )
                ->selectRaw('DATE(entries.created_at) as created_at')
                ->join('users', 'users.id', '=', 'entries.client_user_id')
                ->join('clients', 'clients.user_id', '=', 'users.id')
                ->join('files', 'files.id', '=', 'entries.file_id')
                ->where('clients.checker_user_id', '=',  $user->id)
                ->where('entries.deleted_at', null)
                ->where(function ($query) {
                    $query->orWhere('entries.entry_status_id', '=',  EntryStatus::ENTRY_PENDING)
                        ->orWhere('entries.entry_status_id', '=',  EntryStatus::ENTRY_CHECKER_IN_PROGRESS);
                    // ->orWhere('entries.entry_status_id', '=',  EntryStatus::ENTRY_VALIDATOR_REJECTED);
                })
                ->orderBy('entries.updated_at', 'DESC');

            if ($request->input("row_count") > 0) {
                $entries_query->limit($request->input("row_count"));
            }

            $entries = $entries_query->get();

            return $this->send_response('Pending entries data', $entries, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Could not get pending entries data', null);
        }
    }
    public function checker_no_entry_list(Request $request)
    {
        try {
            $user = $this->guard('api')->user();
            if (!$user)
                return $this->send_error_response('No user found as logged in', 401);
            if (!$user->isChecker())
                return $this->send_error_response('The user must be checker type', 402);
            $entries_query = DB::table('entries')
                ->select(
                    'users.name',
                    'clients.trn_number',
                    'regions.name as region',
                    'users.id',
                )
                // ->selectRaw('DISTINCT(users.id)')
                ->join('users', 'users.id', '=', 'entries.client_user_id')
                ->join('clients', 'clients.user_id', '=', 'entries.client_user_id')
                ->join('regions', 'clients.region_id', '=', 'regions.id')
                ->where('clients.checker_user_id', '=',  $user->id)
                ->where('entries.deleted_at', null)
                ->whereNotIn('entries.client_user_id', function ($query) use ($user) {
                    $query->from('entries')
                        ->selectRaw('DISTINCT clients.user_id as client_user_id')
                        ->join('clients', 'clients.user_id', '=', 'entries.client_user_id')
                        ->where('clients.checker_user_id', '=',  $user->id)
                        ->where('entries.deleted_at', null)
                        ->whereRaw('entries.created_at > NOW() - INTERVAL 3 DAY');
                });

            // if ($request->input("row_count") > 0) {
            //     $entries_query->limit($request->input("row_count"));
            // }

            $entries = $entries_query->get();

            return $this->send_response('Pending entries data', $entries, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Could not get pending entries data', null);
        }
    }
    public function checker_approved_list(Request $request)
    {
        try {
            $user = $this->guard('api')->user();
            if (!$user)
                return $this->send_error_response('No user found as logged in', 401);
            if (!$user->isChecker())
                return $this->send_error_response('The user must be Checker type', 402);
            $checker = Checker::where('user_id', '=', $user->id)->first();
            if (!$checker)
                return $this->send_error_response('No client information found.', 406);

            $sales_entries = DB::table('entries')
                ->select(
                    'users.name',
                    'files.file_path',
                    'entries.id',
                    'entries.entry_type',
                    'sales.amount',
                    'sales.invoice_number',
                    'entries.updated_at',
                )
                ->selectRaw('DATE(invoice_date) as invoice_date, DATE(entries.created_at) as created_at')
                ->join('users', 'users.id', '=', 'entries.client_user_id')
                ->join('clients', 'clients.user_id', '=', 'users.id')
                ->join('sales', 'sales.entry_id', '=', 'entries.id')
                ->join('files', 'files.id', '=', 'entries.file_id')
                ->limit($request->input("row_count"))
                ->where('entries.entry_status_id', '=',  EntryStatus::ENTRY_APPROVED)
                ->where('clients.checker_user_id', '=',  $user->id)
                ->where('entries.entry_type', '=',  ENTRY::SALE_ENTRY)
                ->where('entries.deleted_at', null)
                ->where('sales.deleted_at', null);

            $expenditure_entries = DB::table('entries')
                ->select(
                    'users.name',
                    'files.file_path',
                    'entries.id',
                    'entries.entry_type',
                    'expenditures.amount',
                    'expenditures.invoice_number',
                    'entries.updated_at',
                )
                ->selectRaw('DATE(invoice_date) as invoice_date, DATE(entries.created_at) as created_at')
                ->join('users', 'users.id', '=', 'entries.client_user_id')
                ->join('clients', 'clients.user_id', '=', 'users.id')
                ->join('expenditures', 'expenditures.entry_id', '=', 'entries.id')
                ->join('files', 'files.id', '=', 'entries.file_id')
                ->limit($request->input("row_count"))
                ->where('entries.entry_status_id', '=',  EntryStatus::ENTRY_APPROVED)
                ->where('clients.checker_user_id', '=',  $user->id)
                ->where('entries.entry_type', '=',  ENTRY::EXPENDITURE_ENTRY)
                ->where('entries.deleted_at', null)
                ->where('expenditures.deleted_at', null);

            // Purchase
            $purchases_entries = DB::table('entries')
                ->select(
                    'users.name',
                    'files.file_path',
                    'entries.id',
                    'entries.entry_type',
                    'purchases.total_amount as amount',
                    'purchases.invoice_number',
                    'entries.updated_at',
                )
                ->selectRaw('DATE(invoice_date) as invoice_date, DATE(entries.created_at) as created_at')
                ->join('users', 'users.id', '=', 'entries.client_user_id')
                ->join('clients', 'clients.user_id', '=', 'users.id')
                ->join('purchases', 'purchases.entry_id', '=', 'entries.id')
                ->join('files', 'files.id', '=', 'entries.file_id')
                ->limit($request->input("row_count"))
                ->where('entries.entry_status_id', '=',  EntryStatus::ENTRY_APPROVED)
                ->where('clients.checker_user_id', '=',  $user->id)
                ->where('entries.entry_type', '=',  ENTRY::PURCHASE_ENTRY)
                ->where('entries.deleted_at', null)
                ->where('purchases.deleted_at', null);
            // $entries_query = DB::table('entries')
            //     ->select(
            //         'users.name',
            //         'files.file_path',
            //         'entries.id',
            //         'entries.entry_status_id',
            //         'entries.entry_type',
            //         'clients.vat_percentage',
            //         'entries.comment',
            //         'entries.client_user_id',
            //     )
            //     ->selectRaw('DATE(entries.created_at) as created_at')
            //     ->join('users', 'users.id', '=', 'entries.client_user_id')
            //     ->join('clients', 'clients.user_id', '=', 'users.id')
            //     ->join('files', 'files.id', '=', 'entries.file_id')
            //     ->where('clients.checker_user_id', '=',  $user->id)
            //     ->where('entries.deleted_at', null)
            //     ->where(function ($query) {
            //         $query->orWhere('entries.entry_status_id', '=',  EntryStatus::ENTRY_APPROVED);
            //     })
            //     ->orderBy('entries.updated_at', 'DESC');
            $entries_query = $sales_entries->union($expenditure_entries)->union($purchases_entries)->orderBy('updated_at', 'DESC');

            if ($request->input("row_count") > 0) {
                $entries_query->limit($request->input("row_count"));
            }
            $entries = $entries_query->get();

            return $this->send_response('Approved entries data', $entries, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Could not get pending entries data', null);
        }
    }

    public function checker_rejected_list(Request $request)
    {
        try {
            $user = $this->guard('api')->user();
            if (!$user)
                return $this->send_error_response('No user found as logged in', 401);
            if (!$user->isChecker())
                return $this->send_error_response('The user must be Checker type', 402);
            $checker = Checker::where('user_id', '=', $user->id)->first();
            if (!$checker)
                return $this->send_error_response('No client information found.', 406);
            $entries_query = DB::table('entries')
                ->select(
                    'users.name',
                    'files.file_path',
                    'entries.id',
                    'entries.entry_status_id',
                    'entries.entry_type',
                    'clients.vat_percentage',
                    'entries.comment',
                    'entries.client_user_id',
                )
                ->selectRaw('DATE(entries.created_at) as created_at')
                ->join('users', 'users.id', '=', 'entries.client_user_id')
                ->join('clients', 'clients.user_id', '=', 'users.id')
                ->join('files', 'files.id', '=', 'entries.file_id')
                ->where('clients.checker_user_id', '=',  $user->id)
                ->where('entries.deleted_at', null)
                ->where(function ($query) {
                    $query->orWhere('entries.entry_status_id', '=',  EntryStatus::ENTRY_VALIDATOR_REJECTED);
                    // ->orWhere('entries.entry_status_id', '=',  EntryStatus::ENTRY_CHECKER);
                    // ->orWhere('entries.entry_status_id', '=',  EntryStatus::ENTRY_VALIDATOR_REJECTED);
                })
                ->orderBy('entries.updated_at', 'DESC');

            if ($request->input("row_count") > 0) {
                $entries_query->limit($request->input("row_count"));
            }

            $entries = $entries_query->get();

            return $this->send_response('Rejected entries data', $entries, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Could not get pending entries data', null);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/entry/checkercheckedlist",
     *     tags={"Entry"},
     *     summary="Checker checked list for a specific checker user.",
     *     operationId="entry_checker_checked_list",
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\Parameter(
     *         name="row_count",
     *         in="query",
     *         description="Row limit count",
     *         required=false,
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Checker checked entries",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Checker checked entries."),
     *             @OA\Property(property="payload", type="array",
     *                  @OA\Items(ref="#/components/schemas/GetCheckerCheckedEntriesOutput")
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
     *         description="The user must be checker type",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=402),
     *             @OA\Property(property="message", type="string", example="The user must be checker type."),
     *             @OA\Property(property="payload", type="object")
     *         )
     *     ),
     * )
     */
    public function checker_checked_list(Request $request)
    {
        try {

            $user = $this->guard('api')->user();

            if (!$user)
                return $this->send_error_response('No user found as logged in', 401);

            if (!$user->isChecker())
                return $this->send_error_response('The user must be checker type', 402);


            // Sales
            $sales_entries = DB::table('entries')
                ->select(
                    'users.name',
                    'files.file_path',
                    'entries.id',
                    'entries.entry_type',
                    'sales.amount',
                    'sales.vat_amount',
                    'sales.invoice_number',
                    'entries.updated_at',
                )
                ->selectRaw('DATE(invoice_date) as invoice_date, DATE(entries.created_at) as created_at')
                ->join('users', 'users.id', '=', 'entries.client_user_id')
                ->join('clients', 'clients.user_id', '=', 'users.id')
                ->join('sales', 'sales.entry_id', '=', 'entries.id')
                ->join('files', 'files.id', '=', 'entries.file_id')
                ->limit($request->input("row_count"))
                ->where('entries.entry_status_id', '=',  EntryStatus::ENTRY_VALIDATOR_IN_PROGRESS)
                ->where('clients.checker_user_id', '=',  $user->id)
                ->where('entries.entry_type', '=',  ENTRY::SALE_ENTRY)
                ->where('entries.deleted_at', null)
                ->where('sales.deleted_at', null);


            // Expenditure
            $expenditure_entries = DB::table('entries')
                ->select(
                    'users.name',
                    'files.file_path',
                    'entries.id',
                    'entries.entry_type',
                    'expenditures.amount',
                    'expenditures.vat_amount',
                    'expenditures.invoice_number',
                    'entries.updated_at',
                )
                ->selectRaw('DATE(invoice_date) as invoice_date, DATE(entries.created_at) as created_at')
                ->join('users', 'users.id', '=', 'entries.client_user_id')
                ->join('clients', 'clients.user_id', '=', 'users.id')
                ->join('expenditures', 'expenditures.entry_id', '=', 'entries.id')
                ->join('files', 'files.id', '=', 'entries.file_id')
                ->limit($request->input("row_count"))
                ->where('entries.entry_status_id', '=',  EntryStatus::ENTRY_VALIDATOR_IN_PROGRESS)
                ->where('clients.checker_user_id', '=',  $user->id)
                ->where('entries.entry_type', '=',  ENTRY::EXPENDITURE_ENTRY)
                ->where('entries.deleted_at', null)
                ->where('expenditures.deleted_at', null);

            // Purchase
            $purchases_entries = DB::table('entries')
                ->select(
                    'users.name',
                    'files.file_path',
                    'entries.id',
                    'entries.entry_type',
                    'purchases.total_amount as amount',
                    'purchases.invoice_number',
                    'purchases.vat_amount',
                    'entries.updated_at',
                )
                ->selectRaw('DATE(invoice_date) as invoice_date, DATE(entries.created_at) as created_at')
                ->join('users', 'users.id', '=', 'entries.client_user_id')
                ->join('clients', 'clients.user_id', '=', 'users.id')
                ->join('purchases', 'purchases.entry_id', '=', 'entries.id')
                ->join('files', 'files.id', '=', 'entries.file_id')
                ->limit($request->input("row_count"))
                ->where('entries.entry_status_id', '=',  EntryStatus::ENTRY_VALIDATOR_IN_PROGRESS)
                ->where('clients.checker_user_id', '=',  $user->id)
                ->where('entries.entry_type', '=',  ENTRY::PURCHASE_ENTRY)
                ->where('entries.deleted_at', null)
                ->where('purchases.deleted_at', null);

            $entries_query = $sales_entries->union($expenditure_entries)->union($purchases_entries)
                ->orderBy('updated_at', 'DESC');

            if ($request->input("row_count") > 0) {
                $entries_query->limit($request->input("row_count"));
            }

            $entries = $entries_query->get();

            return $this->send_response('Checker checked entries', $entries, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Could not get checker checked entries', null);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/entry/checkerlastweeksgraph",
     *     tags={"Entry"},
     *     summary="Checker last weeks graph report.",
     *     operationId="entry_checker_last_weeks_graph",
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\Response(
     *         response=200,
     *         description="Checker last weeks graph report",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Checker last weeks graph report."),
     *             @OA\Property(property="payload", type="array",
     *                  @OA\Items(ref="#/components/schemas/GetCheckerLastWeeksGraphOutput")
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
     *         description="The user must be checker type",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=402),
     *             @OA\Property(property="message", type="string", example="The user must be checker type."),
     *             @OA\Property(property="payload", type="object")
     *         )
     *     ),
     * )
     */
    public function checker_last_weeks_graph(Request $request)
    {
        try {

            $user = $this->guard('api')->user();

            if (!$user)
                return $this->send_error_response('No user found as logged in', 401);

            if (!$user->isChecker()) {
                return $this->send_response('The user must be checker type.', null, 401);
            }

            // Sale
            $sale_entries = DB::table('sales')
                ->selectRaw('DATE(sales.invoice_date) as invoice_date, SUM(sales.amount) sale_amount, 0 as purchase_amount, 0 as expenditure_amount')
                ->join('entries', 'entries.id', '=', 'sales.entry_id')
                ->join('clients', 'clients.user_id', '=', 'entries.client_user_id')
                ->groupByRaw('DATE(sales.invoice_date)')
                ->where('entries.entry_status_id', '=',  EntryStatus::ENTRY_APPROVED)
                ->where('clients.checker_user_id', '=',  $user->id)
                ->whereRaw('sales.invoice_date > NOW() - INTERVAL 2 WEEK')
                ->where('entries.deleted_at', null)
                ->where('sales.deleted_at', null);

            // Expenditure
            $expenditure_entries = DB::table('expenditures')
                ->selectRaw('DATE(expenditures.invoice_date) as invoice_date, 0 as sale_amount, 0 as purchase_amount, SUM(expenditures.amount) expenditure_amount')
                ->join('entries', 'expenditures.entry_id', '=', 'entries.id')
                ->join('clients', 'clients.user_id', '=', 'entries.client_user_id')
                ->groupByRaw('DATE(expenditures.invoice_date)')
                ->where('entries.entry_status_id', '=',  EntryStatus::ENTRY_APPROVED)
                ->where('clients.checker_user_id', '=',  $user->id)
                ->whereRaw('expenditures.invoice_date > NOW() - INTERVAL 2 WEEK')
                ->where('entries.deleted_at', null)
                ->where('expenditures.deleted_at', null);

            // Purchase
            $purchase_entries = DB::table('purchases')
                ->selectRaw('DATE(purchases.invoice_date) as invoice_date, 0 as sale_amount, SUM(purchases.total_amount) purchase_amount, 0 as expenditure_amount')
                ->join('entries', 'purchases.entry_id', '=', 'entries.id')
                ->join('clients', 'clients.user_id', '=', 'entries.client_user_id')
                ->groupByRaw('DATE(purchases.invoice_date)')
                ->where('entries.entry_status_id', '=',  EntryStatus::ENTRY_APPROVED)
                ->where('clients.checker_user_id', '=',  $user->id)
                ->whereRaw('purchases.invoice_date > NOW() - INTERVAL 2 WEEK')
                ->where('entries.deleted_at', null)
                ->where('purchases.deleted_at', null);

            $subQuery = $sale_entries->union($expenditure_entries)->union($purchase_entries);

            $entries = DB::table(DB::raw("({$subQuery->toSql()}) as summary"))
                ->mergeBindings($subQuery)
                ->selectRaw('DATE_FORMAT(summary.invoice_date, \'%D %b\') as day, SUM(summary.sale_amount) as sale_amount,SUM(summary.purchase_amount) as purchase_amount,SUM(summary.expenditure_amount) as expenditure_amount')
                ->groupByRaw('DATE_FORMAT(summary.invoice_date, \'%D %b\')')
                ->orderByRaw('DATE_FORMAT(summary.invoice_date, \'%D %b\')')
                ->get();

            return $this->send_response('Checker last weeks graph report', $entries, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Could not get entries', null);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/entry/checkervatpayablegraph",
     *     tags={"Entry"},
     *     summary="Checker vat payable graph report.",
     *     operationId="entry_checker_vat_payable_graph",
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\Response(
     *         response=200,
     *         description="Checker vat payable graph report",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Checker vat payable graph report."),
     *             @OA\Property(property="payload", type="array",
     *                  @OA\Items(ref="#/components/schemas/GetCheckerVatPayableGraphOutput")
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
     *         description="The user must be checker type",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=402),
     *             @OA\Property(property="message", type="string", example="The user must be checker type."),
     *             @OA\Property(property="payload", type="object")
     *         )
     *     ),
     * )
     */
    public function checker_vat_payable_graph(Request $request)
    {
        try {

            $user = $this->guard('api')->user();

            if (!$user)
                return $this->send_error_response('No user found as logged in', 401);

            if (!$user->isChecker()) {
                return $this->send_response('The user must be checker type.', null, 401);
            }

            // Sale
            $sale_entries = DB::table('sales')
                ->selectRaw('users.name as client_name, SUM(sales.vat_amount) sale_vat_amount, 0 as purchase_vat_amount')
                ->join('entries', 'entries.id', '=', 'sales.entry_id')
                ->join('users', 'users.id', '=', 'entries.client_user_id')
                ->join('clients', 'clients.user_id', '=', 'users.id')
                ->groupBy('users.name')
                ->where('entries.entry_status_id', '=',  EntryStatus::ENTRY_APPROVED)
                ->where('clients.checker_user_id', '=',  $user->id)
                ->where('entries.deleted_at', null)
                ->where('sales.deleted_at', null);

            // Purchase
            $purchase_entries = DB::table('purchases')
                ->selectRaw('users.name as client_name, 0 as sale_vat_amount, SUM(purchases.vat_amount) purchase_vat_amount')
                ->join('entries', 'purchases.entry_id', '=', 'entries.id')
                ->join('users', 'users.id', '=', 'entries.client_user_id')
                ->join('clients', 'clients.user_id', '=', 'users.id')
                ->groupBy('users.name')
                ->where('entries.entry_status_id', '=',  EntryStatus::ENTRY_APPROVED)
                ->where('clients.checker_user_id', '=',  $user->id)
                ->where('entries.deleted_at', null)
                ->where('purchases.deleted_at', null);

            $subQuery = $sale_entries->union($purchase_entries);

            $entries = DB::table(DB::raw("({$subQuery->toSql()}) as summary"))
                ->mergeBindings($subQuery)
                ->selectRaw('summary.client_name, (SUM(summary.sale_vat_amount) - SUM(summary.purchase_vat_amount)) as vat_amount')
                ->groupBy('summary.client_name')
                ->orderBy('summary.client_name', 'DESC')
                ->limit(5)
                ->get();

            return $this->send_response('Checker vat payable graph report', $entries, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Could not get entries', null);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/entry/validatorpendinglist",
     *     tags={"Entry"},
     *     summary="Get pending entries for a specific validator user.",
     *     operationId="entry_validator_pending_list",
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\Parameter(
     *         name="row_count",
     *         in="query",
     *         description="Row limit count",
     *         required=false,
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successfully sent pedning entry data",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Successfully pending sent entry data."),
     *             @OA\Property(property="payload", type="array",
     *                  @OA\Items(ref="#/components/schemas/GetValidatorPendingEntriesOutput")
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
     *         description="The user must be validator type",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=402),
     *             @OA\Property(property="message", type="string", example="The user must be validator type."),
     *             @OA\Property(property="payload", type="object")
     *         )
     *     ),
     * )
     */
    public function validator_pending_list(Request $request)
    {
        try {
            $user = $this->guard('api')->user();
            if (!$user)
                return $this->send_error_response('No user found as logged in', 401);

            if (!$user->isValidator())
                return $this->send_error_response('The user must be validator type', 402);

            $pending_entries = DB::table('entries')
                ->select(
                    'user_client.name as user_name',
                    'users_checker.name as checker_name',
                    'files.file_path',
                    'entries.id',
                    'entries.entry_type',
                    'entries.requested_for_delete'
                )
                ->selectRaw('DATE(entries.created_at) as created_at')
                ->selectRaw('CASE WHEN sales.invoice_date is not null THEN DATE(sales.invoice_date)
                WHEN expenditures.invoice_date is not null THEN DATE(expenditures.invoice_date)
                WHEN purchases.invoice_date is not null THEN DATE(purchases.invoice_date)
                END AS invoice_date')

                ->join('users as user_client', 'user_client.id', '=', 'entries.client_user_id')
                ->join('clients', 'clients.user_id', '=', 'user_client.id')
                ->join('users as users_checker', 'users_checker.id', '=', 'clients.checker_user_id')
                ->join('checkers', 'checkers.user_id', '=', 'clients.checker_user_id')
                ->join('files', 'files.id', '=', 'entries.file_id')
                ->leftJoin('sales', 'sales.entry_id', '=', 'entries.id')
                ->leftjoin('expenditures', 'expenditures.entry_id', '=', 'entries.id')
                ->leftjoin('purchases', 'purchases.entry_id', '=', 'entries.id')

                ->where('entries.deleted_at', null)
                ->where('checkers.validator_user_id', '=',  $user->id)
                ->where('entries.entry_status_id', '=',  EntryStatus::ENTRY_VALIDATOR_IN_PROGRESS)
                ->orderBy('entries.updated_at', 'DESC');

            if ($request->input("row_count") > 0) {
                $pending_entries->limit($request->input("row_count"));
            }
            $entries = $pending_entries->get();

            return $this->send_response('Pending entries data', $entries, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Could not get pending entries data', null);
        }
    }

    public function validator_approved_list(Request $request)
    {
        try {
            $user = $this->guard('api')->user();
            if (!$user)
                return $this->send_error_response('No user found as logged in', 401);
            if (!$user->isValidator())
                return $this->send_error_response('The user must be validator type', 402);

            $sale_entries = DB::table('entries')
                ->select('user_client.name as user_name', 'users_checker.name as checker_name', 'files.file_path', 'entries.id', 'entries.entry_type', 'sales.amount', 'sales.invoice_number', 'entries.updated_at',)
                ->selectRaw('DATE(invoice_date) as invoice_date, DATE(entries.created_at) as created_at')
                // ->selectRaw('users.name WHERE checkers.user_id = users.id')
                ->join('users as user_client', 'user_client.id', '=', 'entries.client_user_id')
                ->join('clients', 'clients.user_id', '=', 'user_client.id')
                ->join('users as users_checker', 'users_checker.id', '=', 'clients.checker_user_id')
                ->join('checkers', 'checkers.user_id', '=', 'clients.checker_user_id')
                ->join('sales', 'sales.entry_id', '=', 'entries.id')
                ->join('files', 'files.id', '=', 'entries.file_id')
                ->limit($request->input("row_count"))
                ->where('entries.entry_status_id', '=',  EntryStatus::ENTRY_APPROVED)
                ->where('checkers.validator_user_id', '=',  $user->id)
                ->where('entries.deleted_at', null)
                ->where('sales.deleted_at', null)
                ->where('entries.entry_type', '=',  ENTRY::SALE_ENTRY);

            // Expenditure
            $expenditure_entries = DB::table('entries')
                ->select(
                    'user_client.name as user_name',
                    'users_checker.name as checker_name',
                    'files.file_path',
                    'entries.id',
                    'entries.entry_type',
                    'expenditures.amount',
                    'expenditures.invoice_number',
                    'entries.updated_at',
                )
                ->selectRaw('DATE(invoice_date) as invoice_date, DATE(entries.created_at) as created_at')
                ->join('users as user_client', 'user_client.id', '=', 'entries.client_user_id')
                ->join('clients', 'clients.user_id', '=', 'user_client.id')
                ->join('users as users_checker', 'users_checker.id', '=', 'clients.checker_user_id')
                ->join('checkers', 'checkers.user_id', '=', 'clients.checker_user_id')
                ->join('expenditures', 'expenditures.entry_id', '=', 'entries.id')
                ->join('files', 'files.id', '=', 'entries.file_id')
                ->limit($request->input("row_count"))
                ->where('entries.entry_status_id', '=',  EntryStatus::ENTRY_APPROVED)
                ->where('checkers.validator_user_id', '=',  $user->id)
                ->where('entries.entry_type', '=',  ENTRY::EXPENDITURE_ENTRY)
                ->where('entries.deleted_at', null)
                ->where('expenditures.deleted_at', null);

            // Purchase
            $purchase_entries = DB::table('entries')
                ->select(
                    'user_client.name as user_name',
                    'users_checker.name as checker_name',
                    'files.file_path',
                    'entries.id',
                    'entries.entry_type',
                    'purchases.total_amount as amount',
                    'purchases.invoice_number',
                    'entries.updated_at',
                )
                ->selectRaw('DATE(invoice_date) as invoice_date, DATE(entries.created_at) as created_at')
                ->join('users as user_client', 'user_client.id', '=', 'entries.client_user_id')
                ->join('clients', 'clients.user_id', '=', 'user_client.id')
                ->join('users as users_checker', 'users_checker.id', '=', 'clients.checker_user_id')
                ->join('checkers', 'checkers.user_id', '=', 'clients.checker_user_id')
                ->join('purchases', 'purchases.entry_id', '=', 'entries.id')
                ->join('files', 'files.id', '=', 'entries.file_id')
                ->limit($request->input("row_count"))
                ->where('entries.entry_status_id', '=',  EntryStatus::ENTRY_APPROVED)
                ->where('checkers.validator_user_id', '=',  $user->id)
                ->where('entries.deleted_at', null)
                ->where('purchases.deleted_at', null)
                ->where('entries.entry_type', '=',  ENTRY::PURCHASE_ENTRY);



            $approved_entries = $sale_entries->union($expenditure_entries)->union($purchase_entries)
                ->orderBy('updated_at', 'DESC');

            if ($request->input("row_count") > 0) {
                $approved_entries->limit($request->input("row_count"));
            }
            $entries = $approved_entries->get();
            return $this->send_response('Approved entries data', $entries, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Could not get approved entries data', null);
        }
    }
    public function validator_rejected_list(Request $request)
    {
        try {
            $user = $this->guard('api')->user();
            if (!$user)
                return $this->send_error_response('No user found as logged in', 401);
            if (!$user->isValidator())
                return $this->send_error_response('The user must be validator type', 402);
            $rejected_entries = DB::table('entries')
                ->select('user_client.name as user_name', 'users_checker.name as checker_name', 'files.file_path', 'entries.id', 'entries.entry_type', 'entries.requested_for_delete')
                ->selectRaw('DATE(entries.created_at) as created_at')
                ->join('users as user_client', 'user_client.id', '=', 'entries.client_user_id')
                ->join('clients', 'clients.user_id', '=', 'user_client.id')
                ->join('users as users_checker', 'users_checker.id', '=', 'clients.checker_user_id')
                ->join('checkers', 'checkers.user_id', '=', 'clients.checker_user_id')
                ->join('files', 'files.id', '=', 'entries.file_id')
                ->leftJoin('sales', 'sales.entry_id', '=', 'entries.id')
                ->leftjoin('expenditures', 'expenditures.entry_id', '=', 'entries.id')
                ->leftjoin('purchases', 'purchases.entry_id', '=', 'entries.id')
                ->where('entries.deleted_at', null)
                ->where('checkers.validator_user_id', '=', $user->id)
                ->where('entries.entry_status_id', '=', EntryStatus::ENTRY_VALIDATOR_REJECTED)
                ->orderBy('entries.updated_at', 'DESC');
            if ($request->input("row_count") > 0) {
                $rejected_entries->limit($request->input("row_count"));
            }
            $entries = $rejected_entries->get();
            return $this->send_response('Rejected entries data', $entries, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Could not get rejected entries data', null);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/entry/validatorcheckedlist",
     *     tags={"Entry"},
     *     summary="Validator checked list for a specific validator user.",
     *     operationId="entry_validator_checked_list",
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\Parameter(
     *         name="row_count",
     *         in="query",
     *         description="Row limit count",
     *         required=false,
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Validator checked entries",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Validator checked entries."),
     *             @OA\Property(property="payload", type="array",
     *                  @OA\Items(ref="#/components/schemas/GetValidatorCheckedEntriesOutput")
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
     *         description="The user must be validator type",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=402),
     *             @OA\Property(property="message", type="string", example="The user must be validator type."),
     *             @OA\Property(property="payload", type="object")
     *         )
     *     ),
     * )
     */
    public function validator_checked_list(Request $request)
    {
        try {
            $user = $this->guard('api')->user();
            if (!$user)
                return $this->send_error_response('No user found as logged in', 401);
            if (!$user->isValidator())
                return $this->send_error_response('The user must be validator type', 402);
            // Sale
            $sale_entries = DB::table('entries')
                ->select('user_client.name as user_name', 'users_checker.name as checker_name', 'files.file_path', 'entries.id', 'entries.entry_type', 'sales.amount', 'sales.invoice_number', 'entries.updated_at',)
                ->selectRaw('DATE(invoice_date) as invoice_date, DATE(entries.created_at) as created_at')
                // ->selectRaw('users.name WHERE checkers.user_id = users.id')
                ->join('users as user_client', 'user_client.id', '=', 'entries.client_user_id')
                ->join('clients', 'clients.user_id', '=', 'user_client.id')
                ->join('users as users_checker', 'users_checker.id', '=', 'clients.checker_user_id')
                ->join('checkers', 'checkers.user_id', '=', 'clients.checker_user_id')
                ->join('sales', 'sales.entry_id', '=', 'entries.id')
                ->join('files', 'files.id', '=', 'entries.file_id')
                ->limit($request->input("row_count"))
                ->where('entries.entry_status_id', '=',  EntryStatus::ENTRY_APPROVED)
                ->where('checkers.validator_user_id', '=',  $user->id)
                ->where('entries.deleted_at', null)
                ->where('sales.deleted_at', null)
                ->where('entries.entry_type', '=',  ENTRY::SALE_ENTRY);

            // Expenditure
            $expenditure_entries = DB::table('entries')
                ->select(
                    'user_client.name as user_name',
                    'users_checker.name as checker_name',
                    'files.file_path',
                    'entries.id',
                    'entries.entry_type',
                    'expenditures.amount',
                    'expenditures.invoice_number',
                    'entries.updated_at',
                )
                ->selectRaw('DATE(invoice_date) as invoice_date, DATE(entries.created_at) as created_at')
                ->join('users as user_client', 'user_client.id', '=', 'entries.client_user_id')
                ->join('clients', 'clients.user_id', '=', 'user_client.id')
                ->join('users as users_checker', 'users_checker.id', '=', 'clients.checker_user_id')
                ->join('checkers', 'checkers.user_id', '=', 'clients.checker_user_id')
                ->join('expenditures', 'expenditures.entry_id', '=', 'entries.id')
                ->join('files', 'files.id', '=', 'entries.file_id')
                ->limit($request->input("row_count"))
                ->where('entries.entry_status_id', '=',  EntryStatus::ENTRY_APPROVED)
                ->where('checkers.validator_user_id', '=',  $user->id)
                ->where('entries.entry_type', '=',  ENTRY::EXPENDITURE_ENTRY)
                ->where('entries.deleted_at', null)
                ->where('expenditures.deleted_at', null);

            // Purchase
            $purchase_entries = DB::table('entries')
                ->select(
                    'user_client.name as user_name',
                    'users_checker.name as checker_name',
                    'files.file_path',
                    'entries.id',
                    'entries.entry_type',
                    'purchases.total_amount as amount',
                    'purchases.invoice_number',
                    'entries.updated_at',
                )
                ->selectRaw('DATE(invoice_date) as invoice_date, DATE(entries.created_at) as created_at')
                ->join('users as user_client', 'user_client.id', '=', 'entries.client_user_id')
                ->join('clients', 'clients.user_id', '=', 'user_client.id')
                ->join('users as users_checker', 'users_checker.id', '=', 'clients.checker_user_id')
                ->join('checkers', 'checkers.user_id', '=', 'clients.checker_user_id')
                ->join('purchases', 'purchases.entry_id', '=', 'entries.id')
                ->join('files', 'files.id', '=', 'entries.file_id')
                ->limit($request->input("row_count"))
                ->where('entries.entry_status_id', '=',  EntryStatus::ENTRY_APPROVED)
                ->where('checkers.validator_user_id', '=',  $user->id)
                ->where('entries.deleted_at', null)
                ->where('purchases.deleted_at', null)
                ->where('entries.entry_type', '=',  ENTRY::PURCHASE_ENTRY);

            $checked_entries = $sale_entries->union($expenditure_entries)->union($purchase_entries)
                ->orderBy('updated_at', 'DESC');

            if ($request->input("row_count") > 0) {
                $checked_entries->limit($request->input("row_count"));
            }
            $entries = $checked_entries->get();

            return $this->send_response('Validator checked entries', $entries, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Could not get validator checked entries', null);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/entry/validatorlastweeksgraph",
     *     tags={"Entry"},
     *     summary="Validator last weeks graph report.",
     *     operationId="entry_validator_last_weeks_graph",
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\Response(
     *         response=200,
     *         description="Validator last weeks graph report",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Validator last weeks graph report."),
     *             @OA\Property(property="payload", type="array",
     *                  @OA\Items(ref="#/components/schemas/GetValidatorLastWeeksGraphOutput")
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
     *         description="The user must be validator type",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=402),
     *             @OA\Property(property="message", type="string", example="The user must be validator type."),
     *             @OA\Property(property="payload", type="object")
     *         )
     *     ),
     * )
     */
    public function validator_last_weeks_graph(Request $request)
    {
        try {

            $user = $this->guard('api')->user();

            if (!$user)
                return $this->send_error_response('No user found as logged in', 401);

            if (!$user->isValidator()) {
                return $this->send_response('The user must be validator type.', null, 401);
            }

            // Sale
            $sale_entries = DB::table('sales')
                ->selectRaw('DATE(sales.invoice_date) as invoice_date, SUM(sales.amount) sale_amount, 0 as purchase_amount, 0 as expenditure_amount')
                ->join('entries', 'entries.id', '=', 'sales.entry_id')
                ->join('clients', 'clients.user_id', '=', 'entries.client_user_id')
                ->join('checkers', 'checkers.user_id', '=', 'clients.checker_user_id')
                ->groupByRaw('DATE(sales.invoice_date)')
                ->where('entries.entry_status_id', '=',  EntryStatus::ENTRY_APPROVED)
                ->where('checkers.validator_user_id', '=',  $user->id)
                ->whereRaw('sales.invoice_date > NOW() - INTERVAL 2 WEEK')
                ->where('entries.deleted_at', null)
                ->where('sales.deleted_at', null);

            // Expenditure
            $expenditure_entries = DB::table('expenditures')
                ->selectRaw('DATE(expenditures.invoice_date) as invoice_date, 0 as sale_amount, 0 as purchase_amount, SUM(expenditures.amount) expenditure_amount')
                ->join('entries', 'expenditures.entry_id', '=', 'entries.id')
                ->join('clients', 'clients.user_id', '=', 'entries.client_user_id')
                ->join('checkers', 'checkers.user_id', '=', 'clients.checker_user_id')
                ->groupByRaw('DATE(expenditures.invoice_date)')
                ->where('entries.entry_status_id', '=',  EntryStatus::ENTRY_APPROVED)
                ->where('checkers.validator_user_id', '=',  $user->id)
                ->whereRaw('expenditures.invoice_date > NOW() - INTERVAL 2 WEEK')
                ->where('entries.deleted_at', null)
                ->where('expenditures.deleted_at', null);

            // Purchase
            $purchase_entries = DB::table('purchases')
                ->selectRaw('DATE(purchases.invoice_date) as invoice_date, 0 as sale_amount, SUM(purchases.total_amount) purchase_amount, 0 as expenditure_amount')
                ->join('entries', 'purchases.entry_id', '=', 'entries.id')
                ->join('clients', 'clients.user_id', '=', 'entries.client_user_id')
                ->join('checkers', 'checkers.user_id', '=', 'clients.checker_user_id')
                ->groupByRaw('DATE(purchases.invoice_date)')
                ->where('entries.entry_status_id', '=',  EntryStatus::ENTRY_APPROVED)
                ->where('checkers.validator_user_id', '=',  $user->id)
                ->whereRaw('purchases.invoice_date > NOW() - INTERVAL 2 WEEK')
                ->where('entries.deleted_at', null)
                ->where('purchases.deleted_at', null);

            $subQuery = $sale_entries->union($expenditure_entries)->union($purchase_entries);

            $entries = DB::table(DB::raw("({$subQuery->toSql()}) as summary"))
                ->mergeBindings($subQuery)
                ->selectRaw('DATE_FORMAT(summary.invoice_date, \'%D %b\') as day, SUM(summary.sale_amount) as sale_amount,SUM(summary.purchase_amount) as purchase_amount,SUM(summary.expenditure_amount) as expenditure_amount')
                ->groupByRaw('DATE_FORMAT(summary.invoice_date, \'%D %b\')')
                ->orderByRaw('DATE_FORMAT(summary.invoice_date, \'%D %b\')')
                ->get();

            return $this->send_response('Validator last weeks graph report', $entries, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Could not get entries', null);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/entry/validatorvatpayablegraph",
     *     tags={"Entry"},
     *     summary="Validator last weeks graph report.",
     *     operationId="entry_validator_vat_payable_graph",
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\Response(
     *         response=200,
     *         description="Validator vat payable graph report",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Validator vat payable graph report."),
     *             @OA\Property(property="payload", type="array",
     *                  @OA\Items(ref="#/components/schemas/GetValidatorVatPayableGraphOutput")
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
     *         description="The user must be validator type",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=402),
     *             @OA\Property(property="message", type="string", example="The user must be validator type."),
     *             @OA\Property(property="payload", type="object")
     *         )
     *     ),
     * )
     */
    public function validator_vat_payable_graph(Request $request)
    {
        try {

            $user = $this->guard('api')->user();

            if (!$user)
                return $this->send_error_response('No user found as logged in', 401);

            if (!$user->isValidator()) {
                return $this->send_response('The user must be validator type.', null, 401);
            }

            // Sale
            $sale_entries = DB::table('sales')
                ->selectRaw('users.name as client_name, SUM(sales.vat_amount) sale_vat_amount, 0 as purchase_vat_amount')
                ->join('entries', 'entries.id', '=', 'sales.entry_id')
                ->join('users', 'users.id', '=', 'entries.client_user_id')
                ->join('clients', 'clients.user_id', '=', 'users.id')
                ->join('checkers', 'checkers.user_id', '=', 'clients.checker_user_id')
                ->groupBy('users.name')
                ->where('entries.entry_status_id', '=',  EntryStatus::ENTRY_APPROVED)
                ->where('checkers.validator_user_id', '=',  $user->id)
                ->where('entries.deleted_at', null)
                ->where('sales.deleted_at', null);

            // Purchase
            $purchase_entries = DB::table('purchases')
                ->selectRaw('users.name as client_name, 0 as sale_vat_amount, SUM(purchases.vat_amount) purchase_vat_amount')
                ->join('entries', 'purchases.entry_id', '=', 'entries.id')
                ->join('users', 'users.id', '=', 'entries.client_user_id')
                ->join('clients', 'clients.user_id', '=', 'users.id')
                ->join('checkers', 'checkers.user_id', '=', 'clients.checker_user_id')
                ->groupBy('users.name')
                ->where('entries.entry_status_id', '=',  EntryStatus::ENTRY_APPROVED)
                ->where('checkers.validator_user_id', '=',  $user->id)
                ->where('entries.deleted_at', null)
                ->where('purchases.deleted_at', null);

            $subQuery = $sale_entries->union($purchase_entries);

            $entries = DB::table(DB::raw("({$subQuery->toSql()}) as summary"))
                ->mergeBindings($subQuery)
                ->selectRaw('summary.client_name, (SUM(summary.sale_vat_amount) - SUM(summary.purchase_vat_amount)) as vat_amount')
                ->groupBy('summary.client_name')
                ->orderBy('summary.client_name', 'DESC')
                ->limit(5)
                ->get();

            return $this->send_response('Validator vat payable graph report', $entries, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Could not get entries', null);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/entry/setvalidatorstatus",
     *     tags={"Entry"},
     *     summary="Set validator entry status.
     *                  Status ID
     *                      2:Recheck,
     *                      4:Approved,
     *                      5:Rejected",
     *     description="Set validator entry status. Status ID 2: Recheck, 4:Approved, 5:Rejected",
     *     operationId="entry_set_validator_status",
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\RequestBody(
     *         description="Set validator entry input",
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/SetValidatorEntryInput")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Entry status updated successfully.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Entry status updated successfully."),
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
     *         )
     *     ),
     *     @OA\Response(
     *         response=402,
     *         description="Entry can create client user only.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=402),
     *             @OA\Property(property="message", type="string", example="Entry can create client user only."),
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
     *         description="Please wait for checker response.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=405),
     *             @OA\Property(property="message", type="string", example="Please wait for checker response."),
     *             @OA\Property(property="payload", type="object")
     *         ),
     *     ),
     * )
     */
    public function set_validator_status(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'entry_id' => 'required|numeric|min:1',
                'status_id' => 'required|numeric',
            ]
        );

        if ($validator->fails()) {
            $error = $validator->errors()->all()[0];
            return $this->send_validation_error_response($error);
        }

        if ($request->status_id != 2 && $request->status_id != 4 && $request->status_id != 5)
            return $this->send_validation_error_response("The status ID should be 2,4 or 5");

        $user = $this->guard('api')->user();

        if (!$user)
            return $this->send_error_response('No user found as logged in', 401);

        if (!($user->isValidator() || $user->isSuperAdmin() || $user->isAdmin()))
            return $this->send_error_response('Entry status can change validator/Admin user only.', 402);

        $entry = Entry::find($request->entry_id);

        if (!$entry)
            return $this->send_error_response('Could not find the entry.', 403);

        if ($entry->entry_status_id != EntryStatus::ENTRY_VALIDATOR_IN_PROGRESS)
            return $this->send_error_response('Please wait for checker response.', 405);

        $entry->entry_status_id = $request->status_id;
        if ($request->input("comment"))
            $entry->comment = $request->input("comment");

        if ($request->status_id == EntryStatus::ENTRY_VALIDATOR_REJECTED) {
            $sale_entry = Sale::where('entry_id', '=', $request->entry_id)->first();
            if ($sale_entry) {
                $sale_entry->delete();
            }

            $exp_entry = Expenditure::where('entry_id', '=', $request->entry_id)->first();
            if ($exp_entry) {
                $exp_entry->delete();
            }

            $purchase_entry = Purchase::where('entry_id', '=', $request->entry_id)->first();
            if ($purchase_entry) {
                PurchaseDetail::where('purchase_id', '=', $purchase_entry->id)->delete();
                $purchase_entry->delete();
            }

            $entry->entry_type = null;
        }

        $entry->save();

        if ($request->status_id == EntryStatus::ENTRY_APPROVED) {
            $this->save_as_entry_file($entry);
        }

        return $this->send_response(
            'Entry status updated successfully.',
            null,
            200
        );
    }
    public function set_checker_status(Request $request)
    {
        $checker = Checker::make($request->all(), ['entry_id' => 'required|numeric|min:1', 'status_id' => 'required|numeric',]);

        $user = $this->guard('api')->user();
        if (!$user)
            return $this->send_error_response('No user found as logged in', 401);
        if (!$user->isChecker())
            return $this->send_error_response('The user must be checker type', 402);
        $entry = Entry::find($request->entry_id);
        if (!$entry)
            return $this->send_error_response('Could not find the entry.', 403);
        $entry->entry_status_id = $request->status_id;
        if ($request->input("comment"))
            $entry->comment = $request->input("comment");
        if ($request->status_id == EntryStatus::ENTRY_VALIDATOR_REJECTED) {
            $sale_entry = Sale::where('entry_id', '=', $request->entry_id)->first();
            if ($sale_entry) {
                $sale_entry->delete();
            }
            $exp_entry = Expenditure::where('entry_id', '=', $request->entry_id)->first();
            if ($exp_entry) {
                $exp_entry->delete();
            }
            $purchase_entry = Purchase::where('entry_id', '=', $request->entry_id)->first();
            if ($purchase_entry) {
                PurchaseDetail::where('purchase_id', '=', $purchase_entry->id)->delete();
                $purchase_entry->delete();
            }
            $entry->entry_type = null;
        }
        $entry->save();
        if ($request->status_id == EntryStatus::ENTRY_APPROVED) {
            $this->save_as_entry_file($entry);
        }
        return $this->send_response('Entry status updated successfully.', null, 200);
    }

    protected function save_as_entry_file($entry)
    {
        try {
            $entry_file = File::find($entry->file_id);
            $client = User::find($entry->client_user_id);

            if ($entry->entry_type == 1)
                $type =   "Sale";
            if ($entry->entry_type == 2)
                $type =   "Purchase";
            if ($entry->entry_type == 3)
                $type =   "Expenditure";

            $ext  = pathinfo($entry_file->file_path, PATHINFO_EXTENSION);
            $new_file_name = $client->id . '_' . $type . '_' . date("Ymd") . '_' . $entry->file_id . '.' . $ext;
            $image_uploaded_path = 'public/' . $entry_file->file_path;
            $month_year_folder = date("MY");
            $new_image_folder_path =  'public/approved_enteries/' . $client->name . '/' . $type . '/' . $month_year_folder . '/';
            $new_image_path = $new_image_folder_path . $new_file_name;

            Storage::copy($image_uploaded_path, $new_image_path);
        } catch (Exception $e) {
        }
    }

    /**
     * @OA\Post(
     *     path="/api/entry/validatordeleteentry",
     *     tags={"Entry"},
     *     summary="Validator delete entry",
     *     description="Validator delete entry.",
     *     operationId="entry_validator_delete_entry",
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
     *         description="Entry has been deleted successfully.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Entry has been deleted successfully."),
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
     *         description="Validator can only delete entry.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=402),
     *             @OA\Property(property="message", type="string", example="Validator can only delete entry."),
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
     *         description="The entry has been approved. Could not delete at this time.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=405),
     *             @OA\Property(property="message", type="string", example="The entry has been approved. Could not delete at this time."),
     *             @OA\Property(property="payload", type="object")
     *         ),
     *     ),
     *     @OA\Response(
     *         response=406,
     *         description="Could not find any client request against this entry.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=406),
     *             @OA\Property(property="message", type="string", example="Could not find any client request against this entry."),
     *             @OA\Property(property="payload", type="object")
     *         ),
     *     ),
     * )
     */
    public function validator_delete_entry(Request $request)
    {
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

        if (!($user->isValidator() || $user->isSuperAdmin() || $user->isAdmin()))
            return $this->send_error_response('Validator/Admin can only delete entry.', 402);

        $entry = Entry::find($request->entry_id);

        if (!$entry)
            return $this->send_error_response('Could not find the entry.', 403);

        if ($entry->entry_status_id == EntryStatus::ENTRY_APPROVED)
            return $this->send_error_response('The entry has been approved. Could not delete at this time.', 405);

        if (!$entry->requested_for_delete)
            return $this->send_error_response('Could not find any client request against this entry.', 406);

        $sale_entry = Sale::where('entry_id', '=', $request->entry_id)->first();
        if ($sale_entry) {
            $sale_entry->delete();
        }

        $exp_entry = Expenditure::where('entry_id', '=', $request->entry_id)->first();
        if ($exp_entry) {
            $exp_entry->delete();
        }

        $purchase_entry = Purchase::where('entry_id', '=', $request->entry_id)->first();
        if ($purchase_entry) {
            PurchaseDetail::where('purchase_id', '=', $purchase_entry->id)->delete();
            $purchase_entry->delete();
        }

        $entry->delete();

        return $this->send_response(
            'Entry has been deleted successfully.',
            null,
            200
        );
    }

    /**
     * @OA\Get(
     *     path="/api/entry/checkinvoicenumberexists",
     *     tags={"Entry"},
     *     summary="Check wether the invoice number is exist",
     *     description="Check wether the invoice number is exist",
     *     operationId="entry_check_invoice_number_exists",
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\Parameter(
     *         name="invoice_number",
     *         in="query",
     *         description="Invoice number",
     *         required=true,
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Invoice number existance checked.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Invoice number existance checked."),
     *             @OA\Property(property="is_invoice_number_exist", type="boolean")
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
     * )
     */
    public function check_invoice_number_exists(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'invoice_number' => 'required',
            ]
        );

        if ($validator->fails()) {
            $error = $validator->errors()->all()[0];
            return $this->send_validation_error_response($error);
        }

        $is_exist = Sale::join('entries', 'entries.id', '=', 'sales.entry_id')
            ->where('sales.deleted_at', null)
            ->where('sales.invoice_number', '=', $request->invoice_number)
            ->exists();

        $payload = [
            "is_invoice_number_exist" => $is_exist
        ];

        return $this->send_response(
            'Invoice number existance checked.',
            $payload,
            200
        );
    }

    /**
     * @OA\Get(
     *     path="/api/entry/invoiceexpgroups",
     *     tags={"Entry"},
     *     summary="Get invoice expenture group data",
     *     operationId="entry_get_invoice_exp_groups",
     *     @OA\Response(
     *         response=200,
     *         description="Successfully sent invoice group data",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Successfully sent invoice group data."),
     *             @OA\Property(property="payload", type="array",
     *                  @OA\Items(
     *                      @OA\Property(property="id", type="integer"),
     *                      @OA\Property(property="name", type="string"),
     *                      @OA\Property(property="invoice_sub_groups", type="array",
     *                          @OA\Items(
     *                              @OA\Property(property="id", type="integer"),
     *                              @OA\Property(property="name", type="string"),
     *                              @OA\Property(property="invoice_items", type="array",
     *                                  @OA\Items(
     *                                      @OA\Property(property="id", type="integer"),
     *                                      @OA\Property(property="name", type="string"),
     *                                  )
     *                              )
     *                          )
     *                      )
     *                  )
     *             )
     *         )
     *     ),
     * )
     */
    public function get_invoice_exp_groups()
    {
        try {

            $invoice_groups = InvoiceGroup::with('invoiceSubGroups', 'invoiceSubGroups.invoiceItems')
                ->where('invoice_groups.invoice_type', '=', Entry::EXPENDITURE_ENTRY)
                ->get();

            return $this->send_response('Sent invoice group data', $invoice_groups, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Could not get invoice group data', null);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/entry/invoicepurchasegroups",
     *     tags={"Entry"},
     *     summary="Get invoice purchase group data",
     *     operationId="entry_get_invoice_purchase_groups",
     *     @OA\Response(
     *         response=200,
     *         description="Successfully sent invoice group data",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Successfully sent invoice group data."),
     *             @OA\Property(property="payload", type="array",
     *                  @OA\Items(
     *                      @OA\Property(property="id", type="integer"),
     *                      @OA\Property(property="name", type="string"),
     *                      @OA\Property(property="invoice_sub_groups", type="array",
     *                          @OA\Items(
     *                              @OA\Property(property="id", type="integer"),
     *                              @OA\Property(property="name", type="string"),
     *                              @OA\Property(property="invoice_items", type="array",
     *                                  @OA\Items(
     *                                      @OA\Property(property="id", type="integer"),
     *                                      @OA\Property(property="name", type="string"),
     *                                  )
     *                              )
     *                          )
     *                      )
     *                  )
     *             )
     *         )
     *     ),
     * )
     */
    public function get_invoice_purchase_groups()
    {
        try {

            $invoice_groups = InvoiceGroup::with('invoiceSubGroups', 'invoiceSubGroups.invoiceItems')
                ->where('invoice_groups.invoice_type', '=', Entry::PURCHASE_ENTRY)
                ->get();

            return $this->send_response('Sent invoice group data', $invoice_groups, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Could not get invoice group data', null);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/entry/admincheckerpendinglist",
     *     tags={"Entry"},
     *     summary="Get pending entries for a admin user.
     *                  entry_status_id:
     *                      1:Pending
     *                      2:Recheck,
     *                      5:Rejected
     *                  Entry Type:
     *                      1: Sale
     *                      2: Purchase
     *                      3: Expenditure",
     *     operationId="entry_admin_dashboard_checker_pending_list",
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\Parameter(
     *         name="row_count",
     *         in="query",
     *         description="Row limit count",
     *         required=false,
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successfully sent entry data",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Successfully sent entry data."),
     *             @OA\Property(property="payload", type="array",
     *                  @OA\Items(
     *                       allOf={
     *                          @OA\Schema(ref="#/components/schemas/GetAdminCheckerPendingEntriesOutput"),
     *                          @OA\Schema(
     *                                  @OA\Property(property="checker_name", type="string"),
     *                                  @OA\Property(property="checker_user_id", type="integer"),
     *                          ),
     *                       }
     *                  )
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
     *         description="The user must be admin type",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=402),
     *             @OA\Property(property="message", type="string", example="The user must be admin type."),
     *             @OA\Property(property="payload", type="object")
     *         )
     *     ),
     * )
     */
    public function admin_checker_pending_list(Request $request)
    {
        try {

            $user = $this->guard('api')->user();

            if (!$user)
                return $this->send_error_response('No user found as logged in', 401);

            if (!($user->isAdmin() || $user->isSuperAdmin()))
                return $this->send_error_response('The user must be admin type', 402);


            $pending_entries = DB::table('entries')
                ->select(
                    'client_user.name',
                    'files.file_path',
                    'entries.id',
                    'entries.entry_status_id',
                    'entries.entry_type',
                    'entries.client_user_id',
                    'clients.vat_percentage',
                    'entries.comment',
                    'checker_user.name as checker_name',
                    'checker_user.id as checker_user_id',
                )
                ->selectRaw('DATE(entries.created_at) as created_at')
                ->join('users as client_user', 'client_user.id', '=', 'entries.client_user_id')
                ->join('clients', 'clients.user_id', '=', 'client_user.id')
                ->join('users as checker_user', 'checker_user.id', '=', 'clients.checker_user_id')
                ->join('files', 'files.id', '=', 'entries.file_id')
                ->where('entries.deleted_at', null)
                ->where(function ($query) {
                    $query->orWhere('entries.entry_status_id', '=',  EntryStatus::ENTRY_PENDING)
                        ->orWhere('entries.entry_status_id', '=',  EntryStatus::ENTRY_CHECKER_IN_PROGRESS);
                    // ->orWhere('entries.entry_status_id', '=',  EntryStatus::ENTRY_VALIDATOR_REJECTED);
                })
                ->orderBy('entries.updated_at', 'DESC');

            if ($request->input("row_count") > 0) {
                $pending_entries->limit($request->input("row_count"));
            }

            $entries = $pending_entries->get();

            return $this->send_response('Pending entries data', $entries, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Could not get pending entries data', null);
        }
    }
    public function admin_checker_rejected_list(Request $request)
    {
        try {

            $user = $this->guard('api')->user();

            if (!$user)
                return $this->send_error_response('No user found as logged in', 401);

            if (!($user->isAdmin() || $user->isSuperAdmin()))
                return $this->send_error_response('The user must be admin type', 402);


            $pending_entries = DB::table('entries')
                ->select(
                    'client_user.name',
                    'files.file_path',
                    'entries.id',
                    'entries.entry_status_id',
                    'entries.entry_type',
                    'entries.client_user_id',
                    'clients.vat_percentage',
                    'entries.comment',
                    'checker_user.name as checker_name',
                    'checker_user.id as checker_user_id',
                )
                ->selectRaw('DATE(entries.created_at) as created_at')
                ->join('users as client_user', 'client_user.id', '=', 'entries.client_user_id')
                ->join('clients', 'clients.user_id', '=', 'client_user.id')
                ->join('users as checker_user', 'checker_user.id', '=', 'clients.checker_user_id')
                ->join('files', 'files.id', '=', 'entries.file_id')
                ->where('entries.deleted_at', null)
                ->where(function ($query) {
                    $query->orWhere('entries.entry_status_id', '=',  EntryStatus::ENTRY_VALIDATOR_REJECTED);
                })
                ->orderBy('entries.updated_at', 'DESC');

            if ($request->input("row_count") > 0) {
                $pending_entries->limit($request->input("row_count"));
            }

            $entries = $pending_entries->get();

            return $this->send_response('Pending entries data', $entries, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Could not get pending entries data', null);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/entry/adminvalidatorpendinglist",
     *     tags={"Entry"},
     *     summary="Get pending entries for admin user.",
     *     operationId="entry_admin_validator_pending_list",
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\Parameter(
     *         name="row_count",
     *         in="query",
     *         description="Row limit count",
     *         required=false,
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successfully sent pedning entry data",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Successfully pending sent entry data."),
     *             @OA\Property(property="payload", type="array",
     *                   @OA\Items(
     *                       allOf={
     *                          @OA\Schema(ref="#/components/schemas/GetAdminVdrPendingEntriesOutput"),
     *                          @OA\Schema(
     *                              @OA\Property(property="validator_name", type="string"),
     *                              @OA\Property(property="validator_user_id", type="integer"),
     *                          ),
     *                       }
     *                  )
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
     *         description="The user must be validator type",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=402),
     *             @OA\Property(property="message", type="string", example="The user must be validator type."),
     *             @OA\Property(property="payload", type="object")
     *         )
     *     ),
     * )
     */
    public function admin_validator_pending_list(Request $request)
    {
        try {

            $user = $this->guard('api')->user();

            if (!$user)
                return $this->send_error_response('No user found as logged in', 401);

            if (!($user->isAdmin() || $user->isSuperAdmin()))
                return $this->send_error_response('The user must be admin type', 402);


            $pending_entries = DB::table('entries')
                ->select(
                    'client_user.name',
                    'files.file_path',
                    'entries.id',
                    'entries.entry_type',
                    'entries.requested_for_delete',
                    'entries.client_user_id',
                    'checker_user.name as checker_name',
                    'checker_user.id as checker_user_id',
                    'validators.name as validator_name',
                    'validators.id as validator_user_id',
                )
                ->selectRaw('DATE(entries.created_at) as created_at')
                ->selectRaw('CASE WHEN sales.invoice_date is not null THEN DATE(sales.invoice_date)
                WHEN expenditures.invoice_date is not null THEN DATE(expenditures.invoice_date)
                WHEN purchases.invoice_date is not null THEN DATE(purchases.invoice_date)
                END AS invoice_date
                ')
                ->join('clients', 'clients.user_id', '=', 'entries.client_user_id')
                ->join('users as client_user', 'client_user.id', '=', 'clients.user_id')
                ->join('checkers', 'checkers.user_id', '=', 'clients.checker_user_id')
                ->join('users as checker_user', 'checker_user.id', '=', 'checkers.user_id')
                ->join('users as validators', 'validators.id', '=', 'checkers.validator_user_id')
                ->join('files', 'files.id', '=', 'entries.file_id')
                ->leftJoin('sales', 'sales.entry_id', '=', 'entries.id')
                ->leftjoin('expenditures', 'expenditures.entry_id', '=', 'entries.id')
                ->leftjoin('purchases', 'purchases.entry_id', '=', 'entries.id')
                ->where('entries.deleted_at', null)
                ->where('entries.entry_status_id', '=',  EntryStatus::ENTRY_VALIDATOR_IN_PROGRESS)
                ->orderBy('entries.updated_at', 'DESC');

            if ($request->input("row_count") > 0) {
                $pending_entries->limit($request->input("row_count"));
            }
            $entries = $pending_entries->get();
            return $this->send_response('Pending entries data', $entries, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Could not get pending entries data', null);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/entry/admincheckedlist",
     *     tags={"Entry"},
     *     summary="Admin checked list.",
     *     operationId="entry_admin_checked_list",
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\Parameter(
     *         name="row_count",
     *         in="query",
     *         description="Row limit count",
     *         required=false,
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Admin checked entries",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Admin checked entries."),
     *             @OA\Property(property="payload", type="array",
     *                  @OA\Items(ref="#/components/schemas/GetAdminCheckedEntriesOutput")
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
     *         description="The user must be admin type",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=402),
     *             @OA\Property(property="message", type="string", example="The user must be admin type."),
     *             @OA\Property(property="payload", type="object")
     *         )
     *     ),
     * )
     */
    public function admin_checked_list(Request $request)
    {
        try {

            $user = $this->guard('api')->user();

            if (!$user)
                return $this->send_error_response('No user found as logged in', 401);

            if (!($user->isAdmin() || $user->isSuperAdmin()))
                return $this->send_error_response('The user must be admin type', 402);


            // Sale
            $sale_entries = DB::table('entries')
                ->select(
                    'users.name',
                    'files.file_path',
                    'entries.id',
                    'entries.entry_type',
                    'sales.amount',
                    'sales.invoice_number',
                    'entries.updated_at',
                    'checker_user.name as checker_name',
                    'checker_user.id as checker_user_id',
                    'validators.name as validator_name',
                    'validators.id as validator_user_id',
                )
                ->selectRaw('DATE(invoice_date) as invoice_date, DATE(entries.created_at) as created_at')
                ->join('users', 'users.id', '=', 'entries.client_user_id')
                ->join('clients', 'clients.user_id', '=', 'users.id')
                ->join('checkers', 'checkers.user_id', '=', 'clients.checker_user_id')
                ->join('users as checker_user', 'checker_user.id', '=', 'checkers.user_id')
                ->join('users as validators', 'validators.id', '=', 'checkers.validator_user_id')
                ->join('sales', 'sales.entry_id', '=', 'entries.id')
                ->join('files', 'files.id', '=', 'entries.file_id')
                ->limit($request->input("row_count"))
                ->where('entries.entry_status_id', '=',  EntryStatus::ENTRY_APPROVED)
                ->where('entries.deleted_at', null)
                ->where('sales.deleted_at', null)
                ->where('entries.entry_type', '=',  ENTRY::SALE_ENTRY);

            // Expenditure
            $expenditure_entries = DB::table('entries')
                ->select(
                    'users.name',
                    'files.file_path',
                    'entries.id',
                    'entries.entry_type',
                    'expenditures.amount',
                    'expenditures.invoice_number',
                    'entries.updated_at',
                    'checker_user.name as checker_name',
                    'checker_user.id as checker_user_id',
                    'validators.name as validator_name',
                    'validators.id as validator_user_id',
                )
                ->selectRaw('DATE(invoice_date) as invoice_date, DATE(entries.created_at) as created_at')
                ->join('users', 'users.id', '=', 'entries.client_user_id')
                ->join('clients', 'clients.user_id', '=', 'users.id')
                ->join('checkers', 'checkers.user_id', '=', 'clients.checker_user_id')
                ->join('users as checker_user', 'checker_user.id', '=', 'checkers.user_id')
                ->join('users as validators', 'validators.id', '=', 'checkers.validator_user_id')
                ->join('expenditures', 'expenditures.entry_id', '=', 'entries.id')
                ->join('files', 'files.id', '=', 'entries.file_id')
                ->limit($request->input("row_count"))
                ->where('entries.entry_status_id', '=',  EntryStatus::ENTRY_APPROVED)
                ->where('entries.entry_type', '=',  ENTRY::EXPENDITURE_ENTRY)
                ->where('entries.deleted_at', null)
                ->where('expenditures.deleted_at', null);

            // Purchase
            $purchase_entries = DB::table('entries')
                ->select(
                    'users.name',
                    'files.file_path',
                    'entries.id',
                    'entries.entry_type',
                    'purchases.total_amount as amount',
                    'purchases.invoice_number',
                    'entries.updated_at',
                    'checker_user.name as checker_name',
                    'checker_user.id as checker_user_id',
                    'validators.name as validator_name',
                    'validators.id as validator_user_id',
                )
                ->selectRaw('DATE(invoice_date) as invoice_date, DATE(entries.created_at) as created_at')
                ->join('users', 'users.id', '=', 'entries.client_user_id')
                ->join('clients', 'clients.user_id', '=', 'users.id')
                ->join('checkers', 'checkers.user_id', '=', 'clients.checker_user_id')
                ->join('users as checker_user', 'checker_user.id', '=', 'checkers.user_id')
                ->join('users as validators', 'validators.id', '=', 'checkers.validator_user_id')
                ->join('purchases', 'purchases.entry_id', '=', 'entries.id')
                ->join('files', 'files.id', '=', 'entries.file_id')
                ->limit($request->input("row_count"))
                ->where('entries.entry_status_id', '=',  EntryStatus::ENTRY_APPROVED)
                ->where('entries.deleted_at', null)
                ->where('purchases.deleted_at', null)
                ->where('entries.entry_type', '=',  ENTRY::PURCHASE_ENTRY);

            $checked_entries = $sale_entries->union($expenditure_entries)->union($purchase_entries)
                ->orderBy('updated_at', 'DESC');

            if ($request->input("row_count") > 0) {
                $checked_entries->limit($request->input("row_count"));
            }

            $entries = $checked_entries->get();
            return $this->send_response('Admin checked entries', $entries, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Could not get checked entries', null);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/entry/adminlastweeksgraph",
     *     tags={"Entry"},
     *     summary="Admin last weeks graph report.",
     *     operationId="entry_admin_last_weeks_graph",
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\Response(
     *         response=200,
     *         description="Admin last weeks graph report",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Admin last weeks graph report."),
     *             @OA\Property(property="payload", type="array",
     *                  @OA\Items(ref="#/components/schemas/GetValidatorLastWeeksGraphOutput")
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
     *         description="The user must be admin type",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=402),
     *             @OA\Property(property="message", type="string", example="The user must be admin type."),
     *             @OA\Property(property="payload", type="object")
     *         )
     *     ),
     * )
     */
    public function admin_last_weeks_graph(Request $request)
    {
        try {

            $user = $this->guard('api')->user();

            if (!$user)
                return $this->send_error_response('No user found as logged in', 401);

            if (!($user->isAdmin() || $user->isSuperAdmin()))
                return $this->send_error_response('The user must be admin type', 402);

            // Sale
            $sale_entries = DB::table('sales')
                ->selectRaw('DATE(sales.invoice_date) as invoice_date, SUM(sales.amount) sale_amount, 0 as purchase_amount, 0 as expenditure_amount')
                ->join('entries', 'entries.id', '=', 'sales.entry_id')
                ->groupByRaw('DATE(sales.invoice_date)')
                ->where('entries.entry_status_id', '=',  EntryStatus::ENTRY_APPROVED)
                ->whereRaw('sales.invoice_date > NOW() - INTERVAL 2 WEEK')
                ->where('entries.deleted_at', null)
                ->where('sales.deleted_at', null);

            // Expenditure
            $expenditure_entries = DB::table('expenditures')
                ->selectRaw('DATE(expenditures.invoice_date) as invoice_date, 0 as sale_amount, 0 as purchase_amount, SUM(expenditures.amount) expenditure_amount')
                ->join('entries', 'expenditures.entry_id', '=', 'entries.id')
                ->groupByRaw('DATE(expenditures.invoice_date)')
                ->where('entries.entry_status_id', '=',  EntryStatus::ENTRY_APPROVED)
                ->whereRaw('expenditures.invoice_date > NOW() - INTERVAL 2 WEEK')
                ->where('entries.deleted_at', null)
                ->where('expenditures.deleted_at', null);

            // Purchase
            $purchase_entries = DB::table('purchases')
                ->selectRaw('DATE(purchases.invoice_date) as invoice_date, 0 as sale_amount, SUM(purchases.total_amount) purchase_amount, 0 as expenditure_amount')
                ->join('entries', 'purchases.entry_id', '=', 'entries.id')
                ->groupByRaw('DATE(purchases.invoice_date)')
                ->where('entries.entry_status_id', '=',  EntryStatus::ENTRY_APPROVED)
                ->whereRaw('purchases.invoice_date > NOW() - INTERVAL 2 WEEK')
                ->where('entries.deleted_at', null)
                ->where('purchases.deleted_at', null);

            $subQuery = $sale_entries->union($expenditure_entries)->union($purchase_entries);

            $entries = DB::table(DB::raw("({$subQuery->toSql()}) as summary"))
                ->mergeBindings($subQuery)
                ->selectRaw('DATE_FORMAT(summary.invoice_date, \'%D %b\') as day, SUM(summary.sale_amount) as sale_amount,SUM(summary.purchase_amount) as purchase_amount,SUM(summary.expenditure_amount) as expenditure_amount')
                ->groupByRaw('DATE_FORMAT(summary.invoice_date, \'%D %b\')')
                ->orderByRaw('DATE_FORMAT(summary.invoice_date, \'%D %b\')')
                ->get();

            return $this->send_response('Admin last weeks graph report', $entries, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Could not get entries', null);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/entry/adminvatpayablegraph",
     *     tags={"Entry"},
     *     summary="Admin last weeks graph report.",
     *     operationId="entry_admin_vat_payable_graph",
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\Response(
     *         response=200,
     *         description="Admin vat payable graph report",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Admin vat payable graph report."),
     *             @OA\Property(property="payload", type="array",
     *                  @OA\Items(ref="#/components/schemas/GetValidatorVatPayableGraphOutput")
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
     *         description="The user must be admin type",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=402),
     *             @OA\Property(property="message", type="string", example="The user must be amdin type."),
     *             @OA\Property(property="payload", type="object")
     *         )
     *     ),
     * )
     */
    public function admin_vat_payable_graph(Request $request)
    {
        try {
            $user = $this->guard('api')->user();
            if (!$user)
                return $this->send_error_response('No user found as logged in', 401);
            if (!($user->isAdmin() || $user->isSuperAdmin()))
                return $this->send_error_response('The user must be admin type', 402);
            // Sale
            $sale_entries = DB::table('sales')
                ->selectRaw('users.name as client_name, SUM(sales.vat_amount) sale_vat_amount, 0 as purchase_vat_amount')
                ->join('entries', 'entries.id', '=', 'sales.entry_id')
                ->join('users', 'users.id', '=', 'entries.client_user_id')
                ->join('clients', 'clients.user_id', '=', 'users.id')
                ->groupBy('users.name')
                ->where('entries.entry_status_id', '=',  EntryStatus::ENTRY_APPROVED)
                ->where('entries.deleted_at', null)
                ->where('sales.deleted_at', null);
            // Purchase
            $purchase_entries = DB::table('purchases')
                ->selectRaw('users.name as client_name, 0 as sale_vat_amount, SUM(purchases.vat_amount) purchase_vat_amount')
                ->join('entries', 'purchases.entry_id', '=', 'entries.id')
                ->join('users', 'users.id', '=', 'entries.client_user_id')
                ->groupBy('users.name')
                ->where('entries.entry_status_id', '=',  EntryStatus::ENTRY_APPROVED)
                ->where('entries.deleted_at', null)
                ->where('purchases.deleted_at', null);
            $subQuery = $sale_entries->union($purchase_entries);
            $entries = DB::table(DB::raw("({$subQuery->toSql()}) as summary"))
                ->mergeBindings($subQuery)
                ->selectRaw('summary.client_name, (SUM(summary.sale_vat_amount) - SUM(summary.purchase_vat_amount)) as vat_amount')
                ->groupBy('summary.client_name')
                ->orderBy('summary.client_name', 'DESC')
                ->limit(5)
                ->get();
            return $this->send_response('Admin vat payable graph report', $entries, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Could not get entries', null);
        }
    }

    protected function guard()
    {
        return Auth::guard('api');
    }
}
