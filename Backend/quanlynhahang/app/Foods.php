<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foods extends Model
{
    //
    protected $table='foods';
    protected $primaryKey = 'FOOD_ID';
    protected $fillable=[
        'FOOD_ID',
        'FOOD_NO',
        'FOOD_NAME',
        'FOOD_PRICE',
        'FOOD_UNIT',
        'FOOD_STATUS',
        'FOOD_IMG',
        'CATEGORYFOODS_ID',
        'FOOD_DATE',
        'FOOD_TYPE'
    ];
    public $timestamps = false;
    public $incrementing = false;

    public function Materials(){
        return $this->belongsToMany('App\Materials','fooddetail','MATERIAL_ID','FOOD_ID');

    }
    public function CategoryFoods(){
        return $this->belongsTo('App\CategoryFoods','CATEGORYFOODS_ID','CATEGORYFOODS_ID');

    }

    public function Bill_Details(){
        return $this->hasMany('App\BillDetails', 'FOOD_ID','FOOD_ID');
    }
    public function Bills(){
        return $this->belongsToMany('App\Bills','billdetail','BILLDETAIL_ID','FOOD_ID');

    }
}
