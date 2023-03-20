<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource("/V1/pagos/", App\Http\Controllers\Api\V1\PagosController::class);
Route::apiResource("/V1/formtoken/{arepa}/{precio}/{orderId}/", App\Http\Controllers\Api\V1\FormTokenController::class);
