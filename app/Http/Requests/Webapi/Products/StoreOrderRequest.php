<?php

namespace App\Http\Requests\Webapi\Products;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'product_id' => 'required|numeric|exists:products,id',
            'payment_type_id' => 'required|numeric|exists:payment_types,id',
            'payment_state_id' => 'required|numeric|exists:payment_states,id',
            'price' => 'required|numeric',
            'user_id' => 'required|numeric|exists:users,id',
        ];
    }
}
