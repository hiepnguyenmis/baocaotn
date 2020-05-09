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


