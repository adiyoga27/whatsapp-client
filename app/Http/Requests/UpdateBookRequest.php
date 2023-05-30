<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
            'category_id' => ['sometimes', 'integer'],
            'title' => ['sometimes', 'string', 'max:255'],
            'price' => ['sometimes', 'integer'],
            'description' => ['sometimes'],
            'is_active' => ['integer', 'sometimes'],
            'image' => ['sometimes', 'max:1024', 'image', 'mimes:png,jpg,jpeg']
        ];
    }

    public function messages()
    {
        return [
            'is_active' => [
                'required' => 'This field is required'
            ]
        ];
    }
}
