<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersParametersNewTable extends Migration
{
    public function up()
    {
        Schema::create('users_parameters_new', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('phone');
            $table->enum('gender', ['Male', 'Female', 'Other']);
            $table->enum('gender_preference', ['Male', 'Female', 'Both']);
            $table->string('location');
            $table->integer('age');
            $table->integer('height')->nullable();
            $table->integer('weight')->nullable();
            $table->string('interests')->nullable();
            $table->string('hobbies')->nullable();
            $table->text('about');

            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users');
        });
    }
    public function down()
    {
        Schema::dropIfExists('users_parameters_new');
    }
}
