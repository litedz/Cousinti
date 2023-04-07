<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class types_recipes extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'image'];

    public function recipe()
    {
        return $this->hasMany(recipe::class);
    }
}
