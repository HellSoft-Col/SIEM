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
/**
 * RUTAS PRINCIPALES
 */

Route::get('/', function () {
    return view('GeneralViews.guest');
})->name('principal')
    ->middleware('guest');

/**
Route::get('/home', function () {
    return view('layout_user');
});*/

Route::get('/user', function () {
    return 'Usuarios';
});
Route::get('/resource', function () {
    return view('GeneralViews.ResourcesViews.view');
})->middleware('auth');


Route::get('/user/update',function () {
    return view('SpecificViews.Person.update');
})->name('user.update')
    ->middleware('auth');
Route::post('/user/update', 'UserController@update')
    ->name('user.update')
    ->middleware('auth');


// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('register', function (){
    $carreers = \App\Models\Carreer::all();
    return view('auth.register',["carreers" => $carreers]);
})->name('register');
Route::post('register', 'Auth\RegisterController@register');
// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

Route::get('/home', 'HomeController@index')->name('home');

/* -----------------------------------------------------------------*/
Route::get('/person/reservation/active', 'ReservationController@activeReservations')->name('person.activeReservations');

Route::get('/person/reservation/history', 'ReservationController@loadHistoryReservations')->name('person.historyReservations');

Route::get('/person/reservation/history/{startTime}/{endTime}', 'ReservationController@historyReservations')
    ->name('person.historyReservations');

Route::post('/person/reservation/delete', 'ReservationController@cancelReservations')->name('person.cancelReservations');


/**
 * RUTAS PRUEBA
 */


Route::get('/events/{event}', 'EventController@show')->where('id', '[0-9]+');


Route::put('/person/reservation/create', 'ReservationController@store');
Route::get('/person/reservation/create', 'ReservationController@create')->name('reservation.create');

/* -----------------------------------------------------------------*/
Route::get('/events ', 'EventController@index');
Route::get('/feed ', 'PublicationController@index')->name('feed.get');
Route::post('/feed ', 'PublicationController@index')->name('feed.post');
Route::get('/person/resource/view/{resource}', 'ResourceController@show')
    ->middleware('auth');

Route::post('/person/reservation/create', 'ReservationController@create')->name('create.reservation');
Route::put('/person/reservation/create', 'ReservationController@store');
Route::get('/person/reservation/create', 'ReservationController@create')->name('reservation.create');
Route::get('/person/resource/search', 'ResourceController@gosearch')
    ->middleware('auth');
Route::put('/person/resource/search', 'ResourceController@search')->name('resource.search');

/*-----------------------3ra Entrega---------------------------------*/

Route::get('/resource/create/sala', 'ResourceController@createSala')->name('resource.createSala');
Route::get('/resource/create/instrumento', 'ResourceController@createInstrumento')->name('resource.createInstrumento');
Route::put('/resource/create/sala', 'ResourceController@storeSala');
Route::put('/resource/create/instrumento', 'ResourceController@storeInstrumento');
Route::get('/resource/edit/{ID}', 'ResourceController@editResource');
Route::get('/resource/edit', 'ResourceController@editViewSala')->name('resource.editSala');
Route::get('/resource/edit', 'ResourceController@editViewInstrumento')->name('resource.editInstrumento');
Route::post('/resource/edit', 'ResourceController@update');
Route::delete('/resource/delete/{ID}', 'ResourceController@destroy')->name('resource.delete');

Route::get('/person/reservations/{ID}/active', 'ReservationController@personActiveReservations');
Route::get('/person/reservations/{ID}/history', 'ReservationController@loadPersonHistoryReservations');
Route::get('/person/reservation/history/{startTime}/{endTime}/{ID}', 'ReservationController@personHistoryReservations');
Route::post('/person/reservation/deleteAdminMonitor', 'ReservationController@cancelReservationsAdminMonitor')
    ->name('person.cancelReservations');

Route::get('/person/penalties/{ID}/actives', 'PenaltyController@activePenalties');
Route::get('/person/penalties/{ID}/history', 'PenaltyController@loadHistoryPenalties');
Route::get('/person/penalties/history/{startTime}/{endTime}/{ID}', 'PenaltyController@historyPenalties');
Route::post('/person/penalties/delete', 'PenaltyController@endPenalties');

Route::get('/resource/view/{ID}', 'ResourceController@view')->name('resource.view');
Route::get('/resource/view/{ID}/reservations', 'ResourceController@reservationsByResource')->name('resource.reservations');
Route::post('/resource/deleteReservations', 'ResourceController@cancelReservations');

