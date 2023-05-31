<?php

namespace App\Listeners;

use App\Events\sendWhatsAppMessage;
use App\Models\Profile;
use App\Models\Whatsapp;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Http;

class sendWhatsAppMessageListener
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
    public function handle(sendWhatsAppMessage $event)
    {
        $whatsapp = Whatsapp::first();
        $bank = $event->bank;
        $data = $event->order;
        $profile = Profile::query()->first();

        $bank_section = [];
        foreach ($bank as $item) {
            $bank_section[] = $item->account_name . ' - ' . $item->account_number . ' - ' . $item->name;
        }

        $orderDetail = [];

        foreach ($data->order_detail as $item) {
            $orderDetail[] = '- ' . $item->product_name . ' x ' . $item->quantity . ' Rp. ' . number_format($item->price, 2);
        }

        Http::withHeaders([
            'Content-Type' => 'application/json',
        ])
            ->asJson()
            ->post('https://wabot.galkasoft.id:7991/send-message', [
                'number' => $data->customer_phone,
                'message' => 'Semangat Pagi,
Hai, Berikut kami kirimkan data pembelanjaan anda :
No Invoice : ' . $data->invoice_number . '
Nama : ' . $data->customer_name . '
Telepon : ' . $data->customer_phone . '
Alamat : ' . $data->customer_address . '

Detail Pembelanjaan :
' . implode('
', $orderDetail) . '
Total : Rp. ' . number_format($data->total, 2) . '
Ongkir : Rp. ' . number_format($data->shipping_fee, 2) . '
Total Pembayaran : Rp. ' . number_format($data->total_amount, 2) . '

Pembayaran invoice anda sebesar  Rp. ' . number_format($data->total_amount, 2) . ',  silahkan transfer pada rekening dibawah ini :
' . implode('
', $bank_section) . '

Jika transfer sudah di lakukan, silahkan kirim bukti pembayaran pada kami melalui kontak dibawah ini.

Kontak:
Admin : ' . $profile->whatsapp . '

Terimkasih telah berbelanja🙏

Detail Invoice:
' . url("invoice/" . $data->uuid)
            ]);
    }
}
