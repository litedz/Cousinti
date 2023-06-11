<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notification>
 */
class NotificationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'recipient_id' => User::all()->random()->id,
            'from_id' => User::all()->random()->id,
            'subject' => $this->faker->word(),
            'message' => $this->faker->sentence(),
            'type' => $this->faker->randomElement(['recipes', 'likes', 'comments']),
        ];
    }
}
