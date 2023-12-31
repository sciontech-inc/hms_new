<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('supplier_code');
            $table->string('supplier_name');
            $table->string('contact_person');
            $table->string('address');
            $table->string('contact_number_1');
            $table->string('contact_number_2')->nullable();
            $table->string('email');
            $table->string('terms_agreement');
            $table->string('pricing_agreement');
            $table->string('delivery_terms');
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
        Schema::dropIfExists('suppliers');
    }
}
