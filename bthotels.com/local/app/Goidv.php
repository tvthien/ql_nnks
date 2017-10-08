<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goidv extends Model
{
    protected $table = "goi_dv";
    protected $primaryKey = 'id_gdv';
    public $timestamps = false;

    // public function cotk()
    // {
    // 	return $this->hasMany('App\User','ma_tk','id_user');
    // }
}
