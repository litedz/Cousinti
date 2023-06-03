<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            types_recipes::class,
            RankSeeder::class,
            UsersSeeder::class,
            recipeSeeder::class,
            ImageSeeder::class,
            CommentsSeeder::class,
            ingredientSeeder::class,
            ProfileSeeder::class,
            RoleSeeder::class,
            AdminSeeder::class,
            // RatingSeeder::class,
            MessageSeeder::class,
        ]);
    }
}
