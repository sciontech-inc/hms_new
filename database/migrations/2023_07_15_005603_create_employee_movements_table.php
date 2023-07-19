<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeMovementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_movements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('employee_no');
            $table->string('filed_by');
            $table->string('changes');
            $table->string('effective_date')->nullable();
            $table->string('remarks')->nullable();
            $table->string('status')->default('PENDING');
            $table->unsignedBigInteger('approved_by')->nullable();
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
        Schema::dropIfExists('employee_movements');
    }
}
