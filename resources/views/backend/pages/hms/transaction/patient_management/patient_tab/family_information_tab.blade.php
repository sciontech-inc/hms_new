<div id="family_information_tab" class="form-tab">
    <h5>FAMILY INFORMATION</h5>
    <div class="family-information-table">
        <div class="row">
            <div class="col-12">
                <table id="family_information_table" class="table table-striped" style="width:100%">
                </table>
            </div>
        </div>
    </div>
</div>

@section('sc-modal')
@parent
<div class="sc-modal-content" id="family_information_form">
    <div class="sc-modal-dialog sc-xl">
        <div class="sc-modal-header">
            <span class="sc-title-bar"></span>
            <span class="sc-close" onclick="scion.create.sc_modal('family_information_form').hide('all', modalHideFunction)"><i class="fas fa-times"></i></span>
        </div>
        <div class="sc-modal-body">
            <form method="post" id="familyinformationForm" class="form-record">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group family_fullname">
                            <label>FULL NAME <span class="required">*</span></label>
                            <input type="text" class="form-control" name="family_fullname" id="family_fullname"/>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group family_birthdate">
                            <label>BIRTHDATE <span class="required">*</span></label>
                            <input type="date" class="form-control" name="family_birthdate" id="family_birthdate"/>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group family_relationship">
                            <label>RELATIONSHIP <span class="required">*</span></label>
                            <input type="text" class="form-control" name="family_relationship" id="family_relationship"/>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group family_sex">
                            <label>SEX <span class="required">*</span></label>
                            <select name="family_sex" id="family_sex" class="form-control">
                                <option value="MALE">MALE</option>
                                <option value="FEMALE">FEMALE</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group family_citizenship">
                            <label>CITIZENSHIP</label>
                            <input type="text" class="form-control" name="family_citizenship" id="family_citizenship"/>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group family_address">
                            <label>ADDRESS <span class="required">*</span></label>
                            <input type="text" class="form-control" name="family_address" id="family_address"/>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group family_contact_no">
                            <label>CONTACT NO <span class="required">*</span></label>
                            <input type="number" class="form-control" name="family_contact_no" id="family_contact_no"/>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group family_email">
                            <label>EMAIL </label>
                            <input type="email" class="form-control" name="family_email" id="family_email"/>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group insurance_notes">
                            <label>FAMILY REMARKS</label>
                            <textarea name="family_remarks" id="family_remarks" rows="2" class="form-control"></textarea>
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
