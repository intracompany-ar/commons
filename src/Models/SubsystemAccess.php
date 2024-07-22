<?php

namespace IntraCompany\Commons\Models;

use Illuminate\Database\Eloquent\Model;
use IntraCompany\Commons\Models\Subsystem;
use IntraCompany\Commons\Models\User;

class SubsystemAccess extends Model
{
    protected $guarded = ['id'];

    /**
     * Relationships
     */
    public function subsystem()
    {
        return $this->belongsTo(Subsystem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}