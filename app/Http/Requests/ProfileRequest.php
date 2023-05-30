<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'web_name' => ['required', 'max:255', 'string'],
            'store_address' => ['required', 'max:255', 'string'],
            // 'maps' => ['required', 'max:255', 'string'],
            'email' => ['required', 'email'],
            'phone_cs_1' => ['required', 'max:20'],
            'whatsapp' => ['required', 'max:20'],
            'logo' => ['nullable', 'max:1024', 'image', 'mimes:png,jpg'],
            'sub_web_name' => ['required', 'max:50'],
            'template' => ['required'],
            'section_name_3' => ['required', 'string'],
            'section_title_3' => ['required', 'string'],
            'section_description_3' => ['required', 'string'],
            'section1_img' => ['nullable', 'image', 'mimes:png,jpg', 'max:1024'],
            'image1' => ['nullable', 'image', 'mimes:png,jpg', 'max:1024'],
            'image2' => ['nullable', 'image', 'mimes:png,jpg', 'max:1024'],
            'image3' => ['nullable', 'image', 'mimes:png,jpg', 'max:1024'],
            'tagline_section' => ['nullable', 'max:255'],
            'notif' => ['nullable', 'string'],
            'tagline_img' => ['nullable'],
        ];
    }
}
