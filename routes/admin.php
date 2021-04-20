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

Route::get('/profiles', 'ProfileController@index')->name('profiles.index');
Route::get('/profiles/create', 'ProfileController@create')->name('profiles.create');
Route::post('/profiles', 'ProfileController@store')->name('profiles.store');
Route::get('/profiles/{id}', 'ProfileController@show')->name('profiles.show');
Route::post('/profiles/{id}', 'ProfileController@update')->name('profiles.update');
Route::get('/profiles/{id}/delete', 'ProfileController@destroy')->name('profiles.destroy');

Route::get('/admin/login', 'Admin\LoginAdminController@showLoginForm')->name('admin.showLoginForm');
Route::post('/admin/processlogin', 'Admin\LoginAdminController@login')->name('admin.login');

Route::group(['middleware' => ['auth','admin']], function() {
  Route::prefix('admin')->group(function () {
    //

    	//Dashboard
  		Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard.index');

    	//SociaL Network
    	Route::resource('/socialnetworks', 'Admin\SocialNetworkController');

    	//Profile Company
    	Route::resource('/profilecompany', 'Admin\ProfileCompanyController');

    	//Ads Index
    	Route::resource('/adsindex', 'Admin\AdsIndexController');

		//Ads Category
		Route::resource('/adscategories', 'Admin\AdsCategoryController');

		//Ads Checkout
		Route::resource('/adscheckouts', 'Admin\AdsCheckoutController');
	
		//Offer Limit
		Route::resource('/offerlimits', 'Admin\OfferLimitController');

    	//Sliders
    	Route::resource('/sliders', 'Admin\SliderController');

  		//Order
    	Route::get('/orders', 'OrderController@index')->name('orders.index');
		Route::get('/orders/create', 'OrderController@create')->name('orders.create');
		Route::post('/orders', 'OrderController@store')->name('orders.store');
		Route::get('/orders/{id}', 'OrderController@show')->name('orders.show');
		Route::post('/orders/{id}', 'OrderController@update')->name('orders.update');
		Route::get('/orders/{id}/delete', 'OrderController@destroy')->name('orders.destroy');

		//Tax
		Route::resource('/tax', 'Admin\TaxController');

	  	//Status
	  	Route::resource('/status', 'Admin\StatuController');

		//Address
		Route::get('/addresses', 'AddressController@index')->name('address.index');
		Route::get('/addresses/create', 'AddressController@create')->name('address.create');
		Route::post('/addresses', 'AddressController@store')->name('address.store');
		Route::get('/addresses/{id}', 'AddressController@show')->name('address.show');
		Route::post('/addresses/{id}', 'AddressController@update')->name('address.update');
		Route::get('/addresses/{id}/delete', 'AddressController@destroy')->name('address.destroy');

		//Shipping_companies
		Route::resource('/shippingcompanies', 'Admin\ShippingCompanyController');
		
		//Credit_card
		Route::get('/creditcards', 'CreditCardController@index')->name('creditcards.index');
		Route::get('/creditcards/create', 'CreditCardController@create')->name('creditcards.create');
		Route::post('/creditcards', 'CreditCardController@store')->name('creditcards.store');
		Route::get('/creditcards/{id}', 'CreditCardController@show')->name('creditcards.show');
		Route::post('/creditcards/{id}', 'CreditCardController@update')->name('creditcards.update');
		Route::get('/creditcards/{id}/delete', 'CreditCardController@destroy')->name('creditcards.destroy');
		
		//Categories
		Route::resource('/categories', 'Admin\CategoryController');

		//Brands
		Route::resource('/brands', 'Admin\BrandController');

		//Products
		Route::resource('/products', 'Admin\ProductController');

		//Label
		Route::resource('/labels', 'Admin\LabelController');
		
		//Payment_methods
		Route::resource('/paymentmethods', 'Admin\PaymentMethodController');

		//Comments
		Route::get('/comments', 'CommentController@index')->name('comments.index');
		Route::get('/comments/create', 'CommentController@create')->name('comments.create');
		Route::post('/comments/create', 'CommentController@store')->name('comments.store');
		Route::get('/comments/{slug}', 'CommentController@show')->name('comments.show');
		Route::post('/comments/{slug}', 'CommentController@update')->name('comments.update');
		Route::get('/comments/{slug}/delete', 'CommentController@destroy')->name('comments.destroy');

		//Top Categories
		Route::resource('/settingtopcategories', 'Admin\SettingTopcategoryController');

		//Top Menus
		Route::resource('/settingtopmenus', 'Admin\SettingTopmenuController');
		
	//
	});
});