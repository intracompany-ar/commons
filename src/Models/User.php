<?php

namespace IntraCompany\Commons\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
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

    public function person(): BelongsTo
    {
        return $this->belongsTo(Person::class);
    }

    /**
     * Es la por default, la uso para asignar selects por ejemplo
     * TODO: columna pivot para indicar cuál es la default, por ahora toma la primera que encuentra
     */
    public function company(): BelongsToMany
    {
        return $this->belongsToMany(Company::class, 'company_user', 'user_id', 'entity_id', 'id', 'entity_id')->limit(1);
    }
}