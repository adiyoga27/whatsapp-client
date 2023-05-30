<?php

namespace App\Http\Resources;

use App\Models\Expedition;
use App\Models\StoreExpedition;
use Illuminate\Http\Resources\Json\JsonResource;

class StoreResource extends JsonResource
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
            "provice_id" => $this->provice_id,
            "province_name" => $this->province_name,
            "city_id" => $this->city_id,
            "city_name" => $this->city_name,
            "subdistrict_id" => $this->subdistrict_id,
            "subdistrict_name" => $this->subdistrict_name,
            'take_to_store' => $this->take_to_store,
            "store_address" => $this->store_address,
            'expedition_id' => StoreExpedition::query()->pluck('expedition_id')->all(),
            "expedition" => ExpeditionResource::collection($this->expedition),
        ];
    }
}
