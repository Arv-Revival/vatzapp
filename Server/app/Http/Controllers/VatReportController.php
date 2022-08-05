<?php

namespace App\Http\Controllers;

use DateInterval;
use DateTime;
use App\Models\EntryStatus;
use App\Models\Client;
use App\Models\User;
use App\Models\VatReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class VatReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => []]);
    }

    /**
     * @OA\Get(
     *     path="/api/vatreport/vatreportperiodsforclient",
     *     tags={"VAT Report"},
     *     summary="Get VAT report periods for client",
     *     description="Get VAT report periods for client.",
     *     operationId="vat_report_periods_for_client",
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\Response(
     *         response=200,
     *         description="VAT report periods list sent.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="VAT report periods list sent."),
     *             @OA\Property(property="payload", type="array",
     *                  @OA\Items(ref="#/components/schemas/VatReportPeriodsOutput")
     *             )
     *         ),
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Not permitted.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=401),
     *             @OA\Property(property="message", type="string", example="Not permitted."),
     *             @OA\Property(property="payload", type="object")
     *         )
     *     ),
     *     @OA\Response(
     *         response=405,
     *         description="No user found as logged in",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=405),
     *             @OA\Property(property="message", type="string", example="No user found as logged in."),
     *             @OA\Property(property="payload", type="object")
     *         )
     *     ),
     * )
     */
    public function get_vat_report_periods_for_client(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'client_id'    => 'required|numeric|min:1',
            ]
        );
        if ($validator->fails()) {
            $error = $validator->errors()->all()[0];
            return $this->send_validation_error_response($error);
        }
        $periods = VatReport::select("id", "name", "vat_return_start_period as start_date", "vat_return_end_period as end_date")->where("client_id", "=", $request->client_id)->get();
        // $periods = $this->generate_vat_periods($user->id);

        return $this->send_response(
            'VAT report periods list sent.',
            $periods,
            200
        );
    }

    /**
     * @OA\Get(
     *     path="/api/vatreport/vatreportperiodsforothers",
     *     tags={"VAT Report"},
     *     summary="Get VAT report periods for others",
     *     description="Get VAT report periods for others.",
     *     operationId="vat_report_periods_for_others",
     *     @OA\Parameter(
     *         name="user_id",
     *         in="query",
     *         description="User ID",
     *         required=true,
     *     ),
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\Response(
     *         response=200,
     *         description="VAT report periods list sent.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="VAT report periods list sent."),
     *             @OA\Property(property="payload", type="array",
     *                  @OA\Items(ref="#/components/schemas/VatReportPeriodsOutput")
     *             )
     *         ),
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Not permitted.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=401),
     *             @OA\Property(property="message", type="string", example="Not permitted."),
     *             @OA\Property(property="payload", type="object")
     *         )
     *     ),
     *     @OA\Response(
     *         response=405,
     *         description="No user found as logged in",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=405),
     *             @OA\Property(property="message", type="string", example="No user found as logged in."),
     *             @OA\Property(property="payload", type="object")
     *         )
     *     ),
     * )
     */
    public function get_vat_report_periods_for_others(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'user_id'    => 'required|numeric|min:1',
            ]
        );

        if ($validator->fails()) {
            $error = $validator->errors()->all()[0];
            return $this->send_validation_error_response($error);
        }

        $periods = $this->generate_vat_periods($request->user_id);

        return $this->send_response(
            'VAT report periods list sent.',
            $periods,
            200
        );
    }

    protected function generate_vat_periods($client_user_id)
    {
        $periods = [];
        $user = User::where('id', '=', $client_user_id)->first();
        $client = Client::where('user_id', '=', $client_user_id)->first();


        if (!$client)
            return $periods;

        $current_date = date_create_from_format('Y-m-d', date('Y-m-01'));

        if ($client->start_year > 0 && $client->start_month > 0) {
            $start_date = date_create_from_format('Y-m-d', $client->start_year . '-' . $client->start_month . '-' . 1);

            if ($current_date >= $start_date) {

                $interval =  (array) date_diff($current_date, $start_date);
                $total_months = $interval["y"] * 12 + $interval["m"];
                $max_period = (int)($total_months / $client->vat_period);

                $start_period_date = new DateTime($start_date->format('Y-m-01'));

                for ($index = 0; $index <= $max_period; $index++) {
                    $period = new \stdClass();
                    // Adding company name
                    $period->company_name = $user->name;
                    // Start period date
                    $period->start_date = $start_period_date->format('Y-m-01');
                    // End period date
                    $start_period_date->add(new DateInterval('P' . $client->vat_period . 'M'));
                    $start_period_date->sub(new DateInterval('P' . 1 . 'D'));
                    // Assign end period date
                    $period->end_date = $start_period_date->format('Y-m-d');
                    // Next start period date
                    $start_period_date->add(new DateInterval('P' . 1 . 'D'));

                    $periods[] = $period;
                }
            }
        }

        $periods_in_desc_order = array_reverse($periods);
        return $periods_in_desc_order;
    }

    /**
     * @OA\Post(
     *     path="/api/vatreport/vatreportforclient",
     *     tags={"VAT Report"},
     *     summary="Get VAT report for client",
     *     description="Get VAT report for client.",
     *     operationId="vat_report_for_client",
     *     @OA\RequestBody(
     *         description="VAT report input",
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/VatReportInput")
     *     ),
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\Response(
     *         response=200,
     *         description="VAT report sent.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="VAT report sent."),
     *             @OA\Property(property="payload", type="object", ref="#/components/schemas/VatReportOutput")
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
    public function get_vat_report_for_client(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'start_date'    => 'required',
                'end_date'    => 'required',
            ]
        );

        if ($validator->fails()) {
            $error = $validator->errors()->all()[0];
            return $this->send_validation_error_response($error);
        }

        $user = $this->guard('api')->user();

        if (!$user)
            return $this->send_error_response('No user found as logged in', 405);

        if (!$user->isClient()) {
            return $this->send_response('Not permitted.', null, 401);
        }

        $report = $this->generate_vat_report($user->id, $request->start_date, $request->end_date);

        return $this->send_response(
            'VAT report sent.',
            $report,
            200
        );
    }


    /**
     * @OA\Post(
     *     path="/api/vatreport/vatreportforothers",
     *     tags={"VAT Report"},
     *     summary="Get VAT report for others",
     *     description="Get VAT report for others.",
     *     operationId="vat_report_for_others",
     *     @OA\RequestBody(
     *         description="VAT report input",
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/VatReportOthersInput")
     *     ),
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\Response(
     *         response=200,
     *         description="VAT report sent.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="VAT report sent."),
     *             @OA\Property(property="payload", type="object", ref="#/components/schemas/VatReportOutput")
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
    public function get_vat_report_for_others(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'user_id'    => 'required|numeric|min:1',
                'start_date'    => 'required',
                'end_date'    => 'required',
            ]
        );

        if ($validator->fails()) {
            $error = $validator->errors()->all()[0];
            return $this->send_validation_error_response($error);
        }

        $report = $this->generate_vat_report($request->user_id, $request->start_date, $request->end_date);

        return $this->send_response(
            'VAT report sent.',
            $report,
            200
        );
    }

    protected function generate_vat_report($client_user_id, $start_date, $end_date)
    {
        $client = Client::where('user_id', '=', $client_user_id)
            ->selectRaw('users.name, clients.trn_number, clients.building_name,clients.p_o_box,clients.palce,clients.city,regions.name as region,countries.name as country, clients.id')
            ->join('users', 'users.id', '=', 'clients.user_id')
            ->join('regions', 'regions.id', '=', 'clients.region_id')
            ->join('countries', 'countries.id', '=', 'clients.country_id')
            ->first();

        if (!$client)
            return false;

        // Sale
        $sale = DB::table('sales')
            ->selectRaw('SUM(sales.amount) sale_amount, SUM(sales.vat_amount) sale_vat_amount')
            ->join('entries', 'entries.id', '=', 'sales.entry_id')
            ->join('clients', 'clients.user_id', '=', 'entries.client_user_id')
            ->groupBy('clients.user_id')
            ->where('entries.entry_status_id', '=',  EntryStatus::ENTRY_APPROVED)
            ->where('clients.user_id', '=',  $client_user_id)
            ->whereBetween('sales.invoice_date', [date($start_date), date($end_date)])
            ->where('entries.deleted_at', null)
            ->where('sales.deleted_at', null)
            ->first();

        // Purchase
        $purchase = DB::table('purchases')
            ->selectRaw('SUM(purchases.total_amount) purchase_amount, SUM(purchases.vat_amount) purchase_vat_amount')
            ->join('entries', 'purchases.entry_id', '=', 'entries.id')
            ->join('clients', 'clients.user_id', '=', 'entries.client_user_id')
            ->groupBy('clients.user_id')
            ->where('entries.entry_status_id', '=',  EntryStatus::ENTRY_APPROVED)
            ->where('clients.user_id', '=',  $client_user_id)
            ->whereBetween('purchases.invoice_date', [date($start_date), date($end_date)])
            ->where('entries.deleted_at', null)
            ->where('purchases.deleted_at', null)
            ->first();

        $expenditure = DB::table('expenditures')
            ->selectRaw('SUM(expenditures.amount) expenditure_amount, SUM(expenditures.vat_amount) expenditure_vat_amount')
            ->join('entries', 'expenditures.entry_id', '=', 'entries.id')
            ->join('clients', 'clients.user_id', '=', 'entries.client_user_id')
            ->groupBy('clients.user_id')
            ->where('entries.entry_status_id', '=',  EntryStatus::ENTRY_APPROVED)
            ->where('clients.user_id', '=',  $client_user_id)
            ->whereBetween('expenditures.invoice_date', [date($start_date), date($end_date)])
            ->where('entries.deleted_at', null)
            ->where('expenditures.deleted_at', null)
            ->first();


        $sale_amount = 0;
        $sale_vat_amount = 0;

        if ($sale) {
            $sale_amount = $sale->sale_amount;
            $sale_vat_amount = $sale->sale_vat_amount;
        }

        $purchase_amount = 0;
        $purchase_vat_amount = 0;

        if ($purchase) {
            $purchase_amount = $purchase->purchase_amount;
            $purchase_vat_amount = $purchase->purchase_vat_amount;
        }

        $expenditure_amount = 0;
        $expenditure_vat_amount = 0;

        if ($expenditure) {
            $expenditure_amount = $expenditure->expenditure_amount;
            $expenditure_vat_amount = $expenditure->expenditure_vat_amount;
        }

        $payload = [
            "trn" => $client->trn_number,
            "name" => $client->name,
            "id" => $client->id,
            "building_name" => $client->building_name,
            "p_o_box" => $client->p_o_box,
            "palce" => $client->palce,
            "city" => $client->city,
            "region" => $client->region,
            "country" => $client->country,
            "vat_return_start_period" => $start_date,
            "vat_return_end_period" => $end_date,
            "vat_return_due_date" => $end_date,
            "sale_amount" => $sale_amount,
            "sale_vat_amount" => $sale_vat_amount,
            "purchase_amount" => $purchase_amount,
            "purchase_vat_amount" => $purchase_vat_amount,
            "expenditure_amount" => $expenditure_amount,
            "expenditure_vat_amount" => $expenditure_vat_amount,
            "net_vat_sale_due" => $sale_vat_amount,
            "net_vat_purchase_due" => $purchase_vat_amount,
            "payable_tax_for_the_period" => $sale_vat_amount - $purchase_vat_amount,
            "sale" => $sale,
            "purchase" => $purchase,
        ];

        return $payload;
    }
    public function get_vat_report_validator(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            ['client_list' => 'required|array']
        );

        if ($validator->fails()) {
            $error = $validator->errors()->all()[0];
            return $this->send_validation_error_response($error);
        }

        // $report = VatReport::select('name as company_name', 'vat_return_start_period as start_date', 'vat_return_end_period as end_date', 'id', 'client_id')
        //     // ->where('client_id', '=', $request->user_id)
        //     ->whereIn('client_id', $request->client_list)
        //     ->where('status', '=', 'Pending')
        //     ->get();
        $report = VatReport::query("SELECT *  FROM prod_vatzapp.vat_reports WHERE status='Pending' AND client_id IN ?", $request->client_list)
            ->get(["name as company_name", "vat_return_start_period as start_date", "vat_return_end_period as end_date", "id", "client_id"]);
        return $this->send_response(
            'VAT report sent.',
            $report,
            200
        );
    }
    public function update_vat_report_validator(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id'    => 'required|numeric|min:1',
                'status' => 'required'
            ]
        );

        if ($validator->fails()) {
            $error = $validator->errors()->all()[0];
            return $this->send_validation_error_response($error);
        }

        $report = VatReport::find($request->id);
        $report->status = $request->status;
        $report->save();

        return $this->send_response(
            'VAT report sent.',
            null,
            200
        );
    }
    public function get_vat_report_validator_by_id(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id'    => 'required|numeric|min:1',
            ]
        );

        if ($validator->fails()) {
            $error = $validator->errors()->all()[0];
            return $this->send_validation_error_response($error);
        }

        $report = VatReport::select(
            "id",
            "name",
            "status",
            "trn",
            "name",
            "status",
            "client_id",
            "building_name",
            "status",
            "p_o_box",
            "palce",
            "city",
            "region",
            "country",
            "vat_return_start_period",
            "vat_return_end_period",
            "vat_return_due_date",
            "sale_amount",
            "sale_vat_amount",
            "purchase_amount",
            "purchase_vat_amount",
            "expenditure_amount",
            "expenditure_vat_amount",
            "net_vat_sale_due",
            "net_vat_purchase_due",
            "payable_tax_for_the_period"
        )
            ->where('id', '=', $request->id)
            ->first();

        return $this->send_response(
            'VAT report sent.',
            $report,
            200
        );
    }
    public function create_vat_report(Request $request)
    {
        $vat_report = VatReport::create([
            "name" => $request->name,
            "status" => $request->status,
            "trn" => $request->trn,
            "name" => $request->name,
            "status" => $request->status,
            "client_id" => $request->id,
            "building_name" => $request->building_name,
            "status" => $request->status,
            "p_o_box" => $request->p_o_box,
            "palce" => $request->palce,
            "city" => $request->city,
            "region" => $request->region,
            "country" => $request->country,
            "vat_return_start_period" => $request->vat_return_start_period,
            "vat_return_end_period" => $request->vat_return_end_period,
            "vat_return_due_date" => $request->vat_return_due_date,
            "sale_amount" => $request->sale_amount,
            "sale_vat_amount" => $request->sale_vat_amount,
            "purchase_amount" => $request->purchase_amount,
            "purchase_vat_amount" => $request->purchase_vat_amount,
            "expenditure_amount" => $request->expenditure_amount,
            "expenditure_vat_amount" => $request->expenditure_vat_amount,
            "net_vat_sale_due" => $request->net_vat_sale_due,
            "net_vat_purchase_due" => $request->net_vat_purchase_due,
            "payable_tax_for_the_period" => $request->payable_tax_for_the_period,
        ]);
        $vat_report->save();
        return $this->send_response('Report Saved Successfully.', null, 201);
    }
    public function update_vat_report(Request $request)
    {
        $vat_report = VatReport::find($request->id);
        $vat_report->status = $request->status;
        $vat_report->save();
        return $this->send_response('Report Saved Successfully.', null, 201);
    }

    protected function guard()
    {
        return Auth::guard('api');
    }
}
