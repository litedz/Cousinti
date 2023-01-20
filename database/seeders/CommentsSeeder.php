<?php

namespace Database\Seeders;

use App\Models\comments;
use Illuminate\Database\Seeder;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        comments::factory(10)->create();
    }
}
