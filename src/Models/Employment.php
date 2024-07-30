<?php

namespace IntraCompany\Commons\Models;

use IntraCompany\Commons\Traits\Companyable;
use IntraCompany\Commons\Traits\CreatedByCreatingEvent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Son empleos, una persona puede tener n empleos en diferentes entity_id, o haberse ido y luego refresado a la misma empresa
 */
class Employment extends Model
{
    use Companyable, CreatedByCreatingEvent, SoftDeletes;

    protected $guarded = ['id'];

    
    
    /**
     * SUCURSALES
     */
    public function sucursalActual(): BelongsTo
    {
        return $this->belongsTo(Sucursal::class, 'sucursal_actual_id');
    }

    public function sucursales(): BelongsToMany
    {
        return $this->belongsToMany(Sucursal::class, 'employment_sucursals');
    }

}