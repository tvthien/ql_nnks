<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hang extends Model
{
    protected $table = 'hang';
    protected $primaryKey = 'h_ang';
    public $timestamps = false;

    public function connks()
    {
    	return $this->hasMany('App\Nnks','hang_nnks','h_ang');
    }
}
