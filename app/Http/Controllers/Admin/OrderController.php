<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(Request $request, Order $order)
    {
        if (isset($request->status)) {
            if ($request->status == 'all') {
                $order = $order->query()
                    ->with('order_detail')
                    ->latest()
                    ->get();
            } else {
                $order = $order->query()
                    ->with('order_detail')
                    ->where('status', $request->status)
                    ->latest()
                    ->get();
            }
        } else {
            $order = $order->query()->with('order_detail')
                ->where('status', 'pending')
                ->latest()
                ->get();
        }

        return view('admin.order.index', compact(
            'order'
        ));
    }

    public function show($id)
    {
        $data = Order::query()->with('order_detail')->where('id', $id)->first();

        return [
            'invoice_number' => $data->invoice_number,
            'customer_name' => $data->customer_name,
            'customer_phone' => $data->customer_phone,
            'customer_address' => $data->customer_address,
            'status' => $data->status,
            'expired_at' => $data->expired_at,
            'paid_at' => $data->paid_at,
            'approve_by' => $data->approve_by,
            'total' => $data->total_amount,
            'order_detail' => $data->order_detail,
        ];
    }

    public function approve(Order $order)
    {
        $order->update([
            'approve_by' => Auth::user()->username,
            'paid_at' => Carbon::now(),
            'status' => 'paid'
        ]);

        return redirect()->back()->with('success', 'The order has been approved');
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->back()->with('success', 'Delete data successfully');
    }

    public function filter(Request $request)
    {
        $order = Order::query()->where('status', $request->status)->with('order_detail')->get();
        dd($order);
    }
}
