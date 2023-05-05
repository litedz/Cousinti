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
        $types = ['حلويات', 'مملحات', 'صحي', 'معجنات', 'صباحيات'];
        for ($i=0; $i <count($types) ; $i++) { 
            model_types_recipes::create(['type' => $types[$i]]);
         }
    }
}
