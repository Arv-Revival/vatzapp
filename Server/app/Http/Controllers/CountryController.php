<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CountryController extends Controller
{
    protected $user;
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['get']]);
        $this->user = $this->guard()->user();
    }
    /**
     * @OA\Get(
     *     path="/api/country/get",
     *     tags={"Country"},
     *     summary="Get all countries.",
     *     operationId="country_get",
     *     @OA\Response(
     *         response=200,
     *         description="Successfully sent countries data",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Successfully sent countries data"),
     *             @OA\Property(property="payload", type="array", 
     *                  @OA\Items(ref="#/components/schemas/CountryOutput")         
     *             )
     *         )
     *     )
     * )
     */

    public function get()
    {
        try {
            $countries = Country::with('regions')->get();
            return $this->send_response('Successfully sent countries data', $countries, 200);
        } catch (ModelNotFoundException $e) {
            // echo "\n\nHello\n\n";
            return $this->send_error_response('Could not get countries data', null);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/country/create",
     *     tags={"Country"},
     *     summary="Create country.",
     *     operationId="country_create",
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\RequestBody(
     *         description="Create country input",
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/CountryIntput")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Country created successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=201),
     *             @OA\Property(property="message", type="string", example="Country created successfully"),
     *             @OA\Property(property="payload", type="object")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Validation failed.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=400),
     *             @OA\Property(property="message", type="string", example="Validation failed"),
     *             @OA\Property(property="payload", type="object")
     *         )
     *     )
     * )
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'max:64|unique:countries',
                'phone_code' => 'required',
                'currency_code' => 'required',
            ]
        );
        if ($validator->fails()) {
            $error = $validator->errors()->all()[0];
            return $this->send_validation_error_response($error);
        }
        $country = Country::create(
            $validator->validated()
        );

        return $this->send_response('Country created successfully', null, 201);
    }

    
    /**
     * @OA\Put(
     *     path="/api/country/update",
     *     tags={"Country"},
     *     summary="Update country.",
     *     operationId="country_update",
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\RequestBody(
     *         description="Update country input",
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/CountryUpdateIntput")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Country updated successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=201),
     *             @OA\Property(property="message", type="string", example="Country updated successfully"),
     *             @OA\Property(property="payload", type="object")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Validation failed.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=400),
     *             @OA\Property(property="message", type="string", example="Validation failed"),
     *             @OA\Property(property="payload", type="object")
     *         )
     *     )
     * )
     */
    public function update(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id' => 'required|numeric',
                'name' => 'max:64|unique:countries,name,' . $request->id,
                'phone_code' => 'required',
                'currency_code' => 'required',
            ]
        );

        if ($validator->fails()) {
            $error = $validator->errors()->all()[0];
            return $this->send_validation_error_response($error);
        }

        $country = Country::find($request->id);
        $country->name = $request->name;
        $country->phone_code = $request->phone_code;
        $country->currency_code= $request->currency_code;

        $country->save();

        return $this->send_response('Country updated successfully', null, 200);
    }

    /**
     * @OA\Delete(
     *     path="/api/country/delete",
     *     tags={"Country"},
     *     summary="Delete country.",
     *     operationId="country_delete",
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\RequestBody(
     *         description="Delete country input",
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/CountryDeleteInput")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Country deleted successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Country deleted successfully"),
     *             @OA\Property(property="payload", type="object")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Validation failed.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=400),
     *             @OA\Property(property="message", type="string", example="Validation failed"),
     *             @OA\Property(property="payload", type="object")
     *         )
     *     )
     * )
     */
    public function destroy(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id' => 'required|numeric',
            ]
        );

        if ($validator->fails()) {
            $error = $validator->errors()->all()[0];
            return $this->send_validation_error_response($error);
        }

        $country = Country::find($request->id);

        $country->delete();

        return $this->send_response('Country deleted successfully', null, 200);
    }

    protected function guard()
    {
        return Auth::guard();
    }
}
