<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes Version 1
|--------------------------------------------------------------------------
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group([], function () {
    Route::prefix('directories')->group(function () {

        Route::prefix('categories')->group(function () {
            Route::get('/', [\App\Http\Controllers\Api\V1\Directory\CategoryController::class, 'index']);
        });

        Route::prefix('phonebooks')->group(function () {
            Route::get('/', [\App\Http\Controllers\Api\V1\Directory\PhonebookController::class, 'index']);
            Route::get('{phonebook}', [\App\Http\Controllers\Api\V1\Directory\PhonebookController::class, 'show']);

            Route::post('/', [\App\Http\Controllers\Api\V1\Directory\PhonebookController::class, 'store']);
            Route::delete('{phonebook}', [\App\Http\Controllers\Api\V1\Directory\PhonebookController::class, 'destroy']);
            Route::put('/{phonebook}', [\App\Http\Controllers\Api\V1\Directory\PhonebookController::class, 'update']);
        });
    });
});

