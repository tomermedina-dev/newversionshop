<?php
Route::group(['prefix'=> 'users' ,],
  function() {

    Route::post('/register', 'Admin\UserController@creteNewOrEditUser')->name('admin.users.register');
    Route::post('/validate-email', 'Admin\UserController@validateEmail')->name('admin.users.validate.email');
    Route::post('/', 'Admin\UserController@creteNewOrEditUser')->name('admin.users.register');
    Route::post('/forgot-password', 'Admin\UserController@forgotPassword')->name('admin.users.forgot.password');
    Route::post('/login', 'Front\LoginController@validateAccount')->name('front.users.register');

    Route::group(['prefix'=>'activation',],
      function() {
        Route::get('/generate', 'Admin\UserActivationController@generateSMSCode')->name('admin.users.generate');
        Route::get('/resend/{userId}', 'Admin\UserActivationController@generateUserActivation')->name('admin.users.activation.generate');
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


Route::group(['prefix'=>'products',],
  function() {
    Route::get('/', 'Front\BladePagesController@redirectToProducts')->name('front.products.index');
    Route::get('/{category}', 'Front\BladePagesController@getProductBladeIndex')->name('front.products.index');
    Route::get('/details', 'Front\BladePagesController@getProductDetailsIndex')->name('front.products.details');

    Route::get('/list/{type}' ,'Admin\ProductController@getProductByType')->name('admin.products.all');
    Route::get('/list/search/{value}' ,'Admin\ProductController@getProductBySearch')->name('admin.products.all');
      
    Route::get('/cart', 'Front\BladePagesController@getProductCartIndex')->name('front.products.cart');
    Route::get('/checkout', 'Front\BladePagesController@getProductCheckoutIndex')->name('front.products.checkout');

  });

Route::group(['prefix'=>'mail',],
    function() {
      Route::get('/forgot-password/{userId}', 'Admin\EmailController@sendForgotPassword')->name('front.mail.forgot');
      Route::group(['prefix'=>'layout',],
          function() {
            Route::get('/forgot-password', 'Front\BladePagesController@getMailLayoutForgot')->name('front.mail.layout.forgot');

          });
    });
Route::get('/cart', 'Front\BladePagesController@getProductCartIndex')->name('front.products.details');
Route::get('/', 'Front\BladePagesController@getHomeIndex')->name('front.home.index');
Route::get('/register', 'Front\BladePagesController@getRegistrationIndex')->name('front.register.index');
Route::get('/login', 'Front\BladePagesController@getLoginIndex')->name('front.login.index');
Route::get('/forgot', 'Front\BladePagesController@getForgotIndex')->name('front.forgot.index');
Route::get('/logout', 'Admin\UserController@logout')->name('front.logout  ');

Route::get('/user/profile', 'Front\BladePagesController@getUserProfileIndex')->name('front.user.profile  ');
Route::get('/user/recent-orders', 'Front\BladePagesController@getUserRecentOrdersIndex')->name('front.user.recent-orders');
Route::get('/user/returns', 'Front\BladePagesController@getUserReturnsIndex')->name('front.user.returns');
Route::get('/user/cacellations', 'Front\BladePagesController@getUserCancellationsIndex')->name('front.user.cancellations');
