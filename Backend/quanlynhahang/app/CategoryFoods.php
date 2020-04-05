<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryFoods extends Model
{
    //
    protected $table='categoryfoods';
    protected $primaryKey = 'CATEGORYFOODS_ID';
    public $timestamps = false;
    public $incrementing = false;

    public function Material(){
        return $this->hasMany('App\Foods','CATEGORYFOODS_ID','CATEGORYFOODS_ID');
    }
}
