<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    private $roles = ['event_owner', 'event_moderator', 'user', 'administrator'];

    public function run()
    {
        foreach ($this->roles as $role) {
            DB::table('roles')->insert([
                'role' => $role,
            ]);
        }
    }
}
