<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\CodeCoverage\Node\Builder;
use Database\Factories\RecipeFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class recipe extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'rating', 'type_id', 'how_todo', 'user_id'];

    public function scopeingredient()
    {
        return $this->hasMany(ingredients::class);
    }
    public function scopeimages_recipe():HasMany
    {
        return $this->hasMany(image::class);
    }

    public function scopeauthor()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function scopetype_recipe():BelongsTo
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
    public function comments()
    {
        return $this->hasMany(comments::class, 'recipe_id', 'id');
    }
}
