<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Individual User',
            'account_type' => 'Individual',
            'email' => 'individual@gmail.com',
            'password' => bcrypt('individual'),
        ]);

        User::create([
            'name' => 'Business User',
            'account_type' => 'Business',
            'email' => 'business@gmail.com',
            'password' => bcrypt('business'),
        ]);
    }
}
