<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasteController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['controller' => PasteController::class, 'prefix' => '/pastes', 'as' => 'pastes.'], function () {
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/user/{id}', 'userPastes')->name('user')->middleware('auth');
    Route::get('/{url}', 'show')->name('show');
});

Route::group(['controller' => AuthController::class], function () {
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/registration', 'registration')->name('registration')->middleware('guest');
    Route::post('/custom-registration', 'customRegistration')->name('custom-registration')->middleware('guest');
    Route::get('/login', 'login')->name('login')->middleware('guest');
    Route::post('/custom-login', 'customLogin')->name('custom-login')->middleware('guest');
    Route::get('/signout', 'signOut')->name('signout')->middleware('auth');
});
