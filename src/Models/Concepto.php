<?php

namespace DuxDucisArsen\Commons\Models;

use DuxDucisArsen\Commons\Models\VoucherClass;
use Illuminate\Database\Eloquent\Model;

/**
 * De CX, no se de donde viene, si es un estandar contable. Pero sirve para contabilizar comprobantes
 */
class Concepto extends Model
{
    protected $guarded = ['id'];

    public $timestamps = false;

    public function voucherClasses()
    {
        return $this->belongsToMany(VoucherClass::class, 'concepto_voucher_classes', 'concepto_cx_id', 'voucher_class_id', 'id_cx', 'id');
    }
}
