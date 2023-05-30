<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

class BotTelegram extends Controller
{
    public function info($message)
    {

        $messages = "\n\nApp : " . config('app.name');
        $messages .= "\nDate : " . Carbon::now();
        $messages .= "\nMessage :" . $message;

        Log::channel('telegram')->info($messages);
    }

    public function error(Throwable $th)
    {
        $messages = "\n\nApp : " . config('app.name');
        $messages .= "\nDate : " . Carbon::now();
        $messages .= "\n\nDetail Error :";
        $messages .= "\n--------------";
        $messages .= "\nMessage :" . $th->getMessage();
        $messages .= "\nLine :" . $th->getLine();

        Log::channel('telegram')->error($messages);
    }
}
