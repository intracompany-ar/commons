<?php

namespace IntraCompany\Commons\Traits;

use IntraCompany\Commons\Models\VoucherClass;

trait VoucherClassable
{
    public function voucherClass()
    {
        return $this->belongsTo(VoucherClass::class);
    }
}
