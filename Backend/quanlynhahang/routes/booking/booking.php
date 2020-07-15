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




Route::group(['prefix'=>'/trangquantri'], function(){
    Route::get('thungan', 'OrderControllers@GetPageOrder')->name('thungan');
    // Route::get('/thungan', function () {
    //     if(!Session::has('login')){
    //         return redirect('trangquantri/dang-nhap');

    //     }
    //     session()->put('cashier', Hash::make(200));
    //
    // });
});

