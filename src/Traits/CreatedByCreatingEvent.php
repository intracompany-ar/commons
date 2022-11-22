<?php

namespace DuxDucisArsen\Commons\Traits;


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
            $model->created_by = auth()->id();
        });
    }
}