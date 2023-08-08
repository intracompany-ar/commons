<?php

namespace DuxDucisArsen\Commons\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CurrencyRequest extends FormRequest
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
    public function rules(Request $request): array
    {
        return [
            'cod' => [
                'required',
                'string',
                'max:4',
                Rule::unique('currencies')->ignore($request->id),
            ],
            'name' => 'required|string|max:50',
            'symbol' => 'nullable|string|max:50',
            'currency_cx_id' => 'nullable|integer|max:999999',
        ];
    }
}
