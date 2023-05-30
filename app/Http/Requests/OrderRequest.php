<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            "customer_name" => ['required', 'string', 'max:255'],
            "customer_phone" => ['required'],
            "customer_address" => ['required', 'string', 'max:255'],
            "total" => ['required'],
            "status" => ['required'],
            "product_variant_id" => ['required', 'numeric'],
            'price' => ['required', 'integer'],
            'product_name' => ['required', 'string'],
            "quantity" => ['required', 'integer'],
            "note" => ['required', 'string'],
        ];
    }
}
