<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
/*employees*/
Route::get('employees','Api\StaffManagement@index')->name('employees.index');
Route::post('addemployee','Api\StaffManagement@store')->name('employees.store');
Route::put('updateemployee/{id}','Api\StaffManagement@update')->name('employees.update');
Route::delete('deleteemployee/{id}','Api\StaffManagement@destroy')->name('employees.delete');

// table
Route::get('gettable','Api\OrderController@GetTables')->name('gettable.GetTables');
Route::get('getonetable/{id}','Api\OrderController@GetOneTables')->name('getonetable');
Route::put('puttable/{id}','Api\Ordercontroller@PutTable')->name('puttable.PutTable');
Route::post('posttable','Api\Ordercontroller@PostTable')->name('posttable.PostTable');

// foods
Route::get('getfoods','Api\OrderController@GetFoods')->name('getfoods.GetFoods');

//bill
Route::get('getbillwithtable/{id}','Api\OrderController@GetBillOfTable')->name('getbillwithtable.GetBillOfTable');
Route::get('getbillwithbillid/{id}','Api\OrderController@GetBillOfBillId')->name('getbillwithbillid.GetBillOfBillId');
Route::get('getallbills','Api\OrderController@GetAllBill')->name('getallbills');
Route::get('getallbillsfalse','Api\OrderController@GetAllBillStatusFalse')->name('getallbillsfalse');
Route::get('getallidbillsfalse','Api\OrderController@GetAllIdBillStatusFalse')->name('getallidbillsfalse');
Route::get('getallbillswithdetail','Api\OrderController@GetAllBillWithDetail')->name('getallbillswithdetail');
Route::get('getidbilloftable/{id}','Api\OrderController@GetIDBillOfTable')->name('getidbilloftable');
Route::get('getonebill/{id}','Api\OrderController@GetOneBill')->name('getonebill');
Route::get('find/{id}','Api\OrderController@GetOneBill')->name('getonebill');
Route::get('findfoodinbilldetail/{id_bill}/{id_food}','Api\OrderController@FindBillinBillDetail')->name('findfoodinbilldetail');

Route::post('createbill','Api\Ordercontroller@CreateBill')->name('createbill.CreateBill');
Route::delete('deletebill/{id}','Api\OrderController@DeleteBill')->name('deletebill');
Route::delete('deletebillwithidbill/{id}','Api\OrderController@DeleteBillWithIdBill')->name('deletebillwithidbill');
Route::put('updateBill/{id_bill}','Api\OrderController@UpdateBill')->name('updatebill');

//billdetail
Route::post('createbilldetail','Api\Ordercontroller@CreateBillDetail')->name('createbilldetail.CreateBillDetail');
Route::delete('deletebilldetail/{id_bill}/{id_food}','Api\OrderController@DeleteBillDetailWithFoodID')->name('deletebilldetail');
Route::put('updatebilldetail/{id_billdetail}/{id_food}','Api\Ordercontroller@UpdateBillDetail')->name('updatebilldetail.UpdateBillDetail');

//user
Route::post('createcustomer','Api\Ordercontroller@CreateCustomer')->name('createcustomer.CreateCustomer');
Route::get('getcustomer','Api\Ordercontroller@GetCustomer')->name('createcustomer.CreateCustomer');
Route::get('getonecustomer/{phone}','Api\Ordercontroller@GetOneCustomer')->name('createcustomer.CreateCustomer');


//
Route::get('getmonthbillofyear/{year}', 'Api\StatisticsApiControllers@GetMonthBillsOfYear')->name('getmonthbillofyear');
Route::get('getbilldate/{year}', 'Api\StatisticsApiControllers@GetBillDate')->name('getbilldate');
Route::get('getstatistics-revernue/{year}', 'Api\StatisticsApiControllers@GetStatisticsRevenue')->name('getstatistics-revernue');
Route::get('getbillmonth/{year}/{month}', 'Api\StatisticsApiControllers@GetBillMonth')->name('getbillmonth');
Route::get('getstatistics-revernue-month/{year}/{month}', 'Api\StatisticsApiControllers@GetStatisticsRevenueMonth')->name('getstatistics-revernue-month');
//
