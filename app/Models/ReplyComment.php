<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReplyComment extends Model
{
    protected $table="reply_comment";
    public function users()
    {
        return $this->belongsTo('App\Models\Users', 'users_id','id');
    }
}
