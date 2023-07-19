<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('employee_no');
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
            $table->string('contact_number_1');
            $table->string('contact_number_2')->nullable();
            $table->string('email');
            $table->string('street_no');
            $table->string('barangay');
            $table->string('city');
            $table->string('province');
            $table->string('country');
            $table->string('zip_code');
            $table->string('street_no_2')->nullable();
            $table->string('barangay_2')->nullable();
            $table->string('city_2')->nullable();
            $table->string('province_2')->nullable();
            $table->string('country_2')->nullable();
            $table->string('zip_code_2')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('spouse_name')->nullable();
            $table->string('job_title')->nullable();
            $table->string('supervisor')->nullable();
            $table->string('work_location')->nullable();
            $table->string('work_email')->nullable();
            $table->string('work_telephone')->nullable();
            $table->string('work_mobile')->nullable();
            $table->string('start_date')->nullable();
            $table->string('emergency_contact_name')->nullable();
            $table->string('emergency_contact_no')->nullable();
            $table->string('bank_account')->nullable();
            $table->string('tin')->nullable();
            $table->string('sss')->nullable();
            $table->string('pagibig')->nullable();
            $table->string('philhealth')->nullable();
            $table->string('notes')->nullable();
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
        Schema::dropIfExists('employees');
    }
}
