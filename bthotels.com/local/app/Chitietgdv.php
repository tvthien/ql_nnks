<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chitietgdv extends Model
{
    protected $table = "chi_tiet_gdv";
    protected $primayKey = array('ma_gdv_','ma_tk');
    public $timestamps = false;

    public function thuoctk()
    {
    	return $this->belongsTo('App\User','ma_tk','id_user');
    }
    public function thuocgdv()
    {
    	return $this->belongsTo('App\Goidv','ma_gdv','id_gdv');
    }
}
