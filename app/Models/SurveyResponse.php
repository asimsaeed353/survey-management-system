<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Relations\BelongsTo;

class SurveyResponse extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'survey_responses';
    protected $guarded = [];

    public $timestamps = false;
    protected $dates = ['submitted_at'];


    public function survey(): BelongsTo
    {
        return $this->belongsTo(Survey::class);
    }
}
