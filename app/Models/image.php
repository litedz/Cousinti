<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    use HasFactory;

    protected $fillable =['name','recipe_id','cover'];

    public function recipe()
    {
       return $this->belongsTo(recipe::class);
    }
}
