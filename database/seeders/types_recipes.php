<?php

namespace Database\Seeders;

use App\Models\types_recipes as model_types_recipes;
use Illuminate\Database\Seeder;

class types_recipes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        model_types_recipes::factory(4)->create();
    }
}
