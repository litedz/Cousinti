<?php

namespace Database\Seeders;

use App\Models\rank;
use Illuminate\Database\Seeder;

class RankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       foreach (rank::$ranks as $key => $value) {
        rank::create([
            'rank' => $value,
            'icon' => 'rank-default.png',
        ]);
       }
    }
}
