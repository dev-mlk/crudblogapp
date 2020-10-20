<?php

use Illuminate\Support\Facades\Route;

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
})->name('welcome');

Route::get('/about', function(){
   return view('about');
})->name('about');

Route::get('/blog', function(){
   return view('blog');
})->name('blog');

Route::get('/blog/{title}', function(){
   return view('blog');
});

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/create', 'HomeController@getCreatePostForm')->name('create-post');


Route::get('/posts', 'PostController@show')->name('posts-list');
Route::post('/posts/create', 'PostController@create')->name('post-form');
Route::post('/posts/edit', 'PostController@update')->name('edit-post');

Route::get('/posts/edit/{id}', 'PostController@edit')->name('edit-form');
Route::get('/posts/delete/{id}', 'PostController@getDeletePost')->name('delete');


