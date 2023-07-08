<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuildingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buildings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('address');
            $table->string('city');
            $table->string('province');
            $table->string('postal_code');
            $table->string('contact_number');
            $table->string('email');
            $table->date('construction_date');
            $table->string('architectural_style')->nullable();
            $table->string('total_area')->nullable();
            $table->integer('workstation_id');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->integer('deleted_by')->nullable();
            $table->softDeletes();
            $table->timestamps();

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
        Schema::dropIfExists('buildings');
    }
}
