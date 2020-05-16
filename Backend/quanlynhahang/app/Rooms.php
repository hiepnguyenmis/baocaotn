<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    protected $table='rooms';
    protected $primaryKey = 'ROOM_ID';
    protected $fillable=[
        'ROOM_ID',
        'ROOM_NAME'
    ];
    public $timestamps = false;
    public $incrementing = false;

    public function Tables(){
        return $this->hasMany('App\Tables','ROOM_ID','ROOM_ID');
    }
}
