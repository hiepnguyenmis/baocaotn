<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Positions extends Model
{
    //
    protected $table='positions';
    protected $primaryKey = 'POSITION_ID';
    public $timestamps = false;
    public $incrementing = false;

    public function Employees(){
        return $this->hasMany('App\Employees','POSITION_ID','POSITION_ID');
    }
}
