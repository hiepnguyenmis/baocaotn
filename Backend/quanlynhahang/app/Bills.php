<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bills extends Model
{
    //
    protected $table='bills';
    protected $primaryKey = 'BILL_ID';
    protected $fillable=[
        'BILL_ID',
        'BILL_NO',
        'BILL_DATE',
        'BILL_STATUS',
        'BILL_TAX',
        'CUSTOMER_ID',
        'TABLE_ID',
        'EMPLOYEE_ID',
        'BILL_PROMOTION'
    ];
    public $timestamps = false;
    public $incrementing = false;

    public function BillDetail(){
        return $this->hasMany('App/BillDetails','BILLDETAIL_ID','BILL_ID');
    }

    public function Tables(){
        return $this->belongsTo('App\Tables','TABLE_ID','TABLE_ID');
    }

    public function Employees(){
        return $this->belongsTo('App/Employees','EMPLOYEE_ID','BILL_ID');

    }
    public function Customers(){
        return $this->belongsTo('App/Customers','CUSTOMER_ID','BILL_ID');

    }
    public function Foods(){
        return $this->belongsToMany('App\Foods','billdetail','BILLDETAIL_ID','FOOD_ID')->withPivot('BILLDETAIL_PRICE', 'BILLDETAIL_AMOUNT');
    }


}
