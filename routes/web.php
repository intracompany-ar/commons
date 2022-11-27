<?php

use Illuminate\Support\Facades\Route;

use DuxDucisArsen\Commons\Http\Controllers\{
    CurrencyController
};

Route::middleware(['web', 'auth'])->group(function(){
    Route::middleware('ajax')->group(function () {

        Route::apiResources([    
            'currency'              => CurrencyController::class
        ]);
        
    });
});