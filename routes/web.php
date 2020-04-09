<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
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


// Route::get('posts/{id}/{name?}', 'HomeController@blog')->name('blog-post');
Route::get('/home','HomeController@home')->name('home');
Route::get('/about','HomeController@about')->name('about');

Route::resource('/posts',"PostController")
        ->only(['index','show','create','store']);