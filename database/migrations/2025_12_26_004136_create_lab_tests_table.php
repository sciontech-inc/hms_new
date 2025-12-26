<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLabTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lab_tests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('patient_id');
            $table->string('transaction_number');
            $table->string('request_number');
            $table->string('physician_name')->nullable();
            $table->datetime('datetime_collected')->nullable();
            $table->datetime('datetime_released')->nullable();
            $table->text('clinical_notes')->nullable();
            $table->unsignedBigInteger('perform_by')->nullable();
            $table->unsignedBigInteger('validated_by')->nullable();
            $table->unsignedBigInteger('noted_by')->nullable();
            $table->string('result_status')->default('PENDING');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('patient_id')
                ->references('id')
                ->on('patients');

            $table->foreign('perform_by')
                ->references('id')
                ->on('users');

            $table->foreign('validated_by')
                ->references('id')
                ->on('users');

            $table->foreign('noted_by')
                ->references('id')
                ->on('users');

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
        Schema::dropIfExists('lab_tests');
    }
}
