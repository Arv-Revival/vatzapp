<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Client;
use App\Models\Admin;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => [
            'register', 'list',
        ]]);
    }

    /**
     * @OA\Post(
     *     path="/api/admin/register",
     *     tags={"Admin"},
     *     summary="Register admin",
     *     description="Register admin.",
     *     operationId="admin_register",
     *     @OA\RequestBody(
     *         description="Register admin input",
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/RegisterAdminInput")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Admin created successfully.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=201),
     *             @OA\Property(property="message", type="string", example="Admin created successfully."),
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
                'password' => bcrypt('Admin#3'),
                'primary_role' => Role::ROLE_ADMIN,
            ]
        );

        if ($request->input("image_id") > 0)
            $user->profile_image_id = $request->input("image_id");

        // For the time being by default the email is verified.
        $user->markEmailAsVerified();
        $user->save();

        Admin::create(
            array_merge(
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
            )
        );

        return $this->send_response(
            'Admin created successfully.',
            null,
            201
        );
    }

    /**
     * @OA\Get(
     *     path="/api/admin/list",
     *     tags={"Admin"},
     *     summary="Get all active amdin list.",
     *     operationId="admin_list",
     *     @OA\Response(
     *         response=200,
     *         description="Successfully sent active admin list data",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Successfully sent active admin list data."),
     *             @OA\Property(property="payload", type="array",
     *                  @OA\Items(ref="#/components/schemas/AdminListOutput")
     *             )
     *         )
     *     )
     * )
     */
    public function list()
    {
        try {
            $admin_list = User::select(
                'users.id',
                'users.name',
                'users.email',
                'users.is_active',
                'users.w_country_code',
                'users.whatsapp_no',
                'admins.join_date',
            )
                ->join('admins', 'admins.user_id', '=',  'users.id')
                ->where('users.primary_role', '=',  Role::ROLE_ADMIN)
                ->get();

            return $this->send_response('List of admins', $admin_list, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Could not get user data', null);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/admin/approveuser",
     *     tags={"Admin"},
     *     summary="Approve client user",
     *     operationId="admin_approve_user",
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\RequestBody(
     *         description="Approve client user input",
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/ApproveUserIntput")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Client has been approved.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Client has been approved."),
     *             @OA\Property(property="payload", type="object")
     *         ),
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Client can approved by Admin user only.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=401),
     *             @OA\Property(property="message", type="string", example="Client can approved by Admin user only."),
     *             @OA\Property(property="payload", type="object")
     *         )
     *     ),
     *     @OA\Response(
     *         response=402,
     *         description="Client must active user.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=402),
     *             @OA\Property(property="message", type="string", example="Client must active user."),
     *             @OA\Property(property="payload", type="object")
     *         )
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="This is not client user.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=403),
     *             @OA\Property(property="message", type="string", example="This is not client user."),
     *             @OA\Property(property="payload", type="object")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Client is verified user.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=404),
     *             @OA\Property(property="message", type="string", example="Client is verified user."),
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
    public function approve_user(Request $request)
    {
        $validator = Validator::make($request->all(), ['user_id'    => 'required|numeric',]);

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

        $client = Client::where('clients.user_id', '=', $request->user_id)->first();

        $user_client = User::where('users.id', '=', $request->user_id)->first();

        if (!$user_client->isActive()) {
            return $this->send_response('Client must be active user.', null, 402);
        }
        if ($user_client && !$user_client->isClient()) {
            return $this->send_response('This is not client user.', null, 403);
        }
        $client->trade_license_expiry = $request->trade_license_expiry;
        $client->save();
        if ($client && $client->isVerified()) {
            return $this->send_response('Client is verified user.', null, 404);
        }
        $client->setVerified();
        $user_client->email_verified_at = date("Y-m-d");
        // echo $request->trade_license_expiry;
        $client->save();
        $user_client->save();

        return $this->send_response("Client has been approved.", null, 200);
    }
    public function update_trade_license_expiry(Request $request)
    {
        $validator = Validator::make($request->all(), ['user_id'    => 'required|numeric',]);

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

        $client = Client::where('clients.user_id', '=', $request->user_id)->first();

        $user_client = User::where('users.id', '=', $request->user_id)->first();

        if (!$user_client->isActive()) {
            return $this->send_response('Client must be active user.', null, 402);
        }
        if ($user_client && !$user_client->isClient()) {
            return $this->send_response('This is not client user.', null, 403);
        }
        $client->trade_license_expiry = $request->trade_license_expiry;
        $client->save();
        $user_client->save();

        return $this->send_response("Client has been approved. on $request->trade_license_expiry", null, 200);
    }

    /**
     * @OA\Post(
     *     path="/api/admin/activateuser",
     *     tags={"Admin"},
     *     summary="Activate user",
     *     operationId="admin_activate_user",
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\RequestBody(
     *         description="Activate user input",
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/ActivateUserIntput")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="User has been activated.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="User has been activated."),
     *             @OA\Property(property="payload", type="object")
     *         ),
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Permitted to admin user only.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=401),
     *             @OA\Property(property="message", type="string", example="Permitted to admin user only."),
     *             @OA\Property(property="payload", type="object")
     *         )
     *     ),
     *     @OA\Response(
     *         response=402,
     *         description="User must be deactive.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=402),
     *             @OA\Property(property="message", type="string", example="User must be deactive."),
     *             @OA\Property(property="payload", type="object")
     *         )
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="No user found as logged in",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=403),
     *             @OA\Property(property="message", type="string", example="No user found as logged in."),
     *             @OA\Property(property="payload", type="object")
     *         )
     *     ),
     * )
     */
    public function activate_user(Request $request)
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
        $user = User::where('users.id', '=', $request->user_id)->first();
        if ($user->isActive()) {
            return $this->send_response('User must be inactive user.', null, 402);
        }
        $user->setActiveUser();
        $user->save();
        return $this->send_response('User has been activated.', null, 200);
    }
    public function portal_expiry(Request $request)
    {
        // $validator = Validator::make($request->all(), ['user_id'    => 'required|numeric',]);
        // if ($validator->fails()) {
        //     $error = $validator->errors()->all()[0];
        //     return $this->send_validation_error_response($error);
        // }
        $user = $this->guard('api')->user();
        if (!$user)
            return $this->send_error_response('No user found as logged in', 403);
        if (!($user->isAdmin() || $user->isSuperAdmin()))
            return $this->send_response('Client can approved by Admin user only.', null, 401);
        $client = DB::table('clients')
            ->select('users.name', 'clients.to', 'clients.start_year', 'clients.start_month', 'clients.vat_period')
            ->join('users', 'users.id', '=', 'clients.user_id')
            // ->where('clients.to', '!=', null)
            ->where('clients.verified_on', '!=', null)->get();
        return $this->send_response('Subscription Expiry', $client, 200);
    }

    public function trade_license_expiry_date(Request $request)
    {
        // $validator = Validator::make($request->all(), ['user_id'    => 'required|numeric',]);

        // if ($validator->fails()) {
        //     $error = $validator->errors()->all()[0];
        //     return $this->send_validation_error_response($error);
        // }

        $user = $this->guard('api')->user();
        if (!$user)
            return $this->send_error_response('No user found as logged in', 403);
        if (!($user->isAdmin() || $user->isSuperAdmin()))
            return $this->send_response('Client can approved by Admin user only.', null, 401);
        $client = DB::table('clients')
            ->select('users.name', 'clients.trade_license_expiry')
            ->join('users', 'users.id', '=', 'clients.user_id')
            ->where('clients.trade_license_expiry', '!=', null)
            ->whereRaw('clients.trade_license_expiry <= NOW()')->get();
        return $this->send_response('Subscription Expiry', $client, 200);
    }

    /**
     * @OA\Post(
     *     path="/api/admin/deactivateuser",
     *     tags={"Admin"},
     *     summary="Deactivate user",
     *     operationId="amdin_deactivate_user",
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\RequestBody(
     *         description="Deactivate user input",
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/DeactivateUserIntput")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="User has been deactivated.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="User has been deactivated."),
     *             @OA\Property(property="payload", type="object")
     *         ),
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Permitted to admin user only.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=401),
     *             @OA\Property(property="message", type="string", example="Permitted to admin user only."),
     *             @OA\Property(property="payload", type="object")
     *         )
     *     ),
     *     @OA\Response(
     *         response=402,
     *         description="User must be active.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=402),
     *             @OA\Property(property="message", type="string", example="User must be active."),
     *             @OA\Property(property="payload", type="object")
     *         )
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="No user found as logged in",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=403),
     *             @OA\Property(property="message", type="string", example="No user found as logged in."),
     *             @OA\Property(property="payload", type="object")
     *         )
     *     ),
     * )
     */
    public function deactivate_user(Request $request)
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

        $user = $this->guard('api')->user();

        if (!$user)
            return $this->send_error_response('No user found as logged in', 403);

        if (!($user->isAdmin() || $user->isSuperAdmin())) {
            return $this->send_response('Client can deactivate by Admin user only.', null, 401);
        }

        $user = User::where('users.id', '=', $request->user_id)->first();

        if (!$user->isActive()) {
            return $this->send_response('User must be active user.', null, 402);
        }

        $user->setDeactiveUser();
        $user->save();

        return $this->send_response('User has been deactivated.', null, 200);
    }

    /**
     * @OA\Post(
     *     path="/api/admin/updateclient",
     *     tags={"Admin"},
     *     summary="Update client by admin",
     *     description="Update client by admin.",
     *     operationId="admin_update_client",
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\RequestBody(
     *         description="Update client by admin input",
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/UpdateClientByAdminInput")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Client user updated successfully.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=201),
     *             @OA\Property(property="message", type="string", example="Client user updated successfully."),
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
     *         description="Please select client user only.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=401),
     *             @OA\Property(property="message", type="string", example="Please select client user only."),
     *             @OA\Property(property="payload", type="object")
     *         ),
     *     ),
     *     @OA\Response(
     *         response=402,
     *         description="No user found as logged in",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=402),
     *             @OA\Property(property="message", type="string", example="No user found as logged in."),
     *             @OA\Property(property="payload", type="object")
     *         )
     *     ),
     * )
     */
    public function update_client(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'user_id' => 'required|numeric|min:1',
                'checker_user_id' => 'required|numeric|min:1',
                'vat_period'  => 'required',
                'vat_percentage' => 'required',
                'start_month'  => 'required',
                'start_year'  => 'required',
            ]
        );

        if ($validator->fails()) {
            $error = $validator->errors()->all()[0];
            return $this->send_validation_error_response($error);
        }

        $user = $this->guard('api')->user();

        if (!$user)
            return $this->send_error_response('No user found as logged in', 402);

        if (!($user->isAdmin() || $user->isSuperAdmin())) {
            return $this->send_response('Client can approved by Admin user only.', null, 401);
        }

        $client = Client::where('clients.user_id', '=',  $request->user_id)->first();

        $client->checker_user_id  = $request->checker_user_id;
        $client->vat_period  = $request->vat_period;
        $client->vat_percentage = $request->vat_percentage;
        $client->start_month  = $request->start_month;
        $client->start_year  = $request->start_year;

        $client->save();

        return $this->send_response(
            'Client user updated successfully.',
            null,
            201
        );
    }

    /**
     * @OA\Post(
     *     path="/api/admin/update",
     *     tags={"Admin"},
     *     summary="Update admin",
     *     description="Update admin.",
     *     operationId="admin_update",
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\RequestBody(
     *         description="Update admin input",
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/UpdateAdminInput")
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

        if ($request->input("image_id") > 0) {
            $user_obj = User::find($user->id);
            $user_obj->profile_image_id = $request->input("image_id");
            $user_obj->save();
        }

        $admin = Admin::where('user_id', '=', $user->id)->first();

        $admin->building_name  = $request->input("building_name");
        $admin->p_o_box = $request->input("p_o_box");
        $admin->palce = $request->input("palce");
        $admin->city = $request->input("city");

        if ($request->input("country_id") > 0)
            $admin->country_id  = $request->input("country_id");
        if ($request->input("region_id") > 0)
            $admin->region_id  = $request->input("region_id");

        $admin->country_code = $request->input("country_code");
        $admin->mobile  = $request->input("mobile");

        $admin->save();

        return $this->send_response(
            'Updated successfully.',
            null,
            201
        );
    }

    /**
     * @OA\Post(
     *     path="/api/admin/updatebyadmin",
     *     tags={"Admin"},
     *     summary="Update admin by admin",
     *     description="Update admin by admin.",
     *     operationId="admin_update_by_admin",
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\RequestBody(
     *         description="Update admin by admin input",
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/UpdateAdminByAdminInput")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Admin updated successfully.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=201),
     *             @OA\Property(property="message", type="string", example="Admin updated successfully."),
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

        if (!$user->isSuperAdmin()) {
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

        $admin_obj = Admin::where('user_id', '=', $request->user_id)->first();

        $admin_obj->building_name  = $request->input("building_name");
        $admin_obj->p_o_box = $request->input("p_o_box");
        $admin_obj->palce = $request->input("palce");
        $admin_obj->city = $request->input("city");
        $admin_obj->country_id  = $request->country_id;
        $admin_obj->country_code = $request->input("country_code");
        $admin_obj->mobile  = $request->input("mobile");
        $admin_obj->join_date = $request->input("join_date");
        $admin_obj->salary = $request->input("salary");

        $admin_obj->save();

        return $this->send_response(
            'Admin updated successfully.',
            null,
            201
        );
    }

    /**
     * @OA\Get(
     *     path="/api/admin/dashboardsummary",
     *     tags={"Admin"},
     *     summary="Get dashboard summary of admin",
     *     description="Get dashboard summary of admin.",
     *     operationId="admin_dashboard_summary",
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\Response(
     *         response=200,
     *         description="Dashboard data sent.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Dashboard data sent."),
     *             @OA\Property(property="payload", type="object",
     *                  @OA\Property(property="checker_count", type="float"),
     *                  @OA\Property(property="validator_count", type="float"),
     *                  @OA\Property(property="total_employees", type="float"),
     *                  @OA\Property(property="subscriber_count", type="float"),
     *                  @OA\Property(property="unsbscriber_count", type="float"),
     *                  @OA\Property(property="total_customers", type="float"),
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

        if (!($user->isAdmin() || $user->isSuperAdmin())) {
            return $this->send_response('Not permitted.', null, 401);
        }

        // Checkers
        $checkers = DB::table('checkers')
            ->selectRaw('COUNT(checkers.id) total_count')
            ->where('checkers.deleted_at', null)
            ->first();

        // Validators
        $validators = DB::table('validator_users')
            ->selectRaw('COUNT(validator_users.id) total_count')
            ->where('validator_users.deleted_at', null)
            ->first();

        // Subscribers
        $subscribers = DB::table('clients')
            ->selectRaw('COUNT(clients.id) total_count')
            ->where('clients.deleted_at', null)
            ->whereRaw('"' . date('Y-m-d') . '" between `clients`.`from` and `clients`.`to`')
            ->first();

        // Unsubscribers
        $unsubscribers = DB::table('clients')
            ->selectRaw('COUNT(clients.id) total_count')
            ->where('clients.deleted_at', null)
            ->whereRaw('"' . date('Y-m-d') . '" not between `clients`.`from` and `clients`.`to`')
            ->first();

        $payload = [
            'checker_count' =>  $checkers->total_count,
            'validator_count' => $validators->total_count,
            'total_employees' => $checkers->total_count + $validators->total_count,
            'subscriber_count' => $subscribers->total_count,
            'unsbscriber_count' => $unsubscribers->total_count,
            'total_customers' => $subscribers->total_count + $unsubscribers->total_count,
        ];

        return $this->send_response(
            'Dashboard data sent.',
            $payload,
            200
        );
    }

    /**
     * @OA\Get(
     *     path="/api/admin/clientshortlistbyadmin",
     *     tags={"Admin"},
     *     summary="Get client list by admin.",
     *     operationId="admin_client_short_list_by_admin",
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\Response(
     *         response=200,
     *         description="Client list by admin",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Client list by admin."),
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
    public function client_short_list_by_admin()
    {
        try {

            $user = $this->guard('api')->user();

            if (!$user)
                return $this->send_error_response('No user found as logged in', 405);

            if (!($user->isAdmin() || $user->isSuperAdmin())) {
                return $this->send_response('Not permitted.', null, 401);
            }

            $clients = User::select('users.id', 'users.name', 'clients.id as client_id')
                ->join('clients', 'clients.user_id', '=', 'users.id')
                ->where('users.is_active', '=', true)
                ->get();

            return $this->send_response('Client list by admin', $clients, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Could not get user data', null);
        }
    }

    protected function guard()
    {
        return Auth::guard('api');
    }
}
