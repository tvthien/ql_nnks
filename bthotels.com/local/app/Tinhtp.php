<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tinhtp extends Model
{
    protected $table = "tinh_tp";
    protected $primaryKey = 'id_ttp';
    public $timestamps = false;

    public function coquhuyen()
    {
    	return $this->hasMany('App\Quanhuyen','ma_ttp','id_ttp');
    }
}
