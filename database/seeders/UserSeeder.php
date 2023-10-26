<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'name' => 'User 1',
                'email' => 'user1@example.com',
                'password' => Hash::make('password1'),
                'timezone' => 'America/New_York',
                'created_at' => Carbon::now()->setTimezone('America/New_York'),
                'updated_at' => Carbon::now()->setTimezone('America/New_York'),
            ],
            [
                'name' => 'User 2',
                'email' => 'user2@example.com',
                'password' => Hash::make('password2'),
                'timezone' => 'America/Los_Angeles',
                'created_at' => Carbon::now()->setTimezone('America/Los_Angeles'),
                'updated_at' => Carbon::now()->setTimezone('America/Los_Angeles'),
            ],
            [
                'name' => 'User 3',
                'email' => 'user3@example.com',
                'password' => Hash::make('password3'),
                'timezone' => 'Asia/Tokyo',
                'created_at' => Carbon::now()->setTimezone('Asia/Tokyo'),
                'updated_at' => Carbon::now()->setTimezone('Asia/Tokyo'),
            ],
            [
                'name' => 'User 4',
                'email' => 'user4@example.com',
                'password' => Hash::make('password4'),
                'timezone' => 'Europe/London',
                'created_at' => Carbon::now()->setTimezone('Europe/London'),
                'updated_at' => Carbon::now()->setTimezone('Europe/London'),
            ],
            [
                'name' => 'User 5',
                'email' => 'user5@example.com',
                'password' => Hash::make('password5'),
                'timezone' => 'Australia/Sydney',
                'created_at' => Carbon::now()->setTimezone('Australia/Sydney'),
                'updated_at' => Carbon::now()->setTimezone('Australia/Sydney'),
            ],
        ];

        DB::table('users')->insert($users);
    }
}
