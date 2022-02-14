<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddRoleStubToRolesTable extends Migration
{

    public function up()
    {
            DB::table('roles')->insert([
                'role' => 'user',
            ]);
    }

    public function down()
    {
       \App\Models\Role::where('role', 'user')->delete();
    }
}
