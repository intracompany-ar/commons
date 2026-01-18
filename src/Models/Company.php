<?php

namespace IntraCompany\Commons\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Company extends Model
{
    public $timestamps = false;

    protected $guarded = ['id'];

    public $appends = ['nro_doc_guiones'];

    public function nroDocGuiones(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => isset($attributes['tributary_id']) ? (strlen($attributes['tributary_id']) == 11
                ?
                substr($attributes['tributary_id'], 0, 2).'-'.
                substr($attributes['tributary_id'], 2, 8).'-'.
                substr($attributes['tributary_id'], 10, 1)
                :
                $attributes['tributary_id']
            ) : null
        );
    }


    public function condicionIva(): BelongsTo
    {
        return $this->belongsTo(CondicionIva::class);
    }
}