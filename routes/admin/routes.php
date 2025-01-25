<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/index', 'middleware' => 'auth'], function () {

    Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('index');


    Route::group(['prefix' => 'users'], function () {

        Route::get('/time/{user}', [\App\Http\Controllers\HomeController::class, 'change_time'])
            ->name('user.change.time');

        Route::get('/report/{user}', [\App\Http\Controllers\HomeController::class, 'report'])
            ->name('user.report');

        Route::get('/show/{user}', [\App\Http\Controllers\HomeController::class, 'show'])
            ->name('user.show');

        Route::get('/time/edit/{user}/{userTime}', [\App\Http\Controllers\HomeController::class, 'edit_time'])
            ->name('user.change.exists.time');

        Route::get('/edit/{user}', [\App\Http\Controllers\HomeController::class, 'edit_user'])
            ->name('user.edit');

        Route::patch('/edit/{user}/post', [\App\Http\Controllers\HomeController::class, 'edit_user_post'])
            ->name('user.edit.post');

        Route::post('/time/post/{user}', [\App\Http\Controllers\HomeController::class, 'change_time_post'])
            ->name('user.change.time.post');

        Route::post('/time/edit/post/{user}/{userTime}', [\App\Http\Controllers\HomeController::class, 'update_time_post'])
            ->name('user.change.exists.time.post');

        Route::post('/search', [\App\Http\Controllers\HomeController::class, 'search'])
            ->name('user.search');

        Route::delete('/delete/{user}', [\App\Http\Controllers\HomeController::class, 'delete'])
            ->name('user.delete');

    });
});
