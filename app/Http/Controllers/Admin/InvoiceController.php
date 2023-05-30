<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Profile;
use App\Models\Store;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function invoice($id)
    {
        $order = Order::query()->with('order_detail')->where('uuid', $id)->first();
        $store = Store::query()->first();
        $profile = Profile::query()->first();

        return view('admin.PDF.invoice', compact(
            'order',
            'store',
            'profile'
        ));
    }
}
