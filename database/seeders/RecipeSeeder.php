<?php

namespace Database\Seeders;

use App\Models\recipe;
use Illuminate\Database\Seeder;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        recipe::factory(10)->create();
    }
}
