<?php

namespace App\Http\Requests\Webapi\Tests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTestRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'test_type_id' => 'required|exists:test_types,id',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('validation.store-test-request.name.required'),
            'test_type_id.required' => trans('validation.store-test-request.test_type_id.required'),
        ];
    }
}
