<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLabTestSubRangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lab_test_sub_ranges', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('sub_category_id');
            $table->string('range_code');
            $table->string('range_name');
            $table->decimal('low', 10, 2)->nullable();
            $table->decimal('high', 10, 2)->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('lab_test_sub_ranges');
    }
}
