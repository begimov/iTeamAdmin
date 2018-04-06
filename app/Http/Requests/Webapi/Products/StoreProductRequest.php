<?php

namespace App\Http\Requests\Webapi\Products;

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
     * @return array
     */
    public function rules()
    {
        return [
            'data.name' => 'required|string',
            'data.category.id' => 'required|numeric|exists:categories,id',
            'data.basePrice' => 'required|numeric',
            'data.materials' => 'required|array',
        ];
    }
}