<?php

namespace DuxDucisArsen\Commons\Rules;

use Illuminate\Contracts\Validation\Rule;

class CuitRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute  , el nombre del input
     * @param  mixed  $value ,  el cuit pasado
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $cuitConSimbolos = $value;
        $cuitSoloNumeros = preg_replace('/[^0-9-]/', '', $cuitConSimbolos);
        $cuitSoloNumerosString =  (string)$cuitSoloNumeros;

        // Validación Longitud
        if( strlen( $cuitSoloNumerosString ) != 11 )
        {
            return false;
        }

        // Validación Base 11
        $arrayDigitos = str_split( $cuitSoloNumerosString, 1);
        $verificador = $arrayDigitos[10];
        $xyInicial = $arrayDigitos[0].$arrayDigitos[1];
        $multiplicadores = [5,4,3,2,7,6,5,4,3,2];

        // Calculo combinación lineal
        $combinacionLineal = 0;
        foreach ($multiplicadores as $key => $multiplicador) {
            $combinacionLineal += $multiplicador * $arrayDigitos[$key];
        };
        $resto = $combinacionLineal % 11;


        if (11 - $resto == 10) // Implica que el verificador es 10, y solo pueden tener 1 digito => se cambia el xy incial
        {
            switch ($xyInicial) {
                case '20':
                case '30':
                    return $verificador == 9;
                case '27':
                    return $verificador == 4;
                default:
                    return $verificador == 11 - $resto;
            }
        }
        else if( 11 - $resto == 11 )
        {
            return $verificador == 0;
        }
        else
        {
            return $verificador == 11 - $resto;
        };
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Cuit inválido';
    }
}
