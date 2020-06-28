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
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Input\Input;

class CustomersController extends Controller
{
    public function ListCustomers()
    {
        $pageSize = 4;
        $customers = Customers::where('CUSTOMER_STATUS', '=', 1)->paginate($pageSize);

        return view('page.admin.CustomersPage', ['customers' => $customers, 'pageSize' => $pageSize]);
    }
    public function GetOneCustomer($customers_no)
    {
        $pageSize = 7;
        $customers = Customers::where('CUSTOMER_NO', '=', $customers_no)->get();

        $bills = Bills::join('customers', 'bills.CUSTOMER_ID', '=', 'customers.CUSTOMER_ID')
            ->join('employees', 'bills.EMPLOYEE_ID', '=', 'employees.EMPLOYEES_ID')
            ->where('customers.CUSTOMER_NO', '=', $customers_no)
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

        return view('page.admin.ProfileCustomerPage', ['customers' => $customers, 'bills' => $bills, 'pageSize' => $pageSize]);
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

    public function SearchCustomers(Request $request)
    {
        $pageSize = 4;
        $search = $request->search;

        $customers = Customers::where('CUSTOMER_NO', 'LIKE', "%$search%")
            ->orWhere('CUSTOMER_NAME', 'LIKE', "%$search%")
            ->orWhere('CUSTOMER_PHONE', 'LIKE', "%$search%")
            ->orWhere('CUSTOMER_EMAIL', 'LIKE', "%$search%")
            ->paginate($pageSize);
        return view('page.admin.CustomersPage', ['customers' => $customers, 'pageSize' => $pageSize]);
    }
    protected function isDuplicate($customers_dupli)
    {
        $customers = Customers::all();
        foreach ($customers as $item) {
            if ($item->CUSTOMER_PHONE == $customers_dupli) {
                return false;
            }
        }
        return true;
    }
    public function RegisterCustomer(Request $request)
    {
        $customer_no = null;
        $rand_code = (string) rand(1111, 10000);

        $get_year = Carbon::now()->year;
        $get_month = Carbon::now()->month;
        $customer_no = 'KH' . $get_year . $get_month . $rand_code;
        if ($this->isDuplicate($request->customer_phone) == false) {
            $request->validate([
                'customer_name' => 'required',
                'customer_address' => 'required',
                'customer_phone' => ['bail', 'required', 'regex:/((09|03|07|08|05)+([0-9]{8})\b)/'],
                'customer_email' => 'required|email',
                'customer_password' => 'bail|required|min:8',
                'customer_confirm_password' => 'bail|required|same:customer_password'
            ], [
                'customer_name.required' => 'Không bỏ trống trường này',
                'customer_address.required' => 'Không bỏ trống trường này',
                'customer_phone.required' => 'Không bỏ trống trường này',
                'customer_phone.regex' => 'Số điện thoại không đúng',
                'customer_email.required' => 'Không bỏ trống trường này',
                'customer_email.email' => 'Email chưa đúng',
                'customer_password.required' => 'Không bỏ trống trường này',
                'customer_password.min' => 'Mật khẩu phải lớn hơn 8 ký tự',
                'customer_confirm_password.required' => 'Chưa nhập vào trường này',
                'customer_confirm_password.same' => 'Mật khẩu không trùng khớp'
            ]);
            $customers = Customers::where('customers.CUSTOMER_PHONE', '=', $request->customer_phone)->first();
            $customers->CUSTOMER_NO = $customer_no;
            $customers->CUSTOMER_NAME = $request->customer_name;
            $customers->CUSTOMER_ADD = $request->customer_address;
            $customers->CUSTOMER_EMAIL = $request->customer_email;
            $customers->CUSTOMER_PASSWORD = Hash::make($request->customer_password);
            $customers->CUSTOMER_STATUS = 1;
            $customers->CUSTOMER_MARK=0;

            if ($request->has('agree-term')) {
                $customers->save();
                if ($customers) {
                    $createCustomer = 'Đăng ký thành công! Đi đến ';
                    Session::flash('success', $createCustomer);
                }
            } else {
                $termStatus = 'Đăng ký không thành công! Bạn chưa chấp nhận các điều khoản';
                Session::flash('error', $termStatus);
            }
        } else {
            $request->validate([
                'customer_name' => 'required',
                'customer_address' => 'required',
                'customer_phone' => ['bail', 'required', 'regex:/((09|03|07|08|05)+([0-9]{8})\b)/'],
                'customer_email' => 'required|email',
                'customer_password' => 'bail|required|min:8',
                'customer_confirm_password' => 'bail|required|same:customer_password'
            ], [
                'customer_name.required' => 'Không bỏ trống trường này',
                'customer_address.required' => 'Không bỏ trống trường này',
                'customer_phone.required' => 'Không bỏ trống trường này',
                'customer_phone.regex' => 'Số điện thoại không đúng',
                'customer_email.required' => 'Không bỏ trống trường này',
                'customer_email.email' => 'Email chưa đúng',
                'customer_password.required' => 'Không bỏ trống trường này',
                'customer_password.min' => 'Password phải lớn hơn 8 ký tự',
                'customer_confirm_password.required' => 'Chưa nhập vào trường này',
                'customer_confirm_password.same' => 'Mật khẩu không trùng khớp'
            ]);
            $customers = new  Customers();
            $customers->CUSTOMER_NO = $customer_no;
            $customers->CUSTOMER_PHONE = $request->customer_phone;
            $customers->CUSTOMER_NAME = $request->customer_name;
            $customers->CUSTOMER_ADD = $request->customer_address;
            $customers->CUSTOMER_EMAIL = $request->customer_email;
            $customers->CUSTOMER_PASSWORD = Hash::make($request->customer_password);
            $customers->CUSTOMER_STATUS = 1;
            $customers->CUSTOMER_MARK=0;
            if ($request->has('agree-term')) {
                $customers->save();
                if ($customers) {
                    $createCustomer = 'Đăng ký thành công! Đi đến';
                    Session::flash('success', $createCustomer);
                }
            } else {
                $termStatus = 'Đăng ký không thành công! Bạn chưa chấp nhận các điều khoản';
                Session::flash('error', $termStatus);
            }

            return redirect()->back();
        }
        return redirect()->back();
    }
    public function LoginCustomer(Request $request)
    {
        $request->validate([

            'customer_phone' => ['bail', 'required', 'regex:/((09|03|07|08|05)+([0-9]{8})\b)/'],
            'customer_password' => 'bail|required|min:8'
        ], [
            'customer_phone.required' => 'Không bỏ trống trường này',
            'customer_phone.regex' => 'Số điện thoại không đúng',
            'customer_password.required' => 'Không bỏ trống trường này',
            'customer_password.min' => 'Password phải lớn hơn 8 ký tự',

        ]);
        $customers_phone = $request->customer_phone;
        $customers_password =$request->customer_password;
        $login = Customers::where('customers.CUSTOMER_PHONE',$customers_phone)->get();
        if($login!=null){
            foreach($login as $item){
                if(Hash::check($customers_password, $item->CUSTOMER_PASSWORD)){
                    session()->put('customer_name',$item->CUSTOMER_NAME);
                    session()->put('customer_no',$item->CUSTOMER_NO);
                    return redirect('/');
                }

            }
        }
        Session::flash('error', 'Tên tài khoản hoặc mật khẩu không đúng');
        return redirect('trang/dang-nhap');
    }

    public function LogoutCustomer(){
        session()->forget('customer_name');
        session()->forget('customer_no');
        return redirect('/');
    }
}
