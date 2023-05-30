<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'full_name' => $this->full_name,
            'username' => $this->username,
            'email' => $this->email,
            'level' => $this->level,
            'phone' => $this->phone,
            'whatsapp_access_id' => $this->whatsapp_access_id,
            'email_verified_at' => $this->email_verifued_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
