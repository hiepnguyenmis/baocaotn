<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InputMaterial extends Model
{
    protected $table='inputmaterial';
    protected $primaryKey = 'INPUTMATERIAL_ID';
    protected $fillable=[
        'INPUTMATERIAL_ID',
        'INPUTMATERIAL_DATE',
        'MATERIAL_ID',
        'INPUTMATERIAL_AMOUNT'
    ];
    public $timestamps = false;
    public $incrementing = false;

    public function Materials(){
        return $this->hasMany('App\Materials','MATERIAL_ID','MATERIAL_ID');
    }
}
