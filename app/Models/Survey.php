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
    public function question(){
        return $this->hasMany(Question::class);
    }
}
