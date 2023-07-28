<div id="doctor_research_tab" class="form-tab">
    <h5>RESEARCH CONTRIBUTION</h5>
    <div class="doctor-work-table">
        <div class="row">
            <div class="col-12">
                <table id="doctor_research_table" class="table table-striped" style="width:100%">
                </table>
            </div>
        </div>
    </div>
</div>



@section('sc-modal')
@parent
<div class="sc-modal-content" id="doctor_research_form">
    <div class="sc-modal-dialog sc-xl">
        <div class="sc-modal-header">
            <span class="sc-title-bar"></span>
            <span class="sc-close" onclick="scion.create.sc_modal('doctor_research_form').hide('all', modalHideFunction)"><i class="fas fa-times"></i></span>
        </div>
        <div class="sc-modal-body">
            <form method="post" id="doctorresearchForm" class="form-record">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group research_title">
                            <label>TITLE <span class="required">*</span></label>
                            <input type="text" class="form-control" name="research_title" id="research_title"/>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group research_date_of_publication">
                            <label>DATE OF PUBLICATION <span class="required">*</span></label>
                            <input type="date" class="form-control" name="research_date_of_publication" id="research_date_of_publication"/>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group research_contribution_type">
                            <label>CONTRIBUTION TYPE <span class="required">*</span></label>
                            <input type="text" class="form-control" name="research_contribution_type" id="research_contribution_type"/>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group research_conference_name">
                            <label>CONFERENCE NAME<span class="required">*</span></label>
                            <input type="text" class="form-control" name="research_conference_name" id="research_conference_name"/>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group research_doi_isbn">
                            <label>CONTRIBUTION TYPE <span class="required">*</span></label>
                            <input type="text" class="form-control" name="research_doi_isbn" id="research_doi_isbn"/>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group research_area">
                            <label>RESEARCH AREA<span class="required">*</span></label>
                            <input type="text" class="form-control" name="research_area" id="research_area"/>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group research_abstract">
                            <label>ABSTRACT <span class="required">*</span></label>
                            <textarea name="research_abstract" id="research_abstract" rows="2" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group research_impact_factor">
                            <label>IMPACT FACTOR <span class="required">*</span></label>
                            <textarea name="research_impact_factor" id="research_impact_factor" rows="2" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group research_citation_count">
                            <label>CITATION COUNT <span class="required">*</span></label>
                            <input type="text" class="form-control" name="research_citation_count" id="research_citation_count"/>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group research_institution ">
                            <label>INSTITUTION <span class="required">*</span></label>
                            <input type="text" class="form-control" name="research_institution " id="research_institution "/>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group research_collaborators">
                            <label>COLLAROBATORS<span class="required">*</span></label>
                            <input type="text" class="form-control" name="research_collaborators" id="research_collaborators"/>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group research_text_link">
                            <label>FULL TEXT LINK<span class="required">*</span></label>
                            <input type="text" class="form-control" name="research_text_link" id="research_text_link"/>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group research_impact_findings ">
                            <label>IMPACT AND FINDINGS <span class="required">*</span></label>
                            <textarea name="research_impact_findings" id="research_impact_findings" rows="2" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group research_presentation">
                            <label>RESEARCH PRESENTATION<span class="required">*</span></label>
                            <input type="text" class="form-control" name="research_presentation" id="research_presentation"/>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group research_follow_up_studies">
                            <label>FOLLOW-UP STUDIES <span class="required">*</span></label>
                            <textarea name="research_follow_up_studies" id="research_follow_up_studies" rows="2" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group research_remarks">
                            <label>REMARKS <span class="required">*</span></label>
                            <textarea name="research_remarks" id="research_remarks" rows="2" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection



@section('styles')
<style>
    .btn-file {
        position: relative;
        overflow: hidden;
    }
    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        cursor: inherit;
        display: block;
    }
    .form-control {
        font-size: 12px;
    }
    .main {
        overflow-x: hidden;
    }
    .card-header {
        background: #e9e9e9;
    }
    h5.card-title {
        color: #3282b8;
        margin-bottom: 0px;
    }
    h5.title {
        font-size: 12px;
        color: gray;
    }
    p.section-title {
        font-size: 12px;
        color: #b6b6b6;
        margin-bottom: 0px;
    }
    p.notif-title {
        font-weight: bold;
        color: #e02828;
        font-size: 13px;
        margin-bottom: 0px;
    }
    p.notif-title-green {
        font-weight: bold;
        color: #28e04a;
        font-size: 13px;
        margin-bottom: 0px;
    }
    p.notif-description {
        font-size: 10px;
        color: #b6b6b6;
    }
    p.section-desc {
        font-weight: bold;
        color: #6eafdb;
    }
    label.section-label {
        font-weight: bold;
    }
    .payroll-title {
        color: #b6b6b6;
        margin-bottom: 0px !important;
    }
    .payroll-date {
        color: #6eafdb;
        font-weight: bold;
    }
    .employment-status {
        color: #b6b6b6;
        font-size: 12px;
    }
    .job-title {
        font-weight: bold;
        color: #6eafdb;
        margin-bottom: 0px !important;
    }
    .account-balance {
        font-weight: bold;
        font-size: 20px;
    }
    table {
        border-collapse: collapse;
        width: 100%;
        font-size: 10px;
    }

    td, th {
        padding: 5px;
    }
    th {
        color: #6eafdb;
        font-weight: bold;
    }
    table.dtl tr:nth-child(even) {
        background: #efefef;
    }
    table.dtl td, th {
        /* border: 1px solid #dddddd; */
        text-align: left;
        padding: 6px;
    }
    table.wks tr:nth-child(even) {
        background: #e7f5ff;
    }
    table.wks td, th {
        /* border: 1px solid #dddddd; */
        text-align: left;
        padding: 6px;
    }
  </style>
@endsection


