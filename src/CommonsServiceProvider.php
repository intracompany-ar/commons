<?php

namespace DuxDucisArsen\Commons;

use DuxDucisArsen\Commons\View\Components\ButtonPlus;
use DuxDucisArsen\Commons\View\Components\ModalPpal;
use DuxDucisArsen\Commons\View\Components\TableStandard;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class CommonsServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/commons.php', 'commons'
        );
    }

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
        Blade::component('button-plus', ButtonPlus::class);


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
        

        $this->publishes([
            __DIR__.'/../config/commons.php' => config_path('commons.php'),
        ], 'commons:config');
    }

}