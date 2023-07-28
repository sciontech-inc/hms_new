<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientAdmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_admissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('patient_id');
            $table->string('registry_tracking_no');
            $table->string('admission_case_no');
            $table->string('osca_id_no');
            $table->string('admission_regularity');
            $table->string('status');
            $table->dateTime('admission_datetime');
            $table->dateTime('arrival_datetime');
            $table->dateTime('mgh_datetime');
            $table->dateTime('discharge_datetime');
            $table->string('admission_case_group');
            $table->string('admission_case_type');
            $table->string('transaction_type');
            $table->string('patient_category');
            $table->string('hospitalization_plan');
            $table->string('membership');
            $table->string('service_type');
            $table->string('sub_service_type');
            $table->string('referred_from');
            $table->string('price_group');
            $table->string('price_scheme');
            $table->string('discount_scheme');
            $table->string('classification');
            $table->string('how_admitted');
            $table->string('source_of_admission');
            $table->string('type_of_delivery');
            $table->string('case_indicator');
            $table->integer('newborn_baby')->default(0);
            $table->string('newborn_status')->nullable();
            $table->string('disposition');
            $table->string('admission_result');
            $table->string('type_of_death');
            $table->dateTime('death_datetime');
            $table->integer('expired')->default(0);
            $table->integer('autopsy')->default(0);
            $table->integer('medical_package')->default(0);
            $table->string('mother_account')->nullable();
            $table->text('remarks')->nullable();
            $table->integer('workstation_id');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->integer('deleted_by')->nullable();
            $table->softDeletes();
            $table->timestamps();

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
        Schema::dropIfExists('patient_admissions');
    }
}
