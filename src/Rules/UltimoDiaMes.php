<?php

namespace IntraCompany\Commons\Rules;

use Illuminate\Contracts\Validation\Rule;
use Carbon\Carbon;

class UltimoDiaMes implements Rule
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
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $fecha = Carbon::parse($value);
        $mes = $fecha->month;
        $dia = $fecha->day;
        $fecha->isLeapYear();// año bisiesto
        switch($mes){
            case 11:
            case 9:
            case 6:
            case 4:
                $ultimo_dia = 30;
                break;
            case 2:
                $ultimo_dia = $fecha->isLeapYear() ? 29 : 28;
                break;
            default:
                $ultimo_dia = 31;
        }
        return $ultimo_dia === $dia;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Elija el último día del mes en el campo " :attribute ".';
    }
}
