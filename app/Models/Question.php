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
        $this->belongsTo(Survey::class, 'survey_id', '_id');
    }

    public function options(){
        $this->hasMany(Option::class, 'question_id', '_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($question) {
            // Delete all associated options
            $question->options()->delete();
        });
    }
}
