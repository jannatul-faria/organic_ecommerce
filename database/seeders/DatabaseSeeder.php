<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = [
            [
                'firstName' => 'Super',
                'lastName' => 'Admin',
                'email' => 'admin@mail.com',
                'password' => 12345678,
                'mobile' => '01835061968',
              
            ],
            [
                'firstName' => 'User',
                'lastName' => 'Test',
                'email' => 'user@mail.com',
                'password' => 12345678,
                'mobile' => '064451968',
              
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
