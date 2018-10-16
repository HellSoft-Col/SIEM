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
    return view('layouts/layout');
});
Route::get('/home', 'HomeController@home' )->middleware;

Route::get('/events', function () {
    return view('GeneralViews/Events/events');
});
Route::get('/feed', function () {
    return view('GeneralViews/Feeds/feed');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/moderator/home' , function () {
    return view('SpecificViews/Moderator/home');
});
Route::get('/admin/home' , function () {
    return view('SpecificViews/Admin/home');
});
Route::get('/person/home' , function () {
    return view('SpecificViews/Person/home');
});
Route::get('/person/reservation/history' , function () {
    return view('GeneralViews/Reserves/history');
});
Route::get('/person/reservation/active' , function () {
    return view('GeneralViews/Reserves/active');
});
Route::get('/person/reservation/create' , function () {
    return view('GeneralViews/Reserves/create');
});
Route::get('/person/resource/search' , function () {
    return view('GeneralViews/ResourcesViews/search');
});
Route::get('/person/resource/view' , function () {
    return view('GeneralViews/ResourcesViews/view');
});
