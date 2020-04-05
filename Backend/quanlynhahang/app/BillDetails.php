<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillDetails extends Model
{
    protected $table='billdetail';
    protected $primaryKey = 'BILLDETAIL_ID';
    public $timestamps = false;
    public $incrementing = false;

    public function Foods(){
       return $this->belongsTo('App\Foods', 'FOOD_ID', 'BILLDETAIL_ID');
    }

    public function Bills(){
        return $this->belongsTo('App\Bills','BILLDETAIL_ID','BILLDETAIL_ID');
    }
}
