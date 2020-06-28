<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permission';
    protected $primaryKey = 'PERMISSION_ID';
    protected $filable = ['PERMISSION_ID', 'PERMISSION_NAME'];
    public $timestamps = false;
    public $incrementing = false;

    public function Employees()
    {
        return $this->hasMany('App\Employees', 'PERMISSION_ID', 'PERMISSION_ID');
    }
}
