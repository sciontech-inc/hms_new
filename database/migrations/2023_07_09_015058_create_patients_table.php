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
            $table->string('birthdate');
            $table->text('sex');
            $table->string('citizenship');
            $table->string('email');
            $table->string('birthplace');
            $table->string('marital_status');
            $table->string('body_marks');
            $table->text('nationality');
            $table->string('religion');
            $table->text('blood_type');
            $table->string('occupation');
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
