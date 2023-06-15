<?php

namespace App\Jobs;

use App\Http\Controllers\BotTelegram;
use App\Models\QueueAttachment;
use App\Models\QueueMessage;
use App\Models\Whatsapp;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use PSpell\Config;

class SendBatchWaJob implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

     /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(protected $messageID)
    {
        //
    }
 
   

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        
        if ($this->batch()->cancelled()) {
            // Determine if the batch has been cancelled...
            QueueMessage::where('message_id', $this->messageID)->where('status', 'progress')->update([
                'status'=> 'pending'
            ]);
            return;
        }
 
        $whatsappUrl = 'https://wabot.galkasoft.id:7991';
        // $whatsappUrl = config('whatsapp.whatsapp_url');
        // $whatsapp = Whatsapp::first();
  
    
            $queueMessages = QueueMessage::where('message_id', $this->messageID)->where('status', 'progress')->get();
            foreach ($queueMessages as $queue) {
                    foreach ($queue->files as $file) {
                        //  (new BotTelegram)->info('collection'.$file->type);
                        sleep($queue->message->duration ?? 5);
                            $cekAttachmentQueue = QueueAttachment::where('queue_id', $queue->id)->where('attachment_id', $file->id)->exists();
                            if(!$cekAttachmentQueue){
                                $resAttachment =  Http::timeout(10)->withHeaders([
                                    'Content-Type' => 'application/json',
                                    'authorization' => $queue->message->whatsapp->apikey
                                ])
                                    ->asJson()
                                    ->post($whatsappUrl . '/send-media', [
                                        'number' => $queue->phone,
                                        'url' => url('storage') . '/' . ($file->url),
                                    ])->throw();

                                    if($resAttachment->status() ==  200){
                                        QueueAttachment::updateOrCreate([
                                            ['queue_id' => $queue->id, 'attachment_id' => $file->id], 
                                            ['queue_id' => $queue->id, 'attachment_id' => $file->id], 
                                        ]);
                                    }
                            }
                        
                        }

                        sleep($queue->message->duration ?? 5);
                        $responsMessage = Http::timeout(10)->withHeaders([
                            'Content-Type' => 'application/json',
                            'authorization' => $queue->message->whatsapp->apikey
                        ])
                            ->asJson()
                            ->post($whatsappUrl . '/send-message', [
                                'number' => $queue->phone,
                                'message' => $queue->message->message
                        ]);
                        (new BotTelegram)->info($responsMessage->status());
                        
                        if ($responsMessage->status() == 200) {
                            $queue->update([
                                'status'  => 'success',
                                'response' => $responsMessage->body()
                            ]);
                        } else {
                            $queue->update([
                                'status' => 'failed',
                                'response' => $responsMessage->body()
                            ]);
                        }

                # code...
            }
                    
            
    }
}
