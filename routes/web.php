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

Route::get('/events ', 'EventController@index')->name('events.get')->middleware('guest');
Route::get('/feed ', 'PublicationController@index')->name('feed.get')->middleware('guest');

Route::get('user/feed ', 'PublicationController@indexAuth')->name('feed.get')->middleware('auth');
Route::get('user/events ', 'EventController@indexAuth')->name('events.get')->middleware('auth');


Route::get('/user/update',function () {
    return view('SpecificViews.Person.update');
})->name('user.update')
    ->middleware('auth');

Route::post('/user/update', 'UserController@update')
    ->name('user.update')
    ->middleware('auth');


Route::get('register', function (){
    $carreers = \App\Models\Carreer::all();
    return view('auth.register',["carreers" => $carreers]);
})->name('register');
Route::post('register', 'Auth\RegisterController@register');

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

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

Route::post('/feed ', 'PublicationController@search')->name('feed.post');
Route::post('/user/feed ', 'PublicationController@searchuser')->name('feed.user.post')->middleware('auth');

Route::get('/person/resource/view/{resource}', 'ResourceController@show')
    ->middleware('person');

Route::post('/person/reservation/create', 'ReservationController@create')->name('create.reservation')
    ->middleware('reservation')->middleware('person');

Route::put('/person/reservation/create', 'ReservationController@store')->middleware('person');
Route::get('/person/reservation/create', 'ReservationController@create')->name('reservation.create')->middleware('person');
Route::get('/person/resource/search', 'ResourceController@gosearch')
    ->middleware('person');

Route::put('/person/resource/search', 'ResourceController@search')->name('resource.search')
    ->middleware('search')->middleware('person');

/* -----------------------------------------------------------------*/

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

