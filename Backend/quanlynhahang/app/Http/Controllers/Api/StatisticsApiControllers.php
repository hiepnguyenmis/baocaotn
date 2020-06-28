<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BillDetails;
use App\Bills;
use App\Materials;
use DB;

class StatisticsApiControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function GetBillDate($year)
    {
        $bill = Bills::join('billdetail', 'bills.BILL_ID', '=', 'billdetail.BILLDETAIL_ID')
            ->whereNotNull('bills.BILL_NO')
            ->where(DB::raw('YEAR(bills.BILL_DATE)'), '=', $year)
            ->groupby(DB::raw('MONTH(bills.BILL_DATE)'), DB::raw('YEAR(bills.BILL_DATE)'))
            ->select(DB::raw('MONTH(bills.BILL_DATE) as month'), DB::raw('YEAR(bills.BILL_DATE) as year'), DB::raw('SUM(billdetail.BILLDETAIL_PRICE) as sum_bill'))
            ->orderBy(DB::raw('MONTH(bills.BILL_DATE)'))
            ->get();
        return response()->json($bill);
    }

    public function GetStatisticsRevenue($year)
    {

        $arrayRevernue = [];
        $totalCost = 0;

        $totalCustomerYear = Bills::whereNotNull('bills.BILL_NO')
            ->where(DB::raw('YEAR(bills.BILL_DATE)'), '=', $year)
            ->groupby(DB::raw('YEAR(bills.BILL_DATE)'))
            ->select(DB::raw('YEAR(bills.BILL_DATE) as year'), DB::raw('COUNT(DISTINCT bills.BILL_ID) as sumCustomer'))
            ->get();

        $totalAverageUnitPrice = Bills::join('billdetail', 'bills.BILL_ID', '=', 'billdetail.BILLDETAIL_ID')
            ->whereNotNull('bills.BILL_NO')
            ->where(DB::raw('YEAR(bills.BILL_DATE)'), '=', $year)
            ->groupby(DB::raw('YEAR(bills.BILL_DATE)'))
            ->select(DB::raw('YEAR(bills.BILL_DATE) as year'), DB::raw('ROUND(AVG(  billdetail.BILLDETAIL_PRICE),2) as avgUnitPrice'))
            ->get();

        $totalCosts = Materials::join('inputmaterial', 'inputmaterial.MATERIAL_ID', '=', 'materials.MATERIALS_ID')
            ->where(DB::raw('YEAR(inputmaterial.INPUTMATERIAL_DATE)'), '=', $year)
            ->groupby('materials.MATERIALS_PRICE', 'inputmaterial.INPUTMATERIAL_AMOUNT')
            ->select('materials.MATERIALS_PRICE', 'inputmaterial.INPUTMATERIAL_AMOUNT', DB::raw('SUM(materials.MATERIALS_PRICE * inputmaterial.INPUTMATERIAL_AMOUNT) as sumTotalCost'))
            ->get();

        foreach ($totalCustomerYear as $totalCustomer) {
            foreach ($totalAverageUnitPrice as $totalAverage) {
                if ($totalCustomer->year == $totalAverage->year) {
                    $total_revenue = $totalCustomer->sumCustomer * $totalAverage->avgUnitPrice;
                    foreach ($totalCosts as $itemToalCost) {
                        $totalCost = $totalCost + $itemToalCost->sumTotalCost;
                    }
                    $array = [
                        'totalCustomeryear' => $totalCustomer->year,
                        'totalAverage' => $totalAverage->avgUnitPrice,
                        'year' => $totalAverage->year,
                        'total_revenue' => $total_revenue,
                        'totalCost' => $totalCost,
                        'totalProfit' => $total_revenue - $totalCost
                    ];
                    array_push($arrayRevernue, $array);
                }
            }
        }

        return response()->json($arrayRevernue);
    }

    // date
    public function GetBillMonth($year, $month)
    {
        $bill = Bills::join('billdetail', 'bills.BILL_ID', '=', 'billdetail.BILLDETAIL_ID')
            ->whereNotNull('bills.BILL_NO')
            ->where(DB::raw('YEAR(bills.BILL_DATE)'), '=', $year)
            ->where(DB::raw('MONTH(bills.BILL_DATE)'), '=', $month)
            ->groupby(DB::raw('DAY(bills.BILL_DATE)'))
            ->select(DB::raw('DAY(bills.BILL_DATE) as date'), DB::raw('SUM(billdetail.BILLDETAIL_PRICE) as sum_bill'))
            ->get();
        return response()->json($bill);
    }
    public function GetMonthBillsOfYear($year)
    {
        $billsMonth = Bills::join('billdetail', 'bills.BILL_ID', '=', 'billdetail.BILLDETAIL_ID')
            ->whereNotNull('bills.BILL_NO')
            ->where(DB::raw('YEAR(bills.BILL_DATE)'),'=',$year)
            ->groupby(DB::raw('MONTH(bills.BILL_DATE)'))
            ->select(DB::raw('MONTH(bills.BILL_DATE) as month'))
            ->get();
        return response()->json($billsMonth);
    }
    public function GetStatisticsRevenueMonth($year, $month)
    {
        $totalCostMonth = 0;
        $arrayRevernueMonth = [];
        $totalCustomerMonth = Bills::whereNotNull("bills.BILL_NO")
            ->where(DB::raw('YEAR(bills.BILL_DATE)'), '=', $year)
            ->where(DB::raw('MONTH(bills.BILL_DATE)'), '=', $month)
            ->groupby(DB::raw('MONTH(bills.BILL_DATE)'))
            ->select(DB::raw('MONTH(bills.BILL_DATE) as month'), DB::raw('COUNT( DISTINCT bills.BILL_ID) as sumCustomer'))
            ->get();
        $totalAverageUnitPriceMonth = Bills::join('billdetail', 'bills.BILL_ID', '=', 'billdetail.BILLDETAIL_ID')
            ->whereNotNull('bills.BILL_NO')
            ->where(DB::raw('YEAR(bills.BILL_DATE)'), '=', $year)
            ->where(DB::raw('MONTH(bills.BILL_DATE)'), '=', $month)
            ->groupby(DB::raw('MONTH(bills.BILL_DATE)'))
            ->select(DB::raw('MONTH(bills.BILL_DATE) as month'), DB::raw('ROUND(AVG(  billdetail.BILLDETAIL_PRICE),2) as avgUnitPrice'))
            ->get();
        $totalCostsMonths = Materials::join('inputmaterial', 'inputmaterial.MATERIAL_ID', '=', 'materials.MATERIALS_ID')
            ->where(DB::raw('YEAR(inputmaterial.INPUTMATERIAL_DATE)'), '=', $year)
            ->where(DB::raw('MONTH(inputmaterial.INPUTMATERIAL_DATE)'), '=', $month)
            ->groupby('materials.MATERIALS_PRICE', 'inputmaterial.INPUTMATERIAL_AMOUNT')
            ->select('materials.MATERIALS_PRICE', 'inputmaterial.INPUTMATERIAL_AMOUNT', DB::raw('SUM(materials.MATERIALS_PRICE * inputmaterial.INPUTMATERIAL_AMOUNT) as sumTotalCost'))
            ->get();
        foreach ($totalCustomerMonth as $itemTotalCustomerMonth) {
            foreach ($totalAverageUnitPriceMonth as $itemTotalAverageUnitPriceMonth) {
                if ($itemTotalCustomerMonth->month == $itemTotalAverageUnitPriceMonth->month) {
                    $total_revenue_year = $itemTotalCustomerMonth->sumCustomer * $itemTotalAverageUnitPriceMonth->avgUnitPrice;
                    foreach ($totalCostsMonths as $itemtotalCostsMonth) {
                        $totalCostMonth = $totalCostMonth + $itemtotalCostsMonth->sumTotalCost;
                    }
                    $array = [
                        'totalRevenueMonth' => round($total_revenue_year,2),
                        'totalCostMonth' => round($totalCostMonth,2),
                        'totalProfitMonth' => round($total_revenue_year - $totalCostMonth,2)
                    ];
                    array_push($arrayRevernueMonth, $array);
                }
            }
        }
        return response()->json($arrayRevernueMonth);
    }
}
