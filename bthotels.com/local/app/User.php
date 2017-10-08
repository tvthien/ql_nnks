<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'id_user';
    public $incrementing = false;
    
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function cogoidv()
    {
        return $this->hasMany('App\Chitietgdv','ma_tk','id_user');
    }
    public function coquyen()
    {
        return $this->belongsTo('App\Quyen','ma_quyen_user','id_quyen');
    }
    public function thuocnnks()
    {
        return $this->belongsTo('App\Nnks','ma_nnks_user','id_nnks');
    }
    public function nguoitao()
    {
        return $this->belongsTo('App\User','nguoi_tao','id_user');
    }
}
