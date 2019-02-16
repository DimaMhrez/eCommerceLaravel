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
/* FRONTEND ROUTES */

Route::get('/', 'FrontEndController@index');
Route::get('/about','FrontEndController@about');
Route::get('/store','MessageController@store');


Auth::routes();
Route::resource('message','MessageController');
Route::resource('review','ReviewController');

Route::get('products/{id}', 'FrontEndController@show');

/* BACKEND ROUTES */

Route::get('/admin',function (){
    return view('back_end.index');
});

Route::get('/admin',function (){
    return view('back_end.dashboard');
});


Route::get('/admin/users','BackEndController@getUsers');

//rotta di prova serve a stampare in JSON tutti gli utenti che sono nel DB
// che riempiono poi la tabella del back_end
//DA VIETARE L'UTILIZZO DA PARTE DEGLI UTENTI
Route::get('/anyData','BackEndController@anyData')->name('datatables.data');







