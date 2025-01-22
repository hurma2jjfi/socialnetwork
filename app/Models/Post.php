<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model {
    protected $fillable = [
        'channel_id', 
        'user_id', 
        'content', 
        'media_url'
    ];

    public function reactions() {
        return $this->hasMany(Reaction::class);
    }

    public function channel() {
        return $this->belongsTo(Channel::class);
    }
}

