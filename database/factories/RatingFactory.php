<?php

namespace Database\Factories;

use App\Models\recipe;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RatingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'like' => 0,
            'dislike' => 0,
            'user_id' => User::all()->random()->id,
            'recipe_id' => recipe::all()->random()->id,

        ];
    }
}
