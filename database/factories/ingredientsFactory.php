<?php

namespace Database\Factories;

use App\Models\recipe;
use Illuminate\Database\Eloquent\Factories\Factory;

class ingredientsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name_ingredient' => $this->faker->word(5),
            'quantity' => $this->faker->numberBetween(0, 100),
            'recipe_id' => recipe::all()->random()->id,
        ];
    }
}
