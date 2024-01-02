<?php

namespace DuxDucisArsen\Commons\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class EntityIdRule implements ValidationRule
{
    /**
     * Run the validation rule.
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $entityIdConSimbolos = $value;
        $entityIdSoloNumeros = preg_replace('/[^0-9-]/', '', $entityIdConSimbolos);
        $entityIdSoloNumerosString =  (string)$entityIdSoloNumeros;

        $flagFail = false;

        // Validación Longitud
        if (strlen($entityIdSoloNumerosString) != 11) {
            $fail('Cuit inválida, longitud incorrecta');
            return;
        }

        // Validación Base 11
        $arrayDigitos = str_split($entityIdSoloNumerosString, 1);
        $verificador = $arrayDigitos[10];
        $xyInicial = $arrayDigitos[0] . $arrayDigitos[1];
        $multiplicadores = [5, 4, 3, 2, 7, 6, 5, 4, 3, 2];

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
                    $flagFail = $verificador != 9;
                case '27':
                    $flagFail = $verificador != 4;
                default:
                    $flagFail = $verificador != 11 - $resto;
            }
        } else if (11 - $resto == 11) {
            $flagFail = $verificador != 0;
        } else {
            $flagFail = $verificador != 11 - $resto;
        };

        if ($flagFail) {
            $fail('Cuit inválida');
        }
    }
}
