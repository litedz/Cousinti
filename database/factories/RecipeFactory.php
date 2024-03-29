<?php

namespace Database\Factories;

use App\Models\types_recipes;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(2),
            'type_id' => types_recipes::all()->random()->id,
            'url_video' => 'https://www.youtube.com/cousinti',
            'user_id' => User::factory(),
            'how_todo' => $this->faker->realText(),
            'description' => $this->faker->sentence(400),
            'level' => $this->faker->text(5),
            'is_approved' => true,
            'how_long' => $this->faker->numberBetween(0, 100),
        ];
    }
}
