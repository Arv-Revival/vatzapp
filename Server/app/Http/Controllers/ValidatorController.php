<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\ValidatorUser;
use App\Models\Role;
use App\Models\EntryStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Password;

class ValidatorController extends Controller
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
     *     path="/api/validator/register",
     *     tags={"Validator"},
     *     summary="Register validator",
     *     description="Register validator.",
     *     operationId="validator_register",
     *     @OA\RequestBody(
     *         description="Register validator input",
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/RegisterValidatorInput")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Validator created successfully.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=201),
     *             @OA\Property(property="message", type="string", example="Validator created successfully."),
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
                'password' => bcrypt("Validator#1"),
                'primary_role' => Role::ROLE_VALIDATOR,
            ]
        );

        if ($request->input("image_id") > 0)
            $user->profile_image_id = $request->input("image_id");

        // For the time being by default the email is verified.
        $user->markEmailAsVerified();
        $user->save();

        ValidatorUser::create(
            [
                'user_id' => $user->id,
                'building_name'  => $request->input("building_name"),
                'p_o_box' => $request->input("p_o_box"),
                'palce' => $request->input("palce"),
                'city' => $request->input("city"),
                'country_id'  => $request->country_id,
                'region_id'  => $request->input("region_id"),
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
            'Validator created successfully.',
            null,
            201
        );
    }

    /**
     * @OA\Post(
     *     path="/api/validator/updatebyadmin",
     *     tags={"Validator"},
     *     summary="Update validator by admin",
     *     description="Update validator by admin.",
     *     operationId="validator_update_by_admin",
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\RequestBody(
     *         description="Update validator by admin input",
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/UpdateValidatorByAdminInput")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Validator updated successfully.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=201),
     *             @OA\Property(property="message", type="string", example="Validator updated successfully."),
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
                'name'  => 'required|unique:users,name,' . $request->user_id,
                'country_id'  => 'required|numeric|min:1',
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

        $validator_obj = ValidatorUser::where('user_id', '=', $request->user_id)->first();

        $validator_obj->building_name  = $request->input("building_name");
        $validator_obj->p_o_box = $request->input("p_o_box");
        $validator_obj->palce = $request->input("palce");
        $validator_obj->city = $request->input("city");
        $validator_obj->country_id  = $request->country_id;
        $validator_obj->country_code = $request->input("country_code");
        $validator_obj->mobile  = $request->input("mobile");
        $validator_obj->join_date = $request->input("join_date");
        $validator_obj->salary = $request->input("salary");

        $validator_obj->save();

        return $this->send_response(
            'Validator updated successfully.',
            null,
            201
        );
    }

    /**
     * @OA\Post(
     *     path="/api/validator/update",
     *     tags={"Validator"},
     *     summary="Update validator",
     *     description="Update validator.",
     *     operationId="validator_update",
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\RequestBody(
     *         description="Update validator input",
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/UpdateValidatorInput")
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
     *         response=402,
     *         description="Could not find the user data.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=402),
     *             @OA\Property(property="message", type="string", example="Could not find the user data."),
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

        if (!$user->isValidator()) {
            return $this->send_response('Not permitted.', null, 401);
        }

        if ($request->input("image_id") > 0) {
            $user_obj = User::find($user->id);
            $user_obj->profile_image_id = $request->input("image_id");
            $user_obj->save();
        }

        $validator_obj = ValidatorUser::where('user_id', '=', $user->id)->first();

        if (!$validator_obj)
            return $this->send_response('Could not find the user data.', null, 402);

        $validator_obj->building_name  = $request->input("building_name");
        $validator_obj->p_o_box = $request->input("p_o_box");
        $validator_obj->palce = $request->input("palce");
        $validator_obj->city = $request->input("city");
        $validator_obj->mobile  = $request->input("mobile");

        $validator_obj->save();

        return $this->send_response(
            'Updated successfully.',
            null,
            201
        );
    }

    /**
     * @OA\Get(
     *     path="/api/validator/shortlist",
     *     tags={"Validator"},
     *     summary="Get all active validator short list.",
     *     operationId="validator_short_list",
     *     @OA\Response(
     *         response=200,
     *         description="Successfully sent active checkers short list data",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Successfully sent active validator short list."),
     *             @OA\Property(property="payload", type="array",
     *                  @OA\Items(ref="#/components/schemas/ValidatorShortListOutput")
     *             )
     *         )
     *     )
     * )
     */
    public function short_list()
    {
        try {

            $validators = User::select('users.id', 'users.name')->where('users.primary_role', '=',  Role::ROLE_VALIDATOR)->where('users.is_active', '=', true)->get();

            return $this->send_response('Short list of validator', $validators, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Could not get user data', null);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/validator/list",
     *     tags={"Validator"},
     *     summary="Get all active validator list.",
     *     operationId="validator_list",
     *     @OA\Response(
     *         response=200,
     *         description="Successfully sent active validator list data",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Successfully sent active validator list data."),
     *             @OA\Property(property="payload", type="array",
     *                  @OA\Items(ref="#/components/schemas/ValidatorListOutput")
     *             )
     *         )
     *     )
     * )
     */
    public function list()
    {
        $checkers_table = DB::table('checkers')
            ->select('checkers.validator_user_id', DB::raw('COUNT(checkers.id) AS checkers_count'))
            ->groupBy('checkers.validator_user_id');

        try {
            $validator_list = User::select(
                'users.id',
                'users.name',
                'users.is_active',
                'users.w_country_code',
                'users.whatsapp_no',
                'checkers_table.checkers_count',
                'validator_users.join_date',
                'users.email',
            )
                ->join('validator_users', 'validator_users.user_id', '=',  'users.id')
                ->leftJoinSub($checkers_table, 'checkers_table', function ($join) {
                    $join->on('validator_users.user_id', '=', 'checkers_table.validator_user_id');
                })
                ->where('users.primary_role', '=',  Role::ROLE_VALIDATOR)
                ->get();

            return $this->send_response('List of validator', $validator_list, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Could not get user data', null);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/validator/dashboardsummary",
     *     tags={"Validator"},
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
     *             @OA\Property(property="payload", type="object", ref="#/components/schemas/ValidatorDashboardTileOutput")
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

        if (!$user->isValidator()) {
            return $this->send_response('Not permitted.', null, 401);
        }

        // Pending
        $pending = DB::table('entries')
            ->selectRaw('COUNT(entries.id) total')
            ->join('clients', 'clients.user_id', '=', 'entries.client_user_id')
            ->join('checkers', 'checkers.user_id', '=', 'clients.checker_user_id')
            ->where('checkers.validator_user_id', '=',  $user->id)
            ->where('entries.deleted_at', null)
            ->where('entries.entry_status_id', '=',  EntryStatus::ENTRY_VALIDATOR_IN_PROGRESS)
            ->first();

        // Checked
        $checked = DB::table('entries')
            ->selectRaw('COUNT(entries.id) total')
            ->join('clients', 'clients.user_id', '=', 'entries.client_user_id')
            ->join('checkers', 'checkers.user_id', '=', 'clients.checker_user_id')
            ->where('checkers.validator_user_id', '=',  $user->id)
            ->where('entries.deleted_at', null)
            ->where(function ($query) {
                $query->orWhere('entries.entry_status_id', '=',  EntryStatus::ENTRY_CHECKER_IN_PROGRESS)
                    ->orWhere('entries.entry_status_id', '=',  EntryStatus::ENTRY_VALIDATOR_REJECTED);
            })
            ->first();

        // Approved
        $approved = DB::table('entries')
            ->selectRaw('COUNT(entries.id) total')
            ->join('clients', 'clients.user_id', '=', 'entries.client_user_id')
            ->join('checkers', 'checkers.user_id', '=', 'clients.checker_user_id')
            ->where('checkers.validator_user_id', '=',  $user->id)
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
     *     path="/api/validator/dashboardrecenttile",
     *     tags={"Validator"},
     *     summary="Get dashboard recent tile of validator",
     *     description="Get dashboard recent tile of validator.",
     *     operationId="validator_dashboard_recent_tile",
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\Response(
     *         response=200,
     *         description="Dashboard recent tile data sent.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Dashboard recent tile data sent."),
     *             @OA\Property(property="payload", type="object", ref="#/components/schemas/ValidatorDashboardRecentTileOutput")
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

        if (!$user->isValidator()) {
            return $this->send_response('Not permitted.', null, 401);
        }

        // Pending entries more than 7 days
        $pending = DB::table('entries')
            ->selectRaw('COUNT(entries.id) total')
            ->join('clients', 'clients.user_id', '=', 'entries.client_user_id')
            ->join('checkers', 'checkers.user_id', '=', 'clients.checker_user_id')
            ->where('checkers.validator_user_id', '=',  $user->id)
            ->where('entries.deleted_at', null)
            ->where('entries.entry_status_id', '=',  EntryStatus::ENTRY_VALIDATOR_IN_PROGRESS)
            ->whereRaw('entries.created_at < NOW() - INTERVAL 1 WEEK')
            ->first();

        // Recheck and rejected entries more than 3 days
        $recheck = DB::table('entries')
            ->selectRaw('COUNT(entries.id) total')
            ->join('clients', 'clients.user_id', '=', 'entries.client_user_id')
            ->join('checkers', 'checkers.user_id', '=', 'clients.checker_user_id')
            ->where('checkers.validator_user_id', '=',  $user->id)
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
            ->join('checkers', 'checkers.user_id', '=', 'clients.checker_user_id')
            ->where('checkers.validator_user_id', '=',  $user->id)
            ->where('entries.deleted_at', null)
            ->whereNotIn('entries.client_user_id', function ($query) use ($user) {
                $query->from('entries')
                    ->selectRaw('DISTINCT clients.user_id as client_user_id')
                    ->join('clients', 'clients.user_id', '=', 'entries.client_user_id')
                    ->join('checkers', 'checkers.user_id', '=', 'clients.checker_user_id')
                    ->where('checkers.validator_user_id', '=',  $user->id)
                    ->where('entries.deleted_at', null)
                    ->whereRaw('entries.created_at > NOW() - INTERVAL 3 DAY');
            })
            ->first();

        $payload = [
            'pending_entries' =>  $pending->total,
            'recheck_enteries' => $recheck->total,
            'client_with_no_entry' => $recent_not_clients->total,
        ];

        return $this->send_response(
            'Dashboard recent data sent.',
            $payload,
            200
        );
    }

    /**
     * @OA\Get(
     *     path="/api/validator/clientshortlistbyvalidator",
     *     tags={"Validator"},
     *     summary="Get client list by validator.",
     *     operationId="validator_client_short_list_by_validator",
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\Response(
     *         response=200,
     *         description="Client list by validator",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Client list by validator."),
     *             @OA\Property(property="payload", type="array",
     *                  @OA\Items(ref="#/components/schemas/ValidatorShortListOutput")
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
    public function client_short_list_by_validator()
    {
        try {

            $user = $this->guard('api')->user();

            if (!$user)
                return $this->send_error_response('No user found as logged in', 405);

            if (!$user->isValidator()) {
                return $this->send_response('Not permitted.', null, 401);
            }

            $clients = User::select('users.id', 'users.name','clients.id as client_id')
                ->join('clients', 'clients.user_id', '=', 'users.id')
                ->join('checkers', 'checkers.user_id', '=', 'clients.checker_user_id')
                ->where('checkers.validator_user_id', '=',  $user->id)
                ->where('users.is_active', '=', true)
                ->get();

            return $this->send_response('Client list by validator', $clients, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Could not get user data', null);
        }
    }

    public function checker_list_by_validator()
    {
        try {

            $user = $this->guard('api')->user();

            if (!$user)
                return $this->send_error_response('No user found as logged in', 405);

            if (!$user->isValidator()) {
                return $this->send_response('Not permitted.', null, 401);
            }
            $checkers = User::select('users.id', 'users.name', 'users.w_country_code', 'users.whatsapp_no', 'checkers.country_id', 'countries.name as country_name')
                ->join('checkers', 'checkers.user_id', '=', 'users.id')
                ->join('countries', 'countries.id', '=', 'checkers.country_id')
                ->where('checkers.validator_user_id', '=',  $user->id)
                ->where('users.is_active', '=', true)
                ->get();

            return $this->send_response('Checkers list by validator', $checkers, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Could not get user data', null);
        }
    }
    protected function guard()
    {
        return Auth::guard('api');
    }
}
