<?php

namespace App\Http\Resources\Order;

use App\Models\Bank;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public function __construct($resource, public $product)
    {
        parent::__construct($resource);
    }


    public function toArray($request)
    {
        return [
            'uuid' => $this->uuid,
            'invoice_number' => $this->invoice_number,
            'customer_name' => $this->customer_name,
            'customer_phone' => $this->customer_phone,
            'customer_address' => $this->customer_address,
            'total' => $this->total,
            'total_amount' => $this->total_amount,
            'status' => $this->status,
            'expired_at' => $this->expired_at,
            'paid_at' => $this->paid_at,
            'approve_by' => $this->approve_by,
            'shipping_province_name' => $this->shipping_province_name,
            'shipping_city_name' => $this->shipping_city_name,
            'shipping_subdistrict_name' => $this->shipping_subdistrict_name,
            'shipping_subdistrict_id' => $this->shipping_subdistrict_id,
            'shipping_expedition' => $this->shipping_expedition,
            'shipping_fee' => $this->shipping_fee,
            'image' => $this->product ? asset('storage/' . $this->product) : null,
            'bank' => Bank::query()->where('is_active', 1)->get(),
            'order_details' => OrderDetailResource::collection($this->order_detail)
        ];
    }
}
