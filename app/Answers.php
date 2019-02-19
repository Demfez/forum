<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answers extends Model
{
    protected $table = 'thread_answers';

    protected $fillable = [
        'text',
        'thread_id',
        'user_id'
    ];
}
