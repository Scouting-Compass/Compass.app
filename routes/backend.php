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

// Helpdesk routes
Route::get('helpdesk/dashboard','Backend\Web\Helpdesk\IndexController@index')->name('helpdesk.index');

// Helpdesk categories routes
Route::get('helpdesk/categories', 'Backend\Web\Helpdesk\Config\CategoryController@index')->name('helpdesk.categories.index');
Route::get('helpdesk/categories/create', 'Backend\Web\Helpdesk\Config\CategoryController@create')->name('helpdesk.categories.create');
Route::get('helpdesk/categories/edit/{category}', 'Backend\Web\Helpdesk\Config\CategoryController@edit')->name('helpdesk.categories.edit');
Route::patch('helpdesk/categories/edit/{category}', 'Backend\Web\Helpdesk\Config\CategoryController@update')->name('helpdesk.categories.update');
Route::post('helpdesk/categories/create', 'Backend\Web\Helpdesk\Config\CategoryController@store')->name('helpdesk.categories.store');
Route::get('helpdesk/categories/undo/{category}', 'Backend\Web\Helpdesk\Config\CategoryController@undoDeleteRoute')->name('helpdesk.categories.undo');
Route::get('helpdesk/categories/delete/{category}', 'Backend\Web\Helpdesk\Config\CategoryController@destroy')->name('helpdesk.categories.delete');
