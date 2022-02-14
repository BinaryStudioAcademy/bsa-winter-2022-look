<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /**
         * TODO Remove this after demo!
         * task for set user role https://trello.com/c/m4Am8xY2/13-create-roles-for-users
         *
         * user not register if table roles empty (FK user to roles)!
         */
        DB::table('roles')->insert([
            'role' => 'user',
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
