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

    public function scopengredient()
    {
        return $this->hasMany(ingredients::class);
    }
    public function scopeImages_recipe():HasMany
    {
        return $this->hasMany(image::class);
    }

    public function scopeAuthor()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function scopeType_recipe():BelongsTo
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
