<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['forgot_password', 'reset_password']]);
    }

    /**
     * @OA\Get(
     *     path="/password/forgotpassword",
     *     tags={"Password"},
     *     summary="Forgot password",
     *     description="Send password reset email.",
     *     operationId="forgot_password",
     *     @OA\Parameter(
     *         name="email",
     *         in="query",
     *         description="User email ID",
     *         required=true,
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Reset password link has been sent.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Reset password link has been sent."),
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
     *         description="Could not send email at this moment. Please try later.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=401),
     *             @OA\Property(property="message", type="string", example="Could not send email at this moment. Please try later."),
     *             @OA\Property(property="payload", type="object")
     *         )
     *     ),
     *     @OA\Response(
     *         response=402,
     *         description="Please verify the email first.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=402),
     *             @OA\Property(property="message", type="string", example="Please verify the email first."),
     *             @OA\Property(property="payload", type="object")
     *         )
     *     ),
     * )
     */
    
    public function forgot_password(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), ['email'  => 'required|exists:users',]);
            if ($validator->fails()) {
                $error = $validator->errors()->all()[0];
                return $this->send_validation_error_response($error);
            }
            $user_email = $request->only('email');
            $user = User::where('email', '=', $user_email)->first();
            if (!$user->isEmailVerified()) {
                return $this->send_error_response('Please verify the email first.', 402);
            }
            $status = Password::sendResetLink($request->only('email'));
            if ($status === Password::RESET_LINK_SENT) {
                return $this->send_response('Reset password link has been sent to ' . $user_email["email"], null, 200);
            }
            return $this->send_error_response('Could not send email at this moment. Please try later.', 401);
        } catch (Exception $ex) {
            return $this->send_error_response('Could not send email at this moment (Exception). Please try later.', 401);
        }
    }

    public function reset_password(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'token' => 'required',
                'email' => 'required|email|exists:users',
                'password' => 'required|string|min:6|confirmed',
            ]);

            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $user = User::where('email', $request->email)->first();

            if (!$user->isEmailVerified()) {
                $data['msg'] = 'Please verify the email first.';
                return view('message', $data);
            }

            $status = Password::reset(
                $request->only('email', 'password', 'password_confirmation', 'token'),
                function ($user, $password) {
                    $user->forceFill([
                        'password' => bcrypt($password)
                    ])->setRememberToken(Str::random(60));

                    $user->save();

                    event(new PasswordReset($user));
                }
            );

            if ($status === Password::PASSWORD_RESET) {
                $data['msg'] = 'Password reset is done. Please login to the system with new password.';
                return view('message', $data);
            }

            return back()->withInput()->with('error', 'Could not reset password at this time. Please try later.');
        } catch (Exception $ex) {
            return back()->withInput()->with('error', 'Could not reset password at this time. Please try later.');
        }
    }

    protected function guard()
    {
        return Auth::guard('api');
    }
}
