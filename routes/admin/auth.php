<?php


use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Auth', 'as' => 'auth.'], function() {
    Route::get('login', 'LoginController@create')->name('login');
    Route::post('login', 'LoginController@authenticate')->name('login.store');
    Route::post('logout', 'LoginController@logout')->name('logout');

    Route::prefix('password')->as('password.')->middleware(['auth:front'])->group(function () {
        Route::get('/change', 'ChangePasswordController@index')
            ->name('index');
        Route::post('/update', 'ChangePasswordController@update')
            ->name('update');
    });
});

