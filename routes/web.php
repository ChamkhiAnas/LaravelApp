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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/','welcome');

Route::get('posts/{id}/{name}',function($Myid,$Myname){

    // return "{$id}"." author:"  ." {$myname}";

    $posts=[
        1=>['title'=>$Myname],
        2=>['title'=>'Mehdi Bezikha'],
        3=>['title'=>'Sara El Gbouri'],
    ];

    return view('posts.show',
    [
        'data'=>$posts[$Myid]
    ]);


});


Route::view('/about','about');

// Route::get('/about',function(){

//     return view('about');

// });
