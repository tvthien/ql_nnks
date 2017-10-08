<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phuongxa extends Model
{
    protected $table = "phuong_xa";
    protected $primaryKey = 'id_px';
    public $timestamps = false;

    public function connks()
    {
    	return $this->hasMany('App\Nnks','ma_px','id_px');
    }
    public function thuocquhuyen()
    {
    	return $this->belongsTo('App\Quanhuyen','ma_qh','id_qh');
    }
}
