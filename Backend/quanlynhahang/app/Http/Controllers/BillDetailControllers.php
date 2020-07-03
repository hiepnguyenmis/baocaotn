<?php

namespace App\Http\Controllers;

use App\BillDetails;
use App\Bills as AppBills;
use App\Customers as AppCustomers;
use Illuminate\Http\Request;

use DB;
use App\BillDetail;
use App\Bills;
use App\Customers;
use Session;

class BillDetailControllers extends Controller
{
    public function GetBillDetail($customers_no, $bill_id)
    {
        if (Session::has('login')) {
            if ($bill_id != null) {
                $customers = Customers::where('CUSTOMER_NO', '=', $customers_no)->get();

                $findBillid = Bills::join('employees', 'bills.EMPLOYEE_ID', '=', 'employees.EMPLOYEES_ID')
                    ->join('positions', 'employees.POSITION_ID', '=', 'positions.POSITION_ID')
                    ->where('BILL_ID', '=', $bill_id)
                    ->select(
                        'BILL_NO',
                        'BILL_DATE',
                        'POSITION_NAME',
                        'EMPLOYEES_LASTNAME',
                        'EMPLOYEES_FIRSTNAME'
                    )->get();

                $billdetail = BillDetails::join('foods', 'billdetail.FOOD_ID', '=', 'foods.FOOD_ID')
                    ->join('bills', 'billdetail.BILLDETAIL_ID', '=', 'bills.BILL_ID')
                    ->where('billdetail.BILLDETAIL_ID', '=', $bill_id)
                    ->get();

                return view('page.admin.BillDetailPage', [
                    'customers' => $customers,
                    'billdetail' => $billdetail,
                    'findBillid' => $findBillid
                ]);

                //return $findBillid;

            } else {
                $error = 'Mã hóa đơn không đúng';
                return $error;
            }
        }else{
            return redirect('trangquantri/dang-nhap');
        }
    }
}
