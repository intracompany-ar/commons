<?php

namespace IntraCompany\Commons\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class OrderByApellidoScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        $builder->orderBy('apellido');//->orderBy('id');// no usar id porque puede ser ambigua y aveces tira error cuando se hacen query sobre relaciones (porque id en gral lo tiene todas las tablas)
    }
}