<?php

namespace DuxDucisArsen\Commons\Traits;

use DuxDucisArsen\Commons\Models\Currency;

trait Currencyable
{

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

}
