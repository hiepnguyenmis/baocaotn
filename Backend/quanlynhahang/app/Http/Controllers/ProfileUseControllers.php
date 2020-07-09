<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bills;
use App\Customers;
use DB;
class ProfileUseControllers extends Controller
{
    public function GetProfile($customers_no)
    {
        $billWaitting = Bills::join('billdetail', 'bills.BILL_ID', '=', 'billdetail.BILLDETAIL_ID')
                ->join('customers', 'bills.CUSTOMER_ID', '=', 'customers.CUSTOMER_ID')
                ->whereNotNull('bills.BILL_NO')
                ->where('bills.BILL_STATUS', '=', 2)
                ->where('customers.CUSTOMER_NO','=',$customers_no)
                ->groupby('bills.BILL_ID', 'bills.BILL_PAID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS')
                ->select('bills.BILL_ID', 'bills.BILL_PAID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS', DB::raw('SUM(billdetail.BILLDETAIL_PRICE* billdetail.BILLDETAIL_AMOUNT) as BILL_TOTAL'))

                ->paginate(10, ['*'], 'billWaitting');
        $billProcessing = Bills::join('billdetail', 'bills.BILL_ID', '=', 'billdetail.BILLDETAIL_ID')
                ->join('customers', 'bills.CUSTOMER_ID', '=', 'customers.CUSTOMER_ID')
                ->whereNotNull('bills.BILL_NO')
                ->where('bills.BILL_STATUS', '=', 3)
                ->where('customers.CUSTOMER_NO','=',$customers_no)
                ->groupby('bills.BILL_ID', 'bills.BILL_PAID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS')
                ->select('bills.BILL_ID', 'bills.BILL_PAID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS', DB::raw('SUM(billdetail.BILLDETAIL_PRICE* billdetail.BILLDETAIL_AMOUNT) as BILL_TOTAL'))
                ->paginate(4, ['*'], 'billProcessing');

        $billShipping = Bills::join('billdetail', 'bills.BILL_ID', '=', 'billdetail.BILLDETAIL_ID')
                ->join('customers', 'bills.CUSTOMER_ID', '=', 'customers.CUSTOMER_ID')
                ->whereNotNull('bills.BILL_NO')
                ->where('bills.BILL_STATUS', '=', 4)
                ->where('customers.CUSTOMER_NO','=',$customers_no)
                ->groupby('bills.BILL_ID', 'bills.BILL_PAID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS')
                ->select('bills.BILL_ID', 'bills.BILL_PAID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS', DB::raw('SUM(billdetail.BILLDETAIL_PRICE* billdetail.BILLDETAIL_AMOUNT) as BILL_TOTAL'))
                ->paginate(4, ['*'], 'billProcessing');
        $billSucces = Bills::join('billdetail', 'bills.BILL_ID', '=', 'billdetail.BILLDETAIL_ID')
                ->join('customers', 'bills.CUSTOMER_ID', '=', 'customers.CUSTOMER_ID')
                ->whereNotNull('bills.BILL_NO')
                ->where('bills.BILL_STATUS', '=', 1)
                ->where('customers.CUSTOMER_NO','=',$customers_no)
                ->groupby('bills.BILL_ID', 'bills.BILL_PAID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS')
                ->select('bills.BILL_ID', 'bills.BILL_PAID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS', DB::raw('SUM(billdetail.BILLDETAIL_PRICE* billdetail.BILLDETAIL_AMOUNT) as BILL_TOTAL'))
                ->paginate(4, ['*'], 'billSucces');
        $customer=Customers::where('customers.CUSTOMER_NO','=',$customers_no)->get();
        $purchase=Bills::join('customers', 'bills.CUSTOMER_ID', '=', 'customers.CUSTOMER_ID')
                ->whereNotNull('bills.BILL_NO')
                ->where('bills.BILL_STATUS', '=', 1)
                ->where('customers.CUSTOMER_NO','=',$customers_no)
                ->select(DB::raw('count(bills.BILL_ID) as COUNT_BILL_SUCCESS'))
                ->get();

            return view(
                'page.index.ProfileUserPage',
                [
                    'billWaitting' => $billWaitting,
                    'billProcessing' => $billProcessing,
                    'billShipping' => $billShipping,
                    'billSucces'=>$billSucces,
                    'customer'=>$customer,
                    'purchase'=>$purchase
                ]
            );
    }
}
