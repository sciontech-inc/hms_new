<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('patient_id');
            $table->string('profile_img');
            $table->string('qr_code')->nullable();
            $table->text('status');
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('lastname');
            $table->text('suffix')->nullable();
            $table->text('mr_locator_no')->nullable();
            $table->text('nickname')->nullable();
            $table->text('alias')->nullable();
            $table->text('weight')->nullable();
            $table->text('birthdate');
            $table->text('sex');
            $table->string('citizenship');
            $table->string('email');
            $table->string('birthplace');
            $table->string('marital_status');
            $table->string('body_marks');
            $table->text('nationality');
            $table->string('religion');
            $table->text('blood_type');
            $table->text('dialect')->nullable();
            $table->text('temp')->nullable();
            $table->text('bp')->nullable();
            $table->text('ethnicity')->nullable();
            $table->text('is_child')->nullable();
            $table->text('non_local')->nullable();
            $table->text('is_hospital_employee')->nullable();
            $table->text('is_blacklisted')->nullable();
            $table->text('is_personal_data_released')->nullable();
            $table->text('is_no_communication_from_company')->nullable();
            $table->text('passport_no')->nullable();
            $table->string('xray_file_no')->nullable();
            $table->text('is_confidential_patient')->nullable();
            $table->text('is_fictitious_birth_date')->nullable();
            $table->text('birth_time')->nullable();
            $table->text('localization')->nullable();
            $table->text('industry')->nullable();
            $table->text('work_level')->nullable();
            $table->text('company')->nullable();
            $table->text('tin_no')->nullable();
            $table->string('occupation')->nullable();
            $table->longText('remarks')->nullable();
            $table->string('referred_by')->nullable();
            $table->string('contact_number_1')->nullable();
            $table->string('contact_number_2')->nullable();
            $table->string('street_no')->nullable();
            $table->string('barangay')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('country')->nullable();
            $table->text('zip_code')->nullable();
            $table->string('street_no_2')->nullable();
            $table->string('barangay_2')->nullable();
            $table->string('city_2')->nullable();
            $table->string('province_2')->nullable();
            $table->string('country_2')->nullable();
            $table->text('zip_code_2')->nullable();
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
        Schema::dropIfExists('patients');
    }
}
