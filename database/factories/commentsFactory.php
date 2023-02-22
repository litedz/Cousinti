<?php

namespace Database\Factories;

use App\Models\recipe;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'comment' => $this->faker->sentence(),
            'recipe_id' => recipe::pluck('id')->random(),
            'user_id' => User::all()->random()->id,
        ];
    }
}
