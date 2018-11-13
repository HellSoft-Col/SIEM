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

Route::get('/feed', 'PublicationController@index')->name('feed.get')->middleware('guest');
Route::post('/feed', 'PublicationController@search')->name('feed.post');

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
    ->middleware('auth');

Route::post('/reservation/create', 'ReservationController@create')->name('create.reservation')
    ->middleware('auth');

Route::put('/reservation/create', 'ReservationController@store')->middleware('auth');
Route::get('/reservation/create', 'ReservationController@create')->name('reservation.create')->middleware('auth');

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

Route::get('/auth/resource/create', 'ResourceController@create')
    ->name('resource.create')
    ->middleware('admin');

Route::get('/resource/search', 'ResourceController@gosearch')
    ->middleware('auth');

Route::put('/resource/search', 'ResourceController@search')->name('resource.search')
    ->middleware('search')->middleware('auth');

/* -----------------------------------------------------------------*/

Route::get('/person/search', 'UserController@goSearchPerson')
    ->middleware('moderatorAdmin');

Route::post('/person/search/result', 'UserController@searchPerson')
    ->middleware('moderatorAdmin');

Route::get('/person/view/{user}', 'UserController@show')
    ->middleware('moderatorAdmin');

Route::get('/reservation/edit/{reservation}', 'ReservationController@edit')
    ->middleware('moderatorAdmin');
Route::put('/reservation/edit/{reservation}', 'ReservationController@update')->middleware('moderatorAdmin');
//Route::get('/reservation/create', 'ReservationController@create')->name('reservation.create')->middleware('auth');


Route::get('/moderator/resource/hand-over', 'ReservationController@handOver')->middleware('moderator');

/* Changing reservations to running */
Route::post('/moderator/resource/hand-over/{reservation}', 'ReservationController@HandOverReservation')->where('reservation', '[0-9]+')
    ->middleware('moderator');
/* Changing reservations to finalize */
Route::post('/moderator/resource/hand-back/{reservation}', 'ReservationController@finalizeReservation')->where('reservation', '[0-9]+')
    ->middleware('moderator');

Route::get('/person/posts', function () {
    return view('/GeneralViews/Persons/posts');
});


/*-----------------------3ra Entrega---------------------------------*/
// URLS Cocunubo

Route::get('/admin/resource/create/classroom', 'ResourceController@createRoom')->name('resource.createRoom')->middleware('admin');
Route::get('/admin/resource/create/instrument', 'ResourceController@createInstrument')->name('resource.createInstrument')->middleware('admin');

Route::put('/admin/resource/create/classroom', 'ResourceController@storeRoom')->middleware('admin');
Route::put('/admin/resource/create/instrument', 'ResourceController@storeInstrument')->middleware('admin');

Route::get('/admin/resource/edit/{resource}', 'ResourceController@editResource')->where('resource', '[0-9]+')->middleware('admin');

Route::post('/admin/resource/edit', 'ResourceController@update')->middleware('admin');
Route::delete('/admin/resource/delete/{ID}', 'ResourceController@destroy')->name('resource.delete')->middleware('admin');

Route::get('/person/reservations/{ID}/active', 'ReservationController@personActiveReservations')->middleware('moderatorAdmin');
Route::get('/person/reservations/{ID}/history', 'ReservationController@loadPersonHistoryReservations')->middleware('moderatorAdmin');
Route::get('/person/reservation/history/{startTime}/{endTime}/{ID}', 'ReservationController@personHistoryReservations')->middleware('moderatorAdmin');
Route::post('/person/reservation/deleteAdminMonitor', 'ReservationController@cancelReservationsAdminMonitor')
    ->name('person.cancelReservations')->middleware('moderatorAdmin');

Route::get('/person/penalties/{ID}/actives', 'PenaltyController@activePenalties');
Route::get('/person/penalties/{ID}/history', 'PenaltyController@loadHistoryPenalties');
Route::get('/person/penalties/history/{startTime}/{endTime}/{ID}', 'PenaltyController@personHistoryPenalties');

Route::post('/person/penalty/conclude', 'PenaltyController@endPenalties')->middleware('moderatorAdmin');;

Route::get('/resource/view/{ID}', 'ResourceController@view')->name('resource.view');
Route::get('/resource/view/{ID}/reservations', 'ResourceController@reservationsByResource')->name('resource.reservations')->middleware('moderatorAdmin');
Route::post('/resource/deleteReservations', 'ResourceController@cancelReservations')->middleware('moderatorAdmin');

/*** Crear reserva Admin and monitor **/

Route::get('/calendar/{resource}', 'CalendarController@show')->where('resource', '[0-9]+')->middleware('auth');
Route::get('/reservation/view/resources/instrument/{user}', 'ReservationController@loadResourcesAdminMonitorInstrument')->where('user', '[0-9]+')->middleware('moderatorAdmin');
Route::get('/reservation/view/resources/classroom/{user}', 'ReservationController@loadResourcesAdminMonitorClassroom')->where('user', '[0-9]+')->middleware('moderatorAdmin');



