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


Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');

// cf https://laravel.com/docs/5.4/controllers#resource-controllers
Route::resource('posts', 'PostsController');

// Auth
Auth::routes();
Route::get('/dashboard', 'DashboardController@index');

// Categories
Route::resource('categories', 'CategoryController', ['except' => ['create']]);
// 'except' erases the route categories.create
// 'only' + the list of the routes wanted

// Contact
Route::get('/contact', 'PagesController@getContact');
Route::post('/contact', 'PagesController@postContact');

// Users Index
Route::resource('users', 'UsersController', ['except' => ['create', 'store']]);

