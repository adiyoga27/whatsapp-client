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
        $queues = QueueMessage::where('status', 'progress')->limit(30)->get();
        foreach ($queues as $queue) {
            QueueMessage::where('id',  $queue->id)->update([
                'status', 'ongoing'
            ]);
            Bus::dispatch(new SendWhatsapJob(
                queueID: $queue->id
            ));
        }
     

    }
}
