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
            'product' => 'required|array',
            'paymentType' => 'array',
            'paymentState' => 'required|array',
            'orderPrice' => 'required|numeric',

            'email' => 'required|array',
            'name' => 'required|array',
            'phone' => 'array',

            'businessEntity' => 'required|array',
            'company' => 'array',
            'comment' => 'array',
        ];
    }
}
