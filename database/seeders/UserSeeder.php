<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'usertype' => 'admin',
                'password' => Hash::make('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'User1',
                'email' => 'user@example.com',
                'usertype' => 'user',
                'password' => Hash::make('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'User2',
                'email' => 'user2@example.com',
                'usertype' => 'user',
                'password' => Hash::make('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
