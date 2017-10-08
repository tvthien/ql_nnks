<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Giaphong extends Model
{
    protected $table = "gia_phong";
    public $timestamps = false;

    public function loaiphong()
    {
    	return $this->hasOne('App\Loaiphong','ma_lp','id_lp');
    }
}
