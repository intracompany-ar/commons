<?php

namespace IntraCompany\Commons\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use IntraCompany\Commons\Traits\UserRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, UserRoles, HasFactory, Notifiable, SoftDeletes;
    
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'deleted_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    protected $guarded = ['id'];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];


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


    /**
     * Si el usuario tiene una person, esa person tiene un employment, toma la sucursal actual de ese employment.
     */
    public function sucursalActual(): bool
    {
        if ($this->hasPerson()) {
            if ($this->person()->first()->hasEmployment()) {
                return $this->person()->first()->lastEmployment()->first()->sucursal_actual_id;
            }

            return false;
        }

        return false;
    }

    /**
     * Querys
     */
    public function hasPerson(): bool
    {
        return ! is_null($this->person_id);
    }

    public function isActive()
    {
        return is_null($this->inactivated_at);
    }
}