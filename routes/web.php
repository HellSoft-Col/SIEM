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
})->name('homep')->middleware('guest');

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::get('/events ', 'EventController@index')->name('events.get')->middleware('guest');
Route::get('user/events ', 'EventController@indexAuth')->name('events.get')->middleware('auth');

Route::get('/feed ', 'PublicationController@index')->name('feed.get')->middleware('guest');
Route::post('/feed ', 'PublicationController@search')->name('feed.post');

Route::get('user/feed ', 'PublicationController@indexAuth')->name('feed.get')->middleware('auth');
Route::post('/user/feed ', 'PublicationController@searchuser')->name('feed.user.post')->middleware('auth');


Route::get('/user/update',function () {
    return view('SpecificViews.Person.update');
})->name('user.update')
    ->middleware('auth');

Route::post('/user/update', 'UserController@update')
    ->name('user.update')
    ->middleware('auth');


Route::get('register', function (){
    $carreers = \App\Models\Carreer::all();
    return view('   auth.register', ["carreers" => $carreers]);
})->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

/* -----------------------------------------------------------------*/


Route::get('/resource/view/{resource}', 'ResourceController@show')
    ->middleware('admin');

Route::post('/reservation/create', 'ReservationController@create')->name('create.reservation')
    ->middleware('admin');

Route::put('/reservation/create', 'ReservationController@store')->middleware('admin');
Route::get('/reservation/create', 'ReservationController@create')->name('reservation.create')->middleware('admin');

Route::get('/person/reservation/active', 'ReservationController@activeReservations')
    ->name('person.activeReservations')
    ->middleware('person');

Route::get('/person/reservation/history', 'ReservationController@loadHistoryReservations')
    ->name('person.historyReservations')
    ->middleware('person');

Route::get('/person/reservation/history/{startTime}/{endTime}', 'ReservationController@historyReservations')
    ->name('person.historyReservations')
    ->middleware('person');

Route::post('/person/reservation/delete', 'ReservationController@cancelReservations')
    ->name('person.cancelReservations')
    ->middleware('person');

/* -----------------------------------------------------------------*/

Route::get('/admin/resource/create', 'ResourceController@create')
    ->name('resource.create')
    ->middleware('admin');

Route::get('/resource/search', 'ResourceController@gosearch')
    ->middleware('auth');

Route::put('/resource/search', 'ResourceController@search')->name('resource.search')
    ->middleware('search')->middleware('auth');

/* -----------------------------------------------------------------*/


/* Route::get('/events/{event}', 'EventController@show')->where('id', '[0-9]+'); */

/*
Route::get('/resource', function () {
    return view('GeneralViews.ResourcesViews.view');
})->middleware('auth');
*/

/**
 * Route::get('/home', function () {
 * return view('layout_user');
 * });*/
//***************************************************************************************************************
Route::get('/person/search', 'UserController@goSearchPerson')
    ->middleware('admin');

Route::post('/person/search/result', 'UserController@searchPerson')
    ->middleware('admin');

Route::get('/person/view/{user}', 'UserController@show')
    ->middleware('admin');

Route::get('/reservation/edit/{reservation}', 'ReservationController@edit')
    ->middleware('admin');
Route::put('/reservation/edit/{reservation}', 'ReservationController@update')->middleware('admin');
//Route::get('/reservation/create', 'ReservationController@create')->name('reservation.create')->middleware('admin');


Route::get('/moderator/resource/hand-over',function(){
    return view('/SpecificViews/Moderator/hand-over');
});

Route::get('/person/posts',function(){
    return view('/GeneralViews/Persons/posts');
});


/*-----------------------3ra Entrega---------------------------------*/
// URLS Cocunubo
Route::get('/resource/create/room', 'ResourceController@createRoom')->name('resource.createRoom');
Route::get('/resource/create/instrument', 'ResourceController@createInstrument')->name('resource.createInstrument');
Route::put('/resource/create/room', 'ResourceController@storeRoom');
Route::put('/resource/create/instrument', 'ResourceController@storeInstrument');
Route::get('/resource/edit/{ID}', 'ResourceController@editResource');
Route::get('/resource/edit', 'ResourceController@editViewRoom')->name('resource.editRoom');
Route::get('/resource/edit', 'ResourceController@editViewInstrument')->name('resource.editInstrument');
Route::post('/resource/edit', 'ResourceController@update');
Route::delete('/resource/delete/{ID}', 'ResourceController@destroy')->name('resource.delete');

Route::get('/person/reservations/{ID}/active', 'ReservationController@personActiveReservations');
Route::get('/person/reservations/{ID}/history', 'ReservationController@loadPersonHistoryReservations');
Route::get('/person/reservation/history/{startTime}/{endTime}/{ID}', 'ReservationController@personHistoryReservations');
Route::post('/person/reservation/deleteAdminMonitor', 'ReservationController@cancelReservationsAdminMonitor')
    ->name('person.cancelReservations');

Route::get('/person/penalties/{ID}/actives', 'PenaltyController@activePenalties');
Route::get('/person/penalties/{ID}/history', 'PenaltyController@loadHistoryPenalties');
Route::get('/person/penalties/history/{startTime}/{endTime}/{ID}', 'PenaltyController@personHistoryPenalties');
Route::get('/person/penalty/conclude', 'PenaltyController@endPenalties');

Route::get('/resource/view/{ID}', 'ResourceController@view')->name('resource.view');
Route::get('/resource/view/{ID}/reservations', 'ResourceController@reservationsByResource')->name('resource.reservations');
Route::post('/resource/deleteReservations', 'ResourceController@cancelReservations');

