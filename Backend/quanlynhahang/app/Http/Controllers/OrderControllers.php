<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
class OrderControllers extends Controller
{
    public function GetPageOrder()
    {
        if(Session::has('login')){
            $employee_lastname=Session::get('employee_lastname') ;
            $employee_firstname=Session::get('employee_firstname');
            $employee_img=Session::get('employee_image');
            $name_employees=$employee_lastname." ".$employee_firstname;
            $check_employee=Session::get('login');

            $id_employees=Session::get('employee_id');
            return view('page.booking.OrderPage',[
                'name_employees'=> $name_employees,
                'id_employees'=>$id_employees,
                'check_employee'=>$check_employee,
                'employee_img'=>$employee_img

            ]);
        }

    }
}
