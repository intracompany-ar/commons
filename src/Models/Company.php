<?php

namespace IntraCompany\Commons\Models;

use IntraCompany\Commons\Traits\IdentificationClassable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use IntraCompany\Geography\Models\City;

class Company extends Model
{
    use IdentificationClassable;

    public $timestamps = false;

    protected $guarded = ['id'];

    public function condicionIva(): BelongsTo
    {
        return $this->belongsTo(CondicionIva::class);
    }
    
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

}