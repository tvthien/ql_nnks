<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loaithbi extends Model
{
    protected $table = "loai_tbi";
    protected $primaryKey = 'id_ltb';
    public $timestamps = false;

    // public function cotk()
    // {
    // 	return $this->hasMany('App\User','ma_tk','id_user');
    // }
}
