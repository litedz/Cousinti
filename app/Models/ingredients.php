<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ingredients extends Model
{
    use HasFactory;
    protected $fillable = ['name_ingredient', 'quantity','recipe_id'];
}
