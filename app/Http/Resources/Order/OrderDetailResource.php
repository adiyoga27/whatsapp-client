<?php

namespace App\Http\Resources\Order;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'product_name' => $this->product_name,
            'price' => $this->price,
            'product_variant' => $this->product_variant,
            'product_name' => $this->product_name,
            'quantity' => $this->quantity,
            'total' => $this->total,
            'note' => $this->note
        ];
    }
}
