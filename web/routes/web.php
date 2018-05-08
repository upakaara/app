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
    return view('welcome');
});

Auth::routes();

//Social Auth Routes
Route::get('auth/{provider}', 'Auth\SocialAuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');

//Jobs Routes
Route::get('jobs', 'JobsController@index');
Route::get('/jobs/create', 'JobsController@create');
Route::get('/jobs/{id}', 'JobsController@show');
Route::post('jobs', 'JobsController@store');
Route::delete('/jobs/{id}', 'JobsController@destroy');

Route::get('/home', 'HomeController@index')->name('home');
