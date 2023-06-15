<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QueueMessageResource extends JsonResource
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
            'phone' => $this->phone,
            'name' => $this->name,
            'status' => $this->status,
            'response' => $this->response->message ?? "-",
        ];
    }
}
