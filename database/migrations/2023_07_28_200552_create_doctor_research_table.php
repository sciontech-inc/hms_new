<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorResearchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_research', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('doctor_id');
            $table->string('research_title');
            $table->string('research_date_of_publication');
            $table->string('research_contribution_type');
            $table->string('research_conference_name')->nullable();
            $table->string('research_doi_isbn')->nullable();
            $table->string('research_abstract');
            $table->string('research_area');
            $table->string('research_impact_factor');
            $table->string('research_citation_count')->nullable();
            $table->string('research_collaborators')->nullable();
            $table->string('research_institution')->nullable();
            $table->string('research_text_link')->nullable();
            $table->string('research_impact_findings');
            $table->string('research_presentation');
            $table->string('research_follow_up_studies')->nullable();
            $table->string('research_remarks')->nullable();
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
        Schema::dropIfExists('doctor_research');
    }
}
