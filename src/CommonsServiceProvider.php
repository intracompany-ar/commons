<?php

namespace IntraCompany\Commons;

use IntraCompany\Commons\View\Components\ButtonPlus;
use IntraCompany\Commons\View\Components\GuestLayout;
use IntraCompany\Commons\View\Components\ModalPpal;
use IntraCompany\Commons\View\Components\TableStandard;
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
        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
        
        Blueprint::macro('createdBy', function ()
        {
            $this->foreignIdFor(User::class, 'created_by')->constrained()->restrictOnDelete()->cascadeOnUpdate();
        });

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'commons');
        
        Blade::component('table-standard', TableStandard::class);
        Blade::component('modal-ppal', ModalPpal::class);
        Blade::component('button-plus', ButtonPlus::class);
        Blade::component('guest-layout', GuestLayout::class);


        /**
         * Agrego validator de recaptcha
         */
        Validator::extend( 'recaptcha', 'IntraCompany\Commons\\Rules\\ReCaptcha@passes' );

        /**
         * Publico audios
         */
        $this->publishes([
            __DIR__.'/storage/app/public/audio' => public_path('vendor/audio'),
        ], 'commons:audio');
        
        $this->publishes([
            __DIR__.'/storage/app/public/fonts' => public_path('vendor/fonts'),
        ], 'commons:fonts');

        $this->publishes([
            __DIR__.'/../config/commons.php' => config_path('commons.php'),
        ], 'commons:config');
    }

}