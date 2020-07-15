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
        if (Session::has('login')) {
            $pageSize = 4;
            $employees = Employees::with('Positions')
                ->where('employees.EMPLOYEES_STATUS', '=', 1)
                ->whereNull('employees.EMPLOYEES_ENDDAY')
                ->orderby('employees.EMPLOYEES_ID', 'DESC')

                ->paginate($pageSize);

            $position = Positions::all();

            return view('page.admin.EmployeesPage', ['position' => $position, 'employees' => $employees, 'pageSize' => $pageSize]);
        }
        return redirect('trangquantri/dang-nhap');
    }

    protected function isDuplicatePhone($employees_phone_dupli)
    {
        $employees = Employees::all();
        foreach ($employees as $item) {
            if ($item->EMPLOYEES_PHONE == $employees_phone_dupli) {
                return false;
            }
        }
        return true;
    }
    protected function isDuplicateEmail($employees_email_dupli)
    {
        $employees = Employees::all();
        foreach ($employees as $item) {
            if ($item->EMPLOYEES_EMAIL == $employees_email_dupli) {
                return false;
            }
        }
        return true;
    }
    public function GetAdmin()
    {

        if(Session::has('login')){
            return redirect('trangquantri/');
        }
        return view('page.Login.LoginAdmin');


    }
    protected function LoginAdmin(Request $request)
    {

        $request->validate([


            'employee_password' => 'min:8'
        ], [
            'employee_password.min' => 'Password phải lớn hơn 8 ký tự',

        ]);

        $employee_username = $request->employee_username;
        $employee_password = $request->employee_password;

        $login = Employees::where('employees.EMPLOYEES_USERNAME', $employee_username)->get();
        if ($login != null) {
            foreach ($login as $item) {
                if (Hash::check($employee_password, $item->EMPLOYEES_PASSWORD)) {
                    session()->put('employee_firstname', $item->EMPLOYEES_FIRSTNAME);
                    session()->put('employee_lastname', $item->EMPLOYEES_LASTNAME);
                    session()->put('employee_no', $item->EMPLOYEES_NO);
                    session()->put('employee_id', $item->EMPLOYEES_ID);
                    session()->put('employee_image', $item->EMPLOYEES_IMG);
                    session()->put('login', Hash::make($item->EMPLOYEES_ID));
                    session()->put('igmanage',$item->EMPLOYEES_ISMANAGE);

                    if ($item->EMPLOYEES_ISMANAGE == 0) {

                        return redirect('trangquantri/thungan');
                    } else {

                        return redirect('trangquantri/');
                    }
                }
            }
        }
        Session::flash('errorLogin', 'Tên tài khoản hoặc mật khẩu không đúng');
        return redirect('trangquantri/dang-nhap');
    }
    public function LogoutAdmin()
    {
        session()->forget('employee_fistname');
        session()->forget('employee_lastname');
        session()->forget('employee_no');
        session()->forget('login');
        session()->forget('igmanage');
        return redirect('trangquantri/dang-nhap');
    }
    public function AddEmployees(Request $request)
    {
        $request->validate([

            'employees_phone' => ['bail', 'required', 'regex:/((09|03|07|08|05)+([0-9]{8})\b)/'],
            'employees_lastname' => 'required',
            'employees_firstname' => 'required',
            'employees_mail' => 'required|email',
            'employees_position_id' => 'required',
            'employees_address' => 'required',
            'employees_startday' => 'required',
            'employees_birthday' => 'required',
            'employees_gender' => 'required',

        ], [
            'employees_phone.required' => 'Không bỏ trống trường này',
            'employees_phone.regex' => 'Số điện thoại không đúng',
            'employees_lastname.required' => 'Không bỏ trống trường này',
            'employees_firstname.required' => 'Không bỏ trống trường này',
            'employees_mail.required' => 'Không bỏ trống trường này',
            'employees_mail.email' => 'Email không đúng',
            'employees_position_id.required' => 'Không bỏ trống trường này',
            'employees_address.required' => 'Không bỏ trống trường này',
            'employees_startday.required' => 'Không bỏ trống trường này',
            'employees_birthday.required' => 'Không bỏ trống trường này',
            'employees_gender.required' => 'Không bỏ trống trường này'


        ]);

        $employees_no = null;
        $rand_code = (string) rand(1111, 10000);

        $get_year = Carbon::now()->year;
        $get_month = Carbon::now()->month;
        $employees_no = 'NV' . $get_year . $get_month . $rand_code;
        if ($this->isDuplicateEmail($request->employees_mail)) {
            if ($this->isDuplicatePhone($request->employees_phone)) {
                $employees = new Employees();

                $employees->EMPLOYEES_NO = $employees_no;
                $employees->EMPLOYEES_LASTNAME = $request->employees_lastname;
                $employees->EMPLOYEES_USERNAME = $employees->EMPLOYEES_NO;
                $employees->EMPLOYEES_FIRSTNAME = $request->employees_firstname;
                $employees->EMPLOYEES_PHONE = $request->employees_phone;
                $employees->EMPLOYEES_EMAIL = $request->employees_mail;
                $employees->EMPLOYEES_PASSWORD = Hash::make($employees_no);
                $employees->EMPLOYEES_IMG = $request->employees_image;
                $employees->POSITION_ID = $request->employees_position_id;
                $employees->EMPLOYEES_STATUS = 1;
                $employees->EMPLOYEES_ADDRESS = $request->employees_address;
                $employees->EMPLOYEES_STARTDAY = $request->employees_startday;
                $employees->EMPLOYEES_BIRTHDAY = $request->employees_birthday;
                $employees->EMPLOYEES_GENDER = $request->employees_gender;


                $employees->save();

                if ($employees) {
                    $error_status_employees = 'Thêm thành công';
                    session()->flash('statusEmployeesSuccess', $error_status_employees);
                } else {
                    $error_status_employees = 'Thêm Thất bại';
                    session()->flash('statusEmployeesError', $error_status_employees);
                }
            } else {
                $errorDuplicateEmployessPhone = 'Số điện thoại đã tồn tại!';
                Session::flash('statusEmployeesWarningPhone', $errorDuplicateEmployessPhone);
            }
        } else {
            $errorDuplicateEmployeesEmail = 'Email đã tồn tại!';
            Session::flash('statusEmployeesWarningEmail', $errorDuplicateEmployeesEmail);
        }
        return redirect()->route('danhsachNV');
    }

    public function EditEmployees($employees_id, Request $request)
    {
        $request->validate([

            'employees_phone_edit' => ['required', 'regex:/((09|03|07|08|05)+([0-9]{8})\b)/'],
            'employees_lastname_edit' => 'required',
            'employees_firstname_edit' => 'required',
            'employees_mail_edit' => 'required|email',
            'employees_position_id_edit' => 'required',
            'employees_address_edit' => 'required',
            'employees_startday_edit' => 'required',
            'employees_birthday_edit' => 'required',
            'employees_gender_edit' => 'required',

        ], [
            'employees_phone_edit.required' => 'Không bỏ trống trường này',
            'employees_phone_edit.regex' => 'Số điện thoại không đúng',
            'employees_lastname_edit.required' => 'Không bỏ trống trường này',
            'employees_firstname_edit.required' => 'Không bỏ trống trường này',
            'employees_mail_edit.required' => 'Không bỏ trống trường này',
            'employees_mail_edit.email' => 'Email không đúng',
            'employees_position_id_edit.required' => 'Không bỏ trống trường này',
            'employees_address_edit.required' => 'Không bỏ trống trường này',
            'employees_startday_edit.required' => 'Không bỏ trống trường này',
            'employees_birthday_edit.required' => 'Không bỏ trống trường này',
            'employees_gender_edit.required' => 'Không bỏ trống trường này'

        ]);

        $employees = Employees::find($employees_id);
        $employees->EMPLOYEES_LASTNAME = $request->employees_lastname_edit;
        $employees->EMPLOYEES_FIRSTNAME = $request->employees_firstname_edit;
        $employees->EMPLOYEES_PHONE = $request->employees_phone_edit;
        $employees->EMPLOYEES_EMAIL = $request->employees_mail_edit;
        $employees->EMPLOYEES_IMG = $request->employees_image_edit;
        $employees->POSITION_ID = $request->employees_position_id_edit;
        $employees->EMPLOYEES_STATUS = 1;
        $employees->EMPLOYEES_ADDRESS = $request->employees_address_edit;
        $employees->EMPLOYEES_STARTDAY = $request->employees_startday_edit;
        $employees->EMPLOYEES_BIRTHDAY = $request->employees_birthday_edit;
        $employees->EMPLOYEES_GENDER = $request->employees_gender_edit;

        $employees->save();
        if ($employees) {
            $error_status_employees = 'Thay đổi thành công';
            session()->flash('statusEmployeesEditSuccess', $error_status_employees);
        } else {
            $error_status_employees = 'Thay đổi thất bại';
            session()->flash('statusEmployeesEditError', $error_status_employees);
        }
        return redirect()->route('danhsachNV');
    }

    public function SearchEmployee(Request $request)
    {
        $pageSize = 4;
        $search = $request->get('search');
        $employees = Employees::where('EMPLOYEES_NO', 'LIKE', "%$search%")->with('Positions')->paginate($pageSize);

        $position = Positions::all();
        // dd($employees);
        return view('page.admin.EmployeesPage', ['position' => $position, 'employees' => $employees, 'pageSize' => $pageSize]);
    }
    public function ResetPassWord($employees_id, $employees_no)
    {
        $employees = Employees::find($employees_id);
        $employees->EMPLOYEES_PASSWORD = Hash::make($employees_no);
        $employees->save();
        if ($employees) {
            $error_status_employees = 'Đặt lại mật khẩu thành công';
            session()->flash('statusEmployeesResetSuccess', $error_status_employees);
        } else {
            $error_status_employees = 'Đặt lại mật khẩu thất bại';
            session()->flash('statusEmployeesResetError', $error_status_employees);
        }
        return redirect()->route('danhsachNV');
    }
    public function DeleteEmployees($employees_id, Request $request)
    {
        $request->validate(
            [
                'employees_endday' => 'required',
            ],
            [
                'employees_endday.required' => 'Không bỏ trống trường này',
            ]
        );
        $employees = Employees::find($employees_id);
        $employees->EMPLOYEES_STATUS = 0;
        $employees->EMPLOYEES_ENDDAY = $request->employees_endday;

        $employees->save();
        if ($employees) {
            $error_status_employees = 'Xóa thành công';
            session()->flash('statusEmployeesDeleteSuccess', $error_status_employees);
        } else {
            $error_status_employees = 'Xóa thất bại';
            session()->flash('statusEmployeesDeleteError', $error_status_employees);
        }

        return redirect()->route('danhsachNV');
    }
}
