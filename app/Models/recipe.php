<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\CodeCoverage\Node\Builder;
use Database\Factories\RecipeFactory;

class recipe extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'rating', 'type_id', 'how_todo', 'user_id'];

    public function ingredient()
    {
        return $this->hasMany(ingredients::class);
    }
    public function images_recipe()
    {
        return $this->hasMany(image::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function type_recipe()
    {
        return $this->belongsTo(types_recipes::class, 'type_id', 'id');
    }

    public function recipes_liked()
    {
        return $this->hasMany(Rating::class);
    }
    public function scopeRecipeCount()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
