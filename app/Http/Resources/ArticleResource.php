<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
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
            'category' => $this->ArticleCategories,
            'user' => $this->User,
            'title' => ucwords($this->title),
            'image' => $this->image ? asset('storage/' . $this->image) : null,
            'description' => $this->description,
            'is_active' => $this->is_active,
            'created_at' => $this->created_at
        ];
    }
}
