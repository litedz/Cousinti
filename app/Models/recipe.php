<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class recipe extends Model
{
    use HasFactory;

    protected $with = ['author', 'images_recipe', 'Type_recipe'];

    protected $fillable = ['name', 'rating', 'type_id', 'how_todo', 'user_id', 'description', 'how_long', 'level'];

    public function scopeingredient(): HasMany
    {
        return $this->hasMany(ingredients::class);
    }

    public function images_recipe()
    {
        return $this->hasMany(image::class);
    }

    public function scopeAuthor()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function scopeType_recipe(): BelongsTo
    {
        return $this->belongsTo(types_recipes::class, 'type_id', 'id');
    }

    public function scopeRecipeCount()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(comments::class, 'recipe_id', 'id');
    }

    public function scopeLatestRecipe(Builder $query)
    {
        $query->latest('created_at')->limit(4);
    }

    public function scopeApprouved(Builder $s)
    {
        return $s->where('is_approved', true);
    }
}
