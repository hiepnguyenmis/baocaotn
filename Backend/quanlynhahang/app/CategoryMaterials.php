<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryMaterials extends Model
{
    //
    protected $table='categorymaterial';
    protected $primaryKey = 'CATEGORYMATERIAL_ID';
    protected $fillable=[
        'CATEGORYMATERIAL_ID',
        'CATEGORYMATERIAL_NAME',
        'CATEGORYMATERIAL_UNIT'
    ];
    public $timestamps = false;
    public $incrementing = false;

    public function Material(){
        return $this->hasMany('App\Materials','CATEGORYTYPE_ID','CATEGORYMATERIAL_ID');
    }
}
