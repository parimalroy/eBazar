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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'WellcomeContorller@index');
Route::get('/categories-new/{id}', 'WellcomeContorller@categoriesDisplay');
Route::get('/product-details/{id}/{name}', 'WellcomeContorller@productContent');



Route::post('/add-to-cart', 'CartController@index');
Route::get('/show-cart', 'CartController@showCart');
Route::get('cart-delete/{rowId}', 'CartController@deleteCart');
Route::post('update-quantity', 'CartController@updateQuantity');


Route::get('checkout', 'CheckoutController@index');
Route::get('customer-signup', 'CheckoutController@customerSignup');
Route::post('customer/save', 'CheckoutController@saveCustomer');
Route::get('shipping-information', 'CheckoutController@shippingInfo');
Route::get('customer-logout', 'CheckoutController@logoutCustomer');
Route::post('shipping-save', 'CheckoutController@saveShipping');
Route::get('paymentInformation', 'CheckoutController@paymentInformation');
Route::post('customer-login', 'CheckoutController@customerLogin');
Route::post('payment-save', 'CheckoutController@savePayment');
Route::get('customer-home', 'CheckoutController@customerHome');


Route::get('manage/order', 'OrderController@index');
Route::post('delete/order', 'OrderController@deleteOrder');


Route::group(['prefix' => 'categorie'], function() {
    Route::get('/add', 'CategorieController@index')->name('categorie-add');
    Route::post('/save', 'CategorieController@saveCategorie')->name('categorie-save');
    Route::get('/manage', 'CategorieController@manageCategorie')->name('categorie-manage');
    Route::post('/unpublish', 'CategorieController@unPublishCategorie')->name('categorie-unpublish');
    Route::post('/publish', 'CategorieController@publishCategorie')->name('categorie-publish');
    Route::post('/delete', 'CategorieController@deleteCategorie')->name('categorie-delete');
    Route::post('/edit', 'CategorieController@editCategorie')->name('categorie-edit');
    Route::post('/update', 'CategorieController@updateCategorie')->name('categorie-update');
});



Route::group(['prefix' => 'manufacture'], function() {
    Route::get('/add', 'ManufactureController@index')->name('manufacture-add');
    Route::post('/save', 'ManufactureController@saveManufacture')->name('manufacture-save');
    Route::get('/manage', 'ManufactureController@manageManufacture')->name('manufacture-manage');
    Route::post('/unpublish', 'ManufactureController@unpublishManufacture')->name('manufacture-unpublish');
    Route::post('/publish', 'ManufactureController@PublishManufacture')->name('manufacture-publish');
    Route::post('/delete', 'ManufactureController@deleteManufacture')->name('manufacture-delete');
    Route::post('/edit', 'ManufactureController@editManufacture')->name('Manufacture-edit');
    Route::post('/update', 'ManufactureController@updateManufacture')->name('manufacture-update');
});



Route::group(['prefix' => 'product'], function() {
    Route::get('/add', 'ProductController@index')->name('product-add');
    Route::post('/save', 'ProductController@saveProduct')->name('save-product');
    Route::get('/manage', 'ProductController@manageProduct')->name('product-manage');
    Route::post('/unpublish', 'ProductController@unPublishProduct')->name('product-unpublish');
    Route::post('/publish', 'ProductController@publishProduct')->name('product-publish');
    Route::post('/delete', 'ProductController@deleteProduct')->name('product-delete');
});













Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
