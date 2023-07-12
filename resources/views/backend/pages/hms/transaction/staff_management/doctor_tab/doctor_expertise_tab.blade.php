<div id="doctor_expertise_tab" class="form-tab">
    <h5>EXPERTISE & SPECIALIZATIONS</h5>
    <div class="doctor-work-table">
        <div class="row">
            <div class="col-12">
                <table id="doctor_expertise_table" class="table table-striped" style="width:100%">
                </table>
            </div>
        </div>
    </div>
</div>



@section('sc-modal')
@parent
<div class="sc-modal-content" id="doctor_expertise_form">
    <div class="sc-modal-dialog sc-xl">
        <div class="sc-modal-header">
            <span class="sc-title-bar"></span>
            <span class="sc-close" onclick="scion.create.sc_modal('doctor_expertise_form').hide('all', modalHideFunction)"><i class="fas fa-times"></i></span>
        </div>
        <div class="sc-modal-body">
            <form method="post" id="doctorexpertiseForm" class="form-record">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group specialization">
                            <label>EXPERTISE/SPECIALIZATION <span class="required">*</span></label>
                            <input type="text" class="form-control" name="specialization" id="specialization"/>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group sub_specialty">
                            <label>SUB-SPECIALTY <span class="required">*</span></label>
                            <input type="text" class="form-control" name="sub_specialty" id="sub_specialty"/>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group clinical_focus">
                            <label>CLINICAL FOCUS <span class="required">*</span></label>
                            <input type="text" class="form-control" name="clinical_focus" id="clinical_focus"/>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group procedures_techniques">
                            <label>PROCEDURES & TECHNIQUES <span class="required">*</span></label>
                            <textarea name="procedures_techniques" id="procedures_techniques" rows="2" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group certification">
                            <label>CERTIFICATION <span class="required">*</span></label>
                            <input type="text" class="form-control" name="certification" id="certification"/>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group years_of_experience">
                            <label>YEARS OF EXPERIENCE <span class="required">*</span></label>
                            <input type="number" class="form-control" name="years_of_experience" id="years_of_experience"/>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group key_professional_achievements">
                            <label>KEY PROFESSIONAL ACHIEVEMENTS <span class="required">*</span></label>
                            <textarea name="key_professional_achievements" id="key_professional_achievements" rows="2" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group notes">
                            <label>NOTES <span class="required">*</span></label>
                            <textarea name="notes" id="notes" rows="2" class="form-control"></textarea>
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


