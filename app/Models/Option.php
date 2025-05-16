<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Option extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'options';

    protected $guarded = [];

    public function question(){
        $this->belongsTo(Question::class, 'question_id', '_id');
    }
}
