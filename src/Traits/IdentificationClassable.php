<?php

namespace DuxDucisArsen\Commons\Traits;

use DuxDucisArsen\Commons\Models\IdentificationClass;

trait IdentificationClassable
{

    public function identificationClass()
    {
        return $this->belongsTo(IdentificationClass::class);
    }
}
