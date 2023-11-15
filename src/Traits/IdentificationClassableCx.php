<?php

namespace DucDucisArsen\Commons\Traits;

use DuxDucisArsen\Commons\Models\IdentificationClass;

trait IdentificationClassableCx
{
    public function identificationClass()
    {
        return $this->belongsTo(IdentificationClass::class, 'IdTipoDoc', 'IdTipoDocumento_CX');
    }
}
