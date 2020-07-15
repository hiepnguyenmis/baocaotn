<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use App\Bills;
use App\BillDetails;
use App\Customers;
use App\Employees;
use App\Foods;

use Illuminate\Support\Facades\DB;

class StatisticsControllers extends Controller
{
    // ajax


    public function GetBills()
    {
        if (Session::has('login')) {
            $billArray = array();
            $billsYear = Bills::join('billdetail', 'bills.BILL_ID', '=', 'billdetail.BILLDETAIL_ID')
                ->whereNotNull('bills.BILL_NO')
                ->groupby(DB::raw('MONTH(bills.BILL_DATE)'), DB::raw('YEAR(bills.BILL_DATE)'))
                ->select(DB::raw('YEAR(bills.BILL_DATE) as year'))
                ->orderBy(DB::raw('MONTH(bills.BILL_DATE)'))
                ->get();
            foreach ($billsYear as $bill) {
                array_push($billArray, $bill->year);
            }
            $billArrayUnique = array_unique($billArray);

            $countbill = Bills::whereNotNull('bills.BILL_NO')
                ->select(DB::raw('COUNT(bills.BILL_ID) as countAllBill'))
                ->get();
            $countCustomer = Customers::where('customers.CUSTOMER_STATUS', '=', 1)
                ->select(DB::raw('COUNT(customers.CUSTOMER_ID) as countAllCustomer'))
                ->get();
            $countFoods = Foods::select(DB::raw('COUNT(foods.FOOD_ID) as countAllFood'))
                ->get();
            $countEmployees = Employees::whereNull('employees.EMPLOYEES_ENDDAY')
                ->select(DB::raw('COUNT(employees.EMPLOYEES_ID) as countAllEmployees'))
                ->get();

            return view(
                'page.Admin.Dashboard',
                [
                    'billArrayUnique' => $billArrayUnique,
                    'countbill' => $countbill,
                    'countCustomer' => $countCustomer,
                    'countFoods' => $countFoods,
                    'countEmployees' => $countEmployees
                ]
            );
        } else {
            return redirect('trangquantri/dang-nhap');
        }
    }
    // Statistics Bill
    public function StatisticsBill()
    {
        if (Session::has('login')) {
            $datetime = Carbon::now('Asia/Ho_Chi_Minh');
            $totalAllBillToday = 0;
            $totalAllBillYesterday = 0;
            $countBillYesterday = 0;
            $countBillToday = 0;

            $totalAllBillThisMonth = 0;
            $totalAllBillLastonth = 0;
            $countBillLastMonth = 0;
            $countBillThisMonth = 0;

            $countAllBill = 0;
            $totalAllBill = 0;

            // date
            $billToday = Bills::join('billdetail', 'bills.BILL_ID', '=', 'billdetail.BILLDETAIL_ID')
                ->join('customers', 'bills.CUSTOMER_ID', '=', 'customers.CUSTOMER_ID')
                ->whereNotNull('bills.BILL_NO')
                ->where('bills.BILL_DATE', '=', $datetime->toDateString())
                ->groupby('bills.BILL_ID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS')
                ->select('bills.BILL_ID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS', DB::raw('SUM(billdetail.BILLDETAIL_PRICE* billdetail.BILLDETAIL_AMOUNT) as BILL_TOTAL'))
                ->paginate(1, ['*'], 'billToday');

            $billTotalToday = Bills::join('billdetail', 'bills.BILL_ID', '=', 'billdetail.BILLDETAIL_ID')
                ->join('customers', 'bills.CUSTOMER_ID', '=', 'customers.CUSTOMER_ID')
                ->whereNotNull('bills.BILL_NO')
                ->where('bills.BILL_DATE', '=', $datetime->toDateString())
                ->select(DB::raw('SUM(billdetail.BILLDETAIL_PRICE * billdetail.BILLDETAIL_AMOUNT) as BILL_TOTAL'))
                ->get();
            $billTotalYesterday = Bills::join('billdetail', 'bills.BILL_ID', '=', 'billdetail.BILLDETAIL_ID')
                ->join('customers', 'bills.CUSTOMER_ID', '=', 'customers.CUSTOMER_ID')
                ->whereNotNull('bills.BILL_NO')
                ->where('bills.BILL_DATE', '=', DB::raw('DATE_ADD(CURDATE(),INTERVAL -1 DAY)'))
                ->groupby('bills.BILL_ID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS')
                ->select('bills.BILL_ID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS', DB::raw('SUM(billdetail.BILLDETAIL_PRICE* billdetail.BILLDETAIL_AMOUNT) as BILL_TOTAL'))
                ->get();

            $billCountToday = Bills::where('bills.BILL_DATE', '=', $datetime->toDateString())
                ->select(DB::raw('COUNT(bills.BILL_ID) as BILL_COUNT_TODAY'))
                ->get();
            $billCountYesterday = Bills::where('bills.BILL_DATE', '=', DB::raw('DATE_ADD(CURDATE(),INTERVAL -1 DAY)'))
                ->select(DB::raw('COUNT(bills.BILL_ID) as BILL_COUNT_TODAY'))
                ->get();

            foreach ($billTotalToday as $item) {
                $totalAllBillToday = $totalAllBillToday + $item->BILL_TOTAL;
            }
            foreach ($billTotalYesterday as $item) {
                $totalAllBillYesterday = $totalAllBillYesterday + $item->BILL_TOTAL;
            }
            foreach ($billCountToday as $item) {
                $countBillToday = $item->BILL_COUNT_TODAY;
            }
            foreach ($billCountYesterday as $item) {
                $countBillYesterday = $item->BILL_COUNT_TODAY;
            }
            $percentDate = 0;
            if ($totalAllBillToday != null) {
                $percentDate = (($totalAllBillToday - $totalAllBillYesterday) / $totalAllBillYesterday) * 100;

            }

            // month
            $billThisMonth = Bills::join('billdetail', 'bills.BILL_ID', '=', 'billdetail.BILLDETAIL_ID')
                ->join('customers', 'bills.CUSTOMER_ID', '=', 'customers.CUSTOMER_ID')
                ->whereNotNull('bills.BILL_NO')
                ->where(DB::raw('MONTH(bills.BILL_DATE)'), '=', Carbon::now()->month)
                ->groupby('bills.BILL_ID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS')
                ->select('bills.BILL_ID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS', DB::raw('SUM(billdetail.BILLDETAIL_PRICE * billdetail.BILLDETAIL_AMOUNT) as BILL_TOTAL'))
                ->paginate(4, ['*'], 'billThisMonth');

            $billTotalThisMonth = Bills::join('billdetail', 'bills.BILL_ID', '=', 'billdetail.BILLDETAIL_ID')
                ->join('customers', 'bills.CUSTOMER_ID', '=', 'customers.CUSTOMER_ID')
                ->whereNotNull('bills.BILL_NO')
                ->where(DB::raw('MONTH(bills.BILL_DATE)'), '=', Carbon::now()->month)
                ->select(DB::raw('SUM(billdetail.BILLDETAIL_PRICE * billdetail.BILLDETAIL_AMOUNT) as BILL_TOTAL'))
                ->get();

            $billTotalLastMonth = Bills::join('billdetail', 'bills.BILL_ID', '=', 'billdetail.BILLDETAIL_ID')
                ->join('customers', 'bills.CUSTOMER_ID', '=', 'customers.CUSTOMER_ID')
                ->whereNotNull('bills.BILL_NO')
                ->where(DB::raw('MONTH(bills.BILL_DATE)'), '=', DB::raw('MONTH(DATE_ADD(CURDATE(),INTERVAL -1 MONTH))'))
                ->groupby('bills.BILL_ID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS')
                ->select('bills.BILL_ID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS', DB::raw('SUM(billdetail.BILLDETAIL_PRICE * billdetail.BILLDETAIL_AMOUNT) as BILL_TOTAL'))
                ->get();

            $billCountThisMonth = Bills::where(DB::raw('MONTH(bills.BILL_DATE)'), '=', Carbon::now()->month)
                ->whereNotNull('bills.BILL_NO')
                ->select(DB::raw('COUNT(bills.BILL_ID) as BILL_COUNT_THIS_MONTH'))
                ->get();
            $billCountLastMonth = Bills::where(DB::raw('MONTH(bills.BILL_DATE)'), '=', DB::raw('MONTH(DATE_ADD(CURDATE(),INTERVAL -1 MONTH))'))
                ->select(DB::raw('COUNT(bills.BILL_ID) as BILL_COUNT_LAST_MONTH'))
                ->get();

            foreach ($billTotalThisMonth as $item) {
                $totalAllBillThisMonth = $totalAllBillThisMonth + $item->BILL_TOTAL;
            }

            foreach ($billTotalLastMonth as $item) {
                $totalAllBillLastonth = $totalAllBillLastonth + $item->BILL_TOTAL;
            }
            foreach ($billCountThisMonth as $item) {
                $countBillThisMonth = $item->BILL_COUNT_THIS_MONTH;
            }
            foreach ($billCountLastMonth as $item) {
                $countBillLastMonth = $item->BILL_COUNT_LAST_MONTH;
            }
            $percentMonth = 0;
            if ($totalAllBillThisMonth != 0) {
                $percentMonth = (($totalAllBillThisMonth - $totalAllBillLastonth) / $totalAllBillLastonth) * 100;
            }


            // all
            $GetAllBill = Bills::join('billdetail', 'bills.BILL_ID', '=', 'billdetail.BILLDETAIL_ID')
                ->join('customers', 'bills.CUSTOMER_ID', '=', 'customers.CUSTOMER_ID')
                ->whereNotNull('bills.BILL_NO')
                ->groupby('bills.BILL_ID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS')
                ->select('bills.BILL_ID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS', DB::raw('SUM(billdetail.BILLDETAIL_PRICE* billdetail.BILLDETAIL_AMOUNT) as BILL_TOTAL'))
                ->paginate(4, ['*'], 'GetAllBill');

            $billTotalAllBill = Bills::join('billdetail', 'bills.BILL_ID', '=', 'billdetail.BILLDETAIL_ID')
                ->join('customers', 'bills.CUSTOMER_ID', '=', 'customers.CUSTOMER_ID')
                ->whereNotNull('bills.BILL_NO')
                ->select(DB::raw('SUM(billdetail.BILLDETAIL_PRICE* billdetail.BILLDETAIL_AMOUNT) as BILL_TOTAL'))
                ->get();
            $billCountAllBill = Bills::whereNotNull('bills.BILL_NO')
                ->select(DB::raw('COUNT(bills.BILL_ID) as COUNT_BILL'))
                ->get();


            foreach ($billTotalAllBill as $item) {
                $totalAllBill = $totalAllBill + $item->BILL_TOTAL;
            }
            foreach ($billCountAllBill as $item) {
                $countAllBill = $item->COUNT_BILL;
            }

            return view(
                'page.Admin.StatisticsBills',
                [
                    'billToday' => $billToday,
                    'totalAllBillToday' => $totalAllBillToday,
                    'billThisMonth' => $billThisMonth,
                    'billTotalThisMonth' => $billTotalThisMonth,
                    'totalAllBillThisMonth' => $totalAllBillThisMonth,
                    'GetAllBill' => $GetAllBill,
                    'totalAllBill' => $totalAllBill,
                    'countAllBill' => $countAllBill,

                    'totalAllBillToday' => $totalAllBillToday,
                    'totalAllBillYesterday' => $totalAllBillYesterday,
                    'countBillToday' => $countBillToday,
                    'countBillYesterday' => $countBillYesterday,
                    'percentDate' => $percentDate,

                    'totalAllBillThisMonth' => $totalAllBillThisMonth,
                    'totalAllBillLastonth' => $totalAllBillLastonth,
                    'countBillThisMonth' => $countBillThisMonth,
                    'countBillLastMonth' => $countBillLastMonth,
                    'percentMonth' => $percentMonth
                ]
            );
        }else{
            return redirect('trangquantri/dang-nhap');
        }
    }
    public function CheckID($id)
    {
        $billtodaycheck = BIlls::whereNotNull('bills.BILL_NO')
            ->select('bills.BILL_NO');
        foreach ($billtodaycheck as $item) {
            if ($id == $item->BILL_NO) {
                return false;
            }
        }
        return true;
    }
    public function SearchBillToday(Request $request)
    {
        $datetime = Carbon::now('Asia/Ho_Chi_Minh');
        $totalAllBillToday = 0;
        $totalAllBillYesterday = 0;
        $countBillYesterday = 0;
        $countBillToday = 0;

        $totalAllBillThisMonth = 0;
        $totalAllBillLastonth = 0;
        $countBillLastMonth = 0;
        $countBillThisMonth = 0;

        $countAllBill = 0;
        $totalAllBill = 0;
        //today
        $request->validate([

            'search' => ['bail', 'required', 'regex:/(?i)^(?=.*[a-z])[a-z0-9]{8,20}$/'],

        ], [
            'search.required' => 'Không bỏ trống trường này',
            'search.regex' => 'Chỉ nhập mã hóa đơn',


        ]);
        $search = $request->get('search');

        $billToday = Bills::join('billdetail', 'bills.BILL_ID', '=', 'billdetail.BILLDETAIL_ID')
            ->join('customers', 'bills.CUSTOMER_ID', '=', 'customers.CUSTOMER_ID')
            ->whereNotNull('bills.BILL_NO')
            ->where('bills.BILL_DATE', '=', $datetime->toDateString())
            ->where('bills.BILL_NO', 'LIKE', "%$search%")
            ->groupby('bills.BILL_ID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS')
            ->select('bills.BILL_ID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS', DB::raw('SUM(billdetail.BILLDETAIL_PRICE) as BILL_TOTAL'))
            ->paginate(1, ['*'], 'billToday');
        $billTotalToday = Bills::join('billdetail', 'bills.BILL_ID', '=', 'billdetail.BILLDETAIL_ID')
            ->join('customers', 'bills.CUSTOMER_ID', '=', 'customers.CUSTOMER_ID')
            ->whereNotNull('bills.BILL_NO')
            ->where('bills.BILL_DATE', '=', $datetime->toDateString())
            ->select(DB::raw('SUM(billdetail.BILLDETAIL_PRICE * billdetail.BILLDETAIL_AMOUNT) as BILL_TOTAL'))
            ->get();
        $billTotalYesterday = Bills::join('billdetail', 'bills.BILL_ID', '=', 'billdetail.BILLDETAIL_ID')
            ->join('customers', 'bills.CUSTOMER_ID', '=', 'customers.CUSTOMER_ID')
            ->whereNotNull('bills.BILL_NO')
            ->where('bills.BILL_DATE', '=', DB::raw('DATE_ADD(CURDATE(),INTERVAL -1 DAY)'))
            ->groupby('bills.BILL_ID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS')
            ->select('bills.BILL_ID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS', DB::raw('SUM(billdetail.BILLDETAIL_PRICE* billdetail.BILLDETAIL_AMOUNT) as BILL_TOTAL'))
            ->get();

        $billCountToday = Bills::where('bills.BILL_DATE', '=', $datetime->toDateString())
            ->select(DB::raw('COUNT(bills.BILL_ID) as BILL_COUNT_TODAY'))
            ->get();
        $billCountYesterday = Bills::where('bills.BILL_DATE', '=', DB::raw('DATE_ADD(CURDATE(),INTERVAL -1 DAY)'))
            ->select(DB::raw('COUNT(bills.BILL_ID) as BILL_COUNT_TODAY'))
            ->get();

        foreach ($billTotalToday as $item) {
            $totalAllBillToday = $totalAllBillToday + $item->BILL_TOTAL;
        }
        foreach ($billTotalYesterday as $item) {
            $totalAllBillYesterday = $totalAllBillYesterday + $item->BILL_TOTAL;
        }
        foreach ($billCountToday as $item) {
            $countBillToday = $item->BILL_COUNT_TODAY;
        }
        foreach ($billCountYesterday as $item) {
            $countBillYesterday = $item->BILL_COUNT_TODAY;
        }
        $percentDate = 0;
        if ($totalAllBillToday != 0) {
            $percentDate = (($totalAllBillToday - $totalAllBillYesterday) / $totalAllBillYesterday) * 100;
        }
        //month
        $billThisMonth = Bills::join('billdetail', 'bills.BILL_ID', '=', 'billdetail.BILLDETAIL_ID')
            ->join('customers', 'bills.CUSTOMER_ID', '=', 'customers.CUSTOMER_ID')
            ->whereNotNull('bills.BILL_NO')
            ->where(DB::raw('MONTH(bills.BILL_DATE)'), '=', Carbon::now()->month)
            ->groupby('bills.BILL_ID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS')
            ->select('bills.BILL_ID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS', DB::raw('SUM(billdetail.BILLDETAIL_PRICE) as BILL_TOTAL'))
            ->paginate(4, ['*'], 'billThisMonth');
        $billTotalThisMonth = Bills::join('billdetail', 'bills.BILL_ID', '=', 'billdetail.BILLDETAIL_ID')
            ->join('customers', 'bills.CUSTOMER_ID', '=', 'customers.CUSTOMER_ID')
            ->whereNotNull('bills.BILL_NO')
            ->where(DB::raw('MONTH(bills.BILL_DATE)'), '=', Carbon::now()->month)
            ->select(DB::raw('SUM(billdetail.BILLDETAIL_PRICE * billdetail.BILLDETAIL_AMOUNT) as BILL_TOTAL'))
            ->get();

        $billTotalLastMonth = Bills::join('billdetail', 'bills.BILL_ID', '=', 'billdetail.BILLDETAIL_ID')
            ->join('customers', 'bills.CUSTOMER_ID', '=', 'customers.CUSTOMER_ID')
            ->whereNotNull('bills.BILL_NO')
            ->where(DB::raw('MONTH(bills.BILL_DATE)'), '=', DB::raw('MONTH(DATE_ADD(CURDATE(),INTERVAL -1 MONTH))'))
            ->groupby('bills.BILL_ID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS')
            ->select('bills.BILL_ID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS', DB::raw('SUM(billdetail.BILLDETAIL_PRICE * billdetail.BILLDETAIL_AMOUNT) as BILL_TOTAL'))
            ->get();

        $billCountThisMonth = Bills::where(DB::raw('MONTH(bills.BILL_DATE)'), '=', Carbon::now()->month)
            ->whereNotNull('bills.BILL_NO')
            ->select(DB::raw('COUNT(bills.BILL_ID) as BILL_COUNT_THIS_MONTH'))
            ->get();
        $billCountLastMonth = Bills::where(DB::raw('MONTH(bills.BILL_DATE)'), '=', DB::raw('MONTH(DATE_ADD(CURDATE(),INTERVAL -1 MONTH))'))
            ->select(DB::raw('COUNT(bills.BILL_ID) as BILL_COUNT_LAST_MONTH'))
            ->get();

        foreach ($billTotalThisMonth as $item) {
            $totalAllBillThisMonth = $totalAllBillThisMonth + $item->BILL_TOTAL;
        }

        foreach ($billTotalLastMonth as $item) {
            $totalAllBillLastonth = $totalAllBillLastonth + $item->BILL_TOTAL;
        }
        foreach ($billCountThisMonth as $item) {
            $countBillThisMonth = $item->BILL_COUNT_THIS_MONTH;
        }
        foreach ($billCountLastMonth as $item) {
            $countBillLastMonth = $item->BILL_COUNT_LAST_MONTH;
        }
        $percentMonth = 0;
        if ($totalAllBillThisMonth != null) {
            $percentMonth = (($totalAllBillThisMonth - $totalAllBillLastonth) / $totalAllBillLastonth) * 100;
        }
        //all
        $GetAllBill = Bills::join('billdetail', 'bills.BILL_ID', '=', 'billdetail.BILLDETAIL_ID')
            ->join('customers', 'bills.CUSTOMER_ID', '=', 'customers.CUSTOMER_ID')
            ->whereNotNull('bills.BILL_NO')
            ->groupby('bills.BILL_ID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS')
            ->select('bills.BILL_ID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS', DB::raw('SUM(billdetail.BILLDETAIL_PRICE) as BILL_TOTAL'))
            ->paginate(4, ['*'], 'GetAllBill');

        $billTotalAllBill = Bills::join('billdetail', 'bills.BILL_ID', '=', 'billdetail.BILLDETAIL_ID')
            ->join('customers', 'bills.CUSTOMER_ID', '=', 'customers.CUSTOMER_ID')
            ->whereNotNull('bills.BILL_NO')
            ->select(DB::raw('SUM(billdetail.BILLDETAIL_PRICE* billdetail.BILLDETAIL_AMOUNT) as BILL_TOTAL'))
            ->get();
        $billCountAllBill = Bills::whereNotNull('bills.BILL_NO')
            ->select(DB::raw('COUNT(bills.BILL_ID) as COUNT_BILL'))
            ->get();


        foreach ($billTotalAllBill as $item) {
            $totalAllBill = $totalAllBill + $item->BILL_TOTAL;
        }
        foreach ($billCountAllBill as $item) {
            $countAllBill = $item->COUNT_BILL;
        }
        return view(
            'page.Admin.StatisticsBills',
            [
                'billToday' => $billToday,
                'totalAllBillToday' => $totalAllBillToday,
                'billThisMonth' => $billThisMonth,
                'billTotalThisMonth' => $billTotalThisMonth,
                'totalAllBillThisMonth' => $totalAllBillThisMonth,
                'GetAllBill' => $GetAllBill,
                'totalAllBill' => $totalAllBill,
                'countAllBill' => $countAllBill,

                'totalAllBillToday' => $totalAllBillToday,
                'totalAllBillYesterday' => $totalAllBillYesterday,
                'countBillToday' => $countBillToday,
                'countBillYesterday' => $countBillYesterday,
                'percentDate' => $percentDate,

                'totalAllBillThisMonth' => $totalAllBillThisMonth,
                'totalAllBillLastonth' => $totalAllBillLastonth,
                'countBillThisMonth' => $countBillThisMonth,
                'countBillLastMonth' => $countBillLastMonth,
                'percentMonth' => $percentMonth
            ]
        );
    }

    public function SearchBillThisMonth(Request $request)
    {
        $request->validate([

            'searchthismonth' => ['bail', 'required', 'regex:/(?i)^(?=.*[a-z])[a-z0-9]{8,20}$/']

        ], [
            'searchthismonth.required' => 'Không bỏ trống trường này',
            'searchthismonth.regex' => 'Chỉ nhập mã hóa đơn',


        ]);
        $searchbillthismonth = $request->get('searchthismonth');

        $datetime = Carbon::now('Asia/Ho_Chi_Minh');
        $totalAllBillToday = 0;
        $totalAllBillYesterday = 0;
        $countBillYesterday = 0;
        $countBillToday = 0;

        $totalAllBillThisMonth = 0;
        $totalAllBillLastonth = 0;
        $countBillLastMonth = 0;
        $countBillThisMonth = 0;

        $countAllBill = 0;
        $totalAllBill = 0;

        // date
        $billToday = Bills::join('billdetail', 'bills.BILL_ID', '=', 'billdetail.BILLDETAIL_ID')
            ->join('customers', 'bills.CUSTOMER_ID', '=', 'customers.CUSTOMER_ID')
            ->whereNotNull('bills.BILL_NO')
            ->where('bills.BILL_DATE', '=', $datetime->toDateString())
            ->groupby('bills.BILL_ID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS')
            ->select('bills.BILL_ID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS', DB::raw('SUM(billdetail.BILLDETAIL_PRICE* billdetail.BILLDETAIL_AMOUNT) as BILL_TOTAL'))
            ->paginate(1, ['*'], 'billToday');

        $billTotalToday = Bills::join('billdetail', 'bills.BILL_ID', '=', 'billdetail.BILLDETAIL_ID')
            ->join('customers', 'bills.CUSTOMER_ID', '=', 'customers.CUSTOMER_ID')
            ->whereNotNull('bills.BILL_NO')
            ->where('bills.BILL_DATE', '=', $datetime->toDateString())
            ->select(DB::raw('SUM(billdetail.BILLDETAIL_PRICE * billdetail.BILLDETAIL_AMOUNT) as BILL_TOTAL'))
            ->get();
        $billTotalYesterday = Bills::join('billdetail', 'bills.BILL_ID', '=', 'billdetail.BILLDETAIL_ID')
            ->join('customers', 'bills.CUSTOMER_ID', '=', 'customers.CUSTOMER_ID')
            ->whereNotNull('bills.BILL_NO')
            ->where('bills.BILL_DATE', '=', DB::raw('DATE_ADD(CURDATE(),INTERVAL -1 DAY)'))
            ->groupby('bills.BILL_ID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS')
            ->select('bills.BILL_ID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS', DB::raw('SUM(billdetail.BILLDETAIL_PRICE* billdetail.BILLDETAIL_AMOUNT) as BILL_TOTAL'))
            ->get();

        $billCountToday = Bills::where('bills.BILL_DATE', '=', $datetime->toDateString())
            ->select(DB::raw('COUNT(bills.BILL_ID) as BILL_COUNT_TODAY'))
            ->get();
        $billCountYesterday = Bills::where('bills.BILL_DATE', '=', DB::raw('DATE_ADD(CURDATE(),INTERVAL -1 DAY)'))
            ->select(DB::raw('COUNT(bills.BILL_ID) as BILL_COUNT_TODAY'))
            ->get();

        foreach ($billTotalToday as $item) {
            $totalAllBillToday = $totalAllBillToday + $item->BILL_TOTAL;
        }
        foreach ($billTotalYesterday as $item) {
            $totalAllBillYesterday = $totalAllBillYesterday + $item->BILL_TOTAL;
        }
        foreach ($billCountToday as $item) {
            $countBillToday = $item->BILL_COUNT_TODAY;
        }
        foreach ($billCountYesterday as $item) {
            $countBillYesterday = $item->BILL_COUNT_TODAY;
        }
        $percentDate = 0;
        if ($totalAllBillToday != null) {
            $percentDate = (($totalAllBillToday - $totalAllBillYesterday) / $totalAllBillYesterday) * 100;
        }
        // month
        $billThisMonth = Bills::join('billdetail', 'bills.BILL_ID', '=', 'billdetail.BILLDETAIL_ID')
            ->join('customers', 'bills.CUSTOMER_ID', '=', 'customers.CUSTOMER_ID')
            ->whereNotNull('bills.BILL_NO')
            ->where(DB::raw('MONTH(bills.BILL_DATE)'), '=', Carbon::now()->month)
            ->where('bills.BILL_NO', 'LIKE', "%$searchbillthismonth%")
            ->groupby('bills.BILL_ID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS')
            ->select('bills.BILL_ID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS', DB::raw('SUM(billdetail.BILLDETAIL_PRICE * billdetail.BILLDETAIL_AMOUNT) as BILL_TOTAL'))
            ->paginate(4, ['*'], 'billThisMonth');

        $billTotalThisMonth = Bills::join('billdetail', 'bills.BILL_ID', '=', 'billdetail.BILLDETAIL_ID')
            ->join('customers', 'bills.CUSTOMER_ID', '=', 'customers.CUSTOMER_ID')
            ->whereNotNull('bills.BILL_NO')
            ->where(DB::raw('MONTH(bills.BILL_DATE)'), '=', Carbon::now()->month)
            ->select(DB::raw('SUM(billdetail.BILLDETAIL_PRICE * billdetail.BILLDETAIL_AMOUNT) as BILL_TOTAL'))
            ->get();

        $billTotalLastMonth = Bills::join('billdetail', 'bills.BILL_ID', '=', 'billdetail.BILLDETAIL_ID')
            ->join('customers', 'bills.CUSTOMER_ID', '=', 'customers.CUSTOMER_ID')
            ->whereNotNull('bills.BILL_NO')
            ->where(DB::raw('MONTH(bills.BILL_DATE)'), '=', DB::raw('MONTH(DATE_ADD(CURDATE(),INTERVAL -1 MONTH))'))
            ->groupby('bills.BILL_ID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS')
            ->select('bills.BILL_ID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS', DB::raw('SUM(billdetail.BILLDETAIL_PRICE * billdetail.BILLDETAIL_AMOUNT) as BILL_TOTAL'))
            ->get();

        $billCountThisMonth = Bills::where(DB::raw('MONTH(bills.BILL_DATE)'), '=', Carbon::now()->month)
            ->whereNotNull('bills.BILL_NO')
            ->select(DB::raw('COUNT(bills.BILL_ID) as BILL_COUNT_THIS_MONTH'))
            ->get();
        $billCountLastMonth = Bills::where(DB::raw('MONTH(bills.BILL_DATE)'), '=', DB::raw('MONTH(DATE_ADD(CURDATE(),INTERVAL -1 MONTH))'))
            ->select(DB::raw('COUNT(bills.BILL_ID) as BILL_COUNT_LAST_MONTH'))
            ->get();

        foreach ($billTotalThisMonth as $item) {
            $totalAllBillThisMonth = $totalAllBillThisMonth + $item->BILL_TOTAL;
        }

        foreach ($billTotalLastMonth as $item) {
            $totalAllBillLastonth = $totalAllBillLastonth + $item->BILL_TOTAL;
        }
        foreach ($billCountThisMonth as $item) {
            $countBillThisMonth = $item->BILL_COUNT_THIS_MONTH;
        }
        foreach ($billCountLastMonth as $item) {
            $countBillLastMonth = $item->BILL_COUNT_LAST_MONTH;
        }
        $percentMonth = 0;
        if ($totalAllBillThisMonth != 0) {
            $percentMonth = (($totalAllBillThisMonth - $totalAllBillLastonth) / $totalAllBillLastonth) * 100;
        }

        // all
        $GetAllBill = Bills::join('billdetail', 'bills.BILL_ID', '=', 'billdetail.BILLDETAIL_ID')
            ->join('customers', 'bills.CUSTOMER_ID', '=', 'customers.CUSTOMER_ID')
            ->whereNotNull('bills.BILL_NO')
            ->groupby('bills.BILL_ID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS')
            ->select('bills.BILL_ID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS', DB::raw('SUM(billdetail.BILLDETAIL_PRICE* billdetail.BILLDETAIL_AMOUNT) as BILL_TOTAL'))
            ->paginate(4, ['*'], 'GetAllBill');

        $billTotalAllBill = Bills::join('billdetail', 'bills.BILL_ID', '=', 'billdetail.BILLDETAIL_ID')
            ->join('customers', 'bills.CUSTOMER_ID', '=', 'customers.CUSTOMER_ID')
            ->whereNotNull('bills.BILL_NO')
            ->select(DB::raw('SUM(billdetail.BILLDETAIL_PRICE* billdetail.BILLDETAIL_AMOUNT) as BILL_TOTAL'))
            ->get();
        $billCountAllBill = Bills::whereNotNull('bills.BILL_NO')
            ->select(DB::raw('COUNT(bills.BILL_ID) as COUNT_BILL'))
            ->get();


        foreach ($billTotalAllBill as $item) {
            $totalAllBill = $totalAllBill + $item->BILL_TOTAL;
        }
        foreach ($billCountAllBill as $item) {
            $countAllBill = $item->COUNT_BILL;
        }

        return view(
            'page.Admin.StatisticsBills',
            [
                'billToday' => $billToday,
                'totalAllBillToday' => $totalAllBillToday,
                'billThisMonth' => $billThisMonth,
                'billTotalThisMonth' => $billTotalThisMonth,
                'totalAllBillThisMonth' => $totalAllBillThisMonth,
                'GetAllBill' => $GetAllBill,
                'totalAllBill' => $totalAllBill,
                'countAllBill' => $countAllBill,

                'totalAllBillToday' => $totalAllBillToday,
                'totalAllBillYesterday' => $totalAllBillYesterday,
                'countBillToday' => $countBillToday,
                'countBillYesterday' => $countBillYesterday,
                'percentDate' => $percentDate,

                'totalAllBillThisMonth' => $totalAllBillThisMonth,
                'totalAllBillLastonth' => $totalAllBillLastonth,
                'countBillThisMonth' => $countBillThisMonth,
                'countBillLastMonth' => $countBillLastMonth,
                'percentMonth' => $percentMonth
            ]
        );
    }

    public function SearchAllBill(Request $request)
    {

        $request->validate([

            'Search-All-Bill' => ['bail', 'required', 'regex:/(?i)^(?=.*[a-z])[a-z0-9]{8,20}$/']

        ], [
            'Search-All-Bill.required' => 'Không bỏ trống trường này',
            'Search-All-Bill.regex' => 'Chỉ nhập mã hóa đơn',

        ]);
        $searchallbill = $request->get('Search-All-Bill');

        $datetime = Carbon::now('Asia/Ho_Chi_Minh');
        $pageSize = 1;
        //today
        $search = $request->get('search');

        $totalAllBillToday = 0;
        $totalAllBillYesterday = 0;
        $countBillYesterday = 0;
        $countBillToday = 0;

        $totalAllBillThisMonth = 0;
        $totalAllBillLastonth = 0;
        $countBillLastMonth = 0;
        $countBillThisMonth = 0;

        $countAllBill = 0;
        $totalAllBill = 0;

        // date
        $billToday = Bills::join('billdetail', 'bills.BILL_ID', '=', 'billdetail.BILLDETAIL_ID')
            ->join('customers', 'bills.CUSTOMER_ID', '=', 'customers.CUSTOMER_ID')
            ->whereNotNull('bills.BILL_NO')
            ->where('bills.BILL_DATE', '=', $datetime->toDateString())
            ->groupby('bills.BILL_ID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS')
            ->select('bills.BILL_ID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS', DB::raw('SUM(billdetail.BILLDETAIL_PRICE* billdetail.BILLDETAIL_AMOUNT) as BILL_TOTAL'))
            ->paginate(1, ['*'], 'billToday');

        $billTotalToday = Bills::join('billdetail', 'bills.BILL_ID', '=', 'billdetail.BILLDETAIL_ID')
            ->join('customers', 'bills.CUSTOMER_ID', '=', 'customers.CUSTOMER_ID')
            ->whereNotNull('bills.BILL_NO')
            ->where('bills.BILL_DATE', '=', $datetime->toDateString())
            ->select(DB::raw('SUM(billdetail.BILLDETAIL_PRICE * billdetail.BILLDETAIL_AMOUNT) as BILL_TOTAL'))
            ->get();
        $billTotalYesterday = Bills::join('billdetail', 'bills.BILL_ID', '=', 'billdetail.BILLDETAIL_ID')
            ->join('customers', 'bills.CUSTOMER_ID', '=', 'customers.CUSTOMER_ID')
            ->whereNotNull('bills.BILL_NO')
            ->where('bills.BILL_DATE', '=', DB::raw('DATE_ADD(CURDATE(),INTERVAL -1 DAY)'))
            ->groupby('bills.BILL_ID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS')
            ->select('bills.BILL_ID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS', DB::raw('SUM(billdetail.BILLDETAIL_PRICE* billdetail.BILLDETAIL_AMOUNT) as BILL_TOTAL'))
            ->get();

        $billCountToday = Bills::where('bills.BILL_DATE', '=', $datetime->toDateString())
            ->select(DB::raw('COUNT(bills.BILL_ID) as BILL_COUNT_TODAY'))
            ->get();
        $billCountYesterday = Bills::where('bills.BILL_DATE', '=', DB::raw('DATE_ADD(CURDATE(),INTERVAL -1 DAY)'))
            ->select(DB::raw('COUNT(bills.BILL_ID) as BILL_COUNT_TODAY'))
            ->get();

        foreach ($billTotalToday as $item) {
            $totalAllBillToday = $totalAllBillToday + $item->BILL_TOTAL;
        }
        foreach ($billTotalYesterday as $item) {
            $totalAllBillYesterday = $totalAllBillYesterday + $item->BILL_TOTAL;
        }
        foreach ($billCountToday as $item) {
            $countBillToday = $item->BILL_COUNT_TODAY;
        }
        foreach ($billCountYesterday as $item) {
            $countBillYesterday = $item->BILL_COUNT_TODAY;
        }
        $percentDate = 0;
        if ($totalAllBillToday != 0) {
            $percentDate = (($totalAllBillToday - $totalAllBillYesterday) / $totalAllBillYesterday) * 100;
        }
        // month
        $billThisMonth = Bills::join('billdetail', 'bills.BILL_ID', '=', 'billdetail.BILLDETAIL_ID')
            ->join('customers', 'bills.CUSTOMER_ID', '=', 'customers.CUSTOMER_ID')
            ->whereNotNull('bills.BILL_NO')
            ->where(DB::raw('MONTH(bills.BILL_DATE)'), '=', Carbon::now()->month)
            ->groupby('bills.BILL_ID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS')
            ->select('bills.BILL_ID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS', DB::raw('SUM(billdetail.BILLDETAIL_PRICE * billdetail.BILLDETAIL_AMOUNT) as BILL_TOTAL'))
            ->paginate(4, ['*'], 'billThisMonth');

        $billTotalThisMonth = Bills::join('billdetail', 'bills.BILL_ID', '=', 'billdetail.BILLDETAIL_ID')
            ->join('customers', 'bills.CUSTOMER_ID', '=', 'customers.CUSTOMER_ID')
            ->whereNotNull('bills.BILL_NO')
            ->where(DB::raw('MONTH(bills.BILL_DATE)'), '=', Carbon::now()->month)
            ->select(DB::raw('SUM(billdetail.BILLDETAIL_PRICE * billdetail.BILLDETAIL_AMOUNT) as BILL_TOTAL'))
            ->get();

        $billTotalLastMonth = Bills::join('billdetail', 'bills.BILL_ID', '=', 'billdetail.BILLDETAIL_ID')
            ->join('customers', 'bills.CUSTOMER_ID', '=', 'customers.CUSTOMER_ID')
            ->whereNotNull('bills.BILL_NO')
            ->where(DB::raw('MONTH(bills.BILL_DATE)'), '=', DB::raw('MONTH(DATE_ADD(CURDATE(),INTERVAL -1 MONTH))'))
            ->groupby('bills.BILL_ID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS')
            ->select('bills.BILL_ID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS', DB::raw('SUM(billdetail.BILLDETAIL_PRICE * billdetail.BILLDETAIL_AMOUNT) as BILL_TOTAL'))
            ->get();

        $billCountThisMonth = Bills::where(DB::raw('MONTH(bills.BILL_DATE)'), '=', Carbon::now()->month)
            ->whereNotNull('bills.BILL_NO')
            ->select(DB::raw('COUNT(bills.BILL_ID) as BILL_COUNT_THIS_MONTH'))
            ->get();
        $billCountLastMonth = Bills::where(DB::raw('MONTH(bills.BILL_DATE)'), '=', DB::raw('MONTH(DATE_ADD(CURDATE(),INTERVAL -1 MONTH))'))
            ->select(DB::raw('COUNT(bills.BILL_ID) as BILL_COUNT_LAST_MONTH'))
            ->get();

        foreach ($billTotalThisMonth as $item) {
            $totalAllBillThisMonth = $totalAllBillThisMonth + $item->BILL_TOTAL;
        }

        foreach ($billTotalLastMonth as $item) {
            $totalAllBillLastonth = $totalAllBillLastonth + $item->BILL_TOTAL;
        }
        foreach ($billCountThisMonth as $item) {
            $countBillThisMonth = $item->BILL_COUNT_THIS_MONTH;
        }
        foreach ($billCountLastMonth as $item) {
            $countBillLastMonth = $item->BILL_COUNT_LAST_MONTH;
        }
        $percentMonth = 0;
        if ($totalAllBillThisMonth != 0) {
            $percentMonth = (($totalAllBillThisMonth - $totalAllBillLastonth) / $totalAllBillLastonth) * 100;
        }

        // all
        $GetAllBill = Bills::join('billdetail', 'bills.BILL_ID', '=', 'billdetail.BILLDETAIL_ID')
            ->join('customers', 'bills.CUSTOMER_ID', '=', 'customers.CUSTOMER_ID')
            ->whereNotNull('bills.BILL_NO')
            ->where('bills.BILL_NO', 'LIKE', "%$searchallbill%")

            ->groupby('bills.BILL_ID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS')
            ->select('bills.BILL_ID', 'customers.CUSTOMER_PHONE', 'customers.CUSTOMER_NO', 'bills.BILL_NO', 'bills.BILL_STATUS', DB::raw('SUM(billdetail.BILLDETAIL_PRICE* billdetail.BILLDETAIL_AMOUNT) as BILL_TOTAL'))
            ->paginate(4, ['*'], 'GetAllBill');

        $billTotalAllBill = Bills::join('billdetail', 'bills.BILL_ID', '=', 'billdetail.BILLDETAIL_ID')
            ->join('customers', 'bills.CUSTOMER_ID', '=', 'customers.CUSTOMER_ID')
            ->whereNotNull('bills.BILL_NO')
            ->select(DB::raw('SUM(billdetail.BILLDETAIL_PRICE* billdetail.BILLDETAIL_AMOUNT) as BILL_TOTAL'))
            ->get();
        $billCountAllBill = Bills::whereNotNull('bills.BILL_NO')
            ->select(DB::raw('COUNT(bills.BILL_ID) as COUNT_BILL'))
            ->get();


        foreach ($billTotalAllBill as $item) {
            $totalAllBill = $totalAllBill + $item->BILL_TOTAL;
        }
        foreach ($billCountAllBill as $item) {
            $countAllBill = $item->COUNT_BILL;
        }

        return view(
            'page.Admin.StatisticsBills',
            [
                'billToday' => $billToday,
                'totalAllBillToday' => $totalAllBillToday,
                'billThisMonth' => $billThisMonth,
                'billTotalThisMonth' => $billTotalThisMonth,
                'totalAllBillThisMonth' => $totalAllBillThisMonth,
                'GetAllBill' => $GetAllBill,
                'totalAllBill' => $totalAllBill,
                'countAllBill' => $countAllBill,

                'totalAllBillToday' => $totalAllBillToday,
                'totalAllBillYesterday' => $totalAllBillYesterday,
                'countBillToday' => $countBillToday,
                'countBillYesterday' => $countBillYesterday,
                'percentDate' => $percentDate,

                'totalAllBillThisMonth' => $totalAllBillThisMonth,
                'totalAllBillLastonth' => $totalAllBillLastonth,
                'countBillThisMonth' => $countBillThisMonth,
                'countBillLastMonth' => $countBillLastMonth,
                'percentMonth' => $percentMonth
            ]
        );
    }
}
