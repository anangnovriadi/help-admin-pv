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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::prefix('admin')->group(function() {
    Auth::routes();
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/logout', 'Auth\LogoutController@logout')->name('logout');
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::get('/topic/create', 'TopicController@create')->name('create.topic');
    Route::post('/topic/create', 'TopicController@store')->name('store.topic');
    Route::get('/topic', 'TopicController@view')->name('view.topic');
    Route::get('/topic/edit/{id}', 'TopicController@edit')->name('edit.topic');
    Route::patch('/topic/edit/{id}', 'TopicController@update')->name('update.topic');
    Route::delete('/topic/delete/{id}', 'TopicController@destroy')->name('destroy.topic');

    Route::get('/category/create', 'CategoryController@create')->name('create.category');
    Route::post('/category/create', 'CategoryController@store')->name('store.category');
    Route::get('/category', 'CategoryController@view')->name('view.category');
    Route::get('/category/edit/{id}', 'CategoryController@edit')->name('edit.category');
    Route::patch('/category/edit/{id}', 'CategoryController@update')->name('update.category');
    Route::delete('/category/delete/{id}', 'CategoryController@destroy')->name('destroy.category');
});


