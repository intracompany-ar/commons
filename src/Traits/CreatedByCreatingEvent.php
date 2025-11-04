<?php

namespace IntraCompany\Commons\Traits;


trait CreatedByCreatingEvent
{
    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        
        /**
         * EVENTS
         */
        self::creating( function ($model) {// Se podría hacer con Event y Listener, pero cuando es algo simple más fácil acá
            if (blank($model->created_by)) { // Me permite sobreescribir el created_by si quiero, cuando hago el Model::create([...aca creatd_by=>x...])
                $model->created_by = auth()->id();
            }
        });
    }
}