<?php

namespace App;

use Facade\Ignition\QueryRecorder\Query;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    //
    protected $table='customers';
    protected $primaryKey = 'CUSTOMER_ID';
    protected $fillable=[
        'CUSTOMER_ID',
        'CUSTOMER_NO',
        'CUSTOMER_NAME',
        'CUSTOMER_ADD',
        'CUSTOMER_PHONE',
        'CUSTOMER_EMAIL',
        'CUSTOMER_IMG',
        'CUSTOMER_USERNAME',
        'CUSTOMER_PASSWORD',
        'CUSTOMER_STATUS',
        'CUSTOMER_MARK',
        'CUSTOMER_ADDRESS'
    ];
    public $timestamps = false;
    public $incrementing = false;

    public function Bills(){
        return $this->hasMany('App\Bills','CUSTOMER_ID','CUSTOMER_ID');
    }

}
