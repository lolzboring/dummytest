<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/movie', 'MovieController@show');
Route::get('/movie/records', 'MovieController@showRecordTable');

Route::post('/movie/detail', 'MovieController@getMovieDetail');
Route::post('/movie/insert', 'MovieController@insertMovieRecord');