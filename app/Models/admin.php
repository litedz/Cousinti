<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class admin extends Authenticatable
{
    use HasFactory,HasApiTokens;

    protected $fillable = ['username', 'email', 'avatar', 'password'];

    public function RoleUser()
    {
        return $this->hasOne(Role::class, 'id', 'role_id');
    }
}
