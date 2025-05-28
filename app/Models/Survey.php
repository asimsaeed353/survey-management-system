<?php

namespace App\Models;

use Illuminate\Support\Str;
use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Relations\BelongsTo;
use MongoDB\Laravel\Relations\HasMany;


class Survey extends Model
{

    protected $connection = 'mongodb';
    protected $collection = 'surveys';
    protected $guarded = [];

    public function path(){
        return url('/survey/' . $this->_id . '-' . Str::slug($this->name));
    }

    public function publicPath(){
        return url('/survey/published/' . $this->_id . '-' . Str::slug($this->name));
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function questions(): HasMany
    {
        return $this->hasMany(Question::class, 'survey_id', '_id');
    }
    public function responses(): HasMany
    {
        return $this->hasMany(SurveyResponse::class, 'survey_id', '_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($survey) {
            // Delete all related questions
            // delete each question so it triggers the delete event for each child
            $survey->questions->each(function ($question) {
                $question->delete();
            });
        });
    }
}
