<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => '1',
            'name' => 'EventOwner',
            'email' => 'eventowner@gmail.com',
            'password' => bcrypt('pass@eventowner'),
        ]);

        DB::table('users')->insert([
            'role_id' => '2',
            'name' => 'EventModerator',
            'email' => 'eventmoderator@gmail.com',
            'password' => bcrypt('pass@eventmoderator'),
        ]);

        DB::table('users')->insert([
            'role_id' => '3',
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('pass@user'),
        ]);

        DB::table('users')->insert([
            'role_id' => '4',
            'name' => 'Administrator',
            'email' => 'administrator@gmail.com',
            'password' => bcrypt('pass@administrator'),
        ]);
    }
}
