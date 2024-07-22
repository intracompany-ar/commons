<?php

namespace IntraCompany\Commons\Models;

use IntraCompany\Commons\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Casts\Attribute;
use IntraCompany\Commons\Scopes\OrderByLastNameScope;

class Person extends Model
{
    use CreatedBy;

    protected $guarded = ['id'];

    public $table = 'persons';

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {

        static::addGlobalScope(new OrderByLastNameScope);

        self::creating(function ($model) { // Se podría hacer con Event y Listener, pero cuando es algo simple más fácil acá
            $model->created_by = auth()->id();
        });

        self::deleting(function ($person) {
            if ($person->employment) {
                $person->employment->delete();
            }
        });
    }


    /**
     * ACCESORS
     */
    protected $appends = ['full_name', 'first_name', 'last_name'];

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function fullName(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => (isset($attributes['last_name']) && isset($attributes['name'])) ? (strtoupper($attributes['last_name']).', '.$attributes['name']) : ''
        );
    }

    public function lastName(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => isset($attributes['last_name']) ? strtoupper($attributes['last_name']) : ''
        );
    }

    public function firstName(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => isset($attributes['name']) ? explode(' ', $attributes['name'])[0] : ''
        );
    }


    /**
     * Toma el último empleo del empleado. Reemplaza a employment()
     */
    public function lastEmployment(): HasOne
    {
        return $this->hasOne(Employment::class, 'entity_id', 'entity_id')->latest('fecha_alta');
    }

    /**
     * Tiene o tuvo en el pasado algún empleo
     */
    public function hasEmployment()
    {
        return $this->lastEmployment()->first() ? true : false;
    }

}