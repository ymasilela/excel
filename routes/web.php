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
Route::get('/employee', 'EmpController@index');
Route::get('/export/{type}', 'EmpController@export');
Route::post('/import', 'EmpController@import');

Route::get('/register', 'RegistrationController@create');
Route::post('register', 'RegistrationController@store');

Route::get('/', 'SessionController@create');
Route::post('/login', 'SessionController@store');
Route::post('/log', 'SessionController@logins');
Route::get('/logout', 'SessionController@destroy');