<?php

use App\Http\Controllers\CarController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test', function() {
    return 'Pozdrav Robert!';
});

// Cars
// READ
//Route::get('/cars', [CarController::class, 'index']);
//Route::get('/cars/{car}', [CarController::class, 'show']);

// CREATE
//Route::post('/cars', [CarController::class, 'store']);

// UPDATE
//Route::put('/cars/{car}', [CarController::class, 'update']);

// DELETE
//Route::delete('/cars/{car}', [CarController::class, 'destroy']);


Route::apiResource('cars', CarController::class);


