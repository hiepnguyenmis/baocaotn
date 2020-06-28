<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materials extends Model
{
    //
    protected $table='materials';
    protected $primaryKey = 'MATERIALS_ID';
    protected $fillable=[
    'MATERIALS_ID',
    'MATERIALS_NO',
    'MATERIALS_NAME',
    'MATERIALS_PRICE',
    'MATERIALS_DATE',
    'MATERIALS_IMG',
    'CATEGORYTYPE_ID'
    ];
    public $timestamps = false;
    public $incrementing = false;

    public function CategoryMaterials(){
        return $this->belongsTo('App\CategoryMaterials','CATEGORYTYPE_ID','CATEGORYMATERIAL_ID');
    }
    public function InputMaterial(){
        return $this->belongsTo('App\Inputmaterial','MATERIALS_ID','MATERIALS_ID');
    }
    public function FoodDetail(){
        return $this->hasMany('App\FoodDetail','MATERIAL_ID','FOOD_ID');
    }
}
