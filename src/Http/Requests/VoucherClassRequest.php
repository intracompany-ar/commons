<?php

namespace DuxDucisArsen\Commons\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class VoucherClassRequest extends FormRequest
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
            'afip_id' => "nullable|integer|min:0|max:999999|unique:voucher_classes,afip_id,$request->id,id",

            'IdGrupoComp' => 'nullable|integer',
            'Iguales' => 'nullable|integer',
            'name' => 'required|string|max:50',

            'abbreviation' => 'nullable|string|max:15',
            'subsystem' => 'nullable|string|max:20',

            'afip_suma' => 'nullable|integer|min:-1|max:1',
            'afip_cf_mono_ri' => 'nullable|integer|min:0|max:2',

            'Suma1' => 'nullable|integer|max:1|min:-1',
            'sum_stock' => 'nullable|integer|max:1|min:-1',
            'SumaCaja' => 'nullable|integer|max:1|min:-1',
            'SumaIVAVentas' => 'nullable|integer|max:1|min:-1',
            'SumaIVACompras' => 'nullable|integer|max:1|min:-1',

            'NMaxLin' => 'nullable|integer|max:50|min:0',
            'DuplixDetalle' => 'nullable|string|in:S,N',
            'numeracion_pv' => 'nullable|boolean',

            'voucher_class_anula_id' => 'nullable|integer',
            'EmisionPropia' => 'nullable|string|in:S,N',

        ];
    }
}
