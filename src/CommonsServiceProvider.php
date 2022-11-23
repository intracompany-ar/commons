<?php

namespace DuxDucisArsen\Commons;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\ServiceProvider;

class CommonsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
        Blueprint::macro('createdBy', function ()
        {
            $this->foreignIdFor(User::class, 'created_by')->constrained()->restrictOnDelete()->cascadeOnUpdate();
        });

        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'geography');
    }
}