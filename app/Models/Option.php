<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Relations\BelongsTo;

class Option extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'options';

    protected $guarded = [];

    public function question():BelongsTo
    {
        return $this->belongsTo(Question::class, 'question_id', '_id');
    }
}
