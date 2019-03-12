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

Auth::routes(['verify' => true]);

Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/home', ['uses' => 'HomeController@index', 'as' => 'home'])->middleware('verified');
Route::post('/home', ['uses' => 'HomeController@updateProfile'])->middleware('verified');

Route::get('/create_thread', 'ThreadsController@create');
Route::post('/create_thread', 'ThreadsController@store');
Route::get('/thread_{thread}', 'ThreadsController@show');
Route::patch('/thread_{thread}', 'ThreadsController@storeAnswer');

Route::get('/threads', 'ThreadsController@index');
Route::get('/thread_{thread}/edit', 'ThreadsController@edit');
Route::patch('/thread_{thread}/edit', 'ThreadsController@update');
Route::delete('/thread_{thread}', 'ThreadsController@delete');
