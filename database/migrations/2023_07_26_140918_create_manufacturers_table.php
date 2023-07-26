<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManufacturersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manufacturers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('manufacturer_code');
            $table->string('manufacturer_name');
            $table->string('contact_person');
            $table->string('contact_number_1');
            $table->string('contact_number_2')->nullable();
            $table->string('email');
            $table->string('payment_terms');
            $table->string('tax_information');
            $table->string('certification')->nullable();
            $table->string('products');
            $table->string('lead_time');
            $table->string('delivery_terms');
            $table->string('performance_metrics')->nullable();
            $table->string('contracts')->nullable();
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('manufacturers');
    }
}
