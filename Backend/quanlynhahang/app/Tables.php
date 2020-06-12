<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tables extends Model
{
    //
    protected $table='tables';
    protected $primaryKey = 'TABLE_ID';
    protected $fillable=[
        'TABLE_ID',
        'TABLE_NO',
        'TABLE_STATUS',
        'ROOM_ID'
    ];
    public $timestamps = false;
    public $incrementing = false;

    public function Bills(){
        return $this->hasMany('App\Bills','TABLE_ID','TABLE_ID');
    }

    public function Room(){
        return $this->belongsTo('App\Rooms','ROOM_ID','ROOM_ID');
    }
}
