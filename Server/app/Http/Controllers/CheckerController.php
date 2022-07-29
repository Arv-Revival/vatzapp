<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Checker;
use App\Models\Role;
use App\Models\EntryStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Password;

class CheckerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => [
            'register',
            'short_list', 'list',
        ]]);
    }

    /**
     * @OA\Post(
     *     path="/api/checker/register",
     *     tags={"Checker"},
     *     summary="Register checker",
     *     description="Register checker.",
     *     operationId="checker_register",
     *     @OA\RequestBody(
     *         description="Register checker input",
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/RegisterCheckerInput")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Checker created successfully.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=201),
     *             @OA\Property(property="message", type="string", example="Checker created successfully."),
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
                'country_id'  => 'required|numeric|min:1',
                'validator_user_id' => 'required|numeric',
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
                'password' => bcrypt('Checker#2'),
                'primary_role' => Role::ROLE_CHECKER,
            ]
        );

        if ($request->input("image_id") > 0)
            $user->profile_image_id = $request->input("image_id");

        // For the time being by default the email is verified.
        $user->markEmailAsVerified();
        $user->save();

        Checker::create(
            [
                'user_id' => $user->id,
                'building_name'  => $request->input("building_name"),
                'p_o_box' => $request->input("p_o_box"),
                'palce' => $request->input("palce"),
                'city' => $request->input("city"),
                'country_id'  => $request->country_id,
                'region_id'  => $request->input("region_id"),
                'validator_user_id'  => $request->validator_user_id,
                'country_code' => $request->input("country_code"),
                'mobile'  => $request->input("mobile"),
                'join_date' => $request->input("join_date"),
                'salary' => $request->input("salary"),
            ]
        );
        $status = Password::sendResetLink(
            $request->only('email')
        );
        return $this->send_response(
            'Checker created successfully.',
            null,
            201
        );
    }

    /**
     * @OA\Post(
     *     path="/api/checker/updatebyadmin",
     *     tags={"Checker"},
     *     summary="Update checker by admin",
     *     description="Update checker by admin.",
     *     operationId="checker_update_by_admin",
     *     security={
     *         {"bearer": {}}
     *     }, 
     *     @OA\RequestBody(
     *         description="Update checker by admin input",
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/UpdateCheckerByAdminInput")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Checker updated successfully.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=201),
     *             @OA\Property(property="message", type="string", example="Checker updated successfully."),
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
                'country_id'  => 'required|numeric|min:1',
                'validator_user_id' => 'required|numeric|min:1',
            ]
        );

        if ($validator->fails()) {
            $error = $validator->errors()->all()[0];
            return $this->send_validation_error_response($error);
        }

        $user = User::find($request->user_id);
        $user->email = $request->email;
        $user->w_country_code = $request->w_country_code;
        $user->whatsapp_no = $request->whatsapp_no;
        $user->name  = $request->name;

        if ($request->input("image_id") > 0)
            $user->profile_image_id = $request->input("image_id");

        $user->save();

        $checker = Checker::where('user_id', '=', $request->user_id)->first();

        $checker->building_name  = $request->input("building_name");
        $checker->p_o_box = $request->input("p_o_box");
        $checker->palce = $request->input("palce");
        $checker->city = $request->input("city");
        $checker->country_id  = $request->country_id;
        $checker->region_id  = $request->input("region_id");
        $checker->validator_user_id  = $request->validator_user_id;
        $checker->country_code = $request->input("country_code");
        $checker->mobile  = $request->input("mobile");
        $checker->join_date = $request->input("join_date");
        $checker->salary = $request->input("salary");

        $checker->save();

        return $this->send_response(
            'Checker updated successfully.',
            null,
            201
        );
    }

    /**
     * @OA\Post(
     *     path="/api/checker/update",
     *     tags={"Checker"},
     *     summary="Update checker",
     *     description="Update checker.",
     *     operationId="checker_update",
     *     security={
     *         {"bearer": {}}
     *     }, 
     *     @OA\RequestBody(
     *         description="Update checker input",
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/UpdateCheckerInput")
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

        if (!$user->isChecker()) {
            return $this->send_response('Not permitted.', null, 401);
        }

        if ($request->input("image_id") > 0) {
            $user_obj = User::find($user->id);
            $user_obj->profile_image_id = $request->input("image_id");
            $user_obj->save();
        }

        $checker = Checker::where('user_id', '=', $user->id)->first();

        $checker->building_name  = $request->input("building_name");
        $checker->p_o_box = $request->input("p_o_box");
        $checker->palce = $request->input("palce");
        $checker->city = $request->input("city");
        $checker->mobile  = $request->input("mobile");

        $checker->save();

        return $this->send_response(
            'Updated successfully.',
            null,
            201
        );
    }

    /**
     * @OA\Get(
     *     path="/api/checker/shortlist",
     *     tags={"Checker"},
     *     summary="Get all active checkers short list.",
     *     operationId="checker_short_list",
     *     @OA\Response(
     *         response=200,
     *         description="Successfully sent active checkers short list data",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Successfully sent active checkers short list."),
     *             @OA\Property(property="payload", type="array", 
     *                  @OA\Items(ref="#/components/schemas/CheckerShortListOutput")         
     *             )
     *         )
     *     )
     * )
     */
    public function short_list()
    {
        try {
            $checkers = User::select('users.id', 'users.name')->where('users.primary_role', '=',  Role::ROLE_CHECKER)->where('users.is_active', '=', true)->get();

            return $this->send_response('Short list of checker', $checkers, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Could not get user data', null);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/checker/list",
     *     tags={"Checker"},
     *     summary="Get all active checker list.",
     *     operationId="checker_list",
     *     @OA\Response(
     *         response=200,
     *         description="Successfully sent active checker list data",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Successfully sent active checker list data."),
     *             @OA\Property(property="payload", type="array", 
     *                  @OA\Items(ref="#/components/schemas/CheckerListOutput")         
     *             )
     *         )
     *     )
     * )
     */
    public function list()
    {
        try {

            $clients_table = DB::table('clients')
                ->select('clients.checker_user_id', DB::raw('COUNT(clients.id) AS clients_count'))
                ->groupBy('clients.checker_user_id');

            $checker_list = User::select(
                'users.id',
                'users.name',
                'users.is_active',
                'users.w_country_code',
                'users.whatsapp_no',
                'vali.name as validator_name',
                'clients_table.clients_count',
                'checkers.join_date',
                'users.email',
            )
                ->join('checkers', 'checkers.user_id', '=',  'users.id')
                ->leftJoin('users as vali', 'vali.id', '=',  'checkers.validator_user_id')
                ->leftJoinSub($clients_table, 'clients_table', function ($join) {
                    $join->on('checkers.user_id', '=', 'clients_table.checker_user_id');
                })
                ->where('users.primary_role', '=',  Role::ROLE_CHECKER)
                ->get();

            return $this->send_response('List of checker', $checker_list, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Could not get user data', null);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/checker/dashboardsummary",
     *     tags={"Checker"},
     *     summary="Get dashboard summary of checker",
     *     description="Get dashboard summary of checker.",
     *     operationId="checker_dashboard_summary",
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

        if (!$user->isChecker()) {
            return $this->send_response('Not permitted.', null, 401);
        }

        // Pending
        $pending = DB::table('entries')
            ->selectRaw('COUNT(entries.id) total')
            ->join('clients', 'clients.user_id', '=', 'entries.client_user_id')
            ->where('clients.checker_user_id', '=',  $user->id)
            ->where('entries.deleted_at', null)
            ->where(function ($query) {
                $query->orWhere('entries.entry_status_id', '=',  EntryStatus::ENTRY_PENDING)
                    ->orWhere('entries.entry_status_id', '=',  EntryStatus::ENTRY_CHECKER_IN_PROGRESS)
                    ->orWhere('entries.entry_status_id', '=',  EntryStatus::ENTRY_VALIDATOR_REJECTED);
            })
            ->first();

        // Checked
        $checked = DB::table('entries')
            ->selectRaw('COUNT(entries.id) total')
            ->join('clients', 'clients.user_id', '=', 'entries.client_user_id')
            ->where('clients.checker_user_id', '=',  $user->id)
            ->where('entries.deleted_at', null)
            ->where('entries.entry_status_id', '=',  EntryStatus::ENTRY_VALIDATOR_IN_PROGRESS)
            ->first();

        // Approved
        $approved = DB::table('entries')
            ->selectRaw('COUNT(entries.id) total')
            ->join('clients', 'clients.user_id', '=', 'entries.client_user_id')
            ->where('clients.checker_user_id', '=',  $user->id)
            ->where('entries.deleted_at', null)
            ->where('entries.entry_status_id', '=',  EntryStatus::ENTRY_APPROVED)
            ->first();

        $payload = [
            'pending_entries' =>  $pending->total,
            'checked_enteries' => $checked->total,
            'approved_enteries' => $approved->total,
            'total_enteries' => $pending->total + $checked->total + $approved->total,
        ];

        return $this->send_response(
            'Dashboard data sent.',
            $payload,
            200
        );
    }

    /**
     * @OA\Get(
     *     path="/api/checker/dashboardrecenttile",
     *     tags={"Checker"},
     *     summary="Get dashboard recent tile of checker",
     *     description="Get dashboard recent tile of checker.",
     *     operationId="checker_dashboard_recent_tile",
     *     security={
     *         {"bearer": {}}
     *     }, 
     *     @OA\Response(
     *         response=200,
     *         description="Dashboard recent tile data sent.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Dashboard recent tile data sent."),
     *             @OA\Property(property="payload", type="object", ref="#/components/schemas/CheckerDashboardRecentTileOutput")
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
    public function dashboard_recent_tile(Request $request)
    {
        $user = $this->guard('api')->user();

        if (!$user)
            return $this->send_error_response('No user found as logged in', 405);

        if (!$user->isChecker()) {
            return $this->send_response('Not permitted.', null, 401);
        }

        // Pending entries more than 7 days
        $pending = DB::table('entries')
            ->selectRaw('COUNT(entries.id) total')
            ->join('clients', 'clients.user_id', '=', 'entries.client_user_id')
            ->where('clients.checker_user_id', '=',  $user->id)
            ->where('entries.deleted_at', null)
            ->where(function ($query) {
                $query->orWhere('entries.entry_status_id', '=',  EntryStatus::ENTRY_PENDING)
                    ->orWhere('entries.entry_status_id', '=',  EntryStatus::ENTRY_CHECKER_IN_PROGRESS)
                    ->orWhere('entries.entry_status_id', '=',  EntryStatus::ENTRY_VALIDATOR_REJECTED);
            })
            ->whereRaw('entries.created_at < NOW() - INTERVAL 1 WEEK')
            ->first();

        // Recheck and rejected entries more than 3 days
        $recheck = DB::table('entries')
            ->selectRaw('COUNT(entries.id) total')
            ->join('clients', 'clients.user_id', '=', 'entries.client_user_id')
            ->where('clients.checker_user_id', '=',  $user->id)
            ->where('entries.deleted_at', null)
            ->where(function ($query) {
                $query->orWhere('entries.entry_status_id', '=',  EntryStatus::ENTRY_CHECKER_IN_PROGRESS)
                    ->orWhere('entries.entry_status_id', '=',  EntryStatus::ENTRY_VALIDATOR_REJECTED);
            })
            ->whereRaw('entries.created_at < NOW() - INTERVAL 3 DAY')
            ->first();



        // Client with no entries more than 3 days
        $recent_not_clients = DB::table('entries')
            ->selectRaw('COUNT(DISTINCT clients.user_id) total')
            ->join('clients', 'clients.user_id', '=', 'entries.client_user_id')
            ->where('clients.checker_user_id', '=',  $user->id)
            ->where('entries.deleted_at', null)
            ->whereNotIn('entries.client_user_id', function ($query) use ($user) {
                $query->from('entries')
                    ->selectRaw('DISTINCT clients.user_id as client_user_id')
                    ->join('clients', 'clients.user_id', '=', 'entries.client_user_id')
                    ->where('clients.checker_user_id', '=',  $user->id)
                    ->where('entries.deleted_at', null)
                    ->whereRaw('entries.created_at > NOW() - INTERVAL 3 DAY');
            })
            ->first();


        // $entries_query = DB::table('entries')
        // ->select(
        //     'users.name',
        //     'clients.trn_number',
        //     'users.id',
        //     'regions.name as region'
        // )
        // // ->selectRaw('DISTINCT(users.id)')
        // ->join('users', 'users.id', '=', 'entries.client_user_id')
        // ->join('clients', 'clients.user_id', '=', 'entries.client_user_id')
        // ->join('regions', 'clients.region_id', '=', 'regions.id')
        // ->where('clients.checker_user_id', '=',  $user->id)
        // ->where('entries.deleted_at', null)
        // ->whereNotIn('entries.client_user_id', function ($query) use ($user) {
        //     $query->from('entries')
        //     ->selectRaw('DISTINCT clients.user_id as client_user_id')
        //     ->join('clients', 'clients.user_id', '=', 'entries.client_user_id')
        //     ->where('clients.checker_user_id', '=',  $user->id)
        //     ->where('entries.deleted_at', null)
        //     ->whereRaw('entries.created_at > NOW() - INTERVAL 3 DAY');
        // });

        $payload = [
            'pending_entries' =>  $pending->total,
            'recheck_enteries' => $recheck->total,
            'client_with_no_entry' => $recent_not_clients->total,
            // 'no_entry_clients' => $entries_query->get()
            // 'no_entry_pending' => $pending_entries,
        ];

        return $this->send_response(
            'Dashboard recent data sent.',
            $payload,
            200
        );
    }

    /**
     * @OA\Get(
     *     path="/api/checker/clientshortlistbychecker",
     *     tags={"Checker"},
     *     summary="Get client list by checker.",
     *     operationId="checker_client_short_list_by_checker",
     *     security={
     *         {"bearer": {}}
     *     }, 
     *     @OA\Response(
     *         response=200,
     *         description="Client list by checker",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Client list by checker."),
     *             @OA\Property(property="payload", type="array", 
     *                  @OA\Items(ref="#/components/schemas/CheckerShortListOutput")         
     *             )
     *         )
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
    public function client_list_by_checker()
    {
        try {

            $user = $this->guard('api')->user();

            if (!$user)
                return $this->send_error_response('No user found as logged in', 405);

            if (!$user->isChecker()) {
                return $this->send_response('Not permitted.', null, 401);
            }

            $clients = User::select('users.id', 'users.name', 'clients.region_id', 'clients.trn_number', 'clients.vat_period', 'clients.from', 'clients.to', 'regions.name as emirate')
                ->join('clients', 'clients.user_id', '=', 'users.id')
                ->join('regions', 'regions.id', '=', 'clients.region_id')
                ->where('clients.checker_user_id', '=',  $user->id)
                ->where('users.is_active', '=', true)
                ->get();

            $clients = collect($clients)->map(function ($clients) {

                $clients['vat_time']              = $this->getVatPerord($clients['vat_period']);


                return $clients;
            });

            return $this->send_response('Client list by checker', $clients, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Could not get user data', null);
        }
    }
    public function client_short_list_by_checker()
    {
        try {

            $user = $this->guard('api')->user();

            if (!$user)
                return $this->send_error_response('No user found as logged in', 405);

            if (!$user->isChecker()) {
                return $this->send_response('Not permitted.', null, 401);
            }

            $clients = User::select('users.id', 'users.name')
                ->join('clients', 'clients.user_id', '=', 'users.id')
                ->where('clients.checker_user_id', '=',  $user->id)
                ->where('users.is_active', '=', true)
                ->get();

            return $this->send_response('Client list by checker', $clients, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Could not get user data', null);
        }
    }

    protected function guard()
    {
        return Auth::guard('api');
    }
    protected function getVatPerord($period)
    {
        switch ($period) {
            case 1:
                return 'Monthly';
                break;
            case 3:
                return 'Quarterly';
                break;
            case 6:
                return 'Half Yearly';
                break;
            case 12:
                return 'Yearly';
                break;

            default:
                return '';
        }
        return Auth::guard('api');
    }
}
