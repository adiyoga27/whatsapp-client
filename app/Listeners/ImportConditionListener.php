<?php

namespace App\Listeners;

use App\Events\ImportCondition;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ImportConditionListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(ImportCondition $event)
    {
        $phone_number = $event->data;

        $phone_number = preg_replace("/[^0-9]/", '', $phone_number);
        $data = substr($phone_number, 0, 2);

        if ($data == '62') {
            $phone_number = substr_replace($phone_number, '0', 0, 2);
        }
        if ($data !== '62') {
            if ($data !== '08') {
                $phone_number = '0' . $phone_number;
            }
        }

        return $phone_number;
    }
}
