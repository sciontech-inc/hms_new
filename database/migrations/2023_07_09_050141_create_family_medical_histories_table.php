<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamilyMedicalHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('family_medical_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('patient_id');
            $table->string('fm_relationship');
            $table->string('fm_medical_condition');
            $table->string('fm_age_at_diagnosis');
            $table->string('fm_age_at_death');
            $table->string('fm_cause_of_death');
            $table->string('fm_other_relevant_medical_history');
            $table->string('fm_family_history_of_specific_conditions');
            $table->string('fm_ethnicity');
            $table->string('fm_lifestyle_factors');
            $table->string('fm_other_family_members_affected');
            $table->string('fm_remarks');
            $table->integer('workstation_id')->nullable();
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
        Schema::dropIfExists('family_medical_histories');
    }
}
