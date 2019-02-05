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

Route::get('/', function () {
    return view('front_end.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




// andranno poi messe nello standar sostituendo Auth::routes(); che di default crea le '/login' e non me le fa usare
Route::get('/log' , function (){
   return view('front_end.login');
});

Route::get('/reg' , function (){
    return view('front_end.register');
});
