<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate(); // removes existing data before inserting
        User::firstOrCreate(
            [
                'name' => 'Administrator',
                'email' => 'admin@admin.com',
                'password' => Hash::make('password')
            ]
        );
        User::firstOrCreate(
            [
                'name' => 'Amit',
                'email' => 'amit@gmail.com',
                'password' => Hash::make('password')
            ]
        );
    }
}
