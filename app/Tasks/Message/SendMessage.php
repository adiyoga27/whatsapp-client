<?php

namespace App\Tasks\Message;

use App\Http\Controllers\BotTelegram;
use App\Jobs\SendWhatsapJob;
use App\Models\QueueMessage;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Http;

class SendMessage
{
    public function __invoke()
    {
        QueueMessage::where('status', 'progress')->limit(30)->get()->each(fn ($item) => Bus::dispatch(new SendWhatsapJob(
            queueID: $item->id
        )));
        
    }
}
