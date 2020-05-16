<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Tables;
use App\Bills;
use App\BillDetails;
use App\Foods;


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
        $foods=Foods::all();
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

    public function GetBillOfTable($id){
        $bill=Bills::with('Foods')->where('TABLE_ID','=',$id)->get();
        return response()->json($bill);
    }

    public function CreateBill(Request $request){
        return Bills::create($request->all());
    }

}
