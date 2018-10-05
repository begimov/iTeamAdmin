<?php

namespace App\Http\Requests\Webapi\Reviews;

use Illuminate\Foundation\Http\FormRequest;

class StoreReviewRequest extends FormRequest
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
            'quote' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'quote.required' => trans('validation.store-test-request.quote.required'),
        ];
    }
}
