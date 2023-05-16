<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\rank;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\WithFaker;
use Faker\Generator;

class UsersSeeder extends Seeder
{

    protected $faker;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        //create support user 
        // user::create([
        //     'username' => 'Support',
        //     'avatar' => 'avatars/default.png',
        //     'email' => 'Support@cousinti.net',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        //     'remember_token' => session()->token(),

        // ]);
        user::factory(10)->create();
    }
}
