<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Pagination\PaginatorIlluminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;
use Carbon\Carbon;
use File;
use Validator;

use Session;

use App\Customers;
use App\Bills;
use App\BillDetails;

use Dotenv\Validator as DotenvValidator;

use DB;
use Illuminate\Contracts\Session\Session as SessionSession;

class CustomersController extends Controller
{
    public function ListCustomers()
    {
        $pageSize = 4;
        $customers = Customers::where('CUSTOMER_STATUS','=',1)->paginate($pageSize);

        return view('page.admin.CustomersPage', ['customers' => $customers, 'pageSize' => $pageSize]);
    }
    public function GetOneCustomer($customers_no){
        $pageSize=7;
        $customers = Customers::where('CUSTOMER_NO','=',$customers_no)->get();

        $bills=Bills::join('customers','bills.CUSTOMER_ID','=','customers.CUSTOMER_ID')
                    ->join('employees','bills.EMPLOYEE_ID','=','employees.EMPLOYEES_ID')
                    ->where('customers.CUSTOMER_NO','=',$customers_no)
                    ->select(
                        'bills.BILL_ID',
                        'bills.BILL_NO',
                        'bills.BILL_DATE',
                        'bills.BILL_STATUS',
                        'bills.BILL_TAX',
                        'employees.EMPLOYEES_LASTNAME',
                        'employees.EMPLOYEES_FIRSTNAME'
                    )
                    ->paginate($pageSize);

        return view('page.admin.ProfileCustomerPage',['customers'=>$customers,'bills'=>$bills,'pageSize' => $pageSize]);
    }

    public function DeleteCustomers($customers_id)
    {
        $customers = Customers::find($customers_id);
        $customers->CUSTOMER_STATUS = 0;
        $customers->save();
        if ($customers) {
            Session::flash('success', 'Đã khóa tài khoản!');

        } else {
            Session::flash('error', 'Thất bại!');

        }
        return redirect()->route('Khachhang');
    }

    public function SearchCustomers(Request $request){
        $pageSize=4;
        $search = $request->search;

        $customers = Customers::where('CUSTOMER_NO','LIKE',"%$search%")
                    ->orWhere('CUSTOMER_NAME','LIKE',"%$search%")
                    ->orWhere('CUSTOMER_PHONE','LIKE',"%$search%")
                    ->orWhere('CUSTOMER_EMAIL','LIKE',"%$search%")
                    ->paginate($pageSize);
        return view('page.admin.CustomersPage',['customers'=>$customers,'pageSize' => $pageSize]);

    }

    
}
