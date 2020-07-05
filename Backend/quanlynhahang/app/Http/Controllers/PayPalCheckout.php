<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PayPalCheckout extends Controller
{
    public function GetCheckoutPaypal()
    {
        return view('page.index.CheckoutPayPal');
    }
}
