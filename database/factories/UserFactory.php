<?php

namespace Database\Factories;

use App\Models\Profile;
use App\Models\rank;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'username' => strtolower($this->faker->name()),
            'last_name' => strtolower($this->faker->name()),
            'first_name' => strtolower($this->faker->name()),
            'avatar' => 'avatars/default-avatar.png',
            'age' => $this->faker->numberBetween(15, 80),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'profile_id' => Profile::factory(),
            'rank_id' => rank::all()->random()->id,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => session()->token(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
