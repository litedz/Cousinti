<?php

namespace Database\Seeders;

use App\Models\image;
use App\Models\recipe;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (recipe::get() as $key => $value) {
            image::create([
                'name' => 'default-cover.webp',
                'cover' => 'active',
                'recipe_id' =>$value->id,
            ]);
        }
    }
}
