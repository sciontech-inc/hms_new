<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('room_no');
            $table->string('room_type');
            $table->string('room_name');
            $table->unsignedBigInteger('floor_id');
            $table->unsignedBigInteger('building_id');
            $table->integer('capacity');
            $table->string('occupancy_status');
            $table->string('availability_schedule')->nullable();
            $table->text('room_features')->nullable();
            $table->text('room_size')->nullable();
            $table->text('room_condition')->nullable();
            $table->text('room_usage_restriction')->nullable();
            $table->text('room_service')->nullable();
            $table->text('room_notes')->nullable();
            $table->text('room_accessibility')->nullable();
            $table->integer('workstation_id');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->integer('deleted_by')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('building_id')
                ->references('id')
                ->on('buildings');
                
            $table->foreign('floor_id')
                ->references('id')
                ->on('floors');

            $table->foreign('created_by')
                ->references('id')
                ->on('users');
                
            $table->foreign('updated_by')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
