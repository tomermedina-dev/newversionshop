<?php
  // Products
  Route::group(['prefix'=>'qr',],
      function() {
        Route::get('/generate/{valueToGenerate}', 'Admin\QRGeneratorController@generateQRByValue')->name('admin.qr.generator');
        Route::get('/scanner', 'Admin\QRGeneratorController@scannerIndex')->name('admin.qr.scanner');
  });
  Route::group(['prefix'=>'products',],
      function() {
        Route::group(['prefix'=>'type',],
            function() {
              Route::post('/new', 'Admin\ProductTypeController@createOrEditProductType')->name('admin.products.type.new');
              Route::post('/edit', 'Admin\ProductTypeController@createOrEditProductType')->name('admin.products.type.edit');
              Route::get('/edit/status/{productId}/{status}', 'Admin\ProductTypeController@changeProductTypeStatus')->name('admin.products.type.status.edit');
        });
        Route::post('/new', 'Admin\ProductController@createOrEditProduct')->name('admin.products.new');
        Route::post('/edit', 'Admin\ProductController@createOrEditProduct')->name('admin.products.edit');
        Route::get('/edit/status/{productId}/{status}', 'Admin\ProductController@changeProductStatus')->name('admin.products.status.edit');
  });


   Route::group(['prefix'=>'services',],
      function() {
        Route::group(['prefix'=>'type',],
            function() {
              Route::post('/new', 'Admin\ServiceTypeController@createOrEditServiceType')->name('admin.services.type.new');
              Route::post('/edit', 'Admin\ServiceTypeController@createOrEditServiceType')->name('admin.services.type.edit');
              Route::get('/edit/status/{serviceTypeId}/{status}', 'Admin\ServiceTypeController@changeServiceTypeStatus')->name('admin.services.type.status.edit');
        });
        Route::post('/new', 'Admin\ServiceController@createOrEditService')->name('admin.services.new');
        Route::post('/edit', 'Admin\ServiceController@createOrEditService')->name('admin.services.edit');
        Route::get('/edit/status/{serviceId}/{status}', 'Admin\ServiceController@changeServiceStatus')->name('admin.service.status.edit');
   });
   Route::group(['prefix'=>'pdf',],
       function() {
         Route::get('/invoice', 'Admin\PDFController@generateInvoicePDF')->name('admin.pdf.invoice');
   });
   Route::group(['prefix'=>'orders',],
       function() {
         Route::group(['prefix'=>'history',],
             function() {
               Route::post('/new', 'Admin\OrderHistoryController@createNewOrderHistory')->name('admin.order.history.new');
               Route::get('/retrive/all', 'Admin\OrderHistoryController@getAllOrderHistory')->name('admin.order.history.retrive');
         });

   });

   Route::group(['prefix'=>'checklist',],
       function() {
         Route::post('/new', 'Admin\CheckListController@createOrEditCheckList')->name('admin.checklist.new');
   });


   // erron
   Route::get('/admin/dashboard', function () {
       return view('admin.pages.dashboard');
   });

   Route::get('/admin/parts-and-materials-inventory', function () {
       return view('admin.pages.parts-and-materials-inventory');
   });

   Route::get('/admin/vehicle-check-list', function () {
       return view('admin.pages.vehicle-check-list');
   });
