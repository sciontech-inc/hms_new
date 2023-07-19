<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeDependentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_dependents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('employee_no');
            $table->string('dependent_firstname');
            $table->string('dependent_middlename')->nullable();
            $table->string('dependent_lastname');
            $table->string('dependent_birthdate');
            $table->string('dependent_relationship');
            $table->string('dependent_sex');
            $table->string('dependent_citizenship')->nullable();
            $table->string('dependent_address');
            $table->string('dependent_contact_no')->nullable();  
            $table->string('dependent_email')->nullable();
            $table->string('dependent_designation')->nullable();
            $table->string('dependent_notes')->nullable();
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
        Schema::dropIfExists('employee_dependents');
    }
}
