<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materials extends Model
{
    //
    protected $table='materials';
    protected $primaryKey = 'MATERIALS_ID';
    public $timestamps = false;
    public $incrementing = false;

    public function Category_Materials(){
        return $this->belongsTo('App\CategoryMaterials','CATEGORYTYPE_ID','MATERIALS_ID');
    }

    public function Food_Detail(){
        return $this->hasMany('App\FoodDetail','MATERIAL_ID','FOOD_ID');
    }
}
