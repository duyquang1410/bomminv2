<?php
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
Route::get('/clear', function() {

   Artisan::call('cache:clear');
   Artisan::call('config:clear');
   Artisan::call('config:cache');
   Artisan::call('view:clear');

   return "Cleared!";
});
Auth::routes();
Route::get('login', [
	'uses'=> 'LoginController@index'
])->name('login');
/* === Login tài khoản quản trị viên === */
Route::get('adminLogin', [
	'uses'=> 'LoginController@adminLogin'
])->name('adminLogin');
Route::post('adminLogin', [
	'uses'=> 'LoginController@postAdminLogin'
])->name('adminLogin');

Route::get('logout', [
	'as'	=>	'logout',
	'uses'	=>	'LoginController@getLogout'
]);

Route::post('storeUserAdmin', [
	'uses'=> 'UsersController@storeUserAdmin'
])->name('storeUserAdmin');

Route::group(['middleware'=>'auth'], function(){

      Route::get('/', [
            'as'    =>   'dashbroads.user',
            'uses'  =>  'DashbroadController@userDashbroad'
        ]);
    Route::group(['prefix'=>'timekeepings'], function(){

        Route::get('/', [
            'as'    =>   'timekeepings.list',
            'uses'  =>  'TimeKeepingController@timeKeeping'
        ]);
        Route::get('create', [
            'as'    =>   'users.timeKeeping',
            'uses'  =>  'TimeKeepingController@timeKeeping'
        ]);
        // Khai báo giờ làm việc ( đi hát , đi bay )
        Route::post('khai-bao-gio-lam', [
            'as'    =>   'users.postTimeKeeping',
            'uses'  =>  'TimeKeepingController@postTimeKeeping'
        ]);
        // Lấy dữ liệu giờ làm việc để thay đổi :
          Route::get('edit/{id}', [
            'as'    =>   'users.editTimeKeeping',
            'uses'  =>  'TimeKeepingController@editTimeKeeping'
        ]);
        Route::post('update/{id}', [
            'as'    =>   'users.updateTimeKeeping',
            'uses'  =>  'TimeKeepingController@updateTimeKeeping'
        ]);
    });
	// CheckIn
    Route::post('check-in', [
	    'as'    =>   'users.checkin',
        'uses'  =>  'TimeKeepingController@checkin'
    ]);

    // CheckOut
    Route::get('check-out/{id}', [
	    'as'    =>   'users.checkout',
        'uses'  =>  'TimeKeepingController@checkout'
    ]);
    Route::get('danh-sach-cong/{id}', [
	    'as'    =>   'users.listTimeKeeping',
        'uses'  =>  'TimeKeepingController@listTimeKeeping'
    ]);
     Route::get('chi-tiet-cong/{id}', [
	    'as'    =>   'users.detailTimeKeeping',
        'uses'  =>  'TimeKeepingController@detailTimeKeeping'
    ]);
    Route::get('danh-sach-cong-nhan-vien/{month}/{year}', [
        'as'    =>   'users.listUserTimeKeeping',
        'uses'  =>  'TimeKeepingController@listUserTimeKeeping'
    ]);
     Route::get('danh-sach-luong', [
	    'as'    =>   'users.listSalary',
        'uses'  =>  'UsersController@listSalary'
    ]);
    Route::get('chi-tiet-luong-thang/{id}', [
        'as'    =>   'users.detailSalary',
        'uses'  =>  'UsersController@detailSalary'
    ]);
    // Tạm ứng ( Nhân viên )
    Route::post('tam-ung', [
        'as'    =>   'users.suggestMoney',
        'uses'  =>  'UsersController@suggestMoney'
    ]);
    // Xin ứng lương lại
    Route::get('xin-ung-luong-lai/{id}', [
        'as'    =>   'users.pleaseRespond',
        'uses'  =>  'UsersController@pleaseRespond'
    ]);
    // Nhân viên xóa ứng lương :
    Route::get('nhan-vien-xoa-ung-luong/{id}', [
        'as'    =>   'users.userDelSuggestMoney',
        'uses'  =>  'UsersController@userDelSuggestMoney'
    ]);

    Route::get('member-menu', [
    	    'as'    =>   'users.memberMenu',
        	'uses'  =>  'UsersController@memberMenu'
    ]);
    //Lương :
        // Danh sách ứng lương của 1 nhân viên
    Route::get('danh-sach-ung-luong', [
    	    'as'    =>   'users.listSuggestMoney',
        	'uses'  =>  'UsersController@listSuggestMoney'
    ]);
     Route::get('huy-ung-luong/{id}', [
            'as'    =>   'users.cancelSuggestMoney',
            'uses'  =>  'UsersController@cancelSuggestMoney'
    ]);
    // Danh sách ứng lương của nhân viên ( admin )
    Route::get('danh-sach-ung-luong-nhan-vien', [
        'as'    =>   'users.adminListSuggestMoney',
        'uses'  =>  'UsersController@adminListSuggestMoney'
    ]);
    // Danh sách dịch vụ
    Route::get('danh-sach-dich-vu', [
        'as'    =>   'users.listSevice',
        'uses'  =>  'UsersController@listSevice'
    ]);
    Route::post('them-moi-dich-vu', [
        'as'    =>   'users.postMobileSevice',
        'uses'  =>  'UsersController@postMobileSevice'
    ]);

    Route::get('xoa-dich-vu/{id}', [
        'as'    =>   'users.deleteMobileSevice',
        'uses'  =>  'UsersController@deleteMobileSevice'
    ]);

     // Thanh toán lương cho nhân viên :
     Route::get('thanh-toan-luong/{id}', [
        'as'    =>   'users.sendPaymentSalary',
        'uses'  =>  'UsersController@sendPaymentSalary'
    ]);
    Route::get('thong-tin-tai-khoan', [
        'as'    =>   'users.infoAccount',
        'uses'  =>  'UsersController@infoAccount'
    ]);
    Route::get('/nhan-vien', [
        'as'	=>	'users.index',
        'uses'	=>	'UsersController@index'
    ]);
    // Quản lý phòng hát
    Route::get('quan-ly-phong-hat', [
        'as'    =>  'users.singingRoom',
        'uses'  =>  'UsersController@singingRoom'
    ]);

     // Duyệt dữ liệu chấm công check in :
    Route::get('duyet-cham-cong/{id}', [
        'as'    =>   'users.adminStatusTimeKeeping',
        'uses'  =>  'UsersController@adminStatusTimeKeeping'
    ]);
    // Không duyệt dữ liệu chấm công check in :
    Route::get('khong-duyet-cham-cong/{id}', [
        'as'    =>   'users.adminEmptyStatusTimeKeeping',
        'uses'  =>  'UsersController@adminEmptyStatusTimeKeeping'
    ]);
	Route::group(['prefix'=>'admin'], function(){
        Route::get('/', [
            'as' =>  'dashbroad.index',
            'uses'  =>  'DashbroadController@index'
		]);
        Route::get('dashbroad', [
            'as'	=>	'dashbroad.index',
            'uses'	=>	'DashbroadController@index'
        ]);
		Route::group(['prefix'=>'users'], function(){
			Route::get('/', [
				'as'	=>	'users.index',
				'uses'	=>	'UsersController@index'
			]);
			Route::post('/store', [
				'as'	=>	'users.store',
				'uses'	=>	'UsersController@store'
			]);
			Route::get('/edit/{id}', [
				'as'	=>	'users.edit',
				'uses'	=>	'UsersController@edit'
			]);
			Route::post('/update/{id}', [
				'as'	=>	'users.update',
				'uses'	=>	'UsersController@update'
			]);
			Route::get('/destroy/{id}', [
				'as'	=>	'users.destroy',
				'uses'	=>	'UsersController@destroy'
			]);
			Route::post('/changepassword/{id}', [
				'as'	=>	'users.changePassword',
				'uses'	=>	'UsersController@changePassword'
			]);
			Route::post('checkuser', [
				'as'	=>	'users.checkUser',
				'uses'	=> 'UsersController@checkUser'
			]);
			Route::get('/detail/{id}', [
				'as'	=>	'users.detail',
				'uses'	=>	'UsersController@detail'
			]);
			Route::post('/action', [
			    'as'    => 'users.action',
                'uses'  =>  'UsersController@action'
            ]);
			// Hiện thị nhân viên trên Mobile :
            Route::get('danh-sach-nhan-vien', [
                'as'	=>	'users.adminListUser',
                'uses'	=>	'UsersController@adminListUser'
            ]);
            // Hiện thị chấm công trên Web (admin) :
            Route::get('danh-sach-cham-cong/{id}', [
                'as'    =>  'users.adminListTimekeeping',
                'uses'  =>  'UsersController@adminListTimekeeping'
            ]);

             // Hiện thị chấm công trên Web ( theo tháng ) :
            Route::get('danh-sach-cham-cong-thang', [
                'as'    =>  'users.adminListTimekeepingMonth',
                'uses'  =>  'UsersController@adminListTimekeepingMonth'
            ]);

              // Hiện thị chấm công trên Web ( theo tháng ) :
            Route::get('danh-sach-thang/{month}/{year}', [
                'as'    =>  'users.listMonthYear',
                'uses'  =>  'UsersController@listMonthYear'
            ]);

            
            Route::get('danh-sach-cong-ngay/{day}/{month}/{year}', [
                'as'    =>  'users.listDayMonthYear',
                'uses'  =>  'UsersController@listDayMonthYear'
            ]);

            // Hiện thị tất cả chấm công trên Web (admin) :
            Route::get('tat-ca-danh-sach-cham-cong', [
                'as'    =>  'users.adminAllTimekeeping',
                'uses'  =>  'UsersController@adminAllTimekeeping'
            ]);

            // Xóa dữ liệu chấm công 
             Route::get('deleteTimekeeping/{id}', [
                'as'    =>  'users.adminDeleteTimekeeping',
                'uses'  =>  'UsersController@adminDeleteTimekeeping'
            ]);
            // Duyệt chấm công 
            Route::get('confirmTimekeeping/{id}', [
                'as'    =>  'users.confirmTimekeeping',
                'uses'  =>  'UsersController@confirmTimekeeping'
            ]);
             // Hủy Duyệt chấm công 
            Route::get('cancelConfirmTimekeeping/{id}', [
                'as'    =>  'users.cancelConfirmTimekeeping',
                'uses'  =>  'UsersController@cancelConfirmTimekeeping'
            ]);
            // Thanh toán lương cho nhân viên :
             Route::get('cancelSendPaymentSalary/{id}', [
                'as'    =>   'users.cancelSendPaymentSalary',
                'uses'  =>  'UsersController@cancelSendPaymentSalary'
            ]);
             // Duyệt ứng lương cho nhân viên
            Route::get('salaryPayment/{id}', [
                'as'    =>   'users.salaryPayment',
                'uses'  =>  'UsersController@salaryPayment'
            ]);
            // Xóa ứng lương ( Bản ứng lương đã hủy ứng )
             Route::get('deleteSuggestUser/{id}', [
                'as'    =>   'users.deleteSuggestUser',
                'uses'  =>  'UsersController@deleteSuggestUser'
            ]);

            // Quản lý lương nhân viên - Quản trị viên
            Route::get('luong-nhan-vien/{month}/{year}', [
                'as'    =>   'users.adminListSalary',
                'uses'  =>  'UsersController@adminListSalary'
            ]);
            // Xóa lương của 1 nhân viên
            Route::get('delete-payment/{id}', [
                'as'    =>   'users.adminDeletePayment',
                'uses'  =>  'UsersController@adminDeletePayment'
            ]);

            Route::get('edit-payment/{id}', [
                'as'    =>   'users.adminEditPayment',
                'uses'  =>  'UsersController@adminEditPayment'
            ]);

            Route::post('update-payment/{id}', [
                'as'    =>   'users.adminUpdatePayment',
                'uses'  =>  'UsersController@adminUpdatePayment'
            ]);

		});
			Route::group(['prefix'=>'services'], function(){
				Route::get('/', [
					'as'    =>  'services.index',
                	'uses'  => 'ServiceController@index'
				]);
				Route::post('store', [
					'as'    =>  'services.store',
                	'uses'  => 'ServiceController@store'
				]);
				Route::get('edit/{id}', [
					'as'    =>  'services.edit',
                	'uses'  => 'ServiceController@edit'
				]);
				Route::post('update/{id}', [
					'as'    =>  'services.update',
                	'uses'  => 'ServiceController@update'
				]);
				Route::get('destroy/{id}', [
					'as'    =>  'services.destroy',
                	'uses'  => 'ServiceController@destroy'
				]);
			});
        Route::group(['prefix'=>'rooms'], function(){
            Route::post('store', [
                'as'    =>  'rooms.store',
                'uses'  => 'RoomController@store'
            ]);
            Route::get('edit/{id}', [
                'as'    =>  'rooms.edit',
                'uses'  => 'RoomController@edit'
            ]);
            Route::post('update/{id}', [
                'as'    =>  'rooms.update',
                'uses'  => 'RoomController@update'
            ]);
            Route::get('destroy/{id}', [
                'as'    =>  'rooms.destroy',
                'uses'  => 'RoomController@destroy'
            ]);
            Route::get('cancelRoom/{id}', [
                'as'    =>  'rooms.cancelRoom',
                'uses'  => 'RoomController@cancelRoom'
            ]);
        });
        Route::group(['prefix'=>'products'], function(){
            Route::get('/', [
                'as'    =>  'products.index',
                'uses'  => 'ProductController@index'
            ]);
            Route::post('store', [
                'as'    =>  'products.store',
                'uses'  => 'ProductController@store'
            ]);
            Route::get('edit/{id}', [
                'as'    =>  'products.edit',
                'uses'  => 'ProductController@edit'
            ]);
            Route::post('update/{id}', [
                'as'    =>  'products.update',
                'uses'  => 'ProductController@update'
            ]);
            Route::get('destroy/{id}', [
                'as'    =>  'products.destroy',
                'uses'  => 'ProductController@destroy'
            ]);
            Route::post('importProduct/{id}', [
                'as'    =>  'products.importProduct',
                'uses'  => 'ProductController@importProduct'
            ]);
            Route::get('detail/{id}', [
                'as'    =>  'products.detail',
                'uses'  => 'ProductController@detail'
            ]);
        });
        // Thanh toán
        Route::group(['prefix'=>'payments'], function(){
           Route::get('bat-dau-tinh-tien/{id}', [
               'as'    =>  'payments.startDate',
               'uses'  => 'PaymentController@startDate'
           ]);
            Route::get('thanh-toan-phong/{id}', [
                'as'    =>  'payments.paymentRoom',
                'uses'  => 'PaymentController@paymentRoom'
            ]);
            Route::get('thanh-toan-phong-ngay/{id}', [
                'as'    =>  'payments.buyPaymentRoom',
                'uses'  =>  'PaymentController@buyPaymentRoom'
            ]);
            Route::get('xuat-hoa-don/{id}', [
                'as'    =>  'payments.exportFile',
                'uses'  =>  'PaymentController@exportFile'
            ]);
            // Thanh toán ngay
            Route::get('payment-buy-now/{id}', [
                'as'    =>  'payments.paymentBuyNow',
                'uses'  => 'PaymentController@paymentBuyNow'
            ]);
            // Chi tiết thanh toán
            Route::get('detail-payment/{id}', [
                'as'    =>  'payments.detailPayment',
                'uses'  => 'PaymentController@detailPayment'
            ]);
        });

        // Shoppingcart
        Route::group(['prefix'=>'shoppingcarts'], function(){
            Route::get('add-to-cart/{id}', [
                'as'    =>  'shoppingcarts.addCart',
                'uses'  => 'ShoppingcartController@addCart'
            ]);

            Route::post('load_cart_data', [
                'as'    =>  'shoppingcarts.loadCartData',
                'uses'  => 'ShoppingcartController@loadCartData'
            ]);

            Route::get('remove-cart/{id}', [
                'as'    =>  'shoppingcarts.removeCart',
                'uses'  => 'ShoppingcartController@removeCart'
            ]);

            Route::post('update-cart', [
                'as'    =>  'shoppingcarts.updateCart',
                'uses'  => 'ShoppingcartController@updateCart'
            ]);

             Route::get('destroy-cart', [
                'as'    =>  'shoppingcarts.destroyCart',
                'uses'  => 'ShoppingcartController@destroyCart'
            ]);

        });
        // // Thống kê tháng của tất cả nhân viên :
          Route::group(['prefix'=>'statisticals'], function(){
            Route::get('/', [
                'as'    =>  'statisticals.index',
                'uses'  => 'StatisticalController@index'
            ]);
              Route::get('detail/{id}/thang/{month}/nam/{year}', [
                  'as'    =>  'statisticals.detail',
                  'uses'  => 'StatisticalController@detail'
              ]);
              Route::get('list-revenue/{month}/{year}', [
                  'as'    =>  'statisticals.listRevenue',
                  'uses'  => 'StatisticalController@listRevenue'
              ]);
        });
	});

		Route::group(['prefix'=>'datatypes'], function(){
            Route::get('/', [
                'as'    =>  'datatypes.index',
                'uses'  => 'DatatypeController@index'
            ]);
            Route::post('store', [
                'as'    =>  'datatypes.store',
                'uses'  =>  'DatatypeController@store'
            ]);

            Route::get('edit/{id}', [
            	'as'	=>	'datatypes.edit',
            	'uses'	=>	'DatatypeController@edit'
            ]);

            Route::post('update/{id}', [
            	'as'	=>	'datatypes.update',
            	'uses'	=>	'DatatypeController@update'
            ]);

            Route::post('destroy/{id}', [
            	'as'	=>	'datatypes.destroy',
            	'uses'	=>	'DatatypeController@destroy'
            ]);

        });
        Route::group(['prefix'=>'displaytypes'], function(){
        	Route::get('/', [
        			'as'	=>	'displaytypes.index',
        			'uses'	=>	'DisplaytypesController@index'
        		]);

        	Route::get('create', [
        			'as'	=>	'displaytypes.create',
        			'uses'	=>	'DisplaytypesController@create'
        		]);

        	Route::post('store', [
        			'as'	=>	'displaytypes.store',
        			'uses'	=>	'DisplaytypesController@store'
        		]);


        	Route::get('edit/{id}', [
        			'as'	=>	'displaytypes.edit',
        			'uses'	=>	'DisplaytypesController@edit'
        		]);


        	Route::post('update/{id}', [
        			'as'	=>	'displaytypes.update',
        			'uses'	=>	'DisplaytypesController@update'
        		]);

        	Route::post('destroy/{id}', [
        			'as'	=>	'displaytypes.destroy',
        			'uses'	=>	'DisplaytypesController@destroy'
        		]);

	});
});
