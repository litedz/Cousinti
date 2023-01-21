<?php

namespace Database\Factories;

use App\Models\comments;
use App\Models\ingredients;
use App\Models\recipe;
use App\Models\types_recipes;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecipeFactory extends Factory
{

    protected $model = recipe::class;

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
            'user_id' => User::all()->random()->id,
            'how_todo' => $this->faker->realText(),
        ];
    }


}
