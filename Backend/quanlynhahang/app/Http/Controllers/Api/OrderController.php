<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Tables;
use App\Bills;
use App\BillDetails;
use App\Foods;
use App\Customers;
use App\Http\Resources\BillDetail;

class OrderController extends Controller
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

    public function GetFoods(){
        $foods=Foods::where('foods.FOOD_STATUS','=',1)->get();
        return response()->json($foods);
    }

    public function GetTables()
    {
        $table=Tables::all();
        return response()->json($table);
    }

    public function GetOneTables($id_table)
    {
        $table=Tables::where('TABLE_ID','=',$id_table)->get();
        return response()->json($table);
    }

    public function PostTable(Request $request){
        return Tables::create($request->all());
    }

    public function PutTable(Request $request, $id){
        $table= Tables::findOrFail($id);

        $table->update($request->all());

        return $table;
    }

    public function DeleteBill($id){
       $bills= Bills::where('bills.TABLE_ID','=',$id)->where('bills.BILL_STATUS','=',0)->delete();
       return 204;

    }
    public function DeleteBillWithIdBill($id){
        $bills= Bills::findOrFail($id)->delete();
        return 204;

     }
    public function GetBillOfTable($id){
        $bill=Bills::with('Foods')->where('TABLE_ID','=',$id)->where('BILL_STATUS','=',0)->get();

        return response()->json($bill);
    }
    public function GetBillOfBillId($id){
        $bill=Bills::with('Foods')->where('BILL_ID','=',$id)->get();

        return response()->json($bill);
    }

    public function GetOneBill($id){
        $bill=Bills::with('Foods')->where('BILL_ID','=',$id)->get();
        return response()->json($bill);
    }

    public function GetIDBillOfTable($id){
        $idBill=Bills::where('TABLE_ID','=',$id)->where('bills.BILL_STATUS','=',0)->select('BILL_ID')->get();
        return response()->json($idBill);
    }

    public function GetAllBillWithDetail(){
        $bill=Bills::with('Foods')->get();
        return response()->json($bill);
    }

    public function DeleteBillDetailWithFoodID($id_bill, $id_food){
        $billsdetail= BillDetails::where('billdetail.FOOD_ID','=',$id_food)->where('billdetail.BILLDETAIL_ID','=',$id_bill)->delete();
        return 204;
    }

    public function GetAllBill(){
        $bills=Bills::all();
        return response()->json($bills);

    }
    public function GetAllBillStatusFalse(){
        $bills=Bills::where('bills.BILL_STATUS','=',0)->get();
        return response()->json($bills);
    }
    public function GetAllIdBillStatusFalse(){
        $bills=Bills::with('Tables')->where('bills.BILL_STATUS','=',0)->select('bills.BILL_ID','bills.TABLE_ID')->get();
        return response()->json($bills);
    }

    public function FindBillinBillDetail($id_bill,$id_food){
        $billdetail=BillDetails::where('billdetail.BILLDETAIL_ID','=',$id_bill)->where('billdetail.FOOD_ID','=',$id_food)->get();
        return response()->json($billdetail);
    }

    public function CreateBill(Request $request){
        return Bills::create($request->all());
    }

    public function UpdateBill(Request $request,$id){
        $bill = Bills::findOrFail($id);
        $bill->update($request->all());
        return $bill;
    }

    public function CreateBillDetail(Request $request){
        return BillDetails::create($request->all());
    }

    public function UpdateBillDetail(Request $request,$id_billdetail,$id_food){
        $billsdetail= BillDetails::where('billdetail.BILLDETAIL_ID','=',$id_billdetail)->where('billdetail.FOOD_ID','=',$id_food)->update($request->all());

        return $billsdetail;
    }

    public function CreateCustomer(Request $request){
        return Customers::create($request->all());
    }

    public function GetCustomer(){
        $customer= Customers::all();
        return response()->json($customer);
    }

    public function GetOneCustomer($phone){
        $customer= Customers::where('customers.CUSTOMER_PHONE','=',$phone)->get();
        return response()->json($customer);
    }

    public function UpdateCustomer(Request $request,$id_customer){
        $customer = Customers::findOrFail($id_customer);
        $customer->update($request->all());
        return $customer;
    }

    public function GetallBillsWithTable()
    {
        $id_table= Bills::where('bills.BILL_STATUS','=',0)->select('bills.TABLE_ID')->get();
        return response()->json($id_table);
    }
    public function GetStatusTable()
    {
        $id_table= Tables::where('tables.TABLE_STATUS','=',1)->select('tables.TABLE_ID')->get();
        return response()->json($id_table);
    }
}
