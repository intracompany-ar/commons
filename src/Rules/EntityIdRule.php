<?php

namespace IntraCompany\Commons\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class EntityIdRule implements ValidationRule
{
    const MAX_DU = 80999999;

    const MIN_DU = 1000000;

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! $this->isEntityId($value) && ! $this->isDocumentoUnico($value)) {
            $fail('Documento inválido. No es una CUIT ni un DU');
        }
    }

    public function isEntityId($entity_idConSimbolos)
    {

        $entity_idSoloNumeros = preg_replace('/[^0-9-]/', '', $entity_idConSimbolos);
        $entity_idSoloNumerosString = (string) $entity_idSoloNumeros;

        // Validación Longitud
        if (strlen($entity_idSoloNumerosString) != 11) {
            return false;
        }

        // Validación Base 11
        $arrayDigitos = str_split($entity_idSoloNumerosString, 1);
        $verificador = $arrayDigitos[10];
        $xyInicial = $arrayDigitos[0].$arrayDigitos[1];
        $multiplicadores = [5, 4, 3, 2, 7, 6, 5, 4, 3, 2];

        // Calculo combinación lineal
        $combinacionLineal = 0;
        foreach ($multiplicadores as $key => $multiplicador) {
            $combinacionLineal += $multiplicador * $arrayDigitos[$key];
        }
        $resto = $combinacionLineal % 11;

        if (11 - $resto == 10) { // Implica que el verificador es 10, y solo pueden tener 1 digito => se cambia el xy incial
            switch ($xyInicial) {
                case '20':
                case '30':
                    return $verificador == 9;
                case '27':
                    return $verificador == 4;
                default:
                    return $verificador == 11 - $resto;
            }
        } elseif (11 - $resto == 11) {
            return $verificador == 0;
        } else {
            return $verificador == 11 - $resto;
        }
    }

    public function isDocumentoUnico($duConSimbolos)
    {
        $duSoloNumeros = preg_replace('/[^0-9-]/', '', $duConSimbolos);
        $du = $duSoloNumeros;

        if ($duSoloNumeros > self::MAX_DU || $duSoloNumeros < self::MIN_DU) {
            return false;
        }

        return true;
    }
}
