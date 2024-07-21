<?php

namespace IntraCompany\Commons\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use IntraCompany\Commons\Traits\UserRoles;

class User extends Authenticatable
{
    use UserRoles;

    // La que le dio origen
    public function applications(): BelongsToMany
    {
        return $this->belongsToMany(Application::class, 'user_applications');
    }

}