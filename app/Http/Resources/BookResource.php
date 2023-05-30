<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
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
            'title' => ucwords($this->title),
            'category' => $this->BookCategories,
            'price' => intval($this->price),
            'description' => $this->description,
            'image' => asset('storage/'.$this->image),
            'created_at' => $this->created_at
        ];
    }
}
