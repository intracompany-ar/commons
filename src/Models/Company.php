<?php

namespace IntraCompany\Commons\Models;

use IntraCompany\Commons\Traits\IdentificationClassable;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use IdentificationClassable;

    public $timestamps = false;

    protected $guarded = ['id'];

}