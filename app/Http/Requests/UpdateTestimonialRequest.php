<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTestimonialRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:50'],
            'phone' => ['required', 'string'],
            'rate_star' => ['required', 'integer', 'max:5'],
            'description' => ['required'],
            'photo' => ['sometimes', 'mimes:png,jpg,jpeg', 'image'],
            'is_active' => ['required'],
        ];
    }
}
