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

Route::get('/', 'FrontEndController@index');
Route::get('/about','FrontEndController@about');


Auth::routes();


/*
Route::get('/home', 'HomeController@index')->name('home');*/



/* BACKEND /*
/* rotte di prova */

Route::get('/admin',function (){
    return view('back_end.index');
});

Route::get('/admin',function (){
    return view('back_end.dashboard');
});


Route::get('/admin/users', 'BackendController@users');




