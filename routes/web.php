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

Auth::routes();
    Route::get('/home', 'HomeController@index')->name('home');
// Areas
    Route::get('/areas', 'AreaController@index');
    Route::get('/areas/create', 'AreaController@create');
    Route::get('/areas/{area}/edit', 'AreaController@edit');
    Route::post('/areas', 'AreaController@store');

