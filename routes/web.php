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

// Posts
Route::resource('posts', 'PostsController');

// Comments
Route::post('comments/{post_id}', ['uses' => 'CommentsController@store', 'as' => 'comments.store']);


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

// Users 
Route::resource('users', 'UsersController', ['except' => ['create', 'store']]);


