<?php

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
    return view('layout');
});

Route::get('/home', function () {
    return view('layout_user');
});

Route::get('/events ', 'EventController@index');
Route::get('/events/{event}', 'EventController@show')->where('id', '[0-9]+');
Route::get('/feed ', 'PublicationController@index');
Route::get('/person/resource/search', 'ResourceController@gosearch');
Route::put('/person/resource/search', 'ResourceController@search');
Route::get('/person/resource/view/{resource}', 'ResourceController@show');
Route::post('/person/reservation/create', 'ReservationController@create');
Route::put('/person/reservation/create', 'ReservationController@store');