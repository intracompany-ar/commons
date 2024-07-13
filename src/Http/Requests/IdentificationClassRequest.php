<?php

namespace IntraCompany\Commons\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class IdentificationClassRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(Request $request): array
    {
        return [
            'afip_id' => [
                'nullable',
                'integer',
                'min:1',
                'max:32767',
                Rule::unique('identification_classes')->ignore($request->id), //Agrego esto porque uso el mismo request para editar y crear. Si edito da error porque esos datos ya existen
            ],
            'sap_id' => [
                'nullable',
                'string',
                'max:8',
                Rule::unique('identification_classes')->ignore($request->id), //Agrego esto porque uso el mismo request para editar y crear. Si edito da error porque esos datos ya existen
            ],
            'IdTipoDocumento_CX' => [
                'nullable',
                'integer',
                'min:1',
                'max:32767',
                Rule::unique('identification_classes')->ignore($request->id), //Agrego esto porque uso el mismo request para editar y crear. Si edito da error porque esos datos ya existen
            ],

            'name' => 'required|string|max:50',
            'description' => 'nullable|string|max:50',
            'abbreviation' => 'nullable|string|max:6',
        ];
    }
}
