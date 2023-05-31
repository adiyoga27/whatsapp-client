<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AttachmentMessage;
use App\Models\Message;
use App\Models\QueueMessage;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile as HttpUploadedFile;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;

use function PHPUnit\Framework\isEmpty;

class WhatsappBroadcastController extends Controller
{
    public function sendMessage($message_id)
    {
        QueueMessage::query()->where('message_id', $message_id)
            ->where(fn ($q) =>
            $q->where('status', 'pending')->orWhere('status', 'failed'))
            ->update(['status' => 'progress', 'response' => null]);




        return redirect()->back()->with('success', 'Sending message on progress');
    }
}
