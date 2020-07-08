<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Carbon\Carbon;
use App\Customers;
use App\Bills;
use App\BillDetails;
use App\Foods;
use App\Http\Resources\BillDetail;

class CheckoutControllers extends Controller
{
    public function GetDataCheckout()
    {
        if (Session::has('customer_no')) {
            if(Session::has('cart')){
                return view('page.index.CheckoutInfoPage');

            }
            return redirect('trang/thucdon');
        }
        return redirect('trang/dang-nhap');
    }

    public function Checkout(Request $request)
    {
        $request->validate([

            'CHECK_CUATOMER_ADDRESS'=> 'required',
            'CHECK_PAY'=>'required'

        ], [

            'CHECK_CUATOMER_ADDRESS.required' => 'Không bỏ trống trường này',
            'CHECK_PAY.required' => 'Không bỏ trống trường này',
        ]);
        $cart = session()->get('cart');
        $total=0;
        $foods=[];
        if ($cart){
            foreach (session('cart') as $id_session => $details){
                $total += $details['FOOD_PRICE'] * $details['QUANTITY'];
                array_push($foods,$details);
            }

        }

        $bill_no = null;
        $rand_code = (string) rand(1111, 10000);

        $get_year = Carbon::now()->year;
        $get_month = Carbon::now()->month;
        $customer_id=$request->CHECK_CUSTOMER_ID;

        $Customer_mark=Customers::where('customers.CUSTOMER_ID',$customer_id)->select('customers.CUSTOMER_MARK')->get();
        $promotionPersent=0;
        $promotion=0;

        $rankCustomer=null;
        foreach($Customer_mark as $item){
            $promotion=$item->CUSTOMER_MARK;
        }

        $bill_no = 'HD' . $get_year . $get_month . $rand_code;
        if($request->CHECK_PAY==0){
            $bill= new Bills();
            $bill->BILL_NO= $bill_no;
            $bill->BILL_DATE=Carbon::now('Asia/Ho_Chi_Minh');
            $bill->BILL_STATUS=2;
            $bill->CUSTOMER_ID=$request->CHECK_CUSTOMER_ID;
            if ($promotion < 2) {
                $promotionPersent = 0;

            } else if ($promotion >= 2 && $promotion < 10) {
                $promotionPersent = 5;

            } else if ($promotion >= 10 && $promotion < 20) {
                $promotionPersent = 10;

            } else if ($promotion >= 20) {
                $promotionPersent = 20;

            }
            $promotionforProtentialCustomer = $total * ($promotionPersent / 100);
            $bill->BILL_PROMOTION=$promotionforProtentialCustomer;
            $bill->BILL_DELIVERYADDRESS=$request->CHECK_CUATOMER_ADDRESS;

            if($request->CHECK_CUSTOMER_PHONEDELIVERY==null){
                $bill->PHONE_DELIVERY=$request->CHECK_CUSTOMER_PHONE;
            }else{
                $bill->PHONE_DELIVERY=$request->CHECK_CUSTOMER_PHONEDELIVERY;
            }
            $bill->BILL_NOTE= $request->CHECK_NOTE;
            $bill->BILL_PAID=0;

            $bill->save();

            $getBillId= Bills::where('bills.BILL_NO',$bill_no)->get();
            $billId=0;
            foreach($getBillId as $item){
                $billId=$item->BILL_ID;
            }

            foreach($foods as $key=> $item){

                $billDetail= new BillDetails();
                $billDetail->BILLDETAIL_ID=$billId;
                $billDetail->FOOD_ID=$item['FOOD_ID'];
                $billDetail->BILLDETAIL_PRICE=$item['FOOD_PRICE'];
                $billDetail->BILLDETAIL_AMOUNT=$item['QUANTITY'];
                $billDetail->save();
                
            }

            $customer=Customers::findOrFail( $customer_id);
            $customer->CUSTOMER_MARK=$promotion+1;
            $customer->save();
            if($customer){
                if (isset($cart[$id_session])) {
                    unset($cart[$id_session]);
                    session()->forget('cart', $cart);
                }
            }

            return redirect('/');
        }else{
            $bill= new Bills();
            $bill->BILL_NO= $bill_no;
            $bill->BILL_DATE=Carbon::now('Asia/Ho_Chi_Minh');
            $bill->BILL_STATUS=2;
            $bill->CUSTOMER_ID=$request->CHECK_CUSTOMER_ID;

            if ($promotion < 2) {
                $promotionPersent = 0;

            } else if ($promotion >= 2 && $promotion < 10) {
                $promotionPersent = 5;

            } else if ($promotion >= 10 && $promotion < 20) {
                $promotionPersent = 10;

            } else if ($promotion >= 20) {
                $promotionPersent = 20;
            }

            $promotionforProtentialCustomer = $total * ($promotionPersent / 100);
            $bill->BILL_PROMOTION=$promotionforProtentialCustomer;
            $bill->BILL_DELIVERYADDRESS=$request->CHECK_CUATOMER_ADDRESS;

            if($request->CHECK_CUSTOMER_PHONEDELIVERY==null){
                $bill->PHONE_DELIVERY=$request->CHECK_CUSTOMER_PHONE;
            }else{
                $bill->PHONE_DELIVERY=$request->CHECK_CUSTOMER_PHONEDELIVERY;
            }

            $bill->BILL_NOTE= $request->CHECK_NOTE;
            $bill->BILL_PAID=1;

            $bill->save();
            $getBillId= Bills::where('bills.BILL_NO',$bill_no)->get();
            $billId=0;
            foreach($getBillId as $item){
                $billId=$item->BILL_ID;
            }

            foreach($foods as $key=> $item){
                $billDetail= new BillDetails();
                $billDetail->BILLDETAIL_ID=$billId;
                $billDetail->FOOD_ID=$item['FOOD_ID'];
                $billDetail->BILLDETAIL_PRICE=$item['FOOD_PRICE'];
                $billDetail->BILLDETAIL_AMOUNT=$item['QUANTITY'];
                $billDetail->save();
            }

            $total=0;
            foreach($foods as $key=> $item){
                $total=$total+$item['QUANTITY'] * $item['FOOD_PRICE'];
            }

            $vnp_TmnCode = "2Q7GBFTX"; //Mã website tại VNPAY
            $vnp_HashSecret = "YEQBFAJZPJWDYRSIJTJWACWOGNURJVSE"; //Chuỗi bí mật
            $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_Returnurl = "http://127.0.0.1:8000/trang/Kiem-tra-thong-tin-thanh-toan-dien-tu";

            error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
            /**
            * @author xonv
            */

            $vnp_TxnRef = $bill_no;
            $vnp_OrderInfo = "Noi dung thanh toan";
            $vnp_OrderType = "billpayment";
            $vnp_Amount = $total * 100;
            $vnp_Locale = "vn";
            $vnp_BankCode = "NCB";
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
            $inputData = array(
                "vnp_Version" => "2.0.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef
            );

            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }

            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . $key . "=" . $value;
                } else {
                    $hashdata .= $key . "=" . $value;
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }

            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
                $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
                $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
            }

            $returnData = array('code' => '00'
                , 'message' => 'success'
                , 'data' => $vnp_Url);

                $customer=Customers::findOrFail( $customer_id);
                $customer->CUSTOMER_MARK=$promotion+1;
                $customer->save();
                if($customer){
                    if (isset($cart[$id_session])) {
                        unset($cart[$id_session]);
                        session()->forget('cart', $cart);
                    }
                }

            return redirect()->to($returnData['data']);
        }
    }
}
