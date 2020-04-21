<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $table='employees';
    protected $fillable =['EMPLOYEES_ID','EMPLOYEES_NO','EMPLOYEES_FIRSTNAME','EMPLOYEES_LASTNAME','EMPLOYEES_USERNAME','EMPLOYEES_PHONE','EMPLOYEES_GENDER','EMPLOYEES_AGE','EMPLOYEES_BIRTHDAY','EMPLOYEES_EMAIL','EMPLOYEES_PASSWORD','EMPLOYEES_IMG','POSITION_ID','EMPLOYEES_STATUS','EMPLOYEES_ADDRESS','EMPLOYEES_STARTDAY','EMPLOYEES_ENDDAY'];
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
