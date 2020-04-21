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

// Route::get('test','EmployeesController@')->name('test');
// Employees
Route::get('danhsachNV', 'EmployeesController@ListEmployees')->name('danhsachNV');
Route::post('themdanhsachNV', 'EmployeesController@AddEmployees')->name('themdanhsachNV');
Route::post('suadanhsachNV/{employees_id}','EmployeesController@EditEmployees')->name('suadanhsachNV');
Route::post('xoaNV/{employees_id}','EmployeesController@EditEmployees')->name('xoaNV');
Route::get('timkiemNV', 'EmployeesController@SearchEmployee')->name('timkiemNV');
