<?php

namespace App\Http\Controllers\Api;

use App\Events\sendWhatsAppMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Http\Requests\OrderRequest;
use App\Http\Resources\Order\OrderResource;
use App\Http\Resources\OrderDetailResource;
use App\Models\Bank;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\ProductVariant;
use App\Models\Store;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Order $order)
    {
        $status = $request->status;
        $data = $order->query()
            ->with('order_detail')
            ->when($status, function ($query, $status) {
                return $query->where('status', $status);
            })->paginate(10);

        return OrderResource::collection($data)
            ->additional([
                'status' => true,
                'message' => 'success'
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        $data = collect(Bank::query()->where('is_active', true)->get());
        $val = sendWhatsAppMessage::dispatch(OrderDetail::find(2), $data);
        dd($val);
        $payload = $request->validated();

        $dataOrder = Order::query()->create([
            'invoice_number' => '01',
            'customer_name' => $payload['customer_name'],
            'customer_phone' => $payload['customer_phone'],
            'customer_address' => $payload['customer_address'],
            'total' => $payload['total'],
            'status' => $payload['status'],
            'expired_at' => Carbon::now()->addDays(2),
        ]);

        Order::query()->find($dataOrder->id)->update([
            'invoice_number' => 'INV-' . str_pad($dataOrder->id, 8, '0', STR_PAD_LEFT)
        ]);

        $dataDetail = OrderDetail::query()->create([
            'order_id' => $dataOrder->id,
            'product_variant_id' => $payload['product_variant_id'],
            'product_name' => $payload['product_name'],
            'price' => $payload['price'],
            'quantity' => $payload['quantity'],
            'total' => $payload['total'],
            'note' => $payload['note'],
        ]);

        sendWhatsAppMessage::dispatch(OrderDetail::find($dataDetail->id), $data);

        return (new OrderDetailResource($dataDetail))
            ->additional([
                'status' => true,
                'message' => 'Success'
            ]);
    }

    public function getCost(Request $request)
    {

        try {
            $store = Store::query()->with('expedition')->first();
            // $store->loadMissing("expedition");

            $response = Http::timeout(5)->post('https://pro.rajaongkir.com/api/cost', [
                'origin' => $store->subdistrict_id,
                'originType' => 'subdistrict',
                'courier' => implode(':', $store->expedition->pluck('code')->toArray()),
                'destination' => $request->destination,
                'destinationType' =>  'subdistrict',
                'weight' => $request->weight,
                'key' => 'd8edd63ffc400ee2f2db662d3ff788ed'
            ]);
            $body = $response->json();

            $data = [];
            if ($store->take_to_store) {
                $data[] = [
                    'service_id' => 'Ambil di Kantor',
                    'amount' =>  0,
                    'etd' => '-',
                ];
            }
            foreach ($body['rajaongkir']['results'] as $key => $value) {
                foreach ($value['costs'] as $cost) {
                    $data[] = [
                        'service_id' => \strtoupper($value['code']) . " " . $cost['service'],
                        'amount' =>  $cost['cost'][0]['value'],
                        'etd' => $cost['cost'][0]['etd'],
                    ];
                };
            }

            return response()->json([
                'status' => true,
                'message' => 'success',
                'data' => $data
            ]);
        } catch (\Throwable $th) {
            throw $th;
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ]);
        }
    }

    public function checkout(CheckoutRequest $request)
    {

        try {
            DB::beginTransaction();
            $total = 0;
            $total_amount = 0;
            $shippingResponse = Http::timeout(5)->get('https://api-mobile.saddannusantara.com/gsongkir/v2/subdistrict.php?subdistrict=' . $request->shipping['subdistrict'])->json();
            $dataOrder = Order::query()->create([
                'invoice_number' => '01',
                'customer_name' => $request->customer_name,
                'customer_phone' => $request->customer_phone,
                'customer_address' => $request->shipping['address'],
                'shipping_subdistrict_id' => $shippingResponse['data']['subdistrict_id'],
                'shipping_province_name' => $shippingResponse['data']['province'],
                'shipping_city_name' => $shippingResponse['data']['type'] . " " . $shippingResponse['data']['city'],
                'shipping_subdistrict_name' => $shippingResponse['data']['subdistrict_name'],
                'shipping_expedition' => $request->shipping['courir'],
                'shipping_fee' => $request->shipping['fee'],
                'total' => $total,
                'total_amount' => $total_amount,
                'status' => 'pending',
                'expired_at' => Carbon::now()->addDays(2),
                'uuid' => Str::uuid()->toString()
            ]);
            foreach ($request->orders_details as $value) {
                $variant = ProductVariant::where('id', $value['product_variant_id'])->first();

                $price = $variant->price * $value['quantity'];
                $total = $total + $price;
                $total_amount = $total + $request->shipping['fee'];
                $order_detail = OrderDetail::query()->create([
                    'order_id' => $dataOrder->id,
                    'product_variant_id' => $variant->id,
                    'product_name' => $variant->variant->product->name . " " . $variant->name,
                    'price' => $variant->price,
                    'quantity' => $value['quantity'],
                    'total' =>  $variant->price * $value['quantity'],
                    'note' => $value['note'] ?? "-",
                ]);
            }
            Order::query()->find($dataOrder->id)->update([
                'invoice_number' => 'INV-' . str_pad($dataOrder->id, 8, '0', STR_PAD_LEFT),
                'total' => $total,
                'total_amount' => $total_amount
            ]);

            $bank = collect(Bank::query()->where('is_active', true)->get());
            sendWhatsAppMessage::dispatch(Order::query()->with('order_detail')->find($dataOrder->id), $bank);


            DB::commit();
            // return (new OrderResource(Order::where('id', $dataOrder->id)->first()));
            return response()->json([
                'status' => true,
                'message' => 'success',
                'data' => [
                    'uuid' => $dataOrder->uuid
                ]
            ]);
        } catch (\Throwable $th) {
            throw $th;
            DB::rollback();
            return response()->json([
                'status' => false,
                'message' => 'gagal',
            ]);
        }
    }

    public function getInvoice(Request $request)
    {
        $data = Order::query()->with('order_detail')->where('uuid', $request->id)->first();
        $product_variant = ProductVariant::query()->find($data->order_detail[0]->product_variant_id);
        $product = $product_variant->variant->product->image;

        return (new OrderResource($data, $product))
            ->additional([
                'status' => true,
                'message' => 'success'
            ]);
    }
}
