<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProceduresUndertakensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procedures_undertakens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('patient_id');
            $table->string('procedure_date');
            $table->string('procedure_name');
            $table->string('procedure_description');
            $table->string('procedure_reason');
            $table->string('procedure_results');
            $table->string('pre_procedure_preparation');
            $table->string('post_procedure_preparation');
            $table->string('procedure_complications');
            $table->string('procedure_sedation_used');
            $table->string('procedure_remarks')->nullable();
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
        Schema::dropIfExists('procedures_undertakens');
    }
}
