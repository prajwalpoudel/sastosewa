<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/design/{slug1}/{slug2?}/{slug3?}', function($slug1, $slug2 = null, $slug3 = null) {
    if($slug2) {
        if($slug3) {
            return view('design.'."$slug1.$slug2.$slug3");
        }
        return view('design.'."$slug1.$slug2");
    }
    return view('design.'.$slug1);
});
