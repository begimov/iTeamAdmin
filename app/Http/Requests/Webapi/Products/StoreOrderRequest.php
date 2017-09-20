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
            'data.product' => 'required|array',
            'data.paymentType' => 'array',
            'data.paymentState' => 'required|array',
            'data.orderPrice' => 'numeric',

            'data.email' => 'required|array',
            'data.name' => 'required|array',
            'data.phone' => 'array',

            'data.businessEntity' => 'required|array',
            'data.company' => 'array',
            'data.comment' => 'array',
        ];
    }
}
