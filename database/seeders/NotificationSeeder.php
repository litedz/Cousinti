<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\notification;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        notification::factory(10)->create();
    }
}
