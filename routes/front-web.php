<?php
Route::group(['prefix'=> 'users' ,],
  function() {
// Registration
Route::post('/register', 'Admin\UserController@creteNewOrEditUser')->name('admin.users.register');
Route::post('/', 'Admin\UserController@creteNewOrEditUser')->name('admin.users.register');
Route::post('/forgot-password', 'Admin\UserActivationController@forgotPassword')->name('admin.users.forgot.password');

Route::group(['prefix'=>'activation',],
  function() {
    Route::get('/generate/{userId}', 'Admin\UserActivationController@generateUserActivation')->name('admin.users.activation.generate');
    Route::get('/validate/{userId}/{activationCode}', 'Admin\UserActivationController@validateActivationCode')->name('admin.users.activation.generate');
  });

Route::group(['prefix'=>'edit',],
  function() {
    Route::post('/details', 'Admin\UserController@creteNewOrEditUser')->name('admin.users.edit.details');
    Route::get('/status/{id}/{status}', 'Admin\UserController@updateUserStatus')->name('admin.users.edit.status');
  });


// Address
Route::group(['prefix'=>'address',],
  function() {
        Route::get('/new/{userId}/{addressDetails}/{notes}', 'Admin\UserAddressController@createOrEditUserAddress')->name('admin.users.address.new');
        Route::get('/edit/{userId}/{addressDetails}/{notes}/{addressId}', 'Admin\UserAddressController@createOrEditUserAddress')->name('admin.users.address.edit');
        Route::get('/delete/{addressId}', 'Admin\UserAddressController@deleteUserAddress')->name('admin.users.address.delete');
        Route::get('/default/{userId}/{addressId}', 'Admin\UserAddressController@setDefaultAddress')->name('admin.users.address.set.default');
  });

// Unit
Route::group(['prefix'=>'unit',],
  function() {
        Route::get('/new/{userId}/{carBrand}/{model}/{vin}/{plateNumber}', 'Admin\UserUnitsController@createNewUserUnit')->name('admin.users.unit.new');
  });

});

// Cart
Route::group(['prefix'=>'cart',],
  function() {
        Route::post('/new', 'Front\CartController@addorUpdateItemToCart')->name('front.users.cart.new');
        Route::post('/edit', 'Front\CartController@addorUpdateItemToCart')->name('front.users.cart.edit');
        Route::get('/delete/{cartId}', 'Front\CartController@deleteItemCart')->name('front.users.cart.delete');
  });

// WishList
Route::group(['prefix'=>'wishlist',],
  function() {
        Route::post('/new', 'Front\WishListController@addItemToWishList')->name('front.users.wishlist.new');
        Route::get('/delete/{cartId}', 'Front\WishListController@deleteItemWishList')->name('front.users.wishlist.delete');
  });

Route::get('/register', 'Front\RegistrationController@getRegistrationIndex')->name('front.register.index');
Route::get('/login', 'Front\LoginController@getLoginIndex')->name('front.login.index');
