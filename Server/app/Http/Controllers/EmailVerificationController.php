<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Auth;

class EmailVerificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['verify', 'send_verification_email']]);
    }

    public function verify(Request $request)
    {
        try {
            $user = User::findOrFail($request->id);

            $data['msg'] = 'Email has been verified. Please login to the system';

            if ($user->isEmailVerified()) {
                $data['msg'] = 'The email is already verified.';
                return view('message', $data);
            }

            if ($user->markEmailAsVerified()) {
                event(new Verified($user));
            }

            return view('message', $data);
        } catch (Exception $ex) {
            $data['msg'] = 'Could not verify email at this moment. Please try later.';
            return view('message', $data);
        }
    }

    /**
     * @OA\Get(
     *     path="/email/sendemailverification",
     *     tags={"Email"},
     *     summary="Send verification email to user",
     *     operationId="send_verification_email",
     *     @OA\Parameter(
     *         name="email",
     *         in="query",
     *         description="Email of the user",
     *         required=true,
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Verification email has been sent.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Verification email has been sent."),
     *             @OA\Property(property="payload", type="object"),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Could not send email at this moment. Please try later.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=401),
     *             @OA\Property(property="message", type="string", example="Could not send email at this moment. Please try later."),
     *             @OA\Property(property="payload", type="object"),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=402,
     *         description="Could not find email.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=402),
     *             @OA\Property(property="message", type="string", example="Could not find email."),
     *             @OA\Property(property="payload", type="object"),
     *         ),
     *     ),
     * )
     */
    public function send_verification_email(Request $request)
    {
        try {

            $user = User::where('email', '=', $request->email)->first();

            if (!$user) {
                return $this->send_error_response('Could not find email.', 402);
            }

            $user->sendEmailVerificationNotification();

            return $this->send_response('Verification email has been sent', null, 200);
        } catch (Exception $ex) {
            return $this->send_error_response('Could not send email at this moment. Please try later.', 401);
        }
    }

    protected function guard()
    {
        return Auth::guard('api');
    }
}
