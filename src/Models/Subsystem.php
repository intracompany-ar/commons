<?php

namespace IntraCompany\Commons\Models;

use Illuminate\Database\Eloquent\Model;

class Subsystem extends Model
{
    public $timestamps = false;

    protected $guarded = ['id'];

    const IDS_PUBLIC_SYSTEMS = [37, 33, 68];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    

    public function companyDepartment()
    {
        return $this->belongsTo(CompanyDepartment::class);
    }
}