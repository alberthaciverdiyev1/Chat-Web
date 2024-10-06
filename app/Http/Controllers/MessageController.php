<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Validator;

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
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required|st   ring',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            Chat::create([
                'sender_id' => auth()->id(),
                'receiver_id' => $request->receiver_id,
                'message' => $request->message,
            ]);
            return response()->json(['message' => 'sent', 'status_code' => 201]);
        } catch (\Illuminate\Database\QueryException|\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'status_code' => 500
            ], 500);

        }
    }


    public function receivedMessages()
    {
        $messages = Chat::where('receiver_id', auth()->id())
            ->with('sender')
            ->get();

        return response()->json($messages);
    }
}
