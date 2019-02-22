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
Route::post('/removefromcart', 'CartController@remove');

Route::group(['middleware'=>'auth'], function(){

    Route::get('/cart','CartController@show');
    Route::get('/payment', 'PaymentController@show');

});


Route::get('/payment/{session}','CartController@payment');




/* BACKEND ROUTES */


//rotta provvisoria che carica la dashboard
Route::get('/admin','BackEndController@main')->name('admin');

Route::get('/admin/main',function (){
    return view('back_end.main');
});



//rotta che ritorna la pagina per la gestione utenti
Route::get('/admin/users','BackEndController@getUsers');

//rotta che ritorna l'elenco dei prodotti presenti nel catalogo
Route::get('/admin/product/show','ProductController@index');

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
//rotte per inserimento immagini dopo che l'utente di backoffice ha creato un nuovo prodotto
Route::get('image-view/{id}','ImageController@index');
Route::post('image-view/{id}','ImageController@store');

//funzioni crud sui prodotti nel back_end
Route::resource('/admin/product','ProductController');

//calcola il live search dei brands
Route::get('/admin/liveSearchBrands', 'SearchController@searchBrands');


//registra un nuovo prodotto


//rotta di prova serve a stampare in JSON tutti gli utenti che sono nel DB
// che riempiono poi la tabella del back_end
//DA VIETARE L'UTILIZZO DA PARTE DEGLI UTENTI
Route::get('/anyData','BackEndController@anyData')->name('datatables.data');

Route::get('/productsData','ProductController@anyData')->name('products.data');








