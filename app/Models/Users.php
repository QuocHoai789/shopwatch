<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table='users';

    public function bills(){
    	return $this->hasMany('App\Models\Bills','users_id','id');
    }
    public function comment(){
    	return $this->hasMany('App\Models\Comment','users_id','id');
    }
    public function replycomment(){
    	return $this->hasMany('App\Models\ReplyComment','users_id','id');
    }
    public function carts(){
    	return $this->hasOne('App\Models\Carts','users_id','id');
    }
}

