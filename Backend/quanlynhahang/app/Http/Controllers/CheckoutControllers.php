<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
class CheckoutControllers extends Controller
{
    public function GetDataCheckout()
    {
        if (Session::has('customer_no')) {
            return view('page.index.CheckoutInfoPage');
        }
        return redirect('trang/dang-nhap');
    }

    public function Checkout(Request $request)
    {
        $request->validate([

            'bill_phone' => ['bail', 'required', 'regex:/((09|03|07|08|05)+([0-9]{8})\b)/'],
            'bill_password' => 'bail|required|min:8'
        ], [
            'customer_phone.required' => 'Không bỏ trống trường này',
            'customer_phone.regex' => 'Số điện thoại không đúng',
            'customer_password.required' => 'Không bỏ trống trường này',
            'customer_password.min' => 'Password phải lớn hơn 8 ký tự',

        ]);

        $employees_no = null;
        $rand_code = (string) rand(1111, 10000);

        $get_year = Carbon::now()->year;
        $get_month = Carbon::now()->month;
        $employees_no = 'NV' . $get_year . $get_month . $rand_code;
    }
}
