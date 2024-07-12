<?php

namespace IntraCompany\Commons\Traits;

use App\Models\ManagementControl\Company;

trait CompanyableEntity
{
    public function company()
    {
        return $this->belongsTo(Company::class, 'entity_id', 'entity_id');
    }
}
