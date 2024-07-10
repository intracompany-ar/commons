<?php

namespace IntraCompany\Commons\Traits;

use App\Models\ManagementControl\Company;

trait Companyable
{
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
