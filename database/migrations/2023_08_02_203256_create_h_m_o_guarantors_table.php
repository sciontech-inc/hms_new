<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHMOGuarantorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('h_m_o_guarantors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->string('guarantor_name');
            $table->string('telephone');
            $table->string('fax_no');
            $table->string('contact_no');
            $table->string('email');
            $table->string('address');
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
        Schema::dropIfExists('h_m_o_guarantors');
    }
}
