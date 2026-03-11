<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class users_notes extends Model
{
    protected $fillable = [
        'user_id',
        'note',
        'trainer_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function trainer()
    {
        return $this->belongsTo(User::class, 'trainer_id');
    }
}