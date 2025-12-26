<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLabTestDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lab_test_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('lab_test_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('sub_category_id');
            $table->decimal('result', 10, 2)->nullable();
            $table->string('flag');
            $table->text('remarks')->nullable();
            $table->string('status')->default('PENDING');
            $table->timestamps();

            $table->foreign('lab_test_id')
                ->references('id')
                ->on('lab_tests');

            $table->foreign('category_id')
                ->references('id')
                ->on('lab_test_categories');

            $table->foreign('sub_category_id')
                ->references('id')
                ->on('lab_test_sub_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lab_test_details');
    }
}
