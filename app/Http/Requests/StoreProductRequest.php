<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'max:50'],
            'category_id' => ['required', 'numeric'],
            'variant_id' => ['sometimes', 'numeric'],
            'price' => ['required', 'integer'],
            'description' => ['required', 'string'],
            'is_active' => ['required', 'boolean'],
            'image' => ['required', 'max:1024', 'image', 'mimes:png,jpg,jpeg'],
            'keyword' => ['required', 'max:255', 'string'],
            'slug' => ['string', 'sometimes'],
            'variant_name' => ['required', 'string']
        ];
    }
}
