<?php
  Route::get('generateQR/{valueToGenerate}', 'Admin\QRGeneratorController@generateQRByValue')->name('admin.qr.generator');
  // Products
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
