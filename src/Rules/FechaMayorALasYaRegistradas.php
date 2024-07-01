<?php

namespace IntraCompany\Commons\Rules;

use Illuminate\Contracts\Validation\Rule;

use Illuminate\Support\Facades\DB;

class FechaMayorALasYaRegistradas implements Rule
{

    private $maxFechaRegistrada = null;

    /**ind
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($table, $columnDate, $idToIgnore = null)
    {
        $this->maxFechaRegistrada = DB::table($table)   
                                    ->select( $columnDate )
                                    ->when( $idToIgnore, function($q) use ($idToIgnore){
                                        $q->where('id', '<>', $idToIgnore);
                                    })
                                    ->max( $columnDate );
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

        if ( $this->maxFechaRegistrada ) {
            return $value > $this->maxFechaRegistrada;
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
        return 'La fecha debe ser superior a las ya registradas.';
    }
}
