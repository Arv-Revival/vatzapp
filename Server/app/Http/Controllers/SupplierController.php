<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['list', 'create', 'short_list', 'get_supplier']]);
    }

    /**
     * @OA\Post(
     *     path="/api/supplier/create",
     *     tags={"Supplier"},
     *     summary="Register supplier",
     *     description="Register supplier.",
     *     operationId="supplier_create",
     *     @OA\RequestBody(
     *         description="Register supplier input",
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/RegisterSupplierInput")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Supplier created successfully.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=201),
     *             @OA\Property(property="message", type="string", example="Supplier created successfully."),
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
    public function create(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required|max:255|unique:users',
                'w_country_code' => 'required|max:10',
                'whatsapp_no' => 'required|max:10|unique:users',
                'name'  => 'required|min:3',
                'trn'  => 'required',
                'building_name',
                'country_id',
                'region_id',
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
                'password' => bcrypt('Supplier#5'),
                'primary_role' => Role::ROLE_SUPPLIER,
            ]
        );

        if ($request->input("image_id") > 0)
            $user->profile_image_id = $request->input("image_id");

        // For the time being by default the email is verified.
        $user->markEmailAsVerified();
        $user->save();

        Supplier::create(
            [
                'user_id' => $user->id,
                'building_name'  => $request->building_name,
                'p_o_box' => $request->input("p_o_box"),
                'palce' => $request->input("palce"),
                'city' => $request->input("city"),
                'country_id'  => $request->country_id,
                'region_id'  => $request->region_id,
                'trn'  => $request->trn,
            ]
        );

        return $this->send_response(
            'Supplier created successfully.',
            null,
            201
        );
    }

    /**
     * @OA\Post(
     *     path="/api/supplier/update",
     *     tags={"Supplier"},
     *     summary="Update supplier",
     *     description="Update supplier.",
     *     operationId="supplier_update",
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\RequestBody(
     *         description="Update supplier input",
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/UpdateSupplierInput")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Supplier updated successfully.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=201),
     *             @OA\Property(property="message", type="string", example="Supplier updated successfully."),
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
    public function update(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'user_id' => 'required|numeric|min:1',
                'email' => 'email|max:255|unique:users,email,' . $request->user_id,
                'w_country_code' => 'max:10',
                'whatsapp_no' => 'required|max:10|unique:users,whatsapp_no,' . $request->user_id,
                'name'  => 'required|min:3',
                'building_name'  => 'required|min:3',
                'country_id'  => 'required|numeric|min:1',
                'region_id'  => 'required|numeric|min:1',
                'trn'  => 'required',
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

        $supplier = Supplier::where('user_id', '=', $request->user_id)->first();

        $supplier->building_name  = $request->building_name;
        $supplier->p_o_box = $request->input("p_o_box");
        $supplier->palce = $request->input("palce");
        $supplier->city = $request->input("city");
        $supplier->country_id  = $request->country_id;
        $supplier->region_id  = $request->region_id;
        $supplier->trn  = $request->trn;

        $supplier->save();

        return $this->send_response(
            'Supplier updated successfully.',
            null,
            201
        );
    }

    /**
     * @OA\Get(
     *     path="/api/supplier/list",
     *     tags={"Supplier"},
     *     summary="Get all active supplier list.",
     *     operationId="supplier_list",
     *     @OA\Response(
     *         response=200,
     *         description="Successfully sent active supplier list data",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Successfully sent active supplier list data."),
     *             @OA\Property(property="payload", type="array",
     *                  @OA\Items(ref="#/components/schemas/SupplierListOutput")
     *             )
     *         )
     *     )
     * )
     */
    public function list()
    {
        try {
            $list = User::select(
                'users.id',
                'users.name',
                'users.is_active',
                'users.email',
                'users.w_country_code',
                'users.whatsapp_no',
                'countries.name as country',
                'regions.name as emirate',
                'suppliers.trn',
                'suppliers.building_name',
                'suppliers.p_o_box',
                'suppliers.palce',
                'suppliers.city',
            )
                ->join('suppliers', 'suppliers.user_id', '=',  'users.id')
                ->join('countries', 'countries.id', '=',  'suppliers.country_id')
                ->join('regions', 'regions.id', '=',  'suppliers.region_id')
                ->where('users.primary_role', '=',  Role::ROLE_SUPPLIER)
                ->get();

            return $this->send_response('List of suppliers', $list, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Could not get supplier data', null);
        }
    }

    public function get_supplier_list(Request $request)
    {
        $user = $this->guard('api')->user();

        if (!$user)
            return $this->send_error_response('No user found as logged in', 405);

        if (!$user->isClient()) {
            return $this->send_response('Not permitted.', null, 401);
        }
        // $supplier_list = DB::table("purchases")->selectRaw("SUM(purchases.total_amount) total_amount,users.name,purchases.supplier_id")
        //     ->leftJoin("users", "users.id", '=', 'supplier_id')
        //     ->groupBy("purchases.supplier_id")
        //     ->get();

        $supplier_list = DB::select("SELECT purchases.supplier_id, SUM(purchases.total_amount), users.name FROM purchases JOIN users ON users.id=purchases.supplier_id GROUP BY purchases.supplier_id, users.name ORDER BY SUM(purchases.total_amount) DESC LIMIT 6");

        return $this->send_response(
            'Top Six Suppliers.',
            $supplier_list,
            200
        );
    }

    /**
     * @OA\Get(
     *     path="/api/supplier/shortlist",
     *     tags={"Supplier"},
     *     summary="Get all active supplier short list.",
     *     operationId="supplier_short_list",
     *     @OA\Response(
     *         response=200,
     *         description="Successfully sent active supplier short list data",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Successfully sent active supplier short list."),
     *             @OA\Property(property="payload", type="array",
     *                  @OA\Items(ref="#/components/schemas/SupplierShortListOutput")
     *             )
     *         )
     *     )
     * )
     */
    public function short_list()
    {
        try {

            $validators = User::select('users.id', 'users.name', 'suppliers.trn')
                ->join('suppliers', 'suppliers.user_id', '=', 'users.id')
                ->where('users.primary_role', '=',  Role::ROLE_SUPPLIER)
                ->where('users.is_active', '=', true)
                ->get();

            return $this->send_response('Short list of supplier sent', $validators, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Could not get supplier list', null);
        }
    }




    /**
     * @OA\Get(
     *     path="/api/supplier/get",
     *     tags={"Supplier"},
     *     summary="Get user details.",
     *     operationId="get_supplier",
     *     @OA\Parameter(
     *         name="user_id",
     *         in="query",
     *         description="User ID",
     *         required=true,
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successfully sent supplier data",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Successfully sent supplier data"),
     *             @OA\Property(property="payload", type="array",
     *                  @OA\Items(ref="#/components/schemas/SupplierOutput")
     *             )
     *         )
     *     ),
     * )
     */
    public function get_supplier(Request $request)
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

        try {
            $user = User::with(['profileImage', 'supplierUser', 'supplierUser.country', 'supplierUser.region'])->where('users.id', '=',  $request->user_id)->first();
            return $this->send_response('Supplier details', $user, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Could not get supplier data', null);
        }
    }

    protected function guard()
    {
        return Auth::guard();
    }
}
