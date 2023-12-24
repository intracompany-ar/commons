<?php

namespace DuxDucisArsen\Commons\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ConceptoRequest extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            'id_cx' => 'nullable|integer',
            'name' => [
                'required',
                'string',
                'max:64',
                Rule::unique('conceptos')->ignore($request->id), //Agrego esto porque uso el mismo request para editar y crear. Si edito da error porque esos datos ya existen
            ],
        ];
    }
}
