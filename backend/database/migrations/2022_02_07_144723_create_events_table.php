<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_type_id');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('location_id');
            $table->string('name');
            $table->text('description');
            $table->timestamp('starts_at');
            $table->string('duration');

            $table
                ->foreign('event_type_id')
                ->references('id')
                ->on('event_types');
            $table
                ->foreign('created_by')
                ->references('id')
                ->on('users');
            $table
                ->foreign('location_id')
                ->references('id')
                ->on('locations');
        });
    }

    public function down()
    {
        Schema::dropIfExists('events');
    }
}
