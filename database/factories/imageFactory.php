<?php

namespace Database\Factories;

use App\Models\recipe;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'default-cover.png',
            'cover' => 'active',
            'recipe_id' => recipe::all()->random()->id,
        ];
    }
}
