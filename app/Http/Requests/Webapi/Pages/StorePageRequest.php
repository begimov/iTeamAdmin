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
            'desc' => 'required|string',
            'categoryId' => 'required|numeric|exists:categories,id',
            'elements' => 'required|array',
        ];
    }
}
