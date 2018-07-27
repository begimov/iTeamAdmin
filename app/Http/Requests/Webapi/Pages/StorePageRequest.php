<?php

namespace App\Http\Requests\Webapi\Pages;

use Illuminate\Foundation\Http\FormRequest;

class StorePageRequest extends FormRequest
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
            'description' => 'required|string',
            'category_id' => 'required|numeric|exists:categories,id',
            'elements' => 'required|array',
            'slug' => 'required|string|unique:pages,slug' . ",{$this->page}"
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
            'name.required' => trans('validation.store-page-request.name.required'),
            'desc.required' => trans('validation.store-page-request.desc.required'),
            'category.required' => trans('validation.store-page-request.categoryId.required'),
            'elements.required' => trans('validation.store-page-request.elements.required'),
            'slug.unique' => trans('validation.store-page-request.slug.unique'),
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge(['slug' => \Slugify::slugify($this->name)]);
    }
}
