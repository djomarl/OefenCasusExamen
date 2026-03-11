<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CheckIn extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'check_in_time',
        'checked_in',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}