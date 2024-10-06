<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class MessageController extends Controller
{
//    public function sendMessage(Request $request)
//    {
//        $request->validate([
//            'receiver_id' => 'required|exists:users,id',
//            'message' => 'required|string',
//        ]);
//
//        $message = Chat::create([
//            'sender_id' => auth()->id(),
//            'receiver_id' => $request->receiver_id,
//            'message' => $request->message,
//        ]);
//
//        return response()->json(['message' => 'sent', 'status_code' => 201]);
//    }

    public function sendMessage(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'receiver_id' => 'required',
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }
        try {
            Chat::create([
                'sender_id' => JWTAuth::parseToken()->authenticate()->id,
                'receiver_id' => $request->receiver_id,
                'message' => $request->message,
            ]);
            return response()->json(['message' => 'sent'], 201);
        } catch (\Illuminate\Database\QueryException|\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'status_code' => 500
            ], 500);

        }
    }


    public function receiveUsersWithMessages()
    {
//        $messages = Chat::where('receiver_id', auth()->id())
//            ->with('sender')
//            ->get();

        $messages = User::orderBy('created_at', 'desc')->get();
        return response()->json($messages);

    }

    public function chatMessages($userId)
    {
        $authUserId = JWTAuth::parseToken()->authenticate()->id;
        $receiver = User::find($userId);

        $messages = Chat::where(function ($query) use ($authUserId, $userId) {
            $query->where('sender_id', $authUserId)
                ->where('receiver_id', $userId);
        })->orWhere(function ($query) use ($authUserId, $userId) {
            $query->where('sender_id', $userId)
                ->where('receiver_id', $authUserId);
        })->orderBy('created_at', 'asc')->get();

        if ($messages->isNotEmpty()) {
            $data = $messages->map(function ($message) use ($receiver, $authUserId) {
                return [
                    'message' => $message->message,
                    'from' => $message->sender_id === $authUserId ? 'me' : 'others',
                    'sender_id' => $message->sender_id,
                    'receiver_id' => $message->receiver_id,
                    'sender_name' => $message->sender->username,
                    'receiver_name' => $message->receiver->username,
                    'created_at' => $message->created_at,

                    'default_receiver_id' => $receiver->id,
                    'default_receiver_name' => $receiver->username,
                ];
            });
            return response()->json($data, 200);
        } else {
            $sender = User::find($authUserId);
            if ($sender && $receiver) {
                return response()->json([[
                    'message' => null,
                    'sender_id' => $sender->id,
                    'receiver_id' => $receiver->id,
                    'sender_name' => $sender->username,
                    'receiver_name' => $receiver->username,
                    'created_at' => null,
                    'default_receiver_id' => $receiver->id,
                    'default_receiver_name' => $receiver->username,
                ]], 200);
            } else {
                return response()->json(['message' => 'We cant find any user'], 404);
            }
        }
    }


}
