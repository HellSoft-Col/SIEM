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

Route::get('/user', function () {
    return 'Usuarios';
});

Route::get('/user/create','RegisterController@registro')->name('user.create');

Route::put('/user/create/store','RegisterController@store')->name('user.store');

Route::get('/user/update','RegisterController@update')->name('user.update');

Route::post('/user/update/profile','RegisterController@profile')->name('user.profile');

Route::get('/user/main','RegisterController@menuPrincipal')->name('user.main');

Route::get('/person/reservation/active', 'SeeReservationsController@activeReservations')->name('person.activeReservations');

Route::get('/person/reservation/history', 'SeeReservationsController@loadHistoryReservations')->name('person.historyReservations');

Route::get('/person/reservation/history/{startTime}/{endTime}', 'SeeReservationsController@historyReservations')
    ->name('person.historyReservations');

Route::post('/person/reservation/delete', 'SeeReservationsController@cancelReservations')->name('person.cancelReservations');
