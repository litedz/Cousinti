<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;


class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'message' => $this->faker->sentence(),
            'from' => $this->faker->safeEmail(),
            'recipient_id' => User::all()->random()->id,
        ];
    }
}
