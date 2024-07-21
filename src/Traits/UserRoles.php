<?php

namespace IntraCompany\Commons\Traits;

use IntraCompany\Commons\Models\Role;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Cache;

trait UserRoles
{
    /**
     * PERMISOS Y ROLES
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }
    
    public function isSuperAdmin(): bool
    {
        return $this->hasRole('SuperAdministrador');
    }

    /**
     * @param  string  $role
     */
    public function hasRole($role)
    {
        $arrayRoles = $this->getRoles();
        if (in_array($role, $arrayRoles)) {
            return true;
        }

        return false;
    }

    public function getRoles()
    {
        return Cache::store('redis')->remember("user_roles_$this->id", 86400, function () {
            return $this->roles()->get(['name'])->pluck('name')->toArray();
        });
    }
}