<?php

use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\Api\ApiPasteController;
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

Route::middleware('auth:sanctum')->get('/users', function (Request $request) {
    return $request->user();
});

Route::group(['controller' => ApiPasteController::class, 'prefix' => '/pastes'], function () {
    Route::post('/store', 'store');
    Route::get('/users/{id}', 'userPastes')->middleware('auth:sanctum');
    Route::get('/{url}', 'show');
});

Route::group(['controller' => ApiAuthController::class], function () {
    Route::post('/custom-registration', 'customRegistration')->middleware('guest');
    Route::post('/custom-login', 'customLogin')->middleware('guest');
    Route::get('/logout', 'logout')->middleware('auth:sanctum');
});
