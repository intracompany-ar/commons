<?php

namespace IntraCompany\Commons\Models;
use Illuminate\Database\Eloquent\Model;

class Subsystem extends Model
{
    public $timestamps = false;

    protected $guarded = ['id'];


    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}