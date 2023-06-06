<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rank extends Model
{
    use HasFactory;

    protected $fillable = ['rank','icon'];

    public static $ranks = ['master chef' => 1, 'chef' => 2, 'amateur' => 3];
}
