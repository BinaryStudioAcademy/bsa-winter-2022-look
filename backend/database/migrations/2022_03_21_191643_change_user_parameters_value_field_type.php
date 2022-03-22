<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeUserParametersValueFieldType extends Migration
{
    public function up()
    {
        Schema::table('user_parameters', function (Blueprint $table) {
            $table->string('parameter_value')->change();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_parameters');
    }
}
