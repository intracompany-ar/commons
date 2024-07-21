<?php

namespace IntraCompany\Commons\Traits;

use IntraCompany\Commons\Models\User;

trait CreatedBy
{

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

}
