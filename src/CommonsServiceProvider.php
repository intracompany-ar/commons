<?php

namespace IntraCompany\Commons;

use Illuminate\Database\Schema\Blueprint;
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

        /**
         * Agrego validator de recaptcha
         */
        Validator::extend( 'recaptcha', 'IntraCompany\Commons\\Rules\\ReCaptcha@passes' );
    }

}