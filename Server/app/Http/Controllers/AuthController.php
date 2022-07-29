<?php

namespace App\Http\Controllers;

use DateInterval;
use DateTime;
use App\Models\User;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => [
            'login', 'employee_login', 'refresh', 'logout,'
        ]]);
    }

    /**
     * @OA\Post(
     *     path="/api/auth/login",
     *     tags={"Auth"},
     *     summary="Log user into system",
     *     operationId="auth_login",
     *     @OA\RequestBody(
     *         description="Login user input",
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/LoginUserInput")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successfully logged in.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Successfully logged in."),
     *             @OA\Property(property="payload", type="object",
     *                   allOf={
     *                          @OA\Schema(ref="#/components/schemas/LoginClientUserOutput"),
     *                          @OA\Schema(
     *                                      @OA\Property(property="period", type="object",
     *                                              @OA\Property(property="start_period_date", type="string", format="date"),
     *                                              @OA\Property(property="end_period_date", type="string", format="date"),
     *                                      ),
     *                          ),
     *                       }
     *             ),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Login Failed.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=401),
     *             @OA\Property(property="message", type="string", example="Login Failed."),
     *             @OA\Property(property="payload", type="object")
     *         )
     *     ),
     *     @OA\Response(
     *         response=402,
     *         description="Login Failed : Client user only can log in.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=402),
     *             @OA\Property(property="message", type="string", example="Login Failed : Client user only can log in."),
     *             @OA\Property(property="payload", type="object")
     *         )
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Pease verify your registered email address.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=403),
     *             @OA\Property(property="message", type="string", example="Pease verify your registered email address."),
     *             @OA\Property(property="payload", type="object")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Login Failed : Deactivated user.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=404),
     *             @OA\Property(property="message", type="string", example="Login Failed : Deactivated user."),
     *             @OA\Property(property="payload", type="object")
     *         )
     *     ),
     *     @OA\Response(
     *         response=405,
     *         description="Login Failed : Client user is not approved by Admin.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=405),
     *             @OA\Property(property="message", type="string", example="Login Failed : Client user is not approved by Admin."),
     *             @OA\Property(property="payload", type="object")
     *         )
     *     )
     * )
     */
    public function login(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email'    => 'required|email|max:255',
                'password' => 'required|string|min:6',
            ]
        );

        if ($validator->fails()) {
            $error = $validator->errors()->all()[0];
            return $this->send_validation_error_response($error);
        }

        $token_validity = (24 * 60);
        $this->guard('api')->factory()->setTTL($token_validity);

        $input = [
            "email" => $request->email,
            "password" => $request->password
        ];

        if (!$token = $this->guard('api')->attempt($input)) {
            return $this->send_response('Login Failed', null, 401);
        }

        $user = $this->guard('api')->user();

        if (!$user->isActive()) {
            return $this->send_response('Login Failed : Deactivated user.', null, 404);
        } else if (!$user->isClient()) {
            return $this->send_response('Login Failed : Client user only can log in.', null, 402);
        } else if (!$user->isEmailVerified()) {
            return $this->send_response('Pease verify your registered email address.', null, 403);
        }

        $client = Client::where('user_id', '=',  $user->id)->first();
        if (!$client->isVerified()) {
            return $this->send_response('Login Failed : Client user is not approved by Admin.', null, 405);
        }

        $is_checker_assigned = $client->isCheckerAssigned();
        $period = $this->get_current_vat_period($client);
        return $this->respondWithTokenClient($token, $is_checker_assigned, $period);
    }

    protected function get_current_vat_period($client)
    {
        $current_date = date_create_from_format('Y-m-d', date('Y-m-01'));

        if ($client->start_year > 0 && $client->start_month > 0) {
            $start_date = date_create_from_format('Y-m-d', $client->start_year . '-' . $client->start_month . '-' . 1);

            if ($current_date >= $start_date) {

                $interval =  (array) date_diff($current_date, $start_date);
                $total_months = $interval["y"] * 12 + $interval["m"];
                $current_period_index = (int)($total_months / $client->vat_period);
                $vat_start_month = $current_period_index * $client->vat_period;

                $start_period_date = new DateTime($start_date->format('Y-m-01'));
                $start_period_date->add(new DateInterval('P' . $vat_start_month . 'M'));

                $end_period_date = new DateTime($start_period_date->format('Y-m-01'));
                $end_period_date->add(new DateInterval('P' . $client->vat_period . 'M'));
                $end_period_date->sub(new DateInterval('P' . 1 . 'D'));

                $period = [
                    'start_period_date' => $start_period_date,
                    'end_period_date' => $end_period_date
                ];

                return $period;
            }
        }

        return null;
    }

    protected function respondWithTokenClient($token,  $is_checker_assigned, $period)
    {
        $user = $this->guard('api')->user();

        $payload = [
            'token'          => $token,
            'token_type'     => 'bearer',
            'token_validity' => ($this->guard('api')->factory()->getTTL() * 60),
            'user_name' => $user->name,
            'user_role' => $user->primaryRole->name,
            'user_role_id' => $user->primary_role,
            'profile_image' => $user->profileImage,
            'is_checker_assigned' =>  $is_checker_assigned,
            'period' => $period
        ];

        return $this->send_response('Successfully logged in', $payload, 200);
    }

    /**
     * @OA\Post(
     *     path="/api/auth/employeelogin",
     *     tags={"Auth"},
     *     summary="Log Admin|Checker|Validator user into system",
     *     operationId="auth_employee_login",
     *     @OA\RequestBody(
     *         description="Login user input",
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/LoginUserInput")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successfully logged in.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Successfully logged in."),
     *             @OA\Property(property="payload", type="object", ref="#/components/schemas/LoginUserOutput")
     *         ),
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Login Failed.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=401),
     *             @OA\Property(property="message", type="string", example="Login Failed."),
     *             @OA\Property(property="payload", type="object")
     *         )
     *     ),
     *     @OA\Response(
     *         response=402,
     *         description="Login Failed : Admin|Checker|Validator user can only log in.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=402),
     *             @OA\Property(property="message", type="string", example="Login Failed : Admin|Checker|Validator user can only log in."),
     *             @OA\Property(property="payload", type="object")
     *         )
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Login Failed : Email is not verified yet.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=403),
     *             @OA\Property(property="message", type="string", example="Login Failed : Email is not verified yet."),
     *             @OA\Property(property="payload", type="object")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Login Failed : Deactivated user.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=404),
     *             @OA\Property(property="message", type="string", example="Login Failed : Deactivated user."),
     *             @OA\Property(property="payload", type="object")
     *         )
     *     )
     * )
     */
    public function employee_login(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email'    => 'required|email|max:255',
                'password' => 'required|string|min:6',
            ]
        );

        if ($validator->fails()) {
            $error = $validator->errors()->all()[0];
            return $this->send_validation_error_response($error);
        }

        $token_validity = (24 * 60);
        $this->guard('api')->factory()->setTTL($token_validity);

        $input = [
            "email" => $request->email,
            "password" => $request->password
        ];

        if (!$token = $this->guard('api')->attempt($input)) {
            return $this->send_response('Login Failed', null, 401);
        }

        $user = $this->guard('api')->user();

        if (!$user->isActive()) {
            return $this->send_response('Login Failed : Deactivated user.', null, 404);
        } else if ($user->isClient()) {
            return $this->send_response('Login Failed : Admin|Checker|Validator user can only log in.', null, 402);
        } else if (!$user->isEmailVerified()) {
            return $this->send_response('Login Failed : Email is not verified yet.', null, 403);
        }

        return $this->respondWithToken($token);
    }

    /**
     * @OA\Post(
     *     path="/api/auth/logout",
     *     tags={"Auth"},
     *     summary="Logout",
     *     description="Logout.",
     *     operationId="auth_logout",
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\Response(
     *         response=200,
     *         description="User logged out successfully.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="User logged out successfully."),
     *             @OA\Property(property="payload", type="object")
     *         ),
     *     )
     * )
     */
    public function logout()
    {
        $this->guard('api')->logout();

        return $this->send_response('User logged out successfully', null, 200);
    }

    /**
     * @OA\Get(
     *     path="/api/auth/profile",
     *     tags={"Auth"},
     *     summary="Get profile.",
     *     operationId="auth_profile_get",
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\Response(
     *         response=200,
     *         description="Successfully sent profile data",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Successfully sent profile data"),
     *             @OA\Property(property="payload", type="array",
     *                  @OA\Items(ref="#/components/schemas/AdminOutput")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Successfully sent profile data",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=201),
     *             @OA\Property(property="message", type="string", example="Successfully sent profile data"),
     *             @OA\Property(property="payload", type="array",
     *                  @OA\Items(ref="#/components/schemas/ValidatorOutput")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=202,
     *         description="Successfully sent profile data",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=202),
     *             @OA\Property(property="message", type="string", example="Successfully sent profile data"),
     *             @OA\Property(property="payload", type="array",
     *                  @OA\Items(ref="#/components/schemas/CheckerOutput")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=203,
     *         description="Successfully sent profile data",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=203),
     *             @OA\Property(property="message", type="string", example="Successfully sent profile data"),
     *             @OA\Property(property="payload", type="array",
     *                  @OA\Items(ref="#/components/schemas/ClientOutput")
     *             )
     *         )
     *     )
     * )
     */
    public function profile()
    {
        try {
            $user = $this->guard('api')->user();
            if (!$user)
                return $this->send_error_response('No user found as logged in', 401);
            if ($user->isAdmin())
                $user = User::with(['profileImage', 'adminUser', 'adminUser.country'])
                ->where('users.id', '=',  $user->id)->first();
            else if ($user->isChecker())
                $user = User::with(['profileImage', 'checkerUser.country', 'checkerUser.validator'])
                ->where('users.id', '=',  $user->id)->first();
            else if ($user->isValidator())
                $user = User::with(['profileImage', 'validatorUser.country'])
                ->where('users.id', '=',  $user->id)->first();
            else if ($user->isClient())
                $user = User::with(['profileImage', 'clientUser', 'clientUser.tradeLicenseImage', 'clientUser.tranCertificateImage', 'clientUser.country', 'clientUser.region', 'clientUser.checker'])
                ->where('users.id', '=',  $user->id)->first();
            if ($user->isSuperAdmin())
                $user = User::with(['profileImage', 'adminUser', 'adminUser.country'])->where('users.id', '=',  $user->id)->first();
            return $this->send_response('Logged in user', $user, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Could not get user data', null);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/auth/getuser",
     *     tags={"Auth"},
     *     summary="Get user details.",
     *     operationId="auth_user_get",
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\Parameter(
     *         name="user_id",
     *         in="query",
     *         description="User ID",
     *         required=true,
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successfully sent user data",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Successfully sent user data"),
     *             @OA\Property(property="payload", type="array",
     *                  @OA\Items(ref="#/components/schemas/AdminOutput")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Successfully sent profile data",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=201),
     *             @OA\Property(property="message", type="string", example="Successfully sent profile data"),
     *             @OA\Property(property="payload", type="array",
     *                  @OA\Items(ref="#/components/schemas/ValidatorOutput")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=202,
     *         description="Successfully sent profile data",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=202),
     *             @OA\Property(property="message", type="string", example="Successfully sent profile data"),
     *             @OA\Property(property="payload", type="array",
     *                  @OA\Items(ref="#/components/schemas/CheckerOutput")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=203,
     *         description="Successfully sent profile data",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=203),
     *             @OA\Property(property="message", type="string", example="Successfully sent profile data"),
     *             @OA\Property(property="payload", type="array",
     *                  @OA\Items(ref="#/components/schemas/ClientOutput")
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
     *         description="Allowed to admin user only",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=402),
     *             @OA\Property(property="message", type="string", example="Allowed to admin user only"),
     *             @OA\Property(property="payload", type="object")
     *             )
     *         )
     *     )
     * )
     */
    public function user_get(Request $request)
    {
        $user = $this->guard('api')->user();

        if (!$user)
            return $this->send_error_response('No user found as logged in', 401);

        if (!($user->isAdmin() || $user->isSuperAdmin()))
            return $this->send_error_response('Allowed to admin user only', 402);

        $validator = Validator::make(
            $request->all(),
            [
                'user_id'    => 'required|numeric',
            ]
        );

        if ($validator->fails()) {
            $error = $validator->errors()->all()[0];
            return $this->send_validation_error_response($error);
        }

        try {
            $current_user =  User::where('users.id', '=',  $request->user_id)->first();

            if ($current_user->isAdmin())
                $user = User::with(['profileImage', 'adminUser', 'adminUser.country'])->where('users.id', '=',  $current_user->id)->first();
            else if ($current_user->isChecker())
                $user = User::with(['profileImage', 'checkerUser', 'checkerUser.country', 'checkerUser.validator'])->where('users.id', '=',  $current_user->id)->first();
            else if ($current_user->isValidator())
                $user = User::with(['profileImage', 'validatorUser.country'])->where('users.id', '=',  $current_user->id)->first();
            else if ($current_user->isClient())
                $user = User::with(['profileImage', 'clientUser', 'clientUser.tradeLicenseImage', 'clientUser.tranCertificateImage', 'clientUser.country', 'clientUser.region'])->where('users.id', '=',  $current_user->id)->first();

            return $this->send_response('User details', $user, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Could not get user data', null);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/auth/changepassword",
     *     tags={"Auth"},
     *     summary="Change password.",
     *     operationId="auth_change_password",
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\RequestBody(
     *         description="Change password input",
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/ChangePasswordIntput")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="User password changed successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="User password changed successfully."),
     *             @OA\Property(property="payload", type="object")
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
     *         description="Old password does not match",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=401),
     *             @OA\Property(property="message", type="string", example="Old password does not match."),
     *             @OA\Property(property="payload", type="object")
     *         )
     *     )
     * )
     */
    public function change_password(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'old_password'  => 'required|min:6',
                'new_password'  => 'required|min:6',
            ]
        );

        if ($validator->fails()) {
            $error = $validator->errors()->all()[0];
            return $this->send_validation_error_response($error);
        }

        $user = $this->guard('api')->user();

        if (!$user)
            return $this->send_error_response('No user found as logged in', 401);

        if (!Hash::check($request->old_password, $user->password))
            return $this->send_error_response('Old password does not match', 402);

        $user->password = bcrypt($request->new_password);
        $user->save();

        return $this->send_response('User password changed successfully', null, 200);
    }

    /**
     * @OA\Get(
     *     path="/api/auth/refresh",
     *     tags={"Auth"},
     *     summary="Get refresh token.",
     *     operationId="auth_refresh_token",
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\Response(
     *         response=200,
     *         description="Successfully sent refresh token",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="New token"),
     *             @OA\Property(property="token", type="string", example="New token value")
     *         )
     *     )
     * )
     */
    public function refresh()
    {
        try {
            return $this->send_response('New token', $this->guard('api')->refresh(), 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Could not change password');
        }
    }

    protected function respondWithToken($token)
    {
        $user = $this->guard('api')->user();

        $payload = [
            'token'          => $token,
            'token_type'     => 'bearer',
            'token_validity' => ($this->guard('api')->factory()->getTTL() * 60),
            'user_name' => $user->name,
            'user_role' => $user->primaryRole->name,
            'user_role_id' => $user->primary_role,
            'profile_image' => $user->profileImage,
        ];

        return $this->send_response('Successfully logged in', $payload, 200);
    }

    protected function guard()
    {
        return Auth::guard('api');
    }
}
