<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\QueueMessage;
use Illuminate\Http\Request;

class BroadcastController extends Controller
{
    public function sendMessage($message_id)
    {
        $sent = QueueMessage::query()->where('message_id', $message_id)
            ->where(fn ($q) =>
            $q->where('status', 'pending')->orWhere('status', 'failed'))
            ->update(['status' => 'progress']);

        if ($sent) {
            return response()
                ->json([
                    'status' => true,
                    'message' => 'success'
                ]);
        } else {
            return response()
                ->json([
                    'status' => false,
                    'message' => 'failed'
                ], 400);
        }
    }
}
