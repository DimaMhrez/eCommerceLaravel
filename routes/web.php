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
    Route::post('/addpayment', 'PaymentController@store');
    Route::get('delivery','FrontEndController@delivery');
});
/* BACKEND ROUTES */
//backend home page
Route::get('/admin','BackEndController@main')->name('admin');
/*
 * Rotta di prova dello scheletro del backend
 */
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
//rotte per inserimento immagini dopo che l'utente di backoffice ha creato un nuovo prodotto
Route::get('image-view/{id}','ImageController@index');
Route::post('image-view/{id}','ImageController@store');
//funzioni crud sui prodotti nel back_end
Route::resource('/admin/product','ProductController');
//funzioni crud sulle categorie
Route::resource('/admin/category','CategoryController');
//elenco ordini in preparazione
Route::get('/admin/order/preparing','OrderController@orderInPreparation');
//elenco ordini spediti
Route::get('/admin/order/shipped','OrderController@orderShipped');
//imposta un ordine in lavorazione
Route::get('/admin/order/{id}/inprogress','OrderController@setInProgress');
//imposta un ordine come spedito
Route::get('/admin/order/{id}/shipped','OrderController@setShipped');
//funzioni crud per gli ordini
Route::resource('/admin/order','OrderController');
//Metodo
Route::post('/selectcategory','CategoryController@get');
//calcola il live search dei brands
Route::get('/admin/liveSearchBrands', 'SearchController@searchBrands');
//rotta di prova serve a stampare in JSON tutti gli utenti che sono nel DB
// che riempiono poi la tabella del back_end
//DA VIETARE L'UTILIZZO DA PARTE DEGLI UTENTI
Route::get('/anyData','BackEndController@anyData')->name('datatables.data');
Route::get('/productsData','ProductController@anyData')->name('products.data');
Route::get('/categoriesData','CategoryController@anyData')->name('categories.data');
Route::get('/ordersData','OrderController@anyData')->name('order.data');
Route::get('/ordersDataPreparing','OrderController@preparing')->name('orderPreparing.data');
Route::get('/ordersDataShipped','OrderController@shipped')->name('orderShipped.data');