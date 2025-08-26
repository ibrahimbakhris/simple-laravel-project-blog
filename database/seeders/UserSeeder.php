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
        $users[] = User::firstOrCreate(
            ['email' => 'admin@blog.com'],
            [
                'name' => 'Muhammad Norsyahrin Seth',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ]
        );

        $users[] = User::firstOrCreate(
            ['email' => 'ahmad@blog.com'],
            [
                'name' => 'Ahmad Rahman',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ]
        );

        $users[] = User::firstOrCreate(
            ['email' => 'siti@blog.com'],
            [
                'name' => 'Siti Nurhaliza',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ]
        );

        $users[] = User::firstOrCreate(
            ['email' => 'david@blog.com'],
            [
                'name' => 'David Kumar',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ]
        );
    }
}
