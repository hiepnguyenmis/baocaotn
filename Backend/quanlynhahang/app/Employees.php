<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $table='employees';
    protected $fillable =['EMPLOYEES_ID','EMPLOYEES_NO','EMPLOYEES_NAME','EMPLOYEES_PHONE','EMPLOYEES_EMAIL','EMPLOYEES_PASSWORD','EMPLOYEES_IMG','POSITION_ID','EMPLOYEES_STATUS'];
    protected $primaryKey = 'EMPLOYEES_ID';
    public $timestamps = false;
    public $incrementing = true;

    public function Bills(){
        return $this->hasMany('App\Bills','EMPLOYEE_ID','EMPLOYEES_ID');
    }

    public function Positions(){
        return $this->belongsTo('App\Positions','POSITION_ID','POSITION_ID');
    }


}
