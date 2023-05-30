<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'price' => ['required', 'integer'],
            'description' => ['required'],
            'is_active' => ['required'],
            'image' => ['sometimes', 'image', 'mimes:png,jpg,jpeg', 'max:1024'],
            'keyword' => ['sometimes', 'max:255', 'string'],
            'slug' => ['sometimes'],
            'variant_id' => ['sometimes', 'numeric'],
            'variant_name' => ['required', 'string']

        ];
    }
}
