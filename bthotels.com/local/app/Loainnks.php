<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loainnks extends Model
{
    protected $table = "loai_nnks";
    protected $primaryKey = 'id_lnnks';
    public $timestamps = false;

    public function nhanghikhachsan()
    {
    	return $this->hasMany('App\Nnks','ma_lnnks','id_lnnks');
    }
}
