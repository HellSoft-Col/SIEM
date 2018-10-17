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

Route::get('/home', function () {
    return view('layout_user');
});

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
Route::get('/person/reservation/active', 'SeeReservationsController@activeReservations')->name('person.activeReservations');

Route::get('/person/reservation/history', 'ReservationsController@loadHistoryReservations')->name('person.historyReservations');

Route::get('/person/reservation/history/{startTime}/{endTime}', 'ReservationsController@historyReservations')
    ->name('person.historyReservations');

Route::post('/person/reservation/delete', 'ReservationsController@cancelReservations')->name('person.cancelReservations');


/**
 * RUTAS PRUEBA
 */


Route::get('/events ', 'EventController@index');
Route::get('/events/{event}', 'EventController@show')->where('id', '[0-9]+');
Route::get('/feed ', 'PublicationController@index');
Route::put('/person/resource/search', 'ResourceController@search')->name('resource.search');
Route::get('/person/resource/view/{resource}', 'ResourceController@show');
Route::post('/person/reservation/create', 'ReservationController@create');
Route::put('/person/reservation/create', 'ReservationController@store');
Route::get('/person/reservation/create', 'ReservationController@create')->name('reservation.create');

/* -----------------------------------------------------------------*/

Route::get('/person/resource/search', 'ResourceController@gosearch');
