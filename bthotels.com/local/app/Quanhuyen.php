<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quanhuyen extends Model
{
    protected $table = "quan_huyen";
    protected $primaryKey = 'id_qh';
    public $timestamps = false;

    public function cophuongxa()
    {
    	return $this->hasMany('App\Phuongxa','ma_qh','id_tqh');
    }
    public function thuocttp()
    {
    	return $this->belongsTo('App\Tinhtp','ma_ttp','id_ttp');
    }
}
