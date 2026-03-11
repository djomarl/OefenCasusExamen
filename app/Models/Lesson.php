<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'trainer_id',
        'lesson_type',
    ];

    public function trainer()
    {
        return $this->belongsTo(User::class, 'trainer_id');
    }
}