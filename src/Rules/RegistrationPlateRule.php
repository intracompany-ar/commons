<?php

namespace IntraCompany\Commons\Rules;

use Illuminate\Contracts\Validation\Rule;

class RegistrationPlateRule implements Rule
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
        $regExpOld = '/^([A-Z]{3})([0-9]{3})?$/';
        $regExpNew = '/^([A-Z]{2})([0-9]{3})([A-Z]{2})$/';
        
        if( !preg_match($regExpOld, $value) && !preg_match($regExpNew, $value) )
        {
            return false;
        };

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Dominio vehículo inválido';
    }
}
