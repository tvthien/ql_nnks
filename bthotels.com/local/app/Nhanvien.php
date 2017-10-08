<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nhanvien extends Model
{
    protected $table = "nhan_vien";
    protected $primayKey = "id_nv";
    public $timestamps = false;

    // public function thuoctk()
    // {
    // 	return $this->belongsTo('App\User','ma_tk','id_user');
    // }
    // public function thuocgdv()
    // {
    // 	return $this->belongsTo('App\Goidv','ma_gdv','id_gdv');
    // }
}
