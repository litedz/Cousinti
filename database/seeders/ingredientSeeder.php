<?php

namespace Database\Seeders;

use App\Models\ingredients;
use Illuminate\Database\Seeder;

class ingredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ingredients::factory(10)->create();
    }
}
