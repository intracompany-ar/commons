<?php

namespace IntraCompany\Commons\Models;

use IntraCompany\Commons\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Person extends Model
{
    use CreatedBy;

    protected $guarded = ['id'];

    public $table = 'persons';

    /**
     * Toma el último empleo del empleado. Reemplaza a employment()
     */
    public function lastEmployment(): HasOne
    {
        return $this->hasOne(Employment::class, 'entity_id', 'entity_id')->latest('fecha_alta');
    }

    /**
     * Tiene o tuvo en el pasado algún empleo
     */
    public function hasEmployment()
    {
        return $this->lastEmployment()->first() ? true : false;
    }

}