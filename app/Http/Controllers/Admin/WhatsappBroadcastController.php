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
            ->update(['status' => 'progress']);


        // $message = Message::query()->find($message_id);
        // $files = AttachmentMessage::query()->where('message_id', $message_id)->get();


        // foreach ($queues as $queue) {
        //     if ($queue->status != 'success') {

        //         foreach ($files as $file) {
        //             try {
        //                 if ($file->type === 'images') {
        //                     $fileType = 'image';
        //                     $val = 'https://downloadr2.apkmirror.com/wp-content/uploads/2023/02/36/63e5212ce0a7b.png';
        //                 } elseif ($file->type === 'videos') {
        //                     $fileType = 'video';
        //                     $val = 'https://rr4---sn-npoe7ns7.googlevideo.com/videoplayback?expire=1676554079&ei=_trtY_u-O6KDvdIPqI2p0As&ip=143.244.54.120&id=o-AMDJX9R2M4xGIhllLdyz1YRMOm1YNcBbAW_tkL4EY1Cw&itag=18&source=youtube&requiressl=yes&spc=H3gIhm1kVa-mp0JC6WCd4NYFfpTOSZM&vprv=1&mime=video%2Fmp4&ns=2uQ7rGqwelno2hDA29UUMnQL&cnr=14&ratebypass=yes&dur=205.357&lmt=1665524362101341&fexp=24007246&c=WEB&txp=5538434&n=LLCP5GyItW-KlA&sparams=expire%2Cei%2Cip%2Cid%2Citag%2Csource%2Crequiressl%2Cspc%2Cvprv%2Cmime%2Cns%2Ccnr%2Cratebypass%2Cdur%2Clmt&sig=AOq0QJ8wRQIgc9h_YinhQyR7FgWI5cOJ9ZaeQQBqhWF_4WCxlwg00q8CIQCeIFNOocYGxagHfelnQKsaix_iZTMX3YmKoVbD3EQztA%3D%3D&rm=sn-c0qs776&req_id=6ddb409d621fa3ee&ipbypass=yes&redirect_counter=2&cm2rm=sn-jcopn2-q2ns7e&cms_redirect=yes&cmsv=e&mh=T8&mip=101.128.99.153&mm=29&mn=sn-npoe7ns7&ms=rdu&mt=1676531827&mv=m&mvi=4&pl=24&lsparams=ipbypass,mh,mip,mm,mn,ms,mv,mvi,pl&lsig=AG3C_xAwRAIgHNYA-UcdRTLursozFbNj_NSx2xV7n1zudrlT0l21B1ICIHE3n0kqOtAsazeX22IHdWj8NZ5Fu8z-c4EAUOZuzJ9j';
        //                 } elseif ($file->type === 'file') {
        //                     $fileType = 'file';
        //                     $val = "http://eprints.uny.ac.id/62836/2/BAB%202.pdf";
        //                 }

        //                 Http::timeout($message->duration)->withHeaders([
        //                     'Content-Type' => 'application/json',
        //                 ])
        //                     ->asJson()
        //                     ->post('https://wabot.galkasoft.id:3006/v2/send-media', [
        //                         'number' => $queue->phone,
        //                         'message' => 'test',
        //                         'filetype' => $fileType,
        //                         // 'url' => asset('storage/' . $file->url),
        //                         'url' => $val
        //                     ]);
        //             } catch (\Throwable $th) {
        //             }
        //         }
        //         try {
        //             $responsMessage = Http::timeout($message->duration)->withHeaders([
        //                 'Content-Type' => 'application/json',
        //             ])
        //                 ->asJson()
        //                 ->post('https://wabot.galkasoft.id:3006/v2/send-message', [
        //                     'number' => $queue->phone,
        //                     'message' => $message->message
        //                 ]);

        //             $statusUpdate = QueueMessage::query()->find($queue->id);
        //             if ($responsMessage->status() == 200) {
        //                 $statusUpdate->update([
        //                     'status'  => 'success',
        //                     'response' => $responsMessage->body()
        //                 ]);
        //             } elseif ($responsMessage->status() == 400) {
        //                 $statusUpdate->update([
        //                     'status'  => 'failed',
        //                 ]);
        //             }
        //         } catch (\Throwable $th) {
        //         }
        //     }
        // }


        return redirect()->back()->with('success', 'Sending message on progress');
    }
}
