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
Route::post('/blogs/{blog}/destroy', 'BlogController@destroy')->name('blogs.destroy');

Route::get('/tags', 'TagController@index')->name('tags.index');
Route::get('/tags/create', 'TagController@create')->name('tags.create');
Route::post('/tags/create', 'TagController@store')->name('tags.store');
Route::get('/tags/{tag}/edit', 'TagController@edit')->name('tags.edit');
Route::post('/tags/{tag}/update', 'TagController@update')->name('tags.update');
Route::post('/tags/{tag}/destroy', 'TagController@destroy')->name('tags.destroy');

Route::get('/phones', 'PhoneController@index')->name('phones.index');
Route::get('/phones/create', 'PhoneController@create')->name('phones.create');
Route::post('/phones/create', 'PhoneController@store')->name('phones.store');
Route::get('/phones/{phone}/edit', 'PhoneController@edit')->name('phones.edit');
Route::post('/phones/{phone}/update', 'PhoneController@update')->name('phones.update');
Route::post('/phones/{phone}/destroy', 'PhoneController@destroy')->name('phones.destroy');

//admin
Route::get('/users', 'UserController@index')->name('users.index');