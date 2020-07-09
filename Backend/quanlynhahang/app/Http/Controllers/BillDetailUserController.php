<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bills;
use App\BillDetails;
use App\Customers;
use DB;
class BillDetailUserController extends Controller
{
    public function DetailOrderUser($bill_no)
    {

        $bilInfor = Bills::join('billdetail', 'bills.BILL_ID', '=', 'billdetail.BILLDETAIL_ID')
            ->join('customers', 'bills.CUSTOMER_ID', '=', 'customers.CUSTOMER_ID')

            ->whereNotNull('bills.BILL_NO')
            ->where('bills.BILL_NO', '=', $bill_no)
            ->groupby(
                'bills.BILL_ID',
                'bills.BILL_PAID',
                'bills.BILL_DELIVERYADDRESS',
                'customers.CUSTOMER_EMAIL',
                'customers.CUSTOMER_ADD',
                'bills.BILL_DATE',
                'customers.CUSTOMER_PHONE',
                'customers.CUSTOMER_NO',
                'customers.CUSTOMER_NAME',
                'bills.BILL_NO',
                'bills.BILL_STATUS',
                'bills.BILL_NOTE',

                'bills.BILL_PROMOTION',
                'bills.BILL_PAID'
            )
            ->select(
                'bills.BILL_ID',
                'bills.BILL_PAID',
                'bills.BILL_DELIVERYADDRESS',
                'customers.CUSTOMER_EMAIL',
                'customers.CUSTOMER_ADD',
                'bills.BILL_DATE',
                'customers.CUSTOMER_PHONE',
                'customers.CUSTOMER_NO',
                'customers.CUSTOMER_NAME',
                'bills.BILL_NO',
                'bills.BILL_STATUS',
                'bills.BILL_NOTE',

                'bills.BILL_PROMOTION',
                'bills.BILL_PAID',
                DB::raw('SUM(billdetail.BILLDETAIL_PRICE* billdetail.BILLDETAIL_AMOUNT) as BILL_TOTAL')
            )
            ->get();

        foreach ($bilInfor as $item) {
            $billId = $item->BILL_ID;
        }
        $billdetail = BillDetails::join('foods', 'billdetail.FOOD_ID', '=', 'foods.FOOD_ID')
            ->join('bills', 'billdetail.BILLDETAIL_ID', '=', 'bills.BILL_ID')
            ->where('billdetail.BILLDETAIL_ID', '=', $billId)
            ->get();

        return view('page.index.BillDetailUserPage', ['bilInfor' => $bilInfor, 'billdetail' => $billdetail]);
    }
}
