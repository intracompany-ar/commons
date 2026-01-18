<?php

use IntraCompany\Commons\Http\Controllers\CurrencyController;
use IntraCompany\Commons\Http\Controllers\CondicionIvaController;
use Illuminate\Support\Facades\Route;

Route::prefix('api')
    ->middleware(['api', 'auth:sanctum'])
    ->group(function ()
    {

        Route::prefix('currency')
            ->controller(CurrencyController::class)
            ->group(function () {
                Route::get('indexCommons', 'indexCommons');
            });

        Route::apiResources([
            'currency'              => CurrencyController::class,
            'condicionIva' => CondicionIvaController::class,
        ]);
    });
