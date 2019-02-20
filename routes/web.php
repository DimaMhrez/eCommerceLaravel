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

Route::post('/addtocart', 'CartController@add');

/* BACKEND ROUTES */


//rotta provvisoria che carica la dashboard
Route::get('/admin',function (){
    return view('back_end.dashboard');
});

Route::get('/admin/main',function (){
    return view('back_end.main');
});



//rotta che ritorna la pagina per la gestione utenti
Route::get('/admin/users','BackEndController@getUsers');

//rotta provvisoria che mostra pagina profilo utente
Route::get('admin/userProfile', function (){
   return view('back_end.userProfile');
});
//dovrebbe essere la giusta pagina utente
Route::get('admin/userProfile/{id}','BackEndController@getUser');


//ritorna il wizard per inserimento prodotti nuovi
Route::get('admin/wizard',function(){
    return view('back_end.wizard');
});

//funzioni crud sui prodotti nel back_end
Route::resource('/admin/product','ProductController');

//calcola il live search dei brands
Route::get('/admin/liveSearchBrands', 'SearchController@searchBrands');


//registra un nuovo prodotto


//rotta di prova serve a stampare in JSON tutti gli utenti che sono nel DB
// che riempiono poi la tabella del back_end
//DA VIETARE L'UTILIZZO DA PARTE DEGLI UTENTI
Route::get('/anyData','BackEndController@anyData')->name('datatables.data');







