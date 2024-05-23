<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name'              => 'Admin',
                'email'             => 'jinn2.admin@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password'          => Hash::make(config('auth.passwords.admin_password')),
                'role'              => User::ADMIN_ROLE_ID
            ]
        ];

        foreach ($users as $users) {
            User::updateOrInsert($users, $users);
        }
    }
}