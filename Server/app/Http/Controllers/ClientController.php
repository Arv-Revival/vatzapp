<?php

namespace App\Http\Controllers;


use Exception;
use App\Models\User;
use App\Models\Client;
use App\Models\Role;
use App\Models\EntryStatus;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => [
            'register',
            'list',
            'get_current_vat_period_date'
        ]]);
    }

    /**
     * @OA\Post(
     *     path="/api/client/register",
     *     tags={"Client"},
     *     summary="Register client",
     *     description="Register client.",
     *     operationId="client_register",
     *     @OA\RequestBody(
     *         description="Register client input",
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/RegisterClientInput")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Client registered succesfully !!. An email has been send to your registered email address. Please verify it.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=201),
     *             @OA\Property(property="message", type="string", example="Client registered succesfully !!. An email has been send to your registered email address. Please verify it."),
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
     *     )
     * )
     */
    public function register(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'email|max:255|unique:users',
                'w_country_code' => 'max:10',
                'whatsapp_no' => 'required|unique:users',
                'name'  => 'required|unique:users',
                'building_name'  => 'required|min:3',
                'country_id'  => 'required|numeric|min:1',
                'region_id'  => 'required|numeric|min:1',
                'trade_license_number'  => 'required',
                'trn_number'  => 'required',
            ]
        );

        if ($validator->fails()) {
            $error = $validator->errors()->all()[0];
            return $this->send_validation_error_response($error);
        }

        $user = User::create(
            [
                'email' => $request->email,
                'w_country_code' => $request->w_country_code,
                'whatsapp_no' => $request->whatsapp_no,
                'name'  => $request->name,
                'password' => bcrypt($request->password),
                'primary_role' => Role::ROLE_CLIENT,
            ]
        );

        if ($request->input("image_id") > 0)
            $user->profile_image_id = $request->input("image_id");

        $user->save();

        $client = Client::create(
            [
                'user_id' => $user->id,
                'building_name'  => $request->building_name,
                'p_o_box' => $request->input("p_o_box"),
                'palce' => $request->input("palce"),
                'city' => $request->input("city"),
                'country_id'  => $request->country_id,
                'region_id'  => $request->region_id,
                'trade_license_number'  => $request->trade_license_number,
                'trn_number'  => $request->trn_number,
                'fta_email' => $request->input("fta_email"),
                'fta_password' => $request->input("fta_password"),
                'country_code' => $request->input("country_code"),
                'mobile' => $request->input("mobile"),
                'l_country_code' => $request->input("l_country_code"),
                'landline' => $request->input("landline"),
                'contact_person' => $request->input("contact_person"),
                'cp_country_code' => $request->input("cp_country_code"),
                'cp_mobile' => $request->input("cp_mobile"),
            ]
        );

        if ($request->input("tran_certificate_id") > 0)
            $client->tran_certificate_id = $request->input("tran_certificate_id");

        if ($request->input("trade_license_image_id") > 0)
            $client->trade_license_image_id = $request->input("trade_license_image_id");

        $client->save();

        $msg = 'Client registered succesfully !!. An email has been send to your registered email address. Please verify it.';

        try {
            event(new Registered($user));
        } catch (Exception $ex) {
            $msg = 'Could not send verification email at this moment. Please try to login to resend the email.';
        }

        return $this->send_response(
            $msg,
            null,
            201
        );
    }

    /**
     * @OA\Post(
     *     path="/api/client/updatebyadmin",
     *     tags={"Client"},
     *     summary="Update client by admin",
     *     description="Update client by admin.",
     *     operationId="client_update_by_admin",
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\RequestBody(
     *         description="Update client input",
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/UpdateClientProfileByAdminInput")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Client updated successfully.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=201),
     *             @OA\Property(property="message", type="string", example="Client updated successfully."),
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
    public function update_by_admin(Request $request)
    {
        $user = $this->guard('api')->user();

        if (!$user)
            return $this->send_error_response('No user found as logged in', 405);

        if (!($user->isAdmin() || $user->isSuperAdmin())) {
            return $this->send_response('Not permitted.', null, 401);
        }

        $validator = Validator::make(
            $request->all(),
            [
                'user_id' => 'required|numeric|min:1',
                'email' => 'email|max:255|unique:users,email,' . $request->user_id,
                'w_country_code' => 'max:10',
                'whatsapp_no' => 'required|unique:users,whatsapp_no,' . $request->user_id,
                'name'  => 'max:64|unique:users,name,' . $request->user_id,
                'building_name'  => 'required|min:3',
                'country_id'  => 'required|numeric|min:1',
                'region_id'  => 'required|numeric|min:1',
                'trade_license_number'  => 'required',
                'trn_number'  => 'required',
            ]
        );

        if ($validator->fails()) {
            $error = $validator->errors()->all()[0];
            return $this->send_validation_error_response($error);
        }

        $user_data = User::find($request->user_id);
        $user_data->email = $request->email;
        $user_data->w_country_code = $request->w_country_code;
        $user_data->whatsapp_no = $request->whatsapp_no;
        $user_data->name  = $request->name;

        if ($request->input("image_id") > 0)
            $user_data->profile_image_id = $request->input("image_id");

        $user_data->save();

        $client = Client::where('user_id', '=', $request->user_id)->first();

        $client->building_name  = $request->building_name;
        $client->p_o_box = $request->input("p_o_box");
        $client->palce = $request->input("palce");
        $client->city = $request->input("city");
        $client->country_id  = $request->country_id;
        $client->region_id  = $request->region_id;
        $client->trade_license_number  = $request->trade_license_number;
        $client->trn_number  = $request->trn_number;
        $client->fta_email = $request->input("fta_email");
        $client->fta_password = $request->input("fta_password");
        $client->country_code = $request->input("country_code");
        $client->mobile = $request->input("mobile");
        $client->l_country_code = $request->input("l_country_code");
        $client->landline = $request->input("landline");
        $client->contact_person = $request->input("contact_person");
        $client->cp_country_code = $request->input("cp_country_code");
        $client->cp_mobile = $request->input("cp_mobile");

        if ($request->input("tran_certificate_id") > 0)
            $client->tran_certificate_id = $request->input("tran_certificate_id");

        if ($request->input("trade_license_image_id") > 0)
            $client->trade_license_image_id = $request->input("trade_license_image_id");

        $client->save();

        return $this->send_response(
            'Client updated successfully.',
            null,
            201
        );
    }

    /**
     * @OA\Post(
     *     path="/api/client/update",
     *     tags={"Client"},
     *     summary="Update client",
     *     description="Update client.",
     *     operationId="client_update",
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\RequestBody(
     *         description="Update client input",
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/UpdateClientInput")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Updated successfully.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=201),
     *             @OA\Property(property="message", type="string", example="Updated successfully."),
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
    public function update(Request $request)
    {
        $user = $this->guard('api')->user();

        if (!$user)
            return $this->send_error_response('No user found as logged in', 405);

        if (!$user->isClient()) {
            return $this->send_response('Not permitted.', null, 401);
        }

        $validator = Validator::make(
            $request->all(),
            [
                'building_name'  => 'required|min:3',
                'country_id'  => 'required|numeric|min:1',
                'region_id'  => 'required|numeric|min:1',
            ]
        );

        if ($validator->fails()) {
            $error = $validator->errors()->all()[0];
            return $this->send_validation_error_response($error);
        }

        if ($request->input("image_id") > 0)
            $user->profile_image_id = $request->input("image_id");

        $user->save();

        $client = Client::where('user_id', '=', $user->id)->first();

        $client->building_name  = $request->building_name;
        $client->country_id  = $request->country_id;
        $client->region_id  = $request->region_id;

        $client->p_o_box = $request->input("p_o_box");
        $client->palce = $request->input("palce");
        $client->city = $request->input("city");
        $client->fta_email = $request->input("fta_email");
        $client->fta_password = $request->input("fta_password");
        $client->country_code = $request->input("country_code");
        $client->mobile = $request->input("mobile");
        $client->l_country_code = $request->input("l_country_code");
        $client->landline = $request->input("landline");
        $client->contact_person = $request->input("contact_person");
        $client->cp_country_code = $request->input("cp_country_code");
        $client->cp_mobile = $request->input("cp_mobile");

        if ($request->input("tran_certificate_id") > 0)
            $client->tran_certificate_id = $request->input("tran_certificate_id");
        if ($request->input("trade_license_image_id") > 0)
            $client->trade_license_image_id = $request->input("trade_license_image_id");
        $client->save();
        return $this->send_response(
            'Updated successfully.',
            null,
            201
        );
    }

    /**
     * @OA\Get(
     *     path="/api/client/list",
     *     tags={"Client"},
     *     summary="Get all active client list.",
     *     operationId="client_list",
     *     @OA\Response(
     *         response=200,
     *         description="Successfully sent active client list data",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Successfully sent active client list."),
     *             @OA\Property(property="payload", type="array",
     *                  @OA\Items(ref="#/components/schemas/ClientListOutput")
     *             )
     *         )
     *     )
     * )
     */
    public function list()
    {
        try {

            $client_list = User::select(
                'users.id as user_id',
                'clients.id',
                'users.name',
                'users.email',
                'clients.trn_number',
                'users.is_active',
                'clients.verified_on',
                'clients.to',
                'clients.created_at as join_date',
                DB::raw('(CASE WHEN clients.verified_on is null THEN 0 ELSE 1 END) AS is_verified_user'),
                'clients.contact_person',
                'clients.cp_country_code',
                'clients.cp_mobile',
                'users.w_country_code',
                'users.whatsapp_no',
                'clients.payment_url',
            )
                ->join('clients', 'clients.user_id', '=',  'users.id')
                ->where('users.primary_role', '=',  Role::ROLE_CLIENT)
                ->get();

            return $this->send_response('List of client', $client_list, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Could not get user data', null);
        }
    }
    public function add_payment_link(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'payment_url' => 'required|string|min:1',
                'id' => 'required|numeric|min:1',
            ]
        );
        if ($validator->fails()) {
            $error = $validator->errors()->all()[0];
            return $this->send_validation_error_response($error);
        }

        $user = $this->guard('api')->user();

        if (!$user) {
            return $this->send_error_response('No user found as logged in', 405);
        }

        if (!($user->isAdmin() || $user->isSuperAdmin())) {
            return $this->send_response('Client can approved by Admin user only.', null, 401);
        }

        $client = Client::find($request->id);
        $client->payment_url = $request->payment_url;
        $client->save();
        return $this->send_response("Payment Link Added Successfully", $client, 200);
    }

    public function delete_payment_link(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id' => 'required|numeric|min:1',
            ]
        );
        if ($validator->fails()) {
            $error = $validator->errors()->all()[0];
            return $this->send_validation_error_response($error);
        }

        $user = $this->guard('api')->user();

        if (!$user) {
            return $this->send_error_response('No user found as logged in', 405);
        }

        if (!($user->isAdmin() || $user->isSuperAdmin())) {
            return $this->send_response('Client can approved by Admin user only.', null, 401);
        }
        $client = Client::find($request->id);
        $client->payment_url = null;
        $client->save();
        return $this->send_response("Payment Link Deleted Successfully", null, 200);
    }

    public function get_payment_link(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id' => 'required|numeric|min:1',
            ]
        );
        if ($validator->fails()) {
            $error = $validator->errors()->all()[0];
            return $this->send_validation_error_response($error);
        }
        $user = $this->guard('api')->user();

        if (!$user) {
            return $this->send_error_response('No user found as logged in', 405);
        }

        $client = Client::find($request->id);

        $payload = [
            'payment_url' => $client->payment_url
        ];

        return $this->send_response("Payment Link Deleted Successfully", $payload, 200);
    }

    /**
     * @OA\Get(
     *     path="/api/client/dashboardsummary",
     *     tags={"Client"},
     *     summary="Get dashboard summary of client",
     *     description="Get dashboard summary of client.",
     *     operationId="client_dashboard_summary",
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\Response(
     *         response=200,
     *         description="Dashboard data sent.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Dashboard data sent."),
     *             @OA\Property(property="payload", type="object", ref="#/components/schemas/CheckerDashboardTileOutput")
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
    public function dashboard_summary(Request $request)
    {
        $user = $this->guard('api')->user();

        if (!$user)
            return $this->send_error_response('No user found as logged in', 405);
        if (!$user->isClient()) {
            return $this->send_response('Not permitted.', null, 401);
        }
        $client = Client::where('user_id', '=', $user->id)->first();
        if (!$client)
            return $this->send_error_response('No client information found.', 406);
        $current_vat_period = $client->get_current_vat_period();
        $start_period_date = $current_vat_period->start_period_date;
        $end_period_date = $current_vat_period->end_period_date;
        // Sale
        $sales = DB::table('sales')
            ->selectRaw('SUM(sales.amount) amount, SUM(sales.vat_amount) vat_amount, COUNT(sales.id) total_inv')
            ->join('entries', 'entries.id', '=', 'sales.entry_id')
            ->where('entries.entry_status_id', '=',  EntryStatus::ENTRY_APPROVED)
            ->where('entries.client_user_id', '=',  $user->id)
            ->where('entries.deleted_at', null)
            ->where('sales.deleted_at', null)
            ->whereRaw('YEAR(sales.invoice_date) >= ' . $start_period_date->format("Y"))
            ->whereRaw('MONTH(sales.invoice_date) >= ' . $start_period_date->format("m"))
            ->whereRaw('YEAR(sales.invoice_date) <= ' . $end_period_date->format("Y"))
            ->whereRaw('MONTH(sales.invoice_date) <= ' . $end_period_date->format("m"))
            ->first();

        // Purchase
        $purchase = DB::table('purchases')
            ->selectRaw('SUM(purchases.total_amount) amount, SUM(purchases.vat_amount) vat_amount, COUNT(purchases.id) total_inv')
            ->join('entries', 'entries.id', '=', 'purchases.entry_id')
            ->where('entries.entry_status_id', '=',  EntryStatus::ENTRY_APPROVED)
            ->where('entries.client_user_id', '=',  $user->id)
            ->where('entries.deleted_at', null)
            ->where('purchases.deleted_at', null)
            ->whereRaw('YEAR(purchases.invoice_date) >= ' . $start_period_date->format("Y"))
            ->whereRaw('MONTH(purchases.invoice_date) >= ' . $start_period_date->format("m"))
            ->whereRaw('YEAR(purchases.invoice_date) <= ' . $end_period_date->format("Y"))
            ->whereRaw('MONTH(purchases.invoice_date) <= ' . $end_period_date->format("m"))
            ->first();

        // Expenditure
        $expenditure = DB::table('expenditures')
            ->selectRaw('SUM(expenditures.amount) amount')
            ->join('entries', 'entries.id', '=', 'expenditures.entry_id')
            ->where('entries.entry_status_id', '=',  EntryStatus::ENTRY_APPROVED)
            ->where('entries.client_user_id', '=',  $user->id)
            ->where('entries.deleted_at', null)
            ->where('expenditures.deleted_at', null)
            ->whereRaw('YEAR(expenditures.invoice_date) >= ' . $start_period_date->format("Y"))
            ->whereRaw('MONTH(expenditures.invoice_date) >= ' . $start_period_date->format("m"))
            ->whereRaw('YEAR(expenditures.invoice_date) <= ' . $end_period_date->format("Y"))
            ->whereRaw('MONTH(expenditures.invoice_date) <= ' . $end_period_date->format("m"))
            ->first();


        $payload = [
            'vat_payable' =>  $sales->vat_amount - $purchase->vat_amount,
            'number_of_invoices' => $sales->total_inv + $purchase->total_inv,
            'total_sales' => $sales->amount,
            'total_purchase' => $purchase->amount,
            'total_expenditure' => $expenditure->amount,
            'client_id'=>$client->id
        ];

        return $this->send_response(
            'Dashboard data sent.',
            $payload,
            200
        );
    }

    public function vat_expiry_date(Request $request)
    {
        $validator = Validator::make($request->all(), ['user_id'    => 'required|numeric',]);
        if ($validator->fails()) {
            $error = $validator->errors()->all()[0];
            return $this->send_validation_error_response($error);
        }
        $user = $this->guard('api')->user();
        if (!$user)
            return $this->send_error_response('No user found as logged in', 403);
        if (!($user->isAdmin() || $user->isSuperAdmin()))
            return $this->send_response('Client can approved by Admin user only.', null, 401);
        $client = DB::table('clients')
            ->select('users.name', 'clients.to')
            ->join('users', 'users.id', '=', 'clients.user_id')
            ->where('users', 'users.id', '=', $user->id)->get();
        return $this->send_response('Subscription Expiry', $client, 200);
    }



    /**
     * @OA\Get(
     *     path="/api/client/currentvatperiod",
     *     tags={"Client"},
     *     summary="Get current VAT period date",
     *     description="Get current VAT period date of given client.",
     *     operationId="get_current_vat_period_date",
     *     @OA\Parameter(
     *         name="user_id",
     *         in="query",
     *         description="Client user ID",
     *         required=true,
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Current VAT period date.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Current VAT period date."),
     *             @OA\Property(property="payload", type="object",
     *                  @OA\Property(property="current_vat_period", type="object",
     *                      @OA\Property(property="start_period_date", type="string", format="Date"),
     *                      @OA\Property(property="end_period_date", type="string", format="Date"),
     *                  ),
     *             )
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
     *         description="Not a client user.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=401),
     *             @OA\Property(property="message", type="string", example="Not a client user."),
     *             @OA\Property(property="payload", type="object")
     *         )
     *     ),
     * )
     */
    public function get_current_vat_period_date(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'user_id'  => 'required|numeric|min:1',
            ]
        );

        if ($validator->fails()) {
            $error = $validator->errors()->all()[0];
            return $this->send_validation_error_response($error);
        }

        $client = Client::where('user_id', '=', $request->user_id)->first();

        if (!$client)
            return $this->send_error_response('Not a client user.', 401);

        $current_vat_period = $client->get_current_vat_period();

        $payload = [
            "current_vat_period" => $current_vat_period
        ];

        return $this->send_response(
            'Current VAT period date.',
            $payload,
            200
        );
    }
    public function get_client(Request $request)
    {

        $user = $this->guard('api')->user();
        if (!$user)
            return $this->send_error_response('No user found as logged in', 405);

        if (!$user->isClient()) {
            return $this->send_response('Not permitted.', null, 401);
        }
        $client = Client::select("id", "to")->where('user_id', '=', $user->id)->first();
        return $this->send_response(
            'Client Obtained.',
            $client,
            200
        );
    }

    protected function guard()
    {
        return Auth::guard('api');
    }
}
