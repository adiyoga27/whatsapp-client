<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
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
            'logo' =>  $this->logo ? asset('storage/' . $this->logo) : null,
            'web_name' => ucwords($this->web_name),
            'store_address' => $this->store_address,
            'maps' => $this->maps,
            'email' => $this->email,
            'phone_cs_1' => $this->phone_cs_1,
            'whatsapp' => $this->whatsapp,
            'is_active' => $this->is_active,
            'web_name' => $this->web_name,
            'sub_web_name' => $this->sub_web_name,
            'template' => $this->template,
            'section_name_3' => $this->section_name_3,
            'section_title_3' => $this->section_title_3,
            'section_description_3' => $this->section_description_3,
            'section1_img' => $this->section1_img,
            'image1' => $this->image1 ? asset('storage/' . $this->image1) : null,
            'image2' => $this->image2 ? asset('storage/' . $this->image2) : null,
            'image3' => $this->image3 ? asset('storage/' . $this->image3) : null,
            'tagline_section' => $this->tagline_section,
            'tagline_img' => $this->tagline_img ? asset('storage/' . $this->tagline_img) : null,
            'notif' => $this->notif
        ];
    }
}
