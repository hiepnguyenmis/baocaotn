<?php

namespace App\Http\Controllers;
use App\Bills;
use App\BillDetails;
use App\Customers;
use Illuminate\Http\Request;

class CheckoutSuccessController extends Controller
{
    public function GetCheckoutPaypal()
    {
        $billNo=$_GET['vnp_TxnRef'];
        
        $bills=Bills::with('Foods', 'Customers')->where('bills.BILL_NO',$billNo)->get();

        return view('page.index.CheckoutSuccess',['bills'=>$bills]);
    }
}
