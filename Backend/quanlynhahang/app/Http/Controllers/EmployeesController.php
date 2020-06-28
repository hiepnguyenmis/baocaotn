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

use App\Employees;
use App\Positions;
use Dotenv\Validator as DotenvValidator;

use DB;
use Illuminate\Support\Facades\Hash;

class EmployeesController extends Controller
{
    public function ListEmployees()
    {
        $pageSize = 4;
        $employees = Employees::with('Positions')->paginate($pageSize);

        $position = Positions::all();

        return view('page.admin.EmployeesPage', ['position' => $position, 'employees' => $employees, 'pageSize' => $pageSize]);
    }
    protected function LoginAdmin( $request)
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
        $emloyee_username = $request->emloyee_username;
        $emloyee_password =$request->emloyee_password;
        $login = Employees::where('employees.EMPLOYEE_USERNAME',$emloyee_username)->get();
        if($login!=null){
            foreach($login as $item){
                if(Hash::check($emloyee_password, $item->EMPLOYEES_PASSWORD)){
                    session()->put('customer_fistname',$item->EMPLOYEES_FISTNAME);
                    session()->put('customer_lastname',$item->EMPLOYEES_LASTNAME);
                    session()->put('customer_no',$item->EMPLOYEES_LASTNAME);
                    if($item->EMPLOYEES_ISMANAGE==1){
                        return redirect('trangquantri/thungan');
                    }else{
                        return redirect('trangquantri/danhsachNV');
                    }
                }

            }
        }
        Session::flash('error', 'Tên tài khoản hoặc mật khẩu không đúng');
        return redirect('trang/dang-nhap');
    }

    public function AddEmployees(Request $request)
    {
        $request->validate([

            'employees_phone' => ['bail', 'required', 'regex:/((09|03|07|08|05)+([0-9]{8})\b)/'],
            'employees_lastname'=>'required',
            'employees_firstname'=>'required',
            'employees_mail'=>'required|email',
            'employees_position_id'=>'required',
            'employees_address'=>'required',
            'employees_startday'=>'required',
            'employees_birthday'=>'required',
            'employees_gender'=>'required',

        ], [
            'employees_phone.required' => 'Không bỏ trống trường này',
            'employees_phone.regex' => 'Số điện thoại không đúng',
            'employees_lastname.required'=>'Không bỏ trống trường này',
            'employees_firstname.required'=>'Không bỏ trống trường này',
            'employees_mail.required'=>'Không bỏ trống trường này',
            'employees_mail'=>'Email không đúng',
            'employees_position_id.required'=>'Không bỏ trống trường này',
            'employees_position_id.required'=>'Không bỏ trống trường này',
            'employees_address.required'=>'Không bỏ trống trường này',
            'employees_startday.required'=>'Không bỏ trống trường này',
            'employees_birthday.required'=>'Không bỏ trống trường này',
            'employees_gender.required'=>'Không bỏ trống trường này'


        ]);

        $employees_no = null;
        $rand_code = (string) rand(1111, 10000);

        $get_year = Carbon::now()->year;
        $get_month = Carbon::now()->month;
        $employees_no = 'NV' . $get_year . $get_month . $rand_code;

        $employees = new Employees();

        $employees->EMPLOYEES_NO = $employees_no;
        $employees->EMPLOYEES_LASTNAME = $request->employees_lastname;
        $employees->EMPLOYEES_USERNAME = $employees->EMPLOYEES_NO;
        $employees->EMPLOYEES_FIRSTNAME = $request->employees_firstname;
        $employees->EMPLOYEES_PHONE = $request->employees_phone;
        $employees->EMPLOYEES_EMAIL = $request->employees_mail;
        $employees->EMPLOYEES_PASSWORD = Hash::make($employees_no);
        $employees->EMPLOYEES_IMG =$request->employees_image;
        $employees->POSITION_ID = $request->employees_position_id;
        $employees->EMPLOYEES_STATUS = 1;
        $employees->EMPLOYEES_ADDRESS = $request->employees_address;
        $employees->EMPLOYEES_STARTDAY = $request->employees_startday;
        $employees->EMPLOYEES_BIRTHDAY = $request->employees_birthday;
        $employees->EMPLOYEES_GENDER = $request->employees_gender;
        $employees->EMPLOYEES_AGE = null;

        $employees->save();

        if($employees){
            $error_status_employees='Thêm thành công';
            session()->flash('error_status_employees',$error_status_employees);
        }else{
            $error_status_employees='Thêm Thất bại';
            session()->flash('error_status_employees',$error_status_employees);
        }

        return redirect()->route('danhsachNV');

    }

    public function EditEmployees($employees_id, Request $request)
    {
        $request->validate([

            'employees_phone' => ['bail', 'required', 'regex:/((09|03|07|08|05)+([0-9]{8})\b)/'],
            'employees_lastname'=>'required',
            'employees_firstname'=>'required',
            'employees_mail'=>'required|email',
            'employees_position_id'=>'required',
            'employees_address'=>'required',
            'employees_startday'=>'required',
            'employees_birthday'=>'required',
            'employees_gender'=>'required',

        ], [
            'employees_phone.required' => 'Không bỏ trống trường này',
            'employees_phone.regex' => 'Số điện thoại không đúng',
            'employees_lastname.required'=>'Không bỏ trống trường này',
            'employees_firstname.required'=>'Không bỏ trống trường này',
            'employees_mail.required'=>'Không bỏ trống trường này',
            'employees_mail'=>'Email không đúng',
            'employees_position_id.required'=>'Không bỏ trống trường này',
            'employees_position_id.required'=>'Không bỏ trống trường này',
            'employees_address.required'=>'Không bỏ trống trường này',
            'employees_startday.required'=>'Không bỏ trống trường này',
            'employees_birthday.required'=>'Không bỏ trống trường này',
            'employees_gender.required'=>'Không bỏ trống trường này'


        ]);
        $employees = Employees::find($employees_id);

        $employees->EMPLOYEES_LASTNAME = $request->employees_lastname;
        $employees->EMPLOYEES_USERNAME = $request->employees_username;
        $employees->EMPLOYEES_FIRSTNAME = $request->employees_fistname;
        $employees->EMPLOYEES_PHONE = $request->employees_phone;
        $employees->EMPLOYEES_EMAIL = $request->employees_mail;
        $employees->EMPLOYEES_PASSWORD = $request->employees_password;
        $employees->EMPLOYEES_IMG = $request->employees_image;
        $employees->POSITION_ID = $request->employees_position_id;
        $employees->EMPLOYEES_STATUS = 1;
        $employees->EMPLOYEES_ADDRESS = $request->employees_address;
        $employees->EMPLOYEES_STARTDAY = $request->employees_startday;
        $employees->EMPLOYEES_BIRTHDAY = $request->employees_birthday;
        $employees->EMPLOYEES_GENDER = $request->employees_gender;
        $employees->EMPLOYEES_AGE = $request->employees_age;

        $employees->save();
        if($employees){
            $error_status_employees='Thay đổi thành công';
            session()->flash('error_status_employees',$error_status_employees);
        }else{
            $error_status_employees='Thay đổi thất bại';
            session()->flash('error_status_employees',$error_status_employees);
        }
        return redirect()->route('danhsachNV');

    }

    public function SearchEmployee(Request $request){
        $pageSize = 4;
        $search = $request->get('search');
        $employees= Employees::whereColumn('EMPLOYEES_NO', 'LIKE', "%$search%")->orWhere('EMPLOYEES_LASTNAME', 'LIKE', "%$search%")->with('Positions')->paginate($pageSize);

        $position = Positions::all();
       // dd($employees);
        return view('page.admin.EmployeesPage',['position'=>$position,'employees'=>$employees, 'pageSize'=>$pageSize]);
    }

    public function DeleteEmployees( $employees_id, Request $request)
    {
        $employees=Employees::find($employees_id);
        $employees->EMPLOYEES_STATUS=0;
        $employees->EMPLOYEES_ENDDATE=$request->employees_endday;

        $employees->save();
        if($employees){
            $error_status_employees='Xóa thành công';
            session()->flash('error_status_employees',$error_status_employees);
        }else{
            $error_status_employees='Xóa thất bại';
            session()->flash('error_status_employees',$error_status_employees);
        }

        return redirect()->route('danhsachNV');

    }
}
