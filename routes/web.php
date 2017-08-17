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

/*
Route::post('/hello', function () {
    //return view('welcome');
    return 'hello world';
});

Route::delete('/hello/html', function () {
    //return view('welcome');
    return '<h1>hello world</h1>';
});

Route::get('/users/{id}/{name}', function($id, $name){
    return 'this is user ' . $name.' with an id of ' .$id;
});*/


Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');

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

//Search Page
//Route::get('/search', 'SearchController@index');

// Live Chat
/*Route::get('/chat', function() {
    return view('chat');
});*/

// Users Index
Route::resource('users', 'UsersController');
