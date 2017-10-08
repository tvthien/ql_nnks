<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loaiphong extends Model
{
    protected $table = 'loai_phong';
    protected $primaryKey = 'id_lp';
    public $timestamps = false;

    // public function giaphong()
    // {
    // 	return $this->hasMany('App\Giaphong','ma_lp','id_lp');
    // }
}
