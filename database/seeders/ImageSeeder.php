<?php

namespace Database\Seeders;

use App\Models\image;
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
        image::factory(10)->create();
    }
}
