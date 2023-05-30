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
                    $val =  url('storage').'/'.$file->url;
                } elseif ($file->type == 'videos') {
                    $fileType = 'video';
                    // $val = 'https://rr4---sn-npoe7ns7.googlevideo.com/videoplayback?expire=1676554079&ei=_trtY_u-O6KDvdIPqI2p0As&ip=143.244.54.120&id=o-AMDJX9R2M4xGIhllLdyz1YRMOm1YNcBbAW_tkL4EY1Cw&itag=18&source=youtube&requiressl=yes&spc=H3gIhm1kVa-mp0JC6WCd4NYFfpTOSZM&vprv=1&mime=video%2Fmp4&ns=2uQ7rGqwelno2hDA29UUMnQL&cnr=14&ratebypass=yes&dur=205.357&lmt=1665524362101341&fexp=24007246&c=WEB&txp=5538434&n=LLCP5GyItW-KlA&sparams=expire%2Cei%2Cip%2Cid%2Citag%2Csource%2Crequiressl%2Cspc%2Cvprv%2Cmime%2Cns%2Ccnr%2Cratebypass%2Cdur%2Clmt&sig=AOq0QJ8wRQIgc9h_YinhQyR7FgWI5cOJ9ZaeQQBqhWF_4WCxlwg00q8CIQCeIFNOocYGxagHfelnQKsaix_iZTMX3YmKoVbD3EQztA%3D%3D&rm=sn-c0qs776&req_id=6ddb409d621fa3ee&ipbypass=yes&redirect_counter=2&cm2rm=sn-jcopn2-q2ns7e&cms_redirect=yes&cmsv=e&mh=T8&mip=101.128.99.153&mm=29&mn=sn-npoe7ns7&ms=rdu&mt=1676531827&mv=m&mvi=4&pl=24&lsparams=ipbypass,mh,mip,mm,mn,ms,mv,mvi,pl&lsig=AG3C_xAwRAIgHNYA-UcdRTLursozFbNj_NSx2xV7n1zudrlT0l21B1ICIHE3n0kqOtAsazeX22IHdWj8NZ5Fu8z-c4EAUOZuzJ9j';
                    $val =  url('storage').'/'.$file->url;
                } elseif ($file->type == 'file') {
                    $fileType = 'file';
                    // $val = "http://eprints.uny.ac.id/62836/2/BAB%202.pdf";
                    $val =  url('storage').'/'.$file->url;
                }

                $response =  Http::timeout(10)->withHeaders([
                    'Content-Type' => 'application/json',
                ])
                    ->asJson()
                    ->post($whatsapp->url . '/v2/send-media', [
                        'number' => $queue->phone,
                        'message' => ' ',
                        'filetype' => $fileType,
                        'url' => url('storage') . '/' . ($file->url),
                        // 'url' => $val
                    ]);
                    dd($response);
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
