<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use App\Models\Client;
use App\Models\Checker;
use App\Models\MessageStatus;
use App\Models\ValidatorUser;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => []]);
    }

    /**
     * @OA\Post(
     *     path="/api/message/send",
     *     tags={"Message"},
     *     summary="Send message",
     *     description="Send message.",
     *     operationId="message_send",
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\RequestBody(
     *         description="Send message input",
     *         required=true,
     *         @OA\JsonContent(
     *              @OA\Property(property="to_user_id", type="integer"),
     *              @OA\Property(property="message", type="string"),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Message has been sent.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Message has been sent."),
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
     * )
     */
    public function send(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'to_user_id' => 'required|numeric|min:1',
                'message' => 'required',
            ]
        );

        if ($validator->fails()) {
            $error = $validator->errors()->all()[0];
            return $this->send_validation_error_response($error);
        }

        $user = $this->guard('api')->user();

        if (!$user)
            return $this->send_error_response('No user found as logged in', 401);

        Message::create(
            [
                'from_user_id' => $user->id,
                'to_user_id' => $request->to_user_id,
                'message'  => $request->message,
            ]
        );


        return $this->send_response(
            'Message has been sent.',
            null,
            200
        );
    }

    /**
     * @OA\Post(
     *     path="/api/message/contacts",
     *     tags={"Message"},
     *     summary="Get contacts for message.",
     *     operationId="message_get_contacts",
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\Response(
     *         response=200,
     *         description="Sent contacts",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Sent contacts"),
     *             @OA\Property(property="payload", type="array",
     *                  @OA\Items(
     *                      @OA\Property(property="id", type="integer"),
     *                      @OA\Property(property="name", type="string"),
     *                      @OA\Property(property="email", type="string"),
     *                      @OA\Property(property="file_path", type="string"),
     *                      @OA\Property(property="unread_msg_count", type="integer"),
     *                  ),
     *             ),
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
    public function get_contacts()
    {
        try {
            $user = $this->guard('api')->user();
            if (!$user)
                return $this->send_error_response('No user found as logged in', 401);

            $users = [];

            $admin_users = User::select(['users.id', 'users.name', 'users.email', 'files.file_path', 'msg_count.unread_msg_count'])
                ->leftJoin('files', 'files.id', '=', 'users.profile_image_id')
                ->leftJoin(DB::raw('(select count(msg.id) as unread_msg_count, msg.user_id from
                (select messages.id, messages.from_user_id as user_id from messages where messages.to_user_id = ' . $user->id . ') as msg
                where msg.id not in (select message_id from message_statuses where user_id = ' . $user->id . ')
                group by msg.user_id) as msg_count'), 'msg_count.user_id', '=', 'users.id')
                ->where('users.is_active', '=', true)
                ->where(function ($query) {
                    $query->orWhere('users.primary_role', '=', Role::ROLE_ADMIN)
                        ->orWhere('users.primary_role', '=', Role::ROLE_SUPER_ADMIN);
                })
                ->where('users.id', '!=', $user->id)
                ->get()
                ->toArray();

            if ($user->isAdmin() || $user->isSuperAdmin()) {
                $users = User::select(['users.id', 'users.name', 'users.email', 'files.file_path', 'msg_count.unread_msg_count'])
                    ->leftJoin('files', 'files.id', '=', 'users.profile_image_id')
                    ->leftJoin(DB::raw('(select count(msg.id) as unread_msg_count, msg.user_id from
                    (select messages.id, messages.from_user_id as user_id from messages where messages.to_user_id = ' . $user->id . ') as msg
                    where msg.id not in (select message_id from message_statuses where user_id = ' . $user->id . ')
                    group by msg.user_id) as msg_count'), 'msg_count.user_id', '=', 'users.id')
                    ->where('users.is_active', '=', true)
                    ->where('users.primary_role', '!=', Role::ROLE_ADMIN)
                    ->where('users.primary_role', '!=', Role::ROLE_SUPER_ADMIN)
                    ->where('users.id', '!=', $user->id)
                    ->get()
                    ->toArray();
            } else if ($user->isChecker()) {

                $clinet_users = Client::select(['users.id', 'users.name', 'users.email', 'files.file_path', 'msg_count.unread_msg_count'])
                    ->join('users', 'users.id', '=', 'clients.user_id')
                    ->leftJoin('files', 'files.id', '=', 'users.profile_image_id')
                    ->leftJoin(DB::raw('(select count(msg.id) as unread_msg_count, msg.user_id from
                    (select messages.id, messages.from_user_id as user_id from messages where messages.to_user_id = ' . $user->id . ') as msg
                    where msg.id not in (select message_id from message_statuses where user_id = ' . $user->id . ')
                    group by msg.user_id) as msg_count'), 'msg_count.user_id', '=', 'users.id')
                    ->where('users.is_active', '=', true)
                    ->where('clients.checker_user_id', '=', $user->id)
                    ->where('users.id', '!=', $user->id)
                    ->get()
                    ->toArray();

                $validator_users = Checker::select(['users.id', 'users.name', 'users.email', 'files.file_path', 'msg_count.unread_msg_count'])
                    ->join('validator_users', 'validator_users.user_id', '=', 'checkers.validator_user_id')
                    ->join('users', 'users.id', '=', 'validator_users.user_id')
                    ->leftJoin('files', 'files.id', '=', 'users.profile_image_id')
                    ->leftJoin(DB::raw('(select count(msg.id) as unread_msg_count, msg.user_id from
                    (select messages.id, messages.from_user_id as user_id from messages where messages.to_user_id = ' . $user->id . ') as msg
                    where msg.id not in (select message_id from message_statuses where user_id = ' . $user->id . ')
                    group by msg.user_id) as msg_count'), 'msg_count.user_id', '=', 'users.id')
                    ->where('checkers.user_id', '=', $user->id)
                    ->where('users.is_active', '=', true)
                    ->where('users.id', '!=', $user->id)
                    ->get()
                    ->toArray();

                $users = array_merge($clinet_users, $validator_users);
            } else if ($user->isValidator()) {
                $users = Checker::select(['users.id', 'users.name', 'users.email', 'files.file_path', 'msg_count.unread_msg_count'])
                    ->join('users', 'users.id', '=', 'checkers.user_id')
                    ->leftJoin('files', 'files.id', '=', 'users.profile_image_id')
                    ->leftJoin(DB::raw('(select count(msg.id) as unread_msg_count, msg.user_id from
                    (select messages.id, messages.from_user_id as user_id from messages where messages.to_user_id = ' . $user->id . ') as msg
                    where msg.id not in (select message_id from message_statuses where user_id = ' . $user->id . ')
                    group by msg.user_id) as msg_count'), 'msg_count.user_id', '=', 'users.id')
                    ->where('users.is_active', '=', true)
                    ->where('checkers.validator_user_id', '=', $user->id)
                    ->where('users.id', '!=', $user->id)
                    ->get()
                    ->toArray();
            } else if ($user->isClient()) {
                $users = Client::select(['users.id', 'users.name', 'users.email', 'files.file_path', 'msg_count.unread_msg_count'])
                    ->join('checkers', 'checkers.user_id', '=', 'clients.checker_user_id')
                    ->join('users', 'users.id', '=', 'checkers.user_id')
                    ->leftJoin('files', 'files.id', '=', 'users.profile_image_id')
                    ->leftJoin(DB::raw('(select count(msg.id) as unread_msg_count, msg.user_id from
                    (select messages.id, messages.from_user_id as user_id from messages where messages.to_user_id = ' . $user->id . ') as msg
                    where msg.id not in (select message_id from message_statuses where user_id = ' . $user->id . ')
                    group by msg.user_id) as msg_count'), 'msg_count.user_id', '=', 'users.id')
                    ->where('users.is_active', '=', true)
                    ->where('clients.user_id', '=', $user->id)
                    ->where('users.id', '!=', $user->id)
                    ->get()
                    ->toArray();
            }

            $payload = array_merge($users, $admin_users);
            return $this->send_response('Sent contacts', $payload, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Could not get user data', null);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/message/get",
     *     tags={"Message"},
     *     summary="Get messages.",
     *     operationId="message_get_messages",
     *     security={
     *         {"bearer": {}}
     *     },
     *     @OA\RequestBody(
     *         description="Get message input",
     *         required=true,
     *         @OA\JsonContent(
     *              @OA\Property(property="from_user_id", type="integer"),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Sent messages",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Sent messages"),
     *             @OA\Property(property="payload", type="array",
     *                  @OA\Items(
     *                      @OA\Property(property="sender_id", type="integer"),
     *                      @OA\Property(property="sender_name", type="string"),
     *                      @OA\Property(property="sender_email", type="string"),
     *                      @OA\Property(property="sender_profile", type="string"),
     *                      @OA\Property(property="receiver_id", type="integer"),
     *                      @OA\Property(property="receiver_name", type="string"),
     *                      @OA\Property(property="receiver_email", type="string"),
     *                      @OA\Property(property="receiver_profile", type="string"),
     *                      @OA\Property(property="message", type="string"),
     *                      @OA\Property(property="created_at", type="string", format="datetime"),
     *                  ),
     *             ),
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
     * )
     */
    public function get_messages(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), ['from_user_id' => 'required|numeric|min:1',]);
            if ($validator->fails()) {
                $error = $validator->errors()->all()[0];
                return $this->send_validation_error_response($error);
            }
            $from_user_id = $request->from_user_id;
            $user = $this->guard('api')->user();
            if (!$user)
                return $this->send_error_response('No user found as logged in', 401);
            $chat_messages = Message::select(
                [
                    'sender.id as sender_id',
                    'sender.name as sender_name',
                    'sender.email as sender_email',
                    'sender_profile.file_path as sender_profile',
                    'receiver.id as receiver_id',
                    'receiver.name as receiver_name',
                    'receiver.email as receiver_email',
                    'receiver_profile.file_path as receiver_profile',
                    'messages.message',
                    'messages.created_at',
                ]
            )
                ->join('users as sender', 'sender.id', '=', 'messages.from_user_id')
                ->leftJoin('files as sender_profile', 'sender_profile.id', '=', 'sender.profile_image_id')
                ->join('users as receiver', 'receiver.id', '=', 'messages.to_user_id')
                ->leftJoin('files as receiver_profile', 'receiver_profile.id', '=', 'receiver.profile_image_id')
                ->where('sender.is_active', '=', true)
                ->where('receiver.is_active', '=', true)
                ->whereRaw('((messages.to_user_id = ' . $user->id . ' AND messages.from_user_id = ' . $from_user_id . ') OR
                             (messages.to_user_id = ' . $from_user_id . ' AND messages.from_user_id = ' . $user->id . '))')
                ->orderBy('messages.created_at')
                ->get();
            // Updating the messages as read.
            $messages = Message::select(['messages.id', DB::raw($user->id . ' as user_id')])
                ->whereRaw('((messages.to_user_id = ' . $user->id . ' AND messages.from_user_id = ' . $from_user_id . ') OR
            (messages.to_user_id = ' . $from_user_id . ' AND messages.from_user_id = ' . $user->id . '))')
                ->toSql();
            MessageStatus::join(DB::raw("({$messages}) as messages"), 'messages.id', '=', 'message_statuses.message_id')
                ->where('message_statuses.user_id', '=', $user->id)
                ->delete();
            DB::table('message_statuses')->insertUsing(['message_id', 'user_id'], $messages);
            return $this->send_response('Sent messages', $chat_messages, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Could not get user data', null);
        }
    }

    public function get_all_messages(Request $request)
    {
        try {
            // $validator = Validator::make($request->all(),['from_user_id' => 'required|numeric|min:1',]);
            // if ($validator->fails()) {
            //     $error = $validator->errors()->all()[0];
            //     return $this->send_validation_error_response($error);
            // }
            // $from_user_id = $request->from_user_id;
            // $user = $this->guard('api')->user();
            // if (!$user)
            //     return $this->send_error_response('No user found as logged in', 401);
            $user = $this->guard('api')->user();
            if (!$user) {
                return $this->send_error_response('No user found as logged in', 401);
            }
            // if (!$user->isAdmin() || !$user->isSuperAdmin()) {
            //     return $this->send_error_response('Not logged in as Admin', 401);
            // }
            $chat_messages = Message::select([
                'sender.id as sender_id',
                'sender.name as sender_name',
                'sender.email as sender_email',
                'sender_profile.file_path as sender_profile',
                'receiver.id as receiver_id',
                'receiver.name as receiver_name',
                'receiver.email as receiver_email',
                'receiver_profile.file_path as receiver_profile',
                'messages.message',
                'messages.created_at',
            ])
                ->join('users as sender', 'sender.id', '=', 'messages.from_user_id')
                ->leftJoin('files as sender_profile', 'sender_profile.id', '=', 'sender.profile_image_id')
                ->join('users as receiver', 'receiver.id', '=', 'messages.to_user_id')
                ->leftJoin('files as receiver_profile', 'receiver_profile.id', '=', 'receiver.profile_image_id')
                ->orderBy('messages.created_at')
                ->get();
            // Updating the messages as read.
            // $messages = Message::select(['messages.id', DB::raw($user->id . ' as user_id')])
            //     ->whereRaw('((messages.to_user_id = ' . $user->id . ' AND messages.from_user_id = ' . $from_user_id . ') OR
            // (messages.to_user_id = ' . $from_user_id . ' AND messages.from_user_id = ' . $user->id . '))')
            //     ->toSql();
            // MessageStatus::join(DB::raw("({$messages}) as messages"), 'messages.id', '=', 'message_statuses.message_id')
            //     ->where('message_statuses.user_id', '=', $user->id)
            //     ->delete();
            // DB::table('message_statuses')->insertUsing(['message_id', 'user_id'], $messages);
            return $this->send_response('Sent messages', $chat_messages, 200);
        } catch (ModelNotFoundException $e) {
            return $this->send_error_response('Could not get user data', null);
        }
    }

    protected function guard()
    {
        return Auth::guard('api');
    }
}
