<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model {
    protected $fillable = [
        'name', 
        'description', 
        'owner_id', 
        'is_private'
    ];

    public function owner() {
        return $this->belongsTo(User::class);
    }

    public function posts() {
        return $this->hasMany(Post::class);
    }

    public function subscribers() {
        return $this->belongsToMany(User::class, 'channel_subscribers');
    }
}

