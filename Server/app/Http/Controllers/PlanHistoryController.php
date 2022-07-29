<?php

namespace App\Http\Controllers;

use App\Models\PlanHistory;
use App\Models\User;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PlanHistoryController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['get', 'create']]);
        $this->user = $this->guard()->user();
    }

    /**
     * @OA\Post(
     *     path="/api/plan/create",
     *     tags={"Plan"},
     *     summary="Create plan",
     *     description="Create plan.",
     *     operationId="create",
     *     @OA\RequestBody(
     *         description="Create plan input",
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/CreatePlanInput")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Plan created successfully.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=201),
     *             @OA\Property(property="message", type="string", example="Plan created successfully."),
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
     *         description="Plan can add client user only.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=401),
     *             @OA\Property(property="message", type="string", example="Plan can add client user only."),
     *             @OA\Property(property="payload", type="object")
     *         ),
     *     )
     * )
     */
    public function create(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'user_id' => 'required|numeric|min:1',
                'plan_name'  => 'required',
                'from' => 'required',
                'to' => 'required',
                'payment_type'  => 'required',
                'payment_date'  => 'required',
                'payment_amount'  => 'required|numeric|min:0',
                'payment_currency'  => 'required',
            ]
        );

        if ($validator->fails()) {
            $error = $validator->errors()->all()[0];
            return $this->send_validation_error_response($error);
        }

        $user = User::where('users.id', '=',  $request->user_id)->first();

        if ($user != null && !$user->isClient())
            return $this->send_response('Plan can add client user only.', $user, 401);

        $client = Client::where('clients.user_id', '=',  $request->user_id)->first();

        $client->plan_name  = $request->plan_name;
        $client->ref  =  $request->input("ref");
        $client->from = $request->from;
        $client->to = $request->to;
        $client->payment_type = $request->payment_type;
        $client->payment_date = $request->payment_date;
        $client->payment_amount = $request->payment_amount;
        $client->payment_currency = $request->payment_currency;

        $client->save();

        PlanHistory::create(
            [
                'user_id' => $request->user_id,
                'plan_name'  => $request->plan_name,
                'ref'  => $request->ref,
                'from' => $request->from,
                'to' => $request->to,
                'payment_type' => $request->payment_type,
                'payment_date' => $request->payment_date,
                'payment_amount' => $request->payment_amount,
                'payment_currency' => $request->payment_currency,
            ]
        );

        return $this->send_response(
            'Plan created successfully.',
            null,
            201
        );
    }

    /**
     * @OA\Get(
     *     path="/api/plan/get",
     *     tags={"Plan"},
     *     summary="Get plan history for a specific user.",
     *     operationId="plan_get",
     *     @OA\Parameter(
     *         name="user_id",
     *         in="query",
     *         description="User ID",
     *         required=true,
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successfully sent plan history data",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Successfully sent plan history data."),
     *             @OA\Property(property="payload", type="array", 
     *                  @OA\Items(ref="#/components/schemas/GetPlanOutput")         
     *             )
     *         )
     *     )
     * )
     */
    public function get(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'user_id' => 'required|numeric|min:1',
            ]
        );

        if ($validator->fails()) {
            $error = $validator->errors()->all()[0];
            return $this->send_validation_error_response($error);
        }

        try {
            $plans = PlanHistory::where('plan_histories.user_id', '=',  $request->user_id)->get();

            return $this->send_response('Plan history data', $plans, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Could not get history data', null);
        }
    }

    protected function guard()
    {
        return Auth::guard();
    }
}
