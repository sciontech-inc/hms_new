<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DoctorResearch extends Model
{
    use SoftDeletes;

    protected $fillable = [

        'doctor_id',
        'research_title',
        'research_date_of_publication',
        'research_contribution_type',
        'research_conference_name',
        'research_doi_isbn',
        'research_abstract',
        'research_area',
        'research_impact_factor',
        'research_citation_count',
        'research_collaborators',
        'research_institution',
        'research_text_link',
        'research_impact_findings',
        'research_presentation',
        'research_follow_up_studies',
        'research_remarks',
        'workstation_id',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}
