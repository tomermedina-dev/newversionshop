<?php
Route::group(['prefix'=> 'user' ,],
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
            Route::get('/default/{userId}', 'Admin\UserAddressController@getDefaultAddress')->name('admin.users.address.get.default');

      });

    // Unit
    Route::group(['prefix'=>'unit',],
      function() {
            Route::get('/new/{userId}/{carBrand}/{model}/{vin}/{plateNumber}', 'Admin\UserUnitsController@createNewUserUnit')->name('admin.users.unit.new');
    });
    Route::group(['prefix'=>'profile',],
      function() {
        Route::get('/', 'Front\BladePagesController@getUserProfileIndex')->name('front.user.profile  ');
        Route::get('/details/{userId}', 'Front\ProfileController@getUserProfileDetails')->name('front.user.profile.details');
        Route::get('/address/details/{userId}', 'Front\ProfileController@getUserAddressDetails')->name('front.user.address.details');
        Route::get('/unit/details/{userId}', 'Front\ProfileController@getUserUnitDetails')->name('front.user.address.details');

        Route::post('/details/update', 'Front\ProfileController@updateProfile')->name('front.user.profile.details.update');
        Route::post('/username/validate', 'Front\ProfileController@validateUsername')->name('front.user.profile.username.validate');
        Route::post('/old-password/validate', 'Front\ProfileController@validateOldPassword')->name('front.user.profile.password.validate');

        Route::post('/unit/new', 'Front\ProfileController@createNewUserUnit')->name('front.user.profile.unit.new');
        Route::get('/unit/delete/{unitId}', 'Front\ProfileController@deleteUserUnit')->name('front.user.profile.unit.delete');

    });


    Route::get('/orders/recent', 'Front\BladePagesController@getUserRecentOrdersIndex')->name('front.user.recent-orders');
    Route::get('/orders/recent/list/{userId}', 'Front\ProfileController@getRecentOrdersList')->name('front.user.recent-orders.list');

    Route::get('/returns', 'Front\BladePagesController@getUserReturnsIndex')->name('front.user.returns');
    Route::get('/cacellations', 'Front\BladePagesController@getUserCancellationsIndex')->name('front.user.cancellations');

    // WishList
    Route::group(['prefix'=>'wishlist',],
      function() {
            Route::get('/', 'Front\BladePagesController@getWishlistIndex')->name('front.wishlist.index');
            Route::post('/new', 'Front\WishListController@addItemToWishList')->name('front.users.wishlist.new');
            Route::get('/list/{userId}', 'Front\WishListController@getWishlist')->name('front.wishlist.list');
            Route::get('/delete/{wishListId}', 'Front\WishListController@deleteItemWishList')->name('front.wishlist.delete');
    });

});

// Cart
Route::group(['prefix'=>'cart',],
  function() {
        Route::post('/new', 'Front\CartController@addorUpdateItemToCart')->name('front.users.cart.new');
        Route::post('/edit', 'Front\CartController@addorUpdateItemToCart')->name('front.users.cart.edit');
        Route::get('/delete/{cartId}', 'Front\CartController@deleteItemCart')->name('front.users.cart.delete');
        Route::get('/list/{userId}', 'Front\CartController@getCartItems')->name('front.users.cart.list');
        Route::get('/update/quantity/{cartId}/{quantity}', 'Front\CartController@updateCartQuantity')->name('front.users.cart.update.quantity');
        Route::get('/totals/{userId}', 'Front\CartController@getCartTotals')->name('front.users.cart.totals');
        Route::get('/count/{userId}', 'Front\CartController@getCartCount')->name('front.users.cart.count');

        Route::group(['prefix'=>'checkout',],
          function() {
            Route::get('/{id}', 'Front\BladePagesController@getCheckoutIndex')->name('front.checkout.index');
            Route::post('/new', 'Front\CheckoutController@createOrders')->name('front.checkout.news');
          });
  });




Route::group(['prefix'=>'products',],
  function() {
    Route::get('/', 'Front\BladePagesController@redirectToProducts')->name('front.products.index');
    Route::get('/{category}', 'Front\BladePagesController@getProductBladeIndex')->name('front.products.index');
    Route::get('/details/{productId}/{productSlug}', 'Front\BladePagesController@getProductDetailsIndex')->name('front.products.details');
    Route::get('/details/{productId}', 'Admin\ProductController@getProductDetails')->name('admin.product.details');
    Route::get('/list/{type}' ,'Admin\ProductController@getProductByType')->name('admin.products.all');
    Route::get('/list/search/{value}' ,'Admin\ProductController@getProductBySearch')->name('admin.products.all');

    Route::get('/cart', 'Front\BladePagesController@getProductCartIndex')->name('front.products.cart');
    Route::get('/checkout', 'Front\BladePagesController@getProductCheckoutIndex')->name('front.products.checkout');

  });
Route::group(['prefix'=>'services',],
    function() {
      Route::get('/', 'Front\BladePagesController@getServicesIndex')->name('front.service.index');
      Route::get('/list/{status}','Admin\ServiceController@getAllServicesByStatus')->name('admin.services.all');
      Route::get('/list/search/{value}' ,'Admin\ServiceController@getServiceBySearch')->name('admin.services.all');

      Route::group(['prefix'=>'booking',],
          function() {
            Route::get('/form/{id}/{slug}', 'Front\BladePagesController@getBookingFormIndex')->name('front.booking.form.index');
            Route::post('/new', 'Admin\BookingController@createNewBooking')->name('front.service.new');
      });


});
Route::group(['prefix'=>'mail',],
    function() {
      Route::get('/forgot-password/{userId}', 'Admin\EmailController@sendForgotPassword')->name('front.mail.forgot');
      Route::group(['prefix'=>'layout',],
          function() {
            Route::get('/forgot-password', 'Front\BladePagesController@getMailLayoutForgot')->name('front.mail.layout.forgot');

          });
    });

Route::get('/cart', 'Front\BladePagesController@getProductCartIndex')->name('front.cart.index');

Route::get('/', 'Front\BladePagesController@getHomeIndex')->name('front.home.index');
Route::get('/register', 'Front\BladePagesController@getRegistrationIndex')->name('front.register.index');
Route::get('/login', 'Front\BladePagesController@getLoginIndex')->name('front.login.index');
Route::get('/forgot', 'Front\BladePagesController@getForgotIndex')->name('front.forgot.index');
Route::get('/logout', 'Admin\UserController@logout')->name('front.logout  ');



Route::get('/cars', function(){
  return view('front.car-gallery');
});
