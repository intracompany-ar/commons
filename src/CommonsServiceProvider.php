<?php

namespace DuxDucisArsen\Commons;

use DuxDucisArsen\Commons\View\Components\ModalPpal;
use DuxDucisArsen\Commons\View\Components\TableStandard;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class CommonsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        
        Blueprint::macro('createdBy', function ()
        {
            $this->foreignIdFor(User::class, 'created_by')->constrained()->restrictOnDelete()->cascadeOnUpdate();
        });

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'commons');
        Blade::component('table-standard', TableStandard::class);
        Blade::component('modal-ppal', ModalPpal::class);


        /**
         * Agrego validator de recaptcha
         */
        Validator::extend( 'recaptcha', 'DuxDucisArsen\Commons\\Rules\\ReCaptcha@passes' );

        /**
         * Publico audios
         */
        $this->publishes([
            __DIR__.'/storage/app/public/audio' => public_path('vendor/audio'),
        ], 'commons:audio');
        
    }
}