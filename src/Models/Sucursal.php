<?php

namespace IntraCompany\Commons\Models;

use Illuminate\Database\Eloquent\Model;
use IntraCompany\Commons\Traits\Companyable;

class Sucursal extends Model
{
    use Companyable;

    public $table = 'sucursales';

    public $timestamps = false;

    protected $guarded = ['id'];

}