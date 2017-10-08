<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nnks extends Model
{
    protected $table = "nn_ks";
    protected $primaryKey = 'id_nnks';
    public $timestamps = false;

    public function cotk()
    {
    	return $this->hasMany('App\User','ma_tk','id_user');
    }
    // public function thuocgdv()
    // {
    // 	return $this->hasMany('App\Goidv','ma_gdv','id_gdv');
    // }
}
