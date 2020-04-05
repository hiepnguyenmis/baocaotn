<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foods extends Model
{
    //
    protected $table='foods';
    protected $primaryKey = 'FOOD_ID';
    public $timestamps = false;
    public $incrementing = false;

    public function Food_Detail(){
        return $this->hasMany('App\FoodDetail','FOOD_ID','FOOD_ID');

    }
    public function Category_Foods(){
        return $this->belongsTo('App\CategoryFoods','CATEGORYFOODS_ID','FOOD_ID');

    }

    public function Bill_Details(){
        return $this->hasMany('App\BillDetails', 'FOOD_ID','FOOD_ID');
    }
}
