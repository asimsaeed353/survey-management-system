<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;


class Survey extends Model
{

    protected $connection = 'mongodb';
    protected $collection = 'surveys';
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function questions(){
        return $this->hasMany(Question::class, 'survey_id', '_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($survey) {
            // Delete all related questions
//            Question::where('survey_id', $survey->_id)->delete();
            $survey->questions()->delete();
        });
    }
}
