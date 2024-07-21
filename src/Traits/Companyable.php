<?php

namespace IntraCompany\Commons\Traits;

use IntraCompany\Commons\Models\Company;

trait Companyable
{
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
