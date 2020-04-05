<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bills extends Model
{
    //
    protected $table='bills';
    protected $primaryKey = 'BILL_ID';
    public $timestamps = false;
    public $incrementing = false;

    public function Bill_Detail(){
        return $this->hasMany('App/BillDetails','BILLDETAIL_ID','BILL_ID');
    }

    public function Table(){
        return $this->belongsTo('App/Tables','TABLE_ID','BILL_ID');
    }

    public function Employees(){
        return $this->belongsTo('App/Employees','EMPLOYEE_ID','BILL_ID');

    }
    public function Customers(){
        return $this->belongsTo('App/Customers','CUSTOMER_ID','BILL_ID');

    }


}
