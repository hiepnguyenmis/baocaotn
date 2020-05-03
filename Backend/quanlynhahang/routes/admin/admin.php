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

Route::get('trangquanly', function () {
    return view('page.admin.Dashboard');
});

Route::get('quanlynhanvien', function () {
    return view('page.admin.EmployeesPage');
});

// Route::get('quanlynguyenlieu', function () {
//     return view('page.admin.EmloyeesPage');
// });

// Route::get('quanlythucdon', function () {
//     return view('page.admin.Dashboard');
// });

// Route::get('quanlykhachhang', function () {
//     return view('page.admin.Dashboard');
// });

// Route::get('thongkedoanhthu', function () {
//     return view('page.admin.Dashboard');
// });

// Route::get('thongkedoanhthu', function () {
//     return view('page.admin.Dashboard');
// });

// Route::get('thongkedoanhthu', function () {
//     return view('page.admin.Dashboard');
// });

// Route::get('thongkehoadon', function () {
//     return view('page.admin.Dashboard');
// });
// Route::get('test', function () {
//     return view('page.admin.BillDetailPage');
// });

//Route::get('test','CustomersController@TestBill')->name('test');
// Employees
Route::get('danhsachNV', 'EmployeesController@ListEmployees')->name('danhsachNV');
Route::post('themdanhsachNV', 'EmployeesController@AddEmployees')->name('themdanhsachNV');
Route::post('suadanhsachNV/{employees_id}','EmployeesController@EditEmployees')->name('suadanhsachNV');
Route::post('xoaNV/{employees_id}','EmployeesController@EditEmployees')->name('xoaNV');
Route::get('timkiemNV', 'EmployeesController@SearchEmployee')->name('timkiemNV');

//Material
Route::get('DSNguyenLieu', 'MaterialController@ListMaterials')->name('DSNguyenLieu');
Route::post('themDSNL', 'MaterialController@AddMaterials')->name('themDSNL');
Route::post('suaDSNL/{materials_id}','MaterialController@EditMaterials')->name('suaDSNL');
Route::post('xoaNL/{materials_id}','MaterialController@DeleteMaterials')->name('xoaNL');
Route::get('timkiemNL', 'MaterialController@SearchMaterials')->name('timkiemNL');

//Customer
Route::get('Khachhang', 'CustomersController@ListCustomers')->name('Khachhang');
Route::post('themDSKH', 'CustomersController@AddCustomers')->name('themDSKH');
Route::get('Khachhang/Thongtinkhachhang/{customers_no}','CustomersController@GetOneCustomer')->name('Khachhang/Thongtinkhachhang');
Route::post('xoaKH/{customers_id}','CustomersController@DeleteCustomers')->name('xoaKH');
Route::get('timkiemKH', 'CustomersController@SearchCustomers')->name('timkiemKH');

Route::get('Khachhang/Thongtinkhachhang/tthd/{customers_no}/{bill_id}','BillDetailControllers@GetBillDetail')->name('Khachhang/Thongtinkhachhang/tthd');

//Foods
Route::get('Thucdon', 'FoodsController@ListFoods')->name('Thucdon');
Route::post('themTD', 'FoodsController@AddFoods')->name('themTD');
Route::post('suaTD/{foods_id}','FoodsController@EditFoods')->name('suaTD');
Route::post('xoaTD/{foods_id}','FoodsController@DeleteFoods')->name('xoaTD');
Route::get('timkiemthucdon', 'FoodsController@SearchFoods')->name('timkiemthucdon');

// Bill

