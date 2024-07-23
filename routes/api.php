<?php

use IntraCompany\Commons\Http\Controllers\ConceptoController;
use IntraCompany\Commons\Http\Controllers\CurrencyController;
use IntraCompany\Commons\Http\Controllers\VoucherClassController;
use IntraCompany\Commons\Http\Controllers\IdentificationClassController;
use Illuminate\Support\Facades\Route;

Route::prefix('api')
    ->middleware(['api', 'auth:sanctum'])
    ->group(function ()
    {
        Route::get('voucherClass/select', [VoucherClassController::class, 'select'])->name('voucherClass.select');

        Route::prefix('currency')
            ->controller(CurrencyController::class)
            ->group(function () {
                Route::get('indexCommons', 'indexCommons');
            });

        Route::apiResources([
            'voucherClass' => VoucherClassController::class,
            'currency'              => CurrencyController::class,
            'concepto' => ConceptoController::class,
            'identificationClass'         => IdentificationClassController::class
        ]);
    });
