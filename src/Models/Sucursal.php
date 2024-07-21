<?php

namespace IntraCompany\Commons\Models;

use Illuminate\Database\Eloquent\Model;
use IntraCompany\Commons\Traits\Companyable;

/**
 * migrado parcialmente a api
 */
class Sucursal extends Model
{
    use Companyable;

    public $table = 'sucursales';

    public $timestamps = false;

    protected $guarded = ['id', 'suc_cx_id']; // suc_cx_id es generada

}