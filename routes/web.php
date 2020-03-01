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

Route::get('/', function () {
    return redirect('auth/login');
});

Route::group(['prefix' => 'auth'], function () {
    Route::get('login','authController@index');
    Route::post('login','authController@login');
    Route::get('logout','authController@logout');
});

Route::group(['prefix' => 'f'], function () {
    Route::get('/','frontendController@index');
    Route::post('/','frontendController@saveBenhNhan');
});

Route::group(['prefix' => 'b'], function () {
    Route::get('/','backendController@index');
    Route::get('medicine','backendController@thuoc');
    Route::get('medicine/category','backendController@thuocCategory');

    Route::get('glass','backendController@kinh');
    Route::get('glass/category','backendController@kinhCategory');
    
    Route::get('examination','backendController@khamBenh');
    Route::get('bills','backendController@hoaDon');
    Route::get('statistical','backendController@thongKe');
    Route::get('printer','backendController@printer');

    Route::get('bills/search/','backendController@searchHoaDon');
    Route::get('glass/search/','backendController@searchKinh');
    Route::get('medicine/search/','backendController@searchThuoc');

});

Route::group(['prefix' => 'api'], function () {
    // front-end
    Route::group(['prefix' => 'f'], function () {
        Route::get('get-district/{id}','frontendController@getDistrict');
        Route::get('get-ward/{id}','frontendController@getWard');
        Route::get('delete-id/{id}','frontendController@destroy');
    });

    Route::group(['prefix' => 'b'], function () {
        Route::post('add-thuoc','backendController@addThuoc');
        Route::post('update-thuoc','backendController@updateThuoc');
        Route::get('get-thuoc/{id}','backendController@getThuocById');
        Route::get('delete-thuoc/{id}','backendController@delThuoc');
        Route::post('add-cate-thuoc','backendController@addCateThuoc');
        Route::get('get-cate-thuoc','backendController@getCateThuoc');

        Route::post('add-kinh','backendController@addKinh');
        Route::post('update-kinh','backendController@updateKinh');
        Route::get('get-kinh/{id}','backendController@getKinh');
        Route::get('delete-kinh/{id}','backendController@delKinh');
        Route::post('add-cate-kinh','backendController@addCateKinh');
        Route::get('get-cate-kinh','backendController@getCateKinh');

        Route::get('get-benh-nhan-id/{id}','backendController@getBenhNhanId');
        Route::get('get-all-thuoc','backendController@getThuoc');
        
        Route::post('save-kham-benh','backendController@saveKhamBenh');

        Route::get('get-thongke','backendController@getThongKe');
        Route::post('calc-thongke','backendController@caclThongKe');

        Route::get('get-return-ds-thuoc/{id}','backendController@getReturnThuoc');
    });
});