<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function outfit(){
        return $this_>hasMany(Outfit::class);
    }

    public function images() {
        return $this->hasMany(Images::class, 'user_id');
    }

    public function followers() {
        return $this->belongsToMany(User::class, 'following', 'following_id', 'follower_id')->withTimestamps();
    }

    public function followings() {
        return $this->belongsToMany(User::class, 'following', 'follower_id', 'following_id')->withTimestamps();
    }
}
