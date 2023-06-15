<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BotTelegram;
use App\Http\Controllers\Controller;
use App\Jobs\SendBatchWaJob;
use App\Models\AttachmentMessage;
use App\Models\Message;
use App\Models\QueueMessage;
use Illuminate\Bus\Batch;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile as HttpUploadedFile;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Throwable;

use function PHPUnit\Framework\isEmpty;

class WhatsappBroadcastController extends Controller
{
    public function sendMessage($message_id)
    {
        QueueMessage::query()->where('message_id', $message_id)
            ->where(fn ($q) =>
            $q->where('status', 'pending')->orWhere('status', 'failed'))
            ->update(['status' => 'progress', 'response' => null]);

        $batch = Bus::batch([
            new SendBatchWaJob($message_id)
        ])->then(function (Batch $batch) {
            // All jobs completed successfully...
            (new BotTelegram)->info('then : All jobs completed successfully ');

          
        })->finally(function (Batch $batch) {
            // The batch has finished executing...
            (new BotTelegram)->info('finally : The batch has finished executing ');

        })->allowFailures()->dispatch();

        Message::where('id', $message_id)->update([
            'batch_id'=> $batch->id
        ]);

        return redirect()->back()->with('success', 'Sending message on progress');
    }

    public function stopMessage($message_id)
    {
        // (new BotTelegram)->info($message_id);
        try {
            DB::beginTransaction();
            $message = Message::where('id', $message_id)->first();
            if(!empty($message->batch_id)){
            (new BotTelegram)->info("Message Berhenti ".$message->batch_id);

                Bus::findBatch($message->batch_id)->cancel();
                Bus::findBatch($message->batch_id)->delete();
                $message->update([
                    'batch_id' => null
                ]);
            }
           

          

           
    
            QueueMessage::query()->where('message_id', $message_id)
                ->where(fn ($q) =>
                $q->where('status', 'progress'))
                ->update(['status' => 'pending', 'response' => null]);
    
                DB::commit();
    
        } catch (\Throwable $th) {
            DB::rollBack();
            return  (new BotTelegram)->error($th);
        }
       


        return response()->json([
            'status' => true,
            'message' => 'Success Stop Message'
        ]);
    }
}
