<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVitalMeasurementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vital_measurements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('patient_id');
            $table->string('vital_date');
            $table->string('vital_time');
            $table->string('blood_pressure');
            $table->string('heart_rate');
            $table->string('temperature');
            $table->string('respiratory_rate');
            $table->string('oxygen_saturation');
            $table->string('pulse_rate');
            $table->string('vital_remarks');
            $table->string('height');
            $table->string('weight');
            $table->integer('workstation_id')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->integer('deleted_by')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('patient_id')
                ->references('id')
                ->on('patients');

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
        Schema::dropIfExists('vital_measurements');
    }
}
