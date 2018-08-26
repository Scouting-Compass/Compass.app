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

// Authentication routes
Auth::routes();
Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/home', 'HomeController@index')->name('home');

// Account configuration routes 
Route::get('/profile-settings/{type?}', 'Auth\AccountSettingsController@index')->name('profile.settings');
Route::patch('/profile-settings', 'Auth\AccountSettingsController@updateInformation')->name('profile.settings.info');
Route::patch('/profile-settings/security', 'Auth\AccountSettingsController@updateSecurity')->name('profile.settings.security');

// Helpdesk routes
Route::get('helpdesk/dashboard','Backend\Web\Helpdesk\IndexController@index')->name('helpdesk.index');

// Helpdesk categories routes
Route::get('helpdesk/categories', 'Backend\Web\Helpdesk\Config\CategoryController@index')->name('helpdesk.categories.index');
Route::get('helpdesk/categories/create', 'Backend\Web\Helpdesk\Config\CategoryController@create')->name('helpdesk.categories.create');
Route::post('helpdesk/categories/create', 'Backend\Web\Helpdesk\Config\CategoryController@store')->name('helpdesk.categories.store');
