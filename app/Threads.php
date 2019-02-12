<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Threads extends Model
{
    protected $table = 'threads';

    protected $fillable = [
        'thread_name',
        'content',
        'topic_starter',
        'comments_count'
    ];
}
