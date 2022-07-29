<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use App\Models\EntryStatus;
use App\Models\Sale;
use App\Models\InvoiceGroup;
use App\Models\InvoiceSubGroup;
use App\Models\InvoiceItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EntryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['get_invoice_exp_groups']]);
    }

    /**
     * @OA\Post(
     *     path="/api/entry/create",
     *     tags={"Entry"},
     *     summary="Create entry",
     *     description="Create entry.",
     *     operationId="entry_create",
     *     security={
     *         {"bearer": {}}
     *     }, 
     *     @OA\RequestBody(
     *         description="Create entry input",
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(
     *                  property="file_id_list", 
     *                  type="array", 
     *                  @OA\Items(
     *                      type="integer", example=1
     *                  )         
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Entries created successfully.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=201),
     *             @OA\Property(property="message", type="string", example="Entries created successfully."),
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
     *         response=402,
     *         description="Entry can create client user only.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=402),
     *             @OA\Property(property="message", type="string", example="Entry can create client user only."),
     *             @OA\Property(property="payload", type="object")
     *         ),
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
     * )
     */
    public function create(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'file_id_list' => 'required|array',
                'file_id_list.*' => 'integer',
            ]
        );

        if ($validator->fails()) {
            $error = $validator->errors()->all()[0];
            return $this->send_validation_error_response($error);
        }

        $user = $this->guard('api')->user();

        if (!$user)
            return $this->send_error_response('No user found as logged in', 401);

        if (!$user->isClient())
            return $this->send_response('Entry can add client user only.', $user, 402);

        foreach ($request->file_id_list as $file_id) {
            Entry::create(
                [
                    'client_user_id' => $user->id,
                    'file_id'  => $file_id,
                ]
            );
        }

        return $this->send_response(
            'Entries created successfully.',
            null,
            201
        );
    }

    /**
     * @OA\Get(
     *     path="/api/entry/clientpendinglist",
     *     tags={"Entry"},
     *     summary="Get pending entries for a specific client user.
     *                  Status ID
     *                      1:Penidng,
     *                      5:Penidng (Validator rejected) 
     *                  ",
     *     operationId="entry_client_pending_list",
     *     security={
     *         {"bearer": {}}
     *     }, 
     *     @OA\Response(
     *         response=200,
     *         description="Successfully sent entry data",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Successfully sent entry data."),
     *             @OA\Property(property="payload", type="array", 
     *                  @OA\Items(ref="#/components/schemas/GetClientPendingEntriesOutput")         
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
     *         description="The user must be client type",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=402),
     *             @OA\Property(property="message", type="string", example="The user must be client type."),
     *             @OA\Property(property="payload", type="object")         
     *         )
     *     ), 
     * )
     */
    public function client_pending_list(Request $request)
    {
        try {

            $user = $this->guard('api')->user();

            if (!$user)
                return $this->send_error_response('No user found as logged in', 401);

            if (!$user->isClient())
                return $this->send_error_response('The user must be client type', 402);

            $entries = DB::table('entries')
                ->select('files.file_path', 'entries.created_at', 'entries.id', 'entries.entry_status_id')
                ->join('files', 'files.id', '=', 'entries.file_id')
                ->where('entries.client_user_id', '=',  $user->id)
                ->where('entries.deleted_at', null)
                ->where(function ($query) {
                    $query->orWhere('entries.entry_status_id', '=',  EntryStatus::ENTRY_PENDING)
                        ->orWhere('entries.entry_status_id', '=',  EntryStatus::ENTRY_VALIDATOR_REJECTED);
                })
                ->orderBy('entries.updated_at', 'DESC')
                ->get();

            return $this->send_response('Pending entries data', $entries, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Could not get pending entries data', null);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/entry/checkerpendinglist",
     *     tags={"Entry"},
     *     summary="Get pending entries for a specific checker user.
     *                  entry_status_id:
     *                      1:Pending
     *                      2:Recheck, 
     *                      5:Rejected
     *                  Entry Type:
     *                      1: Sale
     *                      2: Purchase
     *                      3: Expenditure",
     *     operationId="entry_checker_pending_list",
     *     security={
     *         {"bearer": {}}
     *     }, 
     *     @OA\Response(
     *         response=200,
     *         description="Successfully sent entry data",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Successfully sent entry data."),
     *             @OA\Property(property="payload", type="array", 
     *                  @OA\Items(ref="#/components/schemas/GetCheckerPendingEntriesOutput")         
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
     *         description="The user must be checker type",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=402),
     *             @OA\Property(property="message", type="string", example="The user must be checker type."),
     *             @OA\Property(property="payload", type="object")         
     *         )
     *     ), 
     * )
     */
    public function checker_pending_list(Request $request)
    {
        try {

            $user = $this->guard('api')->user();

            if (!$user)
                return $this->send_error_response('No user found as logged in', 401);

            if (!$user->isChecker())
                return $this->send_error_response('The user must be checker type', 402);

            $entries = DB::table('entries')
                ->select('users.name', 'files.file_path', 'entries.created_at', 'entries.id', 'entries.entry_status_id', 'entries.entry_type', 'clients.vat_percentage', 'entries.comment')
                ->join('users', 'users.id', '=', 'entries.client_user_id')
                ->join('clients', 'clients.user_id', '=', 'users.id')
                ->join('files', 'files.id', '=', 'entries.file_id')
                ->where('clients.checker_user_id', '=',  $user->id)
                ->where('entries.deleted_at', null)
                ->where(function ($query) {
                    $query->orWhere('entries.entry_status_id', '=',  EntryStatus::ENTRY_PENDING)
                        ->orWhere('entries.entry_status_id', '=',  EntryStatus::ENTRY_CHECKER_IN_PROGRESS)
                        ->orWhere('entries.entry_status_id', '=',  EntryStatus::ENTRY_VALIDATOR_REJECTED);
                })
                ->orderBy('entries.updated_at', 'DESC')
                ->get();

            return $this->send_response('Pending entries data', $entries, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Could not get pending entries data', null);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/entry/checkercheckedlist",
     *     tags={"Entry"},
     *     summary="Checker checked list for a specific checker user.",
     *     operationId="entry_checker_checked_list",
     *     security={
     *         {"bearer": {}}
     *     }, 
     *     @OA\Response(
     *         response=200,
     *         description="Checker checked entries",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Checker checked entries."),
     *             @OA\Property(property="payload", type="array", 
     *                  @OA\Items(ref="#/components/schemas/GetCheckerCheckedEntriesOutput")         
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
     *         description="The user must be checker type",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=402),
     *             @OA\Property(property="message", type="string", example="The user must be checker type."),
     *             @OA\Property(property="payload", type="object")         
     *         )
     *     ), 
     * )
     */
    public function checker_checked_list(Request $request)
    {
        try {

            $user = $this->guard('api')->user();

            if (!$user)
                return $this->send_error_response('No user found as logged in', 401);

            if (!$user->isChecker())
                return $this->send_error_response('The user must be checker type', 402);

            $entries = DB::table('entries')
                ->select(
                    'users.name',
                    'files.file_path',
                    'entries.created_at',
                    'entries.id',
                    'entries.entry_type',
                    'sales.invoice_date',
                    'sales.amount',
                    'sales.invoice_number',
                )
                ->join('users', 'users.id', '=', 'entries.client_user_id')
                ->join('clients', 'clients.user_id', '=', 'users.id')
                ->join('sales', 'sales.entry_id', '=', 'entries.id')
                ->join('files', 'files.id', '=', 'entries.file_id')
                ->where('entries.entry_status_id', '=',  EntryStatus::ENTRY_VALIDATOR_IN_PROGRESS)
                ->where('clients.checker_user_id', '=',  $user->id)
                ->where('entries.deleted_at', null)
                ->where('sales.deleted_at', null)
                ->orderBy('entries.updated_at', 'DESC')
                ->get();

            return $this->send_response('Checker checked entries', $entries, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Could not get checker checked entries', null);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/entry/validatorpendinglist",
     *     tags={"Entry"},
     *     summary="Get pending entries for a specific validator user.",
     *     operationId="entry_validator_pending_list",
     *     security={
     *         {"bearer": {}}
     *     }, 
     *     @OA\Response(
     *         response=200,
     *         description="Successfully sent pedning entry data",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Successfully pending sent entry data."),
     *             @OA\Property(property="payload", type="array", 
     *                  @OA\Items(ref="#/components/schemas/GetValidatorPendingEntriesOutput")         
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
     *         description="The user must be validator type",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=402),
     *             @OA\Property(property="message", type="string", example="The user must be validator type."),
     *             @OA\Property(property="payload", type="object")         
     *         )
     *     ), 
     * )
     */
    public function validator_pending_list(Request $request)
    {
        try {

            $user = $this->guard('api')->user();

            if (!$user)
                return $this->send_error_response('No user found as logged in', 401);

            if (!$user->isValidator())
                return $this->send_error_response('The user must be validator type', 402);

            $entries = DB::table('entries')
                ->select('users.name', 'files.file_path', 'entries.created_at', 'entries.id', 'entries.entry_type', 'entries.requested_for_delete')
                ->join('users', 'users.id', '=', 'entries.client_user_id')
                ->join('clients', 'clients.user_id', '=', 'users.id')
                ->join('checkers', 'checkers.user_id', '=', 'clients.checker_user_id')
                ->join('files', 'files.id', '=', 'entries.file_id')
                ->where('entries.deleted_at', null)
                ->where('checkers.validator_user_id', '=',  $user->id)
                ->where('entries.entry_status_id', '=',  EntryStatus::ENTRY_VALIDATOR_IN_PROGRESS)
                ->orderBy('entries.updated_at', 'DESC')
                ->get();

            return $this->send_response('Pending entries data', $entries, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Could not get pending entries data', null);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/entry/validatorcheckedlist",
     *     tags={"Entry"},
     *     summary="Validator checked list for a specific validator user.",
     *     operationId="entry_validator_checked_list",
     *     security={
     *         {"bearer": {}}
     *     }, 
     *     @OA\Response(
     *         response=200,
     *         description="Validator checked entries",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Validator checked entries."),
     *             @OA\Property(property="payload", type="array", 
     *                  @OA\Items(ref="#/components/schemas/GetValidatorCheckedEntriesOutput")         
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
     *         description="The user must be validator type",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=402),
     *             @OA\Property(property="message", type="string", example="The user must be validator type."),
     *             @OA\Property(property="payload", type="object")         
     *         )
     *     ), 
     * )
     */
    public function validator_checked_list(Request $request)
    {
        try {

            $user = $this->guard('api')->user();

            if (!$user)
                return $this->send_error_response('No user found as logged in', 401);

            if (!$user->isValidator())
                return $this->send_error_response('The user must be validator type', 402);

            $entries = DB::table('entries')
                ->select(
                    'users.name',
                    'files.file_path',
                    'entries.created_at',
                    'entries.id',
                    'entries.entry_type',
                    'sales.invoice_date',
                    'sales.amount',
                    'sales.invoice_number',
                )
                ->join('users', 'users.id', '=', 'entries.client_user_id')
                ->join('clients', 'clients.user_id', '=', 'users.id')
                ->join('checkers', 'checkers.user_id', '=', 'clients.checker_user_id')
                ->join('sales', 'sales.entry_id', '=', 'entries.id')
                ->join('files', 'files.id', '=', 'entries.file_id')
                ->where('entries.entry_status_id', '=',  EntryStatus::ENTRY_APPROVED)
                ->where('checkers.validator_user_id', '=',  $user->id)
                ->where('entries.deleted_at', null)
                ->where('sales.deleted_at', null)
                ->orderBy('entries.updated_at', 'DESC')
                ->get();

            return $this->send_response('Validator checked entries', $entries, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Could not get validator checked entries', null);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/entry/setvalidatorstatus",
     *     tags={"Entry"},
     *     summary="Set validator entry status. 
     *                  Status ID 
     *                      2:Recheck, 
     *                      4:Approved, 
     *                      5:Rejected",
     *     description="Set validator entry status. Status ID 2: Recheck, 4:Approved, 5:Rejected",
     *     operationId="entry_set_validator_status",
     *     security={
     *         {"bearer": {}}
     *     }, 
     *     @OA\RequestBody(
     *         description="Set validator entry input",
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/SetValidatorEntryInput")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Entry status updated successfully.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Entry status updated successfully."),
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
     *         description="No user found as logged in",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=401),
     *             @OA\Property(property="message", type="string", example="No user found as logged in."),
     *             @OA\Property(property="payload", type="object")         
     *         )
     *     ), 
     *     @OA\Response(
     *         response=402,
     *         description="Entry can create client user only.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=402),
     *             @OA\Property(property="message", type="string", example="Entry can create client user only."),
     *             @OA\Property(property="payload", type="object")
     *         ),
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Could not find the entry.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=403),
     *             @OA\Property(property="message", type="string", example="Could not find the entry."),
     *             @OA\Property(property="payload", type="object")
     *         ),
     *     ),
     *     @OA\Response(
     *         response=405,
     *         description="Please wait for checker response.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=405),
     *             @OA\Property(property="message", type="string", example="Please wait for checker response."),
     *             @OA\Property(property="payload", type="object")
     *         ),
     *     ),
     * )
     */
    public function set_validator_status(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'entry_id' => 'required|numeric|min:1',
                'status_id' => 'required|numeric',
            ]
        );

        if ($validator->fails()) {
            $error = $validator->errors()->all()[0];
            return $this->send_validation_error_response($error);
        }

        if ($request->status_id != 2 && $request->status_id != 4 && $request->status_id != 5)
            return $this->send_validation_error_response("The status ID should be 2,4 or 5");

        $user = $this->guard('api')->user();

        if (!$user)
            return $this->send_error_response('No user found as logged in', 401);

        if (!$user->isValidator())
            return $this->send_response('Entry status can change validator user only.', $user, 402);

        $entry = Entry::find($request->entry_id);

        if (!$entry)
            return $this->send_error_response('Could not find the entry.', 403);

        if ($entry->entry_status_id != EntryStatus::ENTRY_VALIDATOR_IN_PROGRESS)
            return $this->send_error_response('Please wait for checker response.', 405);

        $entry->entry_status_id = $request->status_id;
        if ($request->input("comment"))
            $entry->comment = $request->input("comment");
        $entry->save();

        if ($request->status_id == EntryStatus::ENTRY_VALIDATOR_REJECTED) {
            $sale_entry = Sale::where('entry_id', '=', $request->entry_id)->first();
            if ($sale_entry) {
                $sale_entry->delete();
            }
        }

        return $this->send_response(
            'Entry status updated successfully.',
            null,
            200
        );
    }

    /**
     * @OA\Get(
     *     path="/api/entry/clientrecentlist",
     *     tags={"Entry"},
     *     summary="Get recent entries for a specific client user. 
     *                  Status ID (2|3: In Progress, 4:Approved)",
     *     operationId="entry_client_recent_list",
     *     security={
     *         {"bearer": {}}
     *     }, 
     *     @OA\Response(
     *         response=200,
     *         description="Successfully sent entry data",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Successfully sent entry data."),
     *             @OA\Property(property="payload", type="array", 
     *                  @OA\Items(ref="#/components/schemas/GetClientRecentEntriesOutput")         
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
     *         description="The user must be client type",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=402),
     *             @OA\Property(property="message", type="string", example="The user must be client type."),
     *             @OA\Property(property="payload", type="object")         
     *         )
     *     ), 
     * )
     */
    public function client_recent_list(Request $request)
    {
        try {

            $user = $this->guard('api')->user();

            if (!$user)
                return $this->send_error_response('No user found as logged in', 401);

            if (!$user->isClient())
                return $this->send_error_response('The user must be client type', 402);

            $entries = DB::table('entries')
                ->select('files.file_path', 'entries.id', 'invoice_date', 'invoice_number', 'amount', 'entries.entry_status_id', 'entries.requested_for_delete')
                ->join('files', 'files.id', '=', 'entries.file_id')
                ->join('sales', 'entry_id', '=', 'entries.id')
                ->where('entries.client_user_id', '=',  $user->id)
                ->where('entries.entry_status_id', '!=',  EntryStatus::ENTRY_PENDING)
                ->where('entries.entry_status_id', '!=',  EntryStatus::ENTRY_VALIDATOR_REJECTED)
                ->where('entries.deleted_at', null)
                ->where('sales.deleted_at', null)
                ->orderBy('entries.updated_at', 'DESC')
                ->get();

            return $this->send_response('Recent entries data', $entries, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Could not get recent entries data', null);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/entry/clientdeleteentry",
     *     tags={"Entry"},
     *     summary="Client delete entry",
     *     description="Client delete entry.",
     *     operationId="entry_client_delete_entry",
     *     security={
     *         {"bearer": {}}
     *     }, 
     *     @OA\Parameter(
     *         name="entry_id",
     *         in="query",
     *         description="Entry ID",
     *         required=true,
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Entry has been deleted successfully.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Entry has been deleted successfully."),
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
     *         description="No user found as logged in",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=401),
     *             @OA\Property(property="message", type="string", example="No user found as logged in."),
     *             @OA\Property(property="payload", type="object")         
     *         ),
     *     ), 
     *     @OA\Response(
     *         response=402,
     *         description="Client can only delete pending entry.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=402),
     *             @OA\Property(property="message", type="string", example="Client can only delete pending entry."),
     *             @OA\Property(property="payload", type="object")
     *         ),
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Could not find the entry.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=403),
     *             @OA\Property(property="message", type="string", example="Could not find the entry."),
     *             @OA\Property(property="payload", type="object")
     *         ),
     *     ),
     *     @OA\Response(
     *         response=405,
     *         description="The entry has beed processing. Could not delete at this time.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=405),
     *             @OA\Property(property="message", type="string", example="The entry has beed processing. Could not delete at this time."),
     *             @OA\Property(property="payload", type="object")
     *         ),
     *     ),
     * )
     */
    public function client_delete_entry(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'entry_id' => 'required|numeric|min:1',
            ]
        );

        if ($validator->fails()) {
            $error = $validator->errors()->all()[0];
            return $this->send_validation_error_response($error);
        }

        $user = $this->guard('api')->user();

        if (!$user)
            return $this->send_error_response('No user found as logged in', 401);

        if (!$user->isClient())
            return $this->send_response('Client can only delete pending entry.', $user, 402);

        $entry = Entry::find($request->entry_id);

        if (!$entry)
            return $this->send_error_response('Could not find the entry.', 403);

        if (!($entry->entry_status_id == EntryStatus::ENTRY_PENDING || $entry->entry_status_id == EntryStatus::ENTRY_VALIDATOR_REJECTED))
            return $this->send_error_response('The entry has been initiated processing. Could not delete at this time.', 405);

        $entry->delete();

        return $this->send_response(
            'Entry has been deleted successfully.',
            null,
            200
        );
    }

    /**
     * @OA\Post(
     *     path="/api/entry/clientrequestfordelete",
     *     tags={"Entry"},
     *     summary="Client request for delete entry",
     *     description="Client request for delete entry.",
     *     operationId="entry_client_request_for_delete",
     *     security={
     *         {"bearer": {}}
     *     }, 
     *     @OA\Parameter(
     *         name="entry_id",
     *         in="query",
     *         description="Entry ID",
     *         required=true,
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="The request for delete has been done successfully.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="The request for delete has been done successfully."),
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
     *         description="No user found as logged in",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=401),
     *             @OA\Property(property="message", type="string", example="No user found as logged in."),
     *             @OA\Property(property="payload", type="object")         
     *         ),
     *     ), 
     *     @OA\Response(
     *         response=402,
     *         description="Only client can do request.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=402),
     *             @OA\Property(property="message", type="string", example="Only client can do request."),
     *             @OA\Property(property="payload", type="object")
     *         ),
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Could not find the entry.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=403),
     *             @OA\Property(property="message", type="string", example="Could not find the entry."),
     *             @OA\Property(property="payload", type="object")
     *         ),
     *     ),
     *     @OA\Response(
     *         response=405,
     *         description="The entry has beed approved. Could not delete at this time..",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=405),
     *             @OA\Property(property="message", type="string", example="The entry has beed approved. Could not delete at this time.."),
     *             @OA\Property(property="payload", type="object")
     *         ),
     *     ),
     * )
     */
    public function client_request_for_delete(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'entry_id' => 'required|numeric|min:1',
            ]
        );

        if ($validator->fails()) {
            $error = $validator->errors()->all()[0];
            return $this->send_validation_error_response($error);
        }

        $user = $this->guard('api')->user();

        if (!$user)
            return $this->send_error_response('No user found as logged in', 401);

        if (!$user->isClient())
            return $this->send_response('Only client can do request.', $user, 402);

        $entry = Entry::find($request->entry_id);

        if (!$entry)
            return $this->send_error_response('Could not find the entry.', 403);

        if ($entry->entry_status_id == EntryStatus::ENTRY_APPROVED)
            return $this->send_error_response('The entry has been approved. Could not delete at this time.', 405);

        if ($entry->entry_status_id == EntryStatus::ENTRY_PENDING) {
            $entry->delete();
            return $this->send_response(
                'Since the entry is in pending status it has been deleted successfully.',
                null,
                200
            );
        }

        $entry->requested_for_delete = true;
        $entry->save();

        return $this->send_response(
            'The request for delete has been done successfully.',
            null,
            200
        );
    }

    /**
     * @OA\Post(
     *     path="/api/entry/validatordeleteentry",
     *     tags={"Entry"},
     *     summary="Validator delete entry",
     *     description="Validator delete entry.",
     *     operationId="entry_validator_delete_entry",
     *     security={
     *         {"bearer": {}}
     *     }, 
     *     @OA\Parameter(
     *         name="entry_id",
     *         in="query",
     *         description="Entry ID",
     *         required=true,
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Entry has been deleted successfully.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Entry has been deleted successfully."),
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
     *         description="No user found as logged in",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=401),
     *             @OA\Property(property="message", type="string", example="No user found as logged in."),
     *             @OA\Property(property="payload", type="object")         
     *         ),
     *     ), 
     *     @OA\Response(
     *         response=402,
     *         description="Validator can only delete entry.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=402),
     *             @OA\Property(property="message", type="string", example="Validator can only delete entry."),
     *             @OA\Property(property="payload", type="object")
     *         ),
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Could not find the entry.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=403),
     *             @OA\Property(property="message", type="string", example="Could not find the entry."),
     *             @OA\Property(property="payload", type="object")
     *         ),
     *     ),
     *     @OA\Response(
     *         response=405,
     *         description="The entry has been approved. Could not delete at this time.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=405),
     *             @OA\Property(property="message", type="string", example="The entry has been approved. Could not delete at this time."),
     *             @OA\Property(property="payload", type="object")
     *         ),
     *     ),
     *     @OA\Response(
     *         response=406,
     *         description="Could not find any client request against this entry.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=406),
     *             @OA\Property(property="message", type="string", example="Could not find any client request against this entry."),
     *             @OA\Property(property="payload", type="object")
     *         ),
     *     ),
     * )
     */
    public function validator_delete_entry(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'entry_id' => 'required|numeric|min:1',
            ]
        );

        if ($validator->fails()) {
            $error = $validator->errors()->all()[0];
            return $this->send_validation_error_response($error);
        }

        $user = $this->guard('api')->user();

        if (!$user)
            return $this->send_error_response('No user found as logged in', 401);

        if (!$user->isValidator())
            return $this->send_error_response('Validator can only delete entry.', 402);

        $entry = Entry::find($request->entry_id);

        if (!$entry)
            return $this->send_error_response('Could not find the entry.', 403);

        if ($entry->entry_status_id == EntryStatus::ENTRY_APPROVED)
            return $this->send_error_response('The entry has been approved. Could not delete at this time.', 405);

        if (!$entry->requested_for_delete)
            return $this->send_error_response('Could not find any client request against this entry.', 406);

        $entry->delete();

        return $this->send_response(
            'Entry has been deleted successfully.',
            null,
            200
        );
    }

    /**
     * @OA\Get(
     *     path="/api/entry/checkinvoicenumberexists",
     *     tags={"Entry"},
     *     summary="Check wether the invoice number is exist",
     *     description="Check wether the invoice number is exist",
     *     operationId="entry_check_invoice_number_exists",
     *     security={
     *         {"bearer": {}}
     *     }, 
     *     @OA\Parameter(
     *         name="invoice_number",
     *         in="query",
     *         description="Invoice number",
     *         required=true,
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Invoice number existance checked.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Invoice number existance checked."),
     *             @OA\Property(property="is_invoice_number_exist", type="boolean")
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
     * )
     */
    public function check_invoice_number_exists(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'invoice_number' => 'required',
            ]
        );

        if ($validator->fails()) {
            $error = $validator->errors()->all()[0];
            return $this->send_validation_error_response($error);
        }

        $sale_entry = Sale::join('enteries.id', '=', 'sales.entry_id')
            ->where('sales.deleted_at', null)
            ->where('invoice_number', '=', $request->invoice_number)
            ->first();

        $is_exist = $sale_entry ? true : false;

        $payload = [
            "is_invoice_number_exist" => $is_exist
        ];

        return $this->send_response(
            'Invoice number existance checked.',
            $payload,
            200
        );
    }

    /**
     * @OA\Get(
     *     path="/api/entry/invoiceexpgroups",
     *     tags={"Entry"},
     *     summary="Get invoice expenture group data",
     *     operationId="entry_get_invoice_exp_groups",
     *     @OA\Response(
     *         response=200,
     *         description="Successfully sent invoice group data",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Successfully sent invoice group data."),
     *             @OA\Property(property="payload", type="array",
     *                  @OA\Items(
     *                      @OA\Property(property="id", type="integer"),
     *                      @OA\Property(property="name", type="string"), 
     *                      @OA\Property(property="invoice_sub_groups", type="array",
     *                          @OA\Items( 
     *                              @OA\Property(property="id", type="integer"),
     *                              @OA\Property(property="name", type="string"), 
     *                              @OA\Property(property="invoice_items", type="array",
     *                                  @OA\Items( 
     *                                      @OA\Property(property="id", type="integer"),
     *                                      @OA\Property(property="name", type="string"),                               
     *                                  )
     *                              ) 
     *                          )
     *                      )
     *                  )         
     *             )
     *         )
     *     ),
     * )
     */
    public function get_invoice_exp_groups()
    {
        try {

            $invoice_groups = InvoiceGroup::with('invoiceSubGroups', 'invoiceSubGroups.invoiceItems')
                ->where('invoice_groups.invoice_type', '=', 1)
                ->get();

            return $this->send_response('Sent invoice group data', $invoice_groups, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Could not get invoice group data', null);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/entry/invoicepurchasegroups",
     *     tags={"Entry"},
     *     summary="Get invoice purchase group data",
     *     operationId="entry_get_invoice_purchase_groups",
     *     @OA\Response(
     *         response=200,
     *         description="Successfully sent invoice group data",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Successfully sent invoice group data."),
     *             @OA\Property(property="payload", type="array",
     *                  @OA\Items(
     *                      @OA\Property(property="id", type="integer"),
     *                      @OA\Property(property="name", type="string"), 
     *                      @OA\Property(property="invoice_sub_groups", type="array",
     *                          @OA\Items( 
     *                              @OA\Property(property="id", type="integer"),
     *                              @OA\Property(property="name", type="string"), 
     *                              @OA\Property(property="invoice_items", type="array",
     *                                  @OA\Items( 
     *                                      @OA\Property(property="id", type="integer"),
     *                                      @OA\Property(property="name", type="string"),                               
     *                                  )
     *                              ) 
     *                          )
     *                      )
     *                  )         
     *             )
     *         )
     *     ),
     * )
     */
    public function get_invoice_purchase_groups()
    {
        try {

            $invoice_groups = InvoiceGroup::with('invoiceSubGroups', 'invoiceSubGroups.invoiceItems')
                ->where('invoice_groups.invoice_type', '=', 2)
                ->get();

            return $this->send_response('Sent invoice group data', $invoice_groups, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Could not get invoice group data', null);
        }
    }


    protected function guard()
    {
        return Auth::guard('api');
    }
}
