<?php

use Illuminate\Support\Facades\Route;

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
    return view('page.index.Index');
});
Route::group(['prefix'=>'/trang'], function(){
    Route::get('/lienhe', function () {
        return view('page.index.Contact');
    })->name('lienhe');

    Route::get('/thucdon', 'UserOrder@GetDataMenu')->name('thucdon');
    Route::get('/giohang', 'UserOrder@GetCart')->name('giohang');
    Route::get('/themgiohang/{id_food}', 'UserOrder@AddToCart')->name('themgiohang');
    Route::post('updatecart/{id_session}', 'UserOrder@UpadateCart')->name('updatecart');
    Route::post('removefromcart/{id_session}', 'UserOrder@RemoveCart')->name('removefromcart');

    Route::post('/xacnhandonhang', 'CheckoutControllers@Checkout')->name('xacnhandonhang');

    Route::get('xacnhandonhang', 'CheckoutControllers@GetDataCheckout')->name('xacnhandonhang');
    Route::get('/Kiem-tra-thong-tin-thanh-toan-dien-tu', 'CheckoutSuccessController@GetCheckoutPaypal')->name('Kiem-tra-thong-tin-thanh-toan-dien-tu');


    Route::get('/story', function () {
        return view('page.index.Story');
    })->name('story');

    Route::get('dang-ky',function(){
        return view('page.Login.RegisterCustomer');
    })->name('dang-ky');

    Route::get('dang-nhap',function(){
        return view('page.Login.LoginCustomer');
    })->name('dang-nhap');
    Route::post('dangky','CustomersController@RegisterCustomer')->name('dangky');
    Route::post('dangnhap','CustomersController@LoginCustomer')->name('dangnhap');
    Route::get('dangxuat','CustomersController@LogoutCustomer')->name('dangxuat');


    ///


});

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
