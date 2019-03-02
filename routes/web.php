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
Route::get('/products','FrontEndController@allproducts');
Route::resource('message','MessageController');
Route::resource('review','ReviewController');
Route::get('products/{id}', 'FrontEndController@show');
Route::post('/addtocart', 'CartController@add');
Route::post('/removefromcart', 'CartController@remove');
Route::get('/search','FrontEndController@search');

Route::post('/filter','FrontEndController@filter');

Route::group(['middleware'=>'auth'], function(){
    Route::get('/cart','CartController@show');
    Route::get('/payment', 'PaymentController@show');
    Route::post('/store', 'PaymentController@store');
    Route::post('/delivery', 'PaymentController@delivery');
    Route::post('/confirmation','PaymentController@confirmation');
    Route::get('/done','PaymentController@done');
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

Route::get('/admin/product/{id}/addStock','ProductController@addStock');
Route::post('/admin/product/{id}/saveStock','ProductController@saveStock');
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
//crud promotional global promotional codes
Route::resource('/admin/globalPromotionalCodes','GlobalPromotionalCodesController');
//crud permessi
Route::resource('/admin/permission','PermissionController');
//
Route::post('admin/role/{idRole}/writeRole','RoleController@writeRole');
Route::get('/admin/role/{id}/grantPermission','RoleController@grantPermission');
Route::get('/admin/permission/delete/{id}','PermissionController@destroy');
Route::get('/admin/role/delete/{id}','RoleController@destroy');
/**
 * Operazioni crud sui ruoli
 */
Route::resource('/admin/role','RoleController');
/**
 * revoca un permesso ad un ruolo
 */
Route::get('/admin/role/revokePermission/{perm}/{role}','RoleController@revokePermission');

Route::post('/selectcategory','CategoryController@get');
/**
 * Durante l'inserimento dell'input da parte dell'utente carica i brands che fanno match
 */
Route::get('/admin/liveSearchBrands', 'SearchController@searchBrands');

/**
 * Recupero dati AJAX
 */
Route::get('/anyData','BackEndController@anyData')->name('datatables.data');
Route::get('/productsData','ProductController@anyData')->name('products.data');
Route::get('/categoriesData','CategoryController@anyData')->name('categories.data');
Route::get('/ordersData','OrderController@anyData')->name('order.data');
Route::get('/ordersDataPreparing','OrderController@preparing')->name('orderPreparing.data');
Route::get('/ordersDataShipped','OrderController@shipped')->name('orderShipped.data');
Route::get('/permissions','PermissionController@permissions')->name('permissions.data');
Route::get('/roles','RoleController@permissions')->name('roles.data');
Route::get('/globalPromotionalCodes','GlobalPromotionalCodesController@globalPromotionalCodes')->name('globalPromotionalCodes.data');
