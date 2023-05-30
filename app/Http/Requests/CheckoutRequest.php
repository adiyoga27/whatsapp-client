<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            "customer_phone" => ['required', 'string', 'max:20'],
            "shipping" => ['array', 'min:1', 'required'],
            'shipping.province' => ['required', 'numeric'],
            'shipping.city' => ['required', 'numeric'],
            'shipping.subdistrict' => ['required', 'numeric'],
            'shipping.address' => ['required', 'max:255', 'string'],
            'shipping.courir' => ['required',  'string'],
            'shipping.fee' => ['required', 'integer'],
            'orders_details' =>  ['array', 'min:1', 'required'],
            'orders_details.*.product_variant_id' => ['required', 'numeric'],
            'orders_details.*.quantity' => ['required', 'integer'],
            'orders_details.*.note' => ['sometimes'],

        ];
    }
}
