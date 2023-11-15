<?php

namespace DuxDucisArsen\Commons\Traits;

use DuxDucisArsen\Commons\Models\VoucherClass;

trait VoucherClassable
{
    public function voucherClass()
    {
        return $this->belongsTo(VoucherClass::class);
    }
}
