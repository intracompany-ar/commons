<?php

namespace IntraCompany\Commons\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use IntraCompany\Commons\Traits\IdentificationClassable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use IntraCompany\Geography\Models\City;

class Company extends Model
{
    use IdentificationClassable;

    public $timestamps = false;

    protected $guarded = ['id'];

    public $appends = ['nro_doc_guiones'];

    public function nroDocGuiones(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => isset($attributes['entity_id']) ? (strlen($attributes['entity_id']) == 11
                ?
                substr($attributes['entity_id'], 0, 2).'-'.
                substr($attributes['entity_id'], 2, 8).'-'.
                substr($attributes['entity_id'], 10, 1)
                :
                $attributes['entity_id']
            ) : null
        );
    }


    public function condicionIva(): BelongsTo
    {
        return $this->belongsTo(CondicionIva::class);
    }
    
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

}