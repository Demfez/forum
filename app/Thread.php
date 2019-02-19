<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $table = 'threads';

    protected $fillable = [
        'thread_name',
        'content',
        'topic_starter',
        'comments_count'
    ];

    public function author(){
        return $this->belongsTo(User::class,'topic_starter','id');
    }

    public function answers(){
        return $this->hasMany(Answers::class, 'thread_id', 'id');
    }
}
