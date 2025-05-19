<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Relations\BelongsTo;
use MongoDB\Laravel\Relations\HasMany;

class Question extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'questions';

    protected $guarded = [];

    public function survey() : BelongsTo
    {
        return $this->belongsTo(Survey::class, 'survey_id', '_id');
    }

    public function options() : HasMany
    {
        return $this->hasMany(Option::class, 'question_id', '_id');
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
