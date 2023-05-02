<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishRecipe extends Model
{
    use HasFactory;
    protected $fillable= ['user_id','recipe_id'];


    protected $with =['recipe'];


    public function recipe()
    {
        return $this->hasMany(recipe::class,"id",'user_id');
    }
}
