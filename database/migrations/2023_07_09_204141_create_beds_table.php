<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bed_no');
            $table->string('price')->nullable();
            $table->unsignedBigInteger('building_id');
            $table->unsignedBigInteger('floor_id');
            $table->unsignedBigInteger('room_id');
            $table->integer('department_id');
            $table->string('bed_type');
            $table->string('status');
            $table->integer('patient_id')->nullable();
            $table->text('bed_features')->nullable();
            $table->text('bed_size')->nullable();
            $table->text('bed_condition')->nullable();
            $table->text('bed_notes')->nullable();
            $table->text('bed_availability')->nullable();
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

            $table->foreign('room_id')
                ->references('id')
                ->on('rooms');

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
        Schema::dropIfExists('beds');
    }
}
