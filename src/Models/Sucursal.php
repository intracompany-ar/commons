<?php

namespace IntraCompany\Commons\Models;

use Illuminate\Database\Eloquent\Model;
use IntraCompany\Commons\Traits\Companyable;
use IntraCompany\Geography\Models\City;

class Sucursal extends Model
{
    use Companyable;

    public $table = 'sucursales';

    public $timestamps = false;

    protected $guarded = ['id', 'suc_cx_id']; // suc_cx_id es generada

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}