<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;


class Survey extends Model
{

    protected $connection = 'mongodb';
    protected $collection = 'surveys';
    protected $guarded = [];

    protected static function booted()
    {
        static::deleting(function ($survey) {
            // Delete all related questions
            Question::where('survey_id', $survey->_id)->delete();
        });
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function question(){
        return $this->hasMany(Question::class, 'survey_id', '_id');
    }
}
