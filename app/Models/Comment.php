<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table="comment";
    public function users()
    {
        return $this->belongsTo('App\Models\Users', 'users_id', 'id');
    }
    public function replyComment()
    {
        return $this->hasMany('App\Models\ReplyComment', 'comment_id', 'id');
    }
}
