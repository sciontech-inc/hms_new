<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientAllergiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_allergies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('patient_id');
            $table->string('allergy_allergen');
            $table->string('allergy_reaction');
            $table->string('allergy_severity');
            $table->string('allergy_date_of_onset');
            $table->string('allergy_treatment');
            $table->string('allergy_duration');
            $table->string('source_of_information');
            $table->string('known_cross_reactives');
            $table->string('current_management_plan');
            $table->string('medications_to_avoid');
            $table->string('severity_of_reaction');
            $table->string('allergy_anaphylaxis');
            $table->string('allergy_testing');
            $table->string('other_relevant_medical_history');
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
        Schema::dropIfExists('patient_allergies');
    }
}
