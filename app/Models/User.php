<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\UserActivityTrait;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, UserActivityTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username', 
        'avatar', 
        'email', 
        'password'
    ];

    public function channels() {
        return $this->hasMany(Channel::class, 'owner_id');
    }

    public function messages() {
        return $this->hasMany(Message::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
