<?php

namespace Database\Seeders;

use App\Models\message;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        message::factory(10)->create();
    }
}
