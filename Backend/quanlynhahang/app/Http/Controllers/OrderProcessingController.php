<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bills;
use App\BillDetails;
use DB;
use Session;

class OrderProcessingController extends Controller
{
    public function GetAllOrder()
    {
        if (Session::has('login')) {
            $billWaitting = Bills::join('billdetail', 'bills.BILL_ID', '=', 'billdetail.BILLDETAIL_ID')
                ->join('customers', 'bills.CUSTOMER_ID', '=', 'customers.CUSTOMER_ID')
                ->whereNotNull('bills.BILL_NO')
                ->where('bills.BILL_STATUS', '=', 2)
                ->groupby('bills.BILL_ID', 'bills.BILL_PAID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS')
                ->select('bills.BILL_ID', 'bills.BILL_PAID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS', DB::raw('SUM(billdetail.BILLDETAIL_PRICE* billdetail.BILLDETAIL_AMOUNT) as BILL_TOTAL'))
                ->paginate(4, ['*'], 'billWaitting');

            $billProcessing = Bills::join('billdetail', 'bills.BILL_ID', '=', 'billdetail.BILLDETAIL_ID')
                ->join('customers', 'bills.CUSTOMER_ID', '=', 'customers.CUSTOMER_ID')
                ->whereNotNull('bills.BILL_NO')
                ->where('bills.BILL_STATUS', '=', 3)
                ->groupby('bills.BILL_ID', 'bills.BILL_PAID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS')
                ->select('bills.BILL_ID', 'bills.BILL_PAID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS', DB::raw('SUM(billdetail.BILLDETAIL_PRICE* billdetail.BILLDETAIL_AMOUNT) as BILL_TOTAL'))
                ->paginate(4, ['*'], 'billProcessing');

            $billShipping = Bills::join('billdetail', 'bills.BILL_ID', '=', 'billdetail.BILLDETAIL_ID')
                ->join('customers', 'bills.CUSTOMER_ID', '=', 'customers.CUSTOMER_ID')
                ->whereNotNull('bills.BILL_NO')
                ->where('bills.BILL_STATUS', '=', 4)
                ->groupby('bills.BILL_ID', 'bills.BILL_PAID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS')
                ->select('bills.BILL_ID', 'bills.BILL_PAID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS', DB::raw('SUM(billdetail.BILLDETAIL_PRICE* billdetail.BILLDETAIL_AMOUNT) as BILL_TOTAL'))
                ->paginate(4, ['*'], 'billProcessing');

            return view(
                'page.admin.OrderProcessingPage',
                [
                    'billWaitting' => $billWaitting,
                    'billProcessing' => $billProcessing,
                    'billShipping' => $billShipping
                ]
            );
        }
        return redirect('trangquantri/dang-nhap');
    }

    public function SearchOrderProcessing(Request $request)
    {
        $request->validate([

            'Search-Order-Processing' => ['bail', 'required', 'regex:/(?i)^(?=.*[a-z])[a-z0-9]{8,20}$/']

        ], [
            'Search-Order-Processing.required' => 'Không bỏ trống trường này',
            'Search-Order-Processing.regex' => 'Chỉ nhập mã hóa đơn',

        ]);
        $search = $request->get('Search-Order-Processing');
        $billWaitting = Bills::join('billdetail', 'bills.BILL_ID', '=', 'billdetail.BILLDETAIL_ID')
            ->join('customers', 'bills.CUSTOMER_ID', '=', 'customers.CUSTOMER_ID')
            ->whereNotNull('bills.BILL_NO')
            ->where('bills.BILL_STATUS', '=', 2)
            ->groupby('bills.BILL_ID', 'bills.BILL_PAID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS')
            ->select('bills.BILL_ID', 'bills.BILL_PAID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS', DB::raw('SUM(billdetail.BILLDETAIL_PRICE* billdetail.BILLDETAIL_AMOUNT) as BILL_TOTAL'))
            ->paginate(4, ['*'], 'billWaitting');

        $billProcessing = Bills::join('billdetail', 'bills.BILL_ID', '=', 'billdetail.BILLDETAIL_ID')
            ->join('customers', 'bills.CUSTOMER_ID', '=', 'customers.CUSTOMER_ID')
            ->whereNotNull('bills.BILL_NO')
            ->where('bills.BILL_NO', '=', $search)
            ->where('bills.BILL_STATUS', '=', 3)
            ->groupby('bills.BILL_ID', 'bills.BILL_PAID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS')
            ->select('bills.BILL_ID', 'bills.BILL_PAID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS', DB::raw('SUM(billdetail.BILLDETAIL_PRICE* billdetail.BILLDETAIL_AMOUNT) as BILL_TOTAL'))
            ->paginate(4, ['*'], 'billProcessing');

        $billShipping = Bills::join('billdetail', 'bills.BILL_ID', '=', 'billdetail.BILLDETAIL_ID')
            ->join('customers', 'bills.CUSTOMER_ID', '=', 'customers.CUSTOMER_ID')
            ->whereNotNull('bills.BILL_NO')
            ->where('bills.BILL_STATUS', '=', 4)
            ->groupby('bills.BILL_ID', 'bills.BILL_PAID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS')
            ->select('bills.BILL_ID', 'bills.BILL_PAID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS', DB::raw('SUM(billdetail.BILLDETAIL_PRICE* billdetail.BILLDETAIL_AMOUNT) as BILL_TOTAL'))
            ->paginate(4, ['*'], 'billProcessing');

        return view(
            'page.admin.OrderProcessingPage',
            [
                'billWaitting' => $billWaitting,
                'billProcessing' => $billProcessing,
                'billShipping' => $billShipping
            ]
        );
    }

    public function SearchOrderShipping(Request $request)
    {
        $request->validate([

            'Search-Order-Shipping' => ['bail', 'required', 'regex:/(?i)^(?=.*[a-z])[a-z0-9]{8,20}$/']

        ], [
            'Search-Order-Shipping.required' => 'Không bỏ trống trường này',
            'Search-Order-Shipping.regex' => 'Chỉ nhập mã hóa đơn',

        ]);
        $search = $request->get('Search-Order-Shipping');
        $billWaitting = Bills::join('billdetail', 'bills.BILL_ID', '=', 'billdetail.BILLDETAIL_ID')
            ->join('customers', 'bills.CUSTOMER_ID', '=', 'customers.CUSTOMER_ID')
            ->whereNotNull('bills.BILL_NO')
            ->where('bills.BILL_STATUS', '=', 2)
            ->groupby('bills.BILL_ID', 'bills.BILL_PAID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS')
            ->select('bills.BILL_ID', 'bills.BILL_PAID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS', DB::raw('SUM(billdetail.BILLDETAIL_PRICE* billdetail.BILLDETAIL_AMOUNT) as BILL_TOTAL'))
            ->paginate(4, ['*'], 'billWaitting');

        $billProcessing = Bills::join('billdetail', 'bills.BILL_ID', '=', 'billdetail.BILLDETAIL_ID')
            ->join('customers', 'bills.CUSTOMER_ID', '=', 'customers.CUSTOMER_ID')
            ->whereNotNull('bills.BILL_NO')
            ->where('bills.BILL_STATUS', '=', 3)
            ->groupby('bills.BILL_ID', 'bills.BILL_PAID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS')
            ->select('bills.BILL_ID', 'bills.BILL_PAID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS', DB::raw('SUM(billdetail.BILLDETAIL_PRICE* billdetail.BILLDETAIL_AMOUNT) as BILL_TOTAL'))
            ->paginate(4, ['*'], 'billProcessing');

        $billShipping = Bills::join('billdetail', 'bills.BILL_ID', '=', 'billdetail.BILLDETAIL_ID')
            ->join('customers', 'bills.CUSTOMER_ID', '=', 'customers.CUSTOMER_ID')
            ->whereNotNull('bills.BILL_NO')
            ->where('bills.BILL_NO', '=', $search)
            ->where('bills.BILL_STATUS', '=', 4)
            ->groupby('bills.BILL_ID', 'bills.BILL_PAID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS')
            ->select('bills.BILL_ID', 'bills.BILL_PAID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS', DB::raw('SUM(billdetail.BILLDETAIL_PRICE* billdetail.BILLDETAIL_AMOUNT) as BILL_TOTAL'))
            ->paginate(4, ['*'], 'billProcessing');

        return view(
            'page.admin.OrderProcessingPage',
            [
                'billWaitting' => $billWaitting,
                'billProcessing' => $billProcessing,
                'billShipping' => $billShipping
            ]
        );
    }

    // detail
    public function DetailOrderProcessing($bill_no)
    {
        $bilInfor = Bills::join('billdetail', 'bills.BILL_ID', '=', 'billdetail.BILLDETAIL_ID')
            ->join('customers', 'bills.CUSTOMER_ID', '=', 'customers.CUSTOMER_ID')
            ->join('employees', 'bills.EMPLOYEE_ID', '=', 'employees.EMPLOYEES_ID')
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
                'employees.EMPLOYEES_LASTNAME',
                'employees.EMPLOYEES_FIRSTNAME',
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
                'employees.EMPLOYEES_LASTNAME',
                'employees.EMPLOYEES_FIRSTNAME',
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

        return view('page.admin.BillDetailProcessingPage', ['bilInfor' => $bilInfor, 'billdetail' => $billdetail]);
    }

    public function OrderConfirm($bill_no)
    {
        $bills = Bills::find($bill_no);
        $bills->BILL_STATUS = 4;

        $bills->save();
        if ($bills) {
            $success = 'Đã hoàn thành đơn hàng';
            Session::flash('statusBillConfirmEditSuccess', $success);
        } else {
            $error = 'Thay đổi thất bại';
            Session::flash('statusBillConfirmEditError', $error);
        }
        return redirect('trangquantri/quanlydonhang');
        return redirect('trangquantri/quanlydonhang');
    }

    public function DetailOrderWaiting($bill_no)
    {
        $bilInforWaiting = Bills::join('billdetail', 'bills.BILL_ID', '=', 'billdetail.BILLDETAIL_ID')
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
        $billIdWaiting = null;
        foreach ($bilInforWaiting as $item) {
            $billIdWaiting = $item->BILL_ID;
        }
        $billdetailWaiting = BillDetails::join('foods', 'billdetail.FOOD_ID', '=', 'foods.FOOD_ID')
            ->join('bills', 'billdetail.BILLDETAIL_ID', '=', 'bills.BILL_ID')
            ->where('billdetail.BILLDETAIL_ID', '=', $billIdWaiting)
            ->get();

        return view('page.admin.BillDetailWaitingPage', ['bilInforWaiting' => $bilInforWaiting, 'billdetailWaiting' => $billdetailWaiting]);
    }
    public function OrderCheckout($bill_id, Request $request)
    {
        $bills = Bills::find($bill_id);
        $bills->BILL_STATUS = 3;
        $bills->BILL_NOTE = $request->bills_note;
        $bills->save();
        if ($bills) {
            $success = 'Đã duyệt đơn hàng thành công';
            Session::flash('statusBillProcessEditSuccess', $success);
        } else {
            $error = 'Thay đổi thất bại';
            Session::flash('statusBillProcessEditError', $error);
        }
        return redirect('trangquantri/quanlydonhang');
    }
    public function DetailOrderShipping($bill_no)
    {
        $bilInforShipping = Bills::join('billdetail', 'bills.BILL_ID', '=', 'billdetail.BILLDETAIL_ID')
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
        $billIdShipping = null;
        foreach ($bilInforShipping as $item) {
            $billIdShipping = $item->BILL_ID;
        }
        $billdetailShipping = BillDetails::join('foods', 'billdetail.FOOD_ID', '=', 'foods.FOOD_ID')
            ->join('bills', 'billdetail.BILLDETAIL_ID', '=', 'bills.BILL_ID')
            ->where('billdetail.BILLDETAIL_ID', '=', $billIdShipping)
            ->get();

        return view('page.admin.BillDetailShippingPage', ['bilInforShipping' => $bilInforShipping, 'billdetailShipping' => $billdetailShipping]);
    }
}
