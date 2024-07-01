<?php

namespace IntraCompany\Commons\Traits;

use IntraCompany\Commons\Models\Currency;

trait Currencyable
{

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

}
