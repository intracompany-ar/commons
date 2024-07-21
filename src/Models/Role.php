<?php

namespace IntraCompany\Commons\Models;

use App\Models\Subsystem;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = ['id'];

    public $timestamps = false;

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function subsystems()
    {
        return $this->belongsToMany(Subsystem::class);
    }
}
