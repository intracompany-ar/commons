<?php

namespace IntraCompany\Commons\Models;
use Illuminate\Database\Eloquent\Model;

class Subsystem extends Model
{
    public $timestamps = false;

    protected $guarded = ['id'];

    const ALL_ROLES_CAN_USE_IDS = [37, 33, 68];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}