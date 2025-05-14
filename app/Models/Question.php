<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Question extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'questions';

    protected $guarded = [];

    public function survey()
    {
        $this->belongsTo(Survey::class);
    }
}
