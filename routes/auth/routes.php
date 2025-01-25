<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => ''], function () {

    Route::get('/', [\App\Http\Controllers\AuthController::class, 'register'])->name('register.get');
    Route::get('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login.get');
    Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');


    Route::post('/register/post', [\App\Http\Controllers\AuthController::class, 'register_post'])->name('register.post');
    Route::post('/login/post', [\App\Http\Controllers\AuthController::class, 'login_post'])->name('login.post');

});
