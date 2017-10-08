<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quyen extends Model
{
    protected $table = "quyen";
    protected $primaryKey = 'id_quyen';
    public $timestamps = false;

    public function taikhoan()
    {
    	return $this->hasMany('App\User','ma_quyen_user','id_quyen');
    }
}
