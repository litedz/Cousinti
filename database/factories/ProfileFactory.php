<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'public' => boolval($this->faker->boolean(0)), 
            'last_activity' => boolval($this->faker->boolean(0)), 
            'recipes' => boolval($this->faker->boolean(0)), 
        ];
    }
}
