<?php

namespace IntraCompany\Commons\Traits;

use IntraCompany\Commons\Models\IdentificationClass;

trait IdentificationClassableCx
{
    public function identificationClass()
    {
        return $this->belongsTo(IdentificationClass::class, 'IdTipoDoc', 'IdTipoDocumento_CX');
    }
}
