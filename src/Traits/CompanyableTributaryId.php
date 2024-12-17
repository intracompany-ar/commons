<?php

namespace IntraCompany\Commons\Traits;

use IntraCompany\Commons\Models\Company;

trait CompanyableTributaryId
{
    public function company()
    {
        return $this->belongsTo(Company::class, 'tributary_id', 'tributary_id');
    }
}
