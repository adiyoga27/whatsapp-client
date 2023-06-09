<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'id' => $this->id,
            'category' => $this->product_categories,
            'variant' => $this->variant,
            'name' => $this->name,
            'price' => $this->price,
            'description' => $this->description,
            'is_active' => $this->is_active,
            'created_at' => $this->created_at
        ];
    }
}
