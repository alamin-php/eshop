<?php


Route::get('/', 'FrontEndController@index')->name('shop.cart.index');
Route::get('/cart/add/{id?}', 'CartController@addCart')->name('cart.add');
Route::get('/cart/read', 'CartController@readCart')->name('cart.read');
Route::post('/cart/update', 'CartController@updateCart')->name('cart.update');
Route::get('/cart/remove/{rowId?}', 'CartController@removeCart')->name('cart.remove');
Route::resource('/checkout','CheckoutController');

Route::get('thanks',function(){
	return view('thanks.index');
})->name('thanks');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
 

// -------------Admin----------------
Route::prefix('customer')->namespace('Customer')->group(function(){
	Route::get('/home', 'CustomerController@index')->name('customer.home');
	Route::get('/login', 'CustomerloginController@showLoginForm')->name('customer.login');
	Route::post('/login', 'CustomerloginController@login');
	Route::post('/logout', 'CustomerloginController@logout')->name('customer.logout');
});

// -------------Customer----------------
Route::prefix('customer')->namespace('Customer')->group(function(){
	Route::get('/home', 'CustomerController@index')->name('customer.home');
	Route::get('/login', 'CustomerloginController@showLoginForm')->name('customer.login');
	Route::post('/login', 'CustomerloginController@login');
	Route::post('/logout', 'CustomerloginController@logout')->name('customer.logout');
});

Route::resource('categories', 'CategoryController');
Route::resource('products', 'ProductController');


// --------------Manages Route---------------------

// >>>>>>>>>>>>>>>>>>>> Color >>>>>>>>>>>>>>>>>>>>>>>>
Route::get('/color', 'ManageController@indexColor')->name('color.index');
Route::get('/color/create', 'ManageController@createColor')->name('color.create');
Route::post('/color/store', 'ManageController@storeColor')->name('color.store');
Route::post('/color/edit/{id?}', 'ManageController@editColor')->name('color.edit');
Route::post('/color/update', 'ManageController@updateColor')->name('color.update');
Route::get('/color/destroy/{id}', 'ManageController@destroyColor')->name('color.destroy');
Route::get('/color/restore', 'ManageController@restoreColor')->name('color.restore');
Route::get('/color/restore/info/{id?}', 'ManageController@postRestoreColor')->name('color.restore.info');


// >>>>>>>>>>>>>>>>>>>> Status >>>>>>>>>>>>>>>>>>>>>>>>
Route::get('/status', 'ManageController@indexStatus')->name('status.index');
Route::get('/status/create', 'ManageController@createStatus')->name('status.create');
Route::post('/status/store', 'ManageController@storeStatus')->name('status.store');
Route::post('/status/edit/{id?}', 'ManageController@editStatus')->name('status.edit');
Route::post('/status/update', 'ManageController@updateStatus')->name('status.update');
Route::get('/status/destroy/{id}', 'ManageController@destroyStatus')->name('status.destroy');
