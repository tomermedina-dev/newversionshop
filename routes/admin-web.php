<?php
  // Products
   Route::group(['prefix'=>'admin',],
       function() {
         Route::get('/login', function(){
            return redirect('/admin/page/login');
         });

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
                     Route::get('/all','Admin\ProductTypeController@getAllType')->name('admin.products.type.all');

               });
               Route::post('/new', 'Admin\ProductController@createOrEditProduct')->name('admin.products.new');
               Route::post('/edit', 'Admin\ProductController@createOrEditProduct')->name('admin.products.edit');
               Route::get('/edit/status/{productId}/{status}', 'Admin\ProductController@changeProductStatus')->name('admin.products.status.edit');
               Route::get('/all/{status}' ,'Admin\ProductController@getAllProductsByStatus')->name('admin.products.all');
               Route::get('/all' ,'Admin\ProductController@getAllProducts')->name('admin.products.all');
               Route::get('/page/{start}/{end}' ,'Admin\ProductController@getPaginatedProducts')->name('admin.products.page');

              Route::get('/image/{productId}', 'Admin\ImageController@getProductImages')->name('admin.products.image');
         });

         Route::group(['prefix'=>'services',],
            function() {
              Route::group(['prefix'=>'type',],
                  function() {
                    Route::post('/new', 'Admin\ServiceTypeController@createOrEditServiceType')->name('admin.services.type.new');
                    Route::post('/edit', 'Admin\ServiceTypeController@createOrEditServiceType')->name('admin.services.type.edit');
                    Route::get('/edit/status/{serviceTypeId}/{status}', 'Admin\ServiceTypeController@changeServiceTypeStatus')->name('admin.services.type.status.edit');
                    Route::get('/all','Admin\ServiceTypeController@getAllType')->name('admin.service.type.all');

              });
              Route::post('/new', 'Admin\ServiceController@createOrEditService')->name('admin.services.new');
              Route::post('/edit', 'Admin\ServiceController@createOrEditService')->name('admin.services.edit');
              Route::get('/edit/status/{serviceId}/{status}', 'Admin\ServiceController@changeServiceStatus')->name('admin.service.status.edit');
              Route::get('/all','Admin\ServiceController@getAllServices')->name('admin.services.all');
              Route::get('/all/{status}','Admin\ServiceController@getAllServicesByStatus')->name('admin.services.all');

              Route::group(['prefix'=>'booking',],
                  function() {
                    Route::get('/all/new', 'Admin\BookingController@getAllNewBookings')->name('front.bookings.new');
                    Route::get('/all/new/data-only', 'Admin\BookingController@getAllNewBookingsDataOnly')->name('front.bookings.new');
                    Route::get('/request-change-date/{schedId}/{response}', 'Admin\BookingController@setRequestChangeDateResponse')->name('front.bookings.change.date');
              });
         });

         Route::group(['prefix'=>'car',],
           function() {
             Route::post('/new', 'Admin\CarController@createOrEditCar')->name('admin.car.new');
             Route::post('/edit', 'Admin\CarController@createOrEditCar')->name('admin.car.new');
             Route::get('/edit/status/{carId}/{status}', 'Admin\CarController@changeCarStatus')->name('admin.products.car.status.edit');
             Route::get('/all','Admin\CarController@getAllCar')->name('admin.car.all');
             Route::get('/image/{carId}', 'Admin\ImageController@getCarImages')->name('admin.products.image');
        });

         Route::group(['prefix'=>'upload',],
             function() {
              Route::post('/new/image/{type}', 'Admin\ImageController@uploadImage')->name('admin.image.new');
              Route::post('/delete/image/{type}', 'Admin\ImageController@deletetImage')->name('admin.image.delete');
         });
         Route::get('/image/first/{type}/{id}', 'Admin\ImageController@getFirstImage')->name('admin.image.delete');

         Route::group(['prefix'=>'orders',],
             function() {
               Route::get('/all','Admin\OrderController@getAllOrders')->name('admin.orders.all');
               Route::post('/edit/status','Admin\OrderController@changeOrderStatus')->name('admin.orders.status.edit');
               Route::get('/filter/{method}/{filter}','Admin\OrderController@filterOrders')->name('admin.orders.filter');
               Route::get('/items/{orderId}','Admin\OrderController@getOrderItems')->name('admin.orders.items');
               Route::get('/items/total/{orderId}','Admin\OrderController@getOrderTotals')->name('admin.orders.items');

         });
         Route::group(['prefix'=>'checklist',],
             function() {
               Route::post('/new', 'Admin\CheckListController@createOrEditCheckList')->name('admin.checklist.new');
               Route::get('/new/{id}', 'Admin\CheckListController@getChecklistIndex')->name('admin.checklist.index');
               Route::get('/list/all', 'Admin\CheckListController@getChecklistAll')->name('admin.checklist.list');
               Route::get('/details/{checklistId}', 'Admin\CheckListController@getChecklistDetailsIndex')->name('admin.checklist.details.index');
               Route::get('/details/{checklistId}/print', 'Admin\CheckListController@printChecklistDetails')->name('admin.checklist.details.print');
         });
         Route::group(['prefix'=>'job',],
             function() {
               Route::get('/new/{id}', 'Admin\JobOrderController@getJobOrderIndex')->name('admin.job.new.index');
               Route::post('/new', 'Admin\JobOrderController@createJobOrder')->name('admin.job.new');
               Route::get('/list/{filter}', 'Admin\JobOrderController@getJobOrders')->name('admin.job.list');
               Route::get('/list/items/{id}', 'Admin\JobOrderController@getJobOrderItems')->name('admin.job.list');
               Route::get('/details/{jobId}', 'Admin\JobOrderController@getJobOrderDetailsIndex')->name('admin.job.details.index');

               Route::group(['prefix'=>'warranty',],
                   function() {
                      Route::get('/{jobId}', 'Admin\JobOrderController@getJobWarranty')->name('admin.job.details.warranty');
                      Route::get('/list/{status}', 'Admin\WarrantyController@getWarrantyListByStatus')->name('admin.job.warranty.list');
                      Route::post('/void', 'Admin\WarrantyController@voidWarranty')->name('admin.job.warranty.void');

               });
               Route::group(['prefix'=>'assignment',],
                   function() {
                     Route::post('/new', 'Admin\JobOrderController@assignJob')->name('admin.assignment.new');
                     Route::post('/evaluate', 'Admin\JobOrderController@evaluateJob')->name('admin.assignment.evaluate');
                     Route::get('/{joId}', 'Admin\JobOrderController@getAssignedEmployee')->name('admin.job.assigned');
                     Route::get('/list/{filter}', 'Admin\JobOrderController@getAssignmentList')->name('admin.job.assignment.list');
                     Route::get('/list/{filter}/{userId}', 'Admin\JobOrderController@getEmployeeAssignedJobs')->name('admin.job.assignment.list');

               });
         });
         Route::group(['prefix'=>'invoice',],
             function() {
               Route::get('/new/{id}', 'Admin\InvoiceController@getInvoiceIndex')->name('admin.invoice.index');
               Route::post('/new', 'Admin\InvoiceController@createInvoice')->name('admin.invoice.new');
               Route::get('/list/all', 'Admin\InvoiceController@getAllInvoiceList')->name('admin.invoice.list');
               Route::get('/details/{invoiceId}', 'Admin\InvoiceController@getInvoiceDetails')->name('admin.invoice.list');
               Route::group(['prefix'=>'payment',],
                   function() {
                     Route::post('/set', 'Admin\InvoiceController@setPayment')->name('admin.invoice.set.payment');
               });

         });

         Route::group(['prefix'=>'employee',],
             function() {
               Route::get('/register', 'Admin\EmployeeController@getRegisterIndex')->name('admin.employee.register');
               Route::post('/register', 'Admin\EmployeeController@registerEmployee')->name('admin.employee.new');
               Route::get('/list/{status}', 'Admin\EmployeeController@getEmployeeByStatus')->name('admin.employee.list');
         });
         Route::group(['prefix'=>'slot',],
             function() {
               Route::get('/list/{status}', 'Admin\ShopFloorSlotController@getSlotByStatus')->name('admin.slot.list');
               Route::post('/update', 'Admin\ShopFloorSlotController@updateSlot')->name('admin.slot.update');
         });
         // dashboard
         // parts-and-materials-inventory
         //vehicle-check-list
         // booked-services-summary
         // invoicing
         Route::get('/page/{pageName}', 'Admin\BladePagesController@getAdminBladeIndex')->name('admin.blade.pages.index');
         Route::get('/home', 'Admin\BladePagesController@getAdminHomeIndex')->name('admin.blade.home.index');
         Route::post('/login', 'Admin\PanelUserController@validateAccount')->name('admin.users.login');

         Route::group(['prefix'=>'pdf',],
             function() {
               Route::get('/invoice', 'Admin\PDFController@generateInvoicePDF')->name('admin.pdf.invoice');
               Route::get('/checklist', 'Admin\PDFController@generateChecklistPDF')->name('admin.pdf.checklist');
                 Route::get('/checklist_history', 'Admin\PDFController@generateChecklistHistoryPDF')->name('admin.pdf.checklist_history');
                 Route::get('/invoices_history', 'Admin\PDFController@generateInvoiceHistoryPDF')->name('admin.pdf.invoice_history');
                 Route::get('/invoice_details/{invoiceId}', 'Admin\PDFController@generateInvoiceDetails')->name('admin.pdf.invoice_details');
                 Route::get('/checklist/new/{bookingId}', 'Admin\PDFController@generateCheckListModule')->name('admin.pdf.checklist_module');
             });

         Route::group(['prefix'=>'dashboard',],
             function() {
               Route::get('/home', 'Admin\HomeDashboardController@getHomeIndex')->name('admin.home.index');
               Route::get('/home/count/{filter}', 'Admin\HomeDashboardController@getCounts')->name('admin.home.counts');
         });
         Route::group(['prefix'=>'featured',],
             function() {
               Route::post('/new', 'Admin\FeaturedController@create')->name('admin.featured.new');
               Route::get('/list', 'Admin\FeaturedController@getAllFeatured')->name('admin.featured.list');
               Route::get('/list/{type}', 'Admin\FeaturedController@getAllFeaturedByType')->name('admin.featured.list.type');
               Route::get('/edit/status/{featuredId}/{status}', 'Admin\FeaturedController@changeFeaturedStatus')->name('admin.featured.status.edit');
               Route::get('/delete/{featuredId}', 'Admin\FeaturedController@deleteFeatured')->name('admin.featured.status.edit');
         });
         Route::group(['prefix'=>'address',],
             function() {
               Route::get('/default/pickup', 'Admin\ConfigController@getDefaultPickup')->name('admin.address.default.pickup');
               Route::get('/home/count/{filter}', 'Admin\HomeDashboardController@getCounts')->name('admin.home.counts');
         });
   });
