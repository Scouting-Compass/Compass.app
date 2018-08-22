<?php 

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Backend routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "web" middleware group. Enjoy building your backend!
|
*/

Route::get('/home', 'HomeController@index')->name('home');

// Users 
Route::get('users', 'Backend\Web\UsersController@index')->name('users.index');