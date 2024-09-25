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

    public function getRoles()
    {
        return Cache::store('redis')->remember("user_roles_$this->id", 86400, function () {
            return $this->roles()->get(['name'])->pluck('name')->toArray();
        });
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

    /**
     * Si el usuario tiene alguno de los roles
     *
     * @param  array|string  $roles
     */
    public function hasAnyRole($roles): bool
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }

        return false;
    }


 
}