<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_trainings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('employee_no');
            $table->string('training_no');
            $table->string('training_name');
            $table->string('training_provider');
            $table->string('training_description')->nullable();
            $table->string('training_date');
            $table->string('training_location');
            $table->string('training_duration');
            $table->string('training_outcome');
            $table->string('training_type');    
            $table->string('expiration_date');
            $table->string('recertification_date');
            $table->integer('workstation_id');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->integer('deleted_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_trainings');
    }
}
