<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class RegionController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['get']]);
        $this->user = $this->guard()->user();
    }

    /**
     * @OA\Get(
     *     path="/api/region/get",
     *     tags={"Region"},
     *     summary="Get all countries.",
     *     operationId="region_get",
     *     @OA\Response(
     *         response=200,
     *         description="Successfully sent countries data",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Successfully sent countries data"),
     *             @OA\Property(property="payload", type="array", 
     *                  @OA\Items(ref="#/components/schemas/RegionOutput")         
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
                'region_id' => 'required|numeric',
            ]
        );

        if ($validator->fails()) {
            $error = $validator->errors()->all()[0];
            return $this->send_validation_error_response($error);
        }

        try {
            $regions = Region::where('region_id', $request->region_id)->get();
            return $this->send_response('Successfully sent regions data', $regions, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Could not get regions data', null);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/region/create",
     *     tags={"Region"},
     *     summary="Create region.",
     *     operationId="region_create",
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\RequestBody(
     *         description="Create region input",
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/RegionIntput")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Region created successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=201),
     *             @OA\Property(property="message", type="string", example="Region created successfully"),
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
                'name' => 'max:64|unique:regions',
                'region_id' => 'required|numeric',
            ]
        );

        if ($validator->fails()) {
            $error = $validator->errors()->all()[0];
            return $this->send_validation_error_response($error);
        }

        $region = Region::create(
            $validator->validated()
        );

        return $this->send_response('Region created successfully', null, 201);
    }

    /**
     * @OA\Put(
     *     path="/api/region/update",
     *     tags={"Region"},
     *     summary="Update region.",
     *     operationId="regions_update",
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\RequestBody(
     *         description="Update region input",
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/RegionUpdateIntput")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Region updated successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=201),
     *             @OA\Property(property="message", type="string", example="Region updated successfully"),
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
                'name' => 'max:64|unique:regions,name,' . $request->id,
                'region_id' => 'required|numeric',
            ]
        );

        if ($validator->fails()) {
            $error = $validator->errors()->all()[0];
            return $this->send_validation_error_response($error);
        }

        $region = Region::find($request->id);
        $region->name = $request->name;
        $region->region_id = $request->region_id;

        $region->save();

        return $this->send_response('Region updated successfully', null, 200);
    }

    /**
     * @OA\Delete(
     *     path="/api/region/delete",
     *     tags={"Region"},
     *     summary="Delete region.",
     *     operationId="region_delete",
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\RequestBody(
     *         description="Delete region input",
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/RegionDeleteInput")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Region deleted successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Region deleted successfully"),
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

        $region = Region::find($request->id);

        $region->delete();

        return $this->send_response('Region deleted successfully', null, 200);
    }

    protected function guard()
    {
        return Auth::guard();
    }
}
