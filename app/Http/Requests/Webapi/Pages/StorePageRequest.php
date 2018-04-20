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
            'page.data.name' => 'required|string',
            'page.data.desc' => 'required|string',
            'page.data.categoryId' => 'required|numeric|exists:categories,id',
            'page.elements' => 'required|array',
        ];
    }
}
