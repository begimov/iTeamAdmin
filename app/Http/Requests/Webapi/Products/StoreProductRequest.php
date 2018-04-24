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
            'name' => 'required|string',
            'category.id' => 'required|numeric|exists:categories,id',
            'basePrice' => 'required|numeric',
            'materials' => 'required|array',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => trans('validation.store-product-request.name.required'),
            'category.id.required' => trans('validation.store-product-request.category-id.required'),
            'basePrice.required' => trans('validation.store-product-request.base-price.required'),
            'basePrice.numeric' => trans('validation.store-product-request.base-price.numeric'),
            'materials.required' => trans('validation.store-product-request.materials.required'),
        ];
    }
}
