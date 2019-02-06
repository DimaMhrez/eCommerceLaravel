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


/*
Route::get('/home', 'HomeController@index')->name('home');*/


/* rotte di prova */

Route::get('/admin',function (){
    return view('back_end.index');
});

Route::get('/admin',function (){
    return view('back_end.dashboard');
});


Route::get('/admin/users', 'BackendController@users');


