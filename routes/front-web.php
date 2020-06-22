<?php
Route::group(['prefix'=> 'user' ,],
  function() {
    Route::group(['prefix'=>'accounts',],
      function() {
        Route::get('/forgot-password/{email}/{id?}', 'Admin\UserController@resetPasswordIndex')->where('id', '.*');
        Route::post('/reset', 'Admin\UserController@resetPassword');

      });
    Route::post('/register', 'Admin\UserController@creteNewOrEditUser')->name('admin.users.register');
    Route::post('/validate-email', 'Admin\UserController@validateEmail')->name('admin.users.validate.email');
    Route::post('/validate-username', 'Admin\UserController@validateUsername')->name('admin.users.validate.username');
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

    Route::group(['prefix'=>'orders',],
      function() {
        Route::get('/recent', 'Front\RecentOrdersController@getUserRecentOrdersIndex')->name('front.user.recent-orders');
        Route::get('/history', 'Front\RecentOrdersController@getUserOrderHistory')->name('front.user.order.history');
        Route::get('/recent/list/{userId}', 'Front\ProfileController@getRecentOrdersList')->name('front.user.recent-orders.list');

    });
    Route::group(['prefix'=>'services',],
      function() {
        Route::get('/pending', 'Front\ServicesHistoryController@getUserServicesPendingIndex')->name('front.user.services.pending');
        Route::get('/rejected', 'Front\ServicesHistoryController@getUserServicesRejectedIndex')->name('front.user.services.rejected');
        Route::get('/history', 'Front\ServicesHistoryController@getUserServicesHistory')->name('front.user.services.history');
        Route::get('/completed', 'Front\ServicesHistoryController@getUserServicesCompletedHistoryIndex')->name('front.user.services.completed.index');
        Route::get('/history/list/{userId}', 'Front\ServicesHistoryController@getServiceHistory')->name('front.user.services.list');

        Route::group(['prefix'=>'jobs',],
          function() {
            Route::get('/', 'Front\ServicesHistoryController@getUserJobMonitoring')->name('front.user.services.warranty.index');
            Route::get('/list/{filter}/{userId}', 'Front\ServicesHistoryController@getUserJobMonitoringList')->name('front.user.services.monitoring.list');
            Route::get('/details/{jobId}', 'Front\ServicesHistoryController@getUserJobMonitoringDetails')->name('front.user.services.monitoring.details');
        });
        Route::group(['prefix'=>'warranty',],
          function() {
            Route::get('/', 'Front\ServicesHistoryController@getWarrantyIndex')->name('front.user.services.warranty.list');
          Route::get('/list/{status}/{id}', 'Front\ServicesHistoryController@getWarrantyListByStatus')->name('front.user.services.warranty.list');
        });
    });

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

Route::group(['prefix'=>'order',],
      function() {
        Route::get('/list/{orderId}', 'Admin\OrderController@getOrderItems')->name('front.order.items');
        Route::get('/total/{orderId}', 'Admin\OrderController@getOrderTotals')->name('front.order.totels');
        Route::get('/confirmed/{orderId}', 'Front\CheckoutController@getConfirmedOrderIndex')->name('front.checkout.confirmed');
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
    Route::get('/related/{category}', 'Admin\ProductController@getRelatedProducts')->name('front.products.related');

    Route::get('/search/{value}', 'Front\BladePagesController@searchProduct')->name('front.products.search');

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
            Route::post('/change/date', 'Admin\BookingController@changeDateRequest')->name('front.service.change.date');
      });

      Route::get('/confirmed/{serviceId}', 'Front\CheckoutController@getConfirmedServiceIndex')->name('front.checkout.confirmed');
});
Route::group(['prefix'=>'cars',],
    function() {
      Route::get('/', 'Front\BladePagesController@getCarIndex')->name('front.home.index');
      Route::get('/all/{status}','Admin\CarController@getAllCarsByStatus')->name('admin.car.all');
});
Route::group(['prefix'=>'gallery',],
    function() {
      Route::get('/', 'Front\BladePagesController@getCarIndex')->name('front.home.index');
});

Route::group(['prefix'=>'mail',],
    function() {
      Route::get('/forgot-password/{userId}', 'Admin\EmailController@sendForgotPassword')->name('front.mail.forgot');
      Route::get('/validation/{email}', 'Admin\EmailController@sendValidationCode')->name('front.mail.layout.forgot');

      Route::group(['prefix'=>'layout',],
          function() {
            Route::get('/forgot-password', 'Front\BladePagesController@getMailLayoutForgot')->name('front.mail.layout.forgot');
            Route::get('/validation', 'Front\BladePagesController@getEmailCodeLayout')->name('front.mail.layout.forgot');
            Route::get('/confirmed-booking', 'Front\BladePagesController@getConfirmedBookingLayout')->name('front.mail.layout.confirmed.booking');
            Route::get('/confirmed-order', 'Front\BladePagesController@getConfirmedOrderLayout')->name('front.mail.layout.confirmed.order');
            Route::get('/rejected-booking', 'Front\BladePagesController@getRejectedBookingLayout')->name('front.mail.layout.rejected.order');
            Route::get('/invoice', 'Front\BladePagesController@getInvoiceLayout')->name('front.mail.layout.invoice');
          });
});

Route::group(['prefix'=>'pdf',],
    function() {
      Route::get('/invoice_details/{id}/{invoiceId?}', 'Admin\PDFController@generateInvoiceDetailsClient')->where('invoiceId', '.*');
});
Route::get('/cart', 'Front\BladePagesController@getProductCartIndex')->name('front.cart.index');

Route::get('/', 'Front\BladePagesController@getHomeIndex')->name('front.home.index');
Route::get('/about', 'Front\BladePagesController@getAboutIndex')->name('front.home.index');
Route::get('/register', 'Front\BladePagesController@getRegistrationIndex')->name('front.register.index');
Route::get('/login', 'Front\BladePagesController@getLoginIndex')->name('front.login.index');
Route::get('/signin', 'Front\BladePagesController@getLoginIndex')->name('front.login.index');
Route::get('/forgot', 'Front\BladePagesController@getForgotIndex')->name('front.forgot.index');
Route::get('/logout', 'Admin\UserController@logout')->name('front.logout  ');
