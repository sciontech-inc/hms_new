<div id="medical_cases_tab" class="form-tab">
    <h5>MEDICAL CASES</h5>
    <div class="medical-cases-table">
        <div class="row">
            <div class="col-12">
                <table id="medical_cases_table" class="table table-striped" style="width:100%">
                </table>
            </div>
        </div>
    </div>
</div>

@section('sc-modal')
@parent
<div class="sc-modal-content" id="medical_cases_form">
    <div class="sc-modal-dialog sc-xl">
        <div class="sc-modal-header">
            <span class="sc-title-bar"></span>
            <span class="sc-close" onclick="scion.create.sc_modal('medical_cases_form').hide('all', modalHideFunction)"><i class="fas fa-times"></i></span>
        </div>
        <div class="sc-modal-body">
            <form method="post" id="medicalcasesForm" class="form-record">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group date_recorded">
                            <label>DATE RECORDED</label>
                            <input type="date" class="form-control" name="date_recorded" id="date_recorded"/>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group chief_complaint">
                            <label>CHIEF COMPLAINT <span class="required">*</span></label>
                            <input type="text" class="form-control" name="chief_complaint" id="chief_complaint"/>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group diagnostic_tests">
                            <label>DIAGNOSTIC TESTS <span class="required">*</span></label>
                            <input type="text" class="form-control" name="diagnostic_tests" id="diagnostic_tests"/>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group diagnosis">
                            <label>DIAGNOSIS <span class="required">*</span></label>
                            <input type="text" class="form-control" name="diagnosis" id="diagnosis"/>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group prognosis">
                            <label>PROGNOSIS <span class="required">*</span></label>
                            <input type="text" class="form-control" name="prognosis" id="prognosis"/>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group physician_notes">
                            <label>PHYSICIAN NOTES <span class="required">*</span></label>
                            <textarea type="text" class="form-control" name="physician_notes" id="physician_notes"></textarea>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group nursing_notes">
                            <label>NURSING NOTES <span class="required">*</span></label>
                            <textarea type="text" class="form-control" name="nursing_notes" id="nursing_notes"></textarea>
                        </div> 
                    </div>
                    <div class="col-12">
                        <div class="form-group discharge_summary">
                            <label>DISCHARGE SUMMARY <span class="required">*</span></label>
                            <input type="text" class="form-control" name="discharge_summary" id="discharge_summary"/>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group medical_case_remarks">
                            <label>REMARKS <span class="required">*</span></label>
                            <textarea type="text" class="form-control" name="medical_case_remarks" id="medical_case_remarks"></textarea>
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
