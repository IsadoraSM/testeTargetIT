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
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group([ 'middleware' => 'auth' ], function () {
    Route::group(['prefix' => 'sector', 'middleware' => 'check.profile'], function () {
        Route::get('/create', 'SectorController@create')->name('sector.create');
        Route::post('/store', 'SectorController@store')->name('sector.store');
    });

    Route::get('/schedule', 'ScheduleController@index')->name('schedule.index');
});