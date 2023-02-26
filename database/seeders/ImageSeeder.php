<?php

namespace Database\Seeders;

use App\Models\image;
use App\Models\recipe;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        image::factory()->create();
    }
}
