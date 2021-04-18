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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/blogs', 'BlogController@index')->name('blogs.index');
Route::get('/my-blogs', 'BlogController@myBlogs')->name('blogs.myBlogs');
Route::get('/blogs/create', 'BlogController@create')->name('blogs.create');
Route::post('/blogs/create', 'BlogController@store')->name('blogs.store');
Route::get('/blogs/{blog}/edit', 'BlogController@edit')->name('blogs.edit');
Route::post('/blogs/{blog}/update', 'BlogController@update')->name('blogs.update');
Route::get('/blogs/{blog}', 'BlogController@show')->name('blogs.show');

//admin
Route::get('/users', 'UserController@index')->name('users.index');