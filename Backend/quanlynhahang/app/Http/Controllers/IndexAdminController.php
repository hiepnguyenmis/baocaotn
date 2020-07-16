<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class IndexAdminController extends Controller
{
    public function GetIndex()
    {
        if(Session::has('login')){

            return view('page.admin.IndexAdmin');
            
        }
        return redirect('trangquantri/dang-nhap');
    }
}
