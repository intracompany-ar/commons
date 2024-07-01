<?php

namespace IntraCompany\Commons\Traits;

use IntraCompany\Commons\Models\IdentificationClass;

trait IdentificationClassable
{
    public function identificationClass()
    {
        return $this->belongsTo(IdentificationClass::class);
    }
}
