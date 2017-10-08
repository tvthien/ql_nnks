<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quoctich extends Model
{
    protected $table = "quoc_tich";
    protected $primaryKey = 'id_qt';
    public $timestamps = false;

    // public function taikhoan()
    // {
    // 	return $this->hasMany('App\User','ma_quyen_user','id_quyen');
    // }
}
