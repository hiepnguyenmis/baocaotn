<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    //
    protected $table='billdetail';
    protected $primaryKey = 'BILLDETAIL_ID';
    public $timestamps = false;
    public $incrementing = false;

    public function Bills(){
        return $this->hasMany('App\Bills','CUSTOMER_ID','CUSTOMER_ID');
    }
}
