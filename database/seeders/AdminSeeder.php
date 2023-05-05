<?php

namespace Database\Seeders;

use App\Models\admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       admin::create([
            'username' => 'admin',
            'avatar' => 'avatars/admin.png',
            'email' => 'admin@email.com',
            'password' => Hash::make('password'),
            'role_id' => 1,
        ]);
    }
}
