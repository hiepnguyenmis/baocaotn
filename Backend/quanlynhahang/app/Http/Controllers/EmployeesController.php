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

class EmployeesController extends Controller
{
    public function ListEmployees()
    {
        $pageSize = 4;
        $employees = Employees::with('Positions')->paginate($pageSize);

        $position = Positions::all();

        return view('page.admin.EmployeesPage', ['position' => $position, 'employees' => $employees, 'pageSize' => $pageSize]);
    }
    protected function Updload( $request)
    {

    }

    public function AddEmployees(Request $request)
    {

        // $this->validate(
        //     $request,[

        //         'employees_lastname'=>'required|min:5|max:50',
        //         'employees_firstname'=>'required|min:5|max:50',
        //         'employees_phone'=>'required|min:5|max:50',
        //         'employees_mail'=>'required|min:5|max:50',
        //         'image_name'=>'required',
        //         'employees_address'=>'required|min:5|max:50',
        //         'employees_startday'=>'required|min:5|max:50',
        //         'employees_birthday'=>'required|min:5|max:50',
        //         'employees_gender'=>'required',
        //         'employees_position_id'=>'required'
        //     ],[
        //         'required' => ':attribute Không được để trống',
        //         'min' => ':attribute Không được nhỏ hơn :min',
        //         'max' => ':attribute Không được lớn hơn :max',
        //     ],[

        //         'employees_lastname'=>'Họ',
        //         'employees_firstname'=>'Tên',
        //         'employees_phone'=>'Số điện thoại',
        //         'employees_mail'=>'Email',
        //         'image_name'=>'Hình ảnh',
        //         'employees_address'=>'Địa chỉ',
        //         'employees_startday'=>'Ngày vào làm',
        //         'employees_birthday'=>'Ngày sinh',
        //         'employees_gender'=>'Giới tính',
        //         'employees_position_id'=>'Chức vụ'
        //     ]

        // );


        $employees_no = null;
        $rand_code = (string) rand(1111, 10000);

        $get_year = Carbon::now()->year;
        $get_month = Carbon::now()->month;
        $employees_no = 'NV' . $get_year . $get_month . $rand_code;

        $this->validate($request, [
            'image'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
           ]);

           $image = $request->file('image');

           $image_name = $image->getClientOriginalName();
           $destinationPath = public_path('/thumbnail');
           $resize_image = Image::make($image->getRealPath());
           $resize_image->resize(150, 150, function($constraint){
            $constraint->aspectRatio();
           })->save($destinationPath . '/' . $image_name);
           $destinationPath = public_path('/uploads');
           $image->move($destinationPath, $image_name);

        $employees = new Employees();

        $employees->EMPLOYEES_NO = $employees_no;
        $employees->EMPLOYEES_LASTNAME = $request->employees_lastname;
        $employees->EMPLOYEES_USERNAME = $employees->EMPLOYEES_NO;
        $employees->EMPLOYEES_FIRSTNAME = $request->employees_firstname;
        $employees->EMPLOYEES_PHONE = $request->employees_phone;
        $employees->EMPLOYEES_EMAIL = $request->employees_mail;
        $employees->EMPLOYEES_PASSWORD = md5($employees_no);
        $employees->EMPLOYEES_IMG =$image_name;
        $employees->POSITION_ID = $request->employees_position_id;
        $employees->EMPLOYEES_STATUS = 1;
        $employees->EMPLOYEES_ADDRESS = $request->employees_address;
        $employees->EMPLOYEES_STARTDAY = $request->employees_startday;
        $employees->EMPLOYEES_BIRTHDAY = $request->employees_birthday;
        $employees->EMPLOYEES_GENDER = $request->employees_gender;
        $employees->EMPLOYEES_AGE = null;

        $employees->save();

        return redirect()->route('danhsachNV');

    }

    public function EditEmployees($employees_id, Request $request)
    {
        // $this->validate(
        //     $request,[

        //         'employees_lastname'=>'required|min:5|max:50',
        //         'employees_firstname'=>'required|min:5|max:50',
        //         'employees_phone'=>'required|min:5|max:50',
        //         'employees_mail'=>'required|min:5|max:50',
        //         'image_name'=>'required',
        //         'employees_address'=>'required|min:5|max:50',
        //         'employees_startday'=>'required|min:5|max:50',
        //         'employees_birthday'=>'required|min:5|max:50',
        //         'employees_gender'=>'required',
        //         'employees_password'=>'confirmed',
        //         'employees_password_confirmation'=>'confirmed'

        //     ],[
        //         'required' => ':attribute Không được để trống',
        //         'min' => ':attribute Không được nhỏ hơn :min',
        //         'max' => ':attribute Không được lớn hơn :max',
        //     ],[

        //         'employees_lastname'=>'Họ',
        //         'employees_firstname'=>'Tên',
        //         'employees_phone'=>'Số điện thoại',
        //         'employees_mail'=>'Email',
        //         'image_name'=>'Hình ảnh',
        //         'employees_address'=>'Địa chỉ',
        //         'employees_startday'=>'Ngày vào làm',
        //         'employees_birthday'=>'Ngày sinh',
        //         'employees_gender'=>'Giới tính',
        //         'employees_password'=>'Mật khẩu',
        //         'employees_password_confirmation'=>'Xác nhận mật khẩu'
        //     ]

        // );

        $employees = Employees::find($employees_id);

        if($request->image!=null){
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName().$employees->EMPLOYEES_ID;
            if($image_name!=$employees->EMPLOYEES_IMG){

                $image_name = $image->getClientOriginalName();
                $destinationPath = public_path('/thumbnail');
                $resize_image = Image::make($image->getRealPath());
                $resize_image->resize(150, 150, function($constraint){
                $constraint->aspectRatio();
                })->save($destinationPath . '/' . $image_name);
                $destinationPath = public_path('/uploads');
                File::delete($destinationPath.$employees->EMPLOYEES_IMG);
                $image->move($destinationPath, $image_name);
            }


        }else{
            $this->validate($request, [
                'image'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
               ]);

               $image = $request->file('image');

               $image_name = $image->getClientOriginalName();
               $destinationPath = public_path('/thumbnail');
               $resize_image = Image::make($image->getRealPath());
               $resize_image->resize(150, 150, function($constraint){
                $constraint->aspectRatio();
               })->save($destinationPath . '/' . $image_name);
               $destinationPath = public_path('/uploads');
               $image->move($destinationPath, $image_name);
        }
        $employees->EMPLOYEES_LASTNAME = $request->employees_lastname;
        $employees->EMPLOYEES_USERNAME = $request->employees_username;
        $employees->EMPLOYEES_FIRSTNAME = $request->employees_fistname;
        $employees->EMPLOYEES_PHONE = $request->employees_phone;
        $employees->EMPLOYEES_EMAIL = $request->employees_mail;
        $employees->EMPLOYEES_PASSWORD = $request->employees_password;
        $employees->EMPLOYEES_IMG = $image_name;
        $employees->POSITION_ID = $request->employees_position_id;
        $employees->EMPLOYEES_STATUS = 1;
        $employees->EMPLOYEES_ADDRESS = $request->employees_address;
        $employees->EMPLOYEES_STARTDAY = $request->employees_startday;
        $employees->EMPLOYEES_BIRTHDAY = $request->employees_birthday;
        $employees->EMPLOYEES_GENDER = $request->employees_gender;
        $employees->EMPLOYEES_AGE = $request->employees_age;

        $employees->save();

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


        return redirect()->route('danhsachNV');

    }
}
