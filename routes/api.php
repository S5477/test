<?php

use Illuminate\Support\Facades\Route;

/**
 * Controllers
 */
use App\Http\Controllers\API\GameAPIController;
use App\Http\Controllers\API\GenreAPIController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::group(['prefix' => 'games'], function (){
    Route::group(['prefix' => '{game}/genres'], function (){
        Route::post('/', [GameAPIController::class, "genreAdd"]);
        Route::delete('/', [GameAPIController::class, "genreRemove"]);
    });

    Route::get('/', [GameAPIController::class, "index"]);
    Route::get('{game}', [GameAPIController::class, "show"]);
    Route::post('/', [GameAPIController::class, "store"]);
    Route::put('/{game}', [GameAPIController::class, "update"]);
    Route::delete('/{game}', [GameAPIController::class, "delete"]);
});

Route::get('genres', [GenreAPIController::class, "index"]);
