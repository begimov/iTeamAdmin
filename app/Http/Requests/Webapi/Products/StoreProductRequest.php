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
            'category_id' => 'required|numeric|exists:categories,id',
            'price' => 'required|numeric',
            'materials' => 'required|array',
            'priceTags' => 'array',
            'priceTags.*.price' => 'numeric',
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
            'category_id.required' => trans('validation.store-product-request.category-id.required'),
            'price.required' => trans('validation.store-product-request.base-price.required'),
            'price.numeric' => trans('validation.store-product-request.base-price.numeric'),
            'materials.required' => trans('validation.store-product-request.materials.required'),
        ];
    }
}
