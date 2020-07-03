<?php

use Illuminate\Auth\Events\Login;
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



Route::group(['prefix' => '/trangquantri'], function () {
    //index
    // Route::get('/', function () {
    //     return view('page.admin.IndexAdmin');
    // })->name('/');
    Route::get('/', 'IndexAdminController@GetIndex')->name('/');
    // Login
    Route::get('dang-nhap','EmployeesController@GetAdmin')->name('dang-nhap');
    Route::get('dang-xuat-admin', 'EmployeesController@LogoutAdmin')->name('dang-xuat-admin');
    Route::post('dangnhap', 'EmployeesController@LoginAdmin')->name('dangnhap');


    //Route::get('test','EmployeesController@ListEmployees')->name('test');
    // Employees
    Route::get('danhsachNV', 'EmployeesController@ListEmployees')->name('danhsachNV');
    Route::post('themdanhsachNV', 'EmployeesController@AddEmployees')->name('themdanhsachNV');
    Route::post('suadanhsachNV/{employees_id}', 'EmployeesController@EditEmployees')->name('suadanhsachNV');
    Route::post('xoaNV/{employees_id}', 'EmployeesController@DeleteEmployees')->name('xoaNV');
    Route::get('timkiemNV', 'EmployeesController@SearchEmployee')->name('timkiemNV');
    Route::post('resetpasword/{employees_id}/{employees_no}', 'EmployeesController@ResetPassWord')->name('resetpasword');

    //Material
    Route::get('DSNguyenLieu', 'MaterialController@ListMaterials')->name('DSNguyenLieu');
    Route::post('themDSNL', 'MaterialController@AddMaterials')->name('themDSNL');
    Route::post('suaDSNL/{materials_id}', 'MaterialController@EditMaterials')->name('suaDSNL');
    Route::post('xoaNL/{materials_id}', 'MaterialController@DeleteMaterials')->name('xoaNL');
    Route::get('timkiemNL', 'MaterialController@SearchMaterials')->name('timkiemNL');

    //Customer
    Route::get('Khachhang', 'CustomersController@ListCustomers')->name('Khachhang');
    Route::post('themDSKH', 'CustomersController@AddCustomers')->name('themDSKH');
    Route::get('Khachhang/Thongtinkhachhang/{customers_no}', 'CustomersController@GetOneCustomer')->name('Khachhang/Thongtinkhachhang');
    Route::post('xoaKH/{customers_id}', 'CustomersController@DeleteCustomers')->name('xoaKH');
    Route::get('timkiemKH', 'CustomersController@SearchCustomers')->name('timkiemKH');

    Route::get('Khachhang/Thongtinkhachhang/tthd/{customers_no}/{bill_id}', 'BillDetailControllers@GetBillDetail')->name('Khachhang/Thongtinkhachhang/tthd');
    //Foods
    Route::get('Thucdon', 'FoodsController@ListFoods')->name('Thucdon');
    Route::post('themTD', 'FoodsController@AddFoods')->name('themTD');
    Route::post('suaTD/{foods_id}', 'FoodsController@EditFoods')->name('suaTD');
    Route::post('xoaTD/{foods_id}', 'FoodsController@DeleteFoods')->name('xoaTD');
    Route::get('timkiemthucdon', 'FoodsController@SearchFoods')->name('timkiemthucdon');
    // Bill
    Route::get('Thongtinhoadon/{customers_no}/{bill_id}','BillDetailControllers@GetBillDetail')->name('Thongtinhoadon');

    Route::get('Thongkedoanhthu', 'StatisticsControllers@GetBills')->name('Thongkedoanhthu');

    Route::get('Thongkehoadon', 'StatisticsControllers@StatisticsBill')->name('Thongkehoadon');
    Route::get('Timkiemhoadonhomnay', 'StatisticsControllers@SearchBillToday')->name('Timkiemhoadonhomnay');

    Route::get('Timkiemhoadonthang', 'StatisticsControllers@SearchBillThisMonth')->name('Timkiemhoadonthang');
    Route::get('Timkiemhoadon', 'StatisticsControllers@SearchAllBill')->name('Timkiemhoadon');

    // Order Procesing

    Route::get('quanlydonhang','OrderProcessingController@GetAllOrder')->name('quanlydonhang');
    Route::get('Timkiemdondangxuly','OrderProcessingController@SearchOrderProcessing')->name('Timkiemdondangxuly');
    Route::get('Timkiemdondanggiao','OrderProcessingController@SearchOrderShipping')->name('Timkiemdondanggiao');

    // ----
    Route::get('chitietdondangxuly/{bill_no}','OrderProcessingController@DetailOrderProcessing')->name('chitietdondangxuly');
    Route::get('Chitietdondangcho/{bill_no}','OrderProcessingController@DetailOrderWaiting')->name('Chitietdondangcho');
    Route::get('Chitietdondangvanchuyen/{bill_no}','OrderProcessingController@DetailOrderShipping')->name('Chitietdondangvanchuyen');
    Route::post('Kiemtradonhang/{bill_id}','OrderProcessingController@OrderCheckout')->name('Kiemtradonhang');
    Route::post('Xacnhandonhang/{bill_id}','OrderProcessingController@OrderConfirm')->name('Xacnhandonhang');

});



