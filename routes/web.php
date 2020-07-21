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
    return redirect('themes', 302);
});
Route::get('/wordpress-hosting', function (){
    return redirect('https://www.bluehost.com/track/awothemes/', 302);
});

Route::get('/popular', 'ThemesController@popular');
Route::get('/recent', 'ThemesController@recent');
Route::get('/featured', 'ThemesController@featured');
Route::get('/themes', 'ThemesController@index');
Route::get('/themes/{slug}', 'ThemesController@show')->name('theme_path');