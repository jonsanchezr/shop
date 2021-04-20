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
Auth::routes();

Route::post('/register', 'RegisterPublicController@register')->name('index.register');


Route::get('/', 'IndexController@index')->name('index.index');
//Route::get('/home', 'HomeController@index')->name('home');
Route::redirect('/home', '/');

//index Categories
Route::get('/categories', 'IndexController@allCategory')->name('index.allCategories');
Route::get('/categories/{slug}', 'IndexController@singleCategories')->name('index.singleCategories');

//index products
Route::get('/products', 'IndexController@allProducts')->name('index.allProducts');
Route::get('/products/{slug}', 'IndexController@singleProduct')->name('index.singleProduct');

//cart shop
Route::get('/cart', 'CartController@cart')->name('cart.index');
Route::get('/cart/{id}/add', 'CartController@addCart')->name('cart.addCart');
Route::get('/cart/{id}/delete', 'CartController@destroyCart')->name('cart.destroyCart');
Route::get('/cart/empty', 'CartController@emptyCart')->name('cart.emptyCart');

//checkout
Route::get('/checkout/step_1', 'CheckOutController@checkoutStep_1')->name('checkout.checkoutStep_1');
Route::post('/checkout/step_2', 'CheckOutController@checkoutStep_2')->name('checkout.checkoutStep_2');
Route::post('/checkout/step_3', 'CheckOutController@checkoutStep_3')->name('checkout.checkoutStep_3');
Route::post('/checkout/step_4', 'CheckOutController@checkoutStep_4')->name('checkout.checkoutStep_4');
Route::post('/checkout/step_login', 'CheckOutController@checkoutStep_login')->name('checkout.checkoutStep_login');
Route::post('/checkout/step_processlogin', 'LoginCheckoutController@login')->name('checkout.checkoutStep_processlogin');

Route::post('/checkout/step_register', 'CheckOutController@checkoutStep_register')->name('checkout.checkoutStep_register');
Route::post('/checkout/step_processregister', 'RegisterCheckoutController@register')->name('checkout.register');

Route::post('/checkout/step_order', 'CheckOutController@checkoutStep_order')->name('checkout.checkoutStep_order');

//Abouts
Route::get('/abouts', 'IndexController@about')->name('abouts.about');

//Contact us
Route::get('/contacts', 'IndexController@contact')->name('abouts.contact');


Route::group(['middleware' => ['auth']], function() {	
	Route::get('/checkout/step_5', 'CheckOutController@checkoutStep_5')->name('checkout.checkoutStep_5');

	//Users Public
	Route::redirect('/users', '/users/profile');
	Route::get('/users/profile', 'UserPublicController@profile')->name('users.profile');
	Route::post('/users/profile', 'UserPublicController@profileStore')->name('users.profileStore');
	Route::get('/users/address', 'UserPublicController@address')->name('users.address');
	Route::post('/users/address', 'UserPublicController@addressStore')->name('users.addressStore');
	Route::get('/users/orders', 'UserPublicController@order')->name('users.order');
	Route::get('/users/orders/{id}/invoice', 'UserPublicController@download')->name('users.download');

});
