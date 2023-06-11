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
            'from_id' => $this->faker->randomElement([User::all()->random()->id, null]),
            'recipient_id' => User::all()->random()->id,
        ];
    }
}
