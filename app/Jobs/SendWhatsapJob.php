<?php

namespace App\Jobs;

use App\Http\Controllers\BotTelegram;
use App\Models\QueueMessage;
use App\Models\Whatsapp;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class SendWhatsapJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(protected $queueID)
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
        $whatsapp = Whatsapp::first();
        $queue = QueueMessage::where('id', $this->queueID)->first();

        try {
            foreach ($queue->files as $file) {
                //  (new BotTelegram)->info('collection'.$file->type);
                sleep($queue->message->duration ?? 5);

                if ($file->type == 'images') {

                    $fileType = 'image';
                } elseif ($file->type == 'videos') {
                    $fileType = 'video';
                } elseif ($file->type == 'file') {
                    $fileType = 'file';
                }

                $response =  Http::timeout(10)->withHeaders([
                    'Content-Type' => 'application/json',
                ])
                    ->asJson()
                    ->post($whatsapp->url . '/v2/send-media', [
                        'number' => $queue->phone,
                        'message' => ' ',
                        'filetype' => $fileType,
                        // 'url' => url('storage') . '/' . ($file->url),
                        'url' => 'https://saddannusantara.com/Pamflet-Susunan-Acara-Alur-Acara-dan-ZOO-Map-VSD.pdf'
                    ]);
            }


            sleep($queue->message->duration ?? 5);

            $responsMessage = Http::timeout(10)->withHeaders([
                'Content-Type' => 'application/json',
            ])
                ->asJson()
                ->post($whatsapp->url . '/v2/send-message', [
                    'number' => $queue->phone,
                    'message' => $queue->message->message
                ]);

            if ($responsMessage->status() == 200) {
                $queue->update([
                    'status'  => 'success',
                    'response' => $responsMessage->body()
                ]);
            } elseif ($responsMessage->status() == 400) {
                $queue->update([
                    'status' => 'failed',
                    'response' => [
                        'status' => 400,
                        'message' => $queue->message->message
                    ]
                ]);
            }
        } catch (\Throwable $th) {
            $queue->update([
                'status' => 'failed',
                'response' => [
                    'status' => 400,
                    'message' => $th->getMessage()
                ]
            ]);
            (new BotTelegram)->error($th);
        }
    }
}
