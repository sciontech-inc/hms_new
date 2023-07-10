<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('patient_id');
            $table->string('profile_img');
            $table->string('qr_code')->nullable();
            $table->text('status');
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('lastname');
            $table->text('suffix')->nullable();
            $table->string('birthdate');
            $table->text('sex');
            $table->string('citizenship');
            $table->string('email');
            $table->string('birthplace');
            $table->string('marital_status');
            $table->string('medical_license_no');
            $table->string('medical_license_expiry_date');
            $table->string('contact_number_1');
            $table->string('contact_number_2');
            $table->string('street_no');
            $table->string('barangay');
            $table->string('city');
            $table->string('province');
            $table->string('country');
            $table->string('zip_code');
            $table->string('street_no_2');
            $table->string('barangay_2');
            $table->string('city_2');
            $table->string('province_2');
            $table->string('country_2');
            $table->string('zip_code_2');
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
        Schema::dropIfExists('doctors');
    }
}
