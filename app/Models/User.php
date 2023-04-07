<?php

namespace App\Models;

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
    protected $with = 'profile_setting';

    protected $fillable = [
        'username',
        'last_name',
        'first_name',
        'name',
        'email',
        'password',
        'age',
        'phone',
        'avatar',
        'Id_user_media',
        'profile_id',
        'rank_id',

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

    public function recipes()
    {
        return $this->hasMany(recipe::class);
    }

    public function recipe_liked()
    {
        return $this->hasMany(Rating::class);
    }

    public function profile_setting()
    {
        return $this->belongsTo(Profile::class, 'profile_id', 'id');
    }

    public function Comments()
    {
        return $this->hasMany(comments::class)->limit(2)->latest();
    }

    public function rank()
    {
       return $this->belongsTo(rank::class);
    }
}
