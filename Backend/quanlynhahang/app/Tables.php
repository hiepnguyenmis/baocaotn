<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tables extends Model
{
    //
    protected $table='tables';
    protected $primaryKey = 'TABLE_ID';
    public $timestamps = false;
    public $incrementing = false;

    public function Bills(){
        return $this->hasMany('App/Bills','TABLE_ID','TABLE_ID');
    }
}
