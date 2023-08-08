<?php

use Illuminate\Support\Facades\Route;

use DuxDucisArsen\Commons\Http\Controllers\{
    CurrencyController
};

Route::middleware(['web', 'auth'])->group(function () {

    Route::prefix('currency')
        ->name('currency.')
        ->middleware('ajax')
        ->controller(CurrencyController::class)
        ->group(function () {
            Route::get('indexMains', 'indexMains')->name('indexMains');
        });

    Route::middleware('ajax')->group(function () {

        Route::apiResources([
            'currency'              => CurrencyController::class
        ]);
    });
});
