<div id="employee_dependent_tab" class="form-tab">
    <h5>WORK HISTORY</h5>
    <div class="employee-training-table">
        <div class="row">
            <div class="col-12">
                <table id="employee_dependent_table" class="table table-striped" style="width:100%">
                </table>
            </div>
        </div>
    </div>
</div>



@section('sc-modal')
@parent
<div class="sc-modal-content" id="employee_dependent_form">
    <div class="sc-modal-dialog sc-xl">
        <div class="sc-modal-header">
            <span class="sc-title-bar"></span>
            <span class="sc-close" onclick="scion.create.sc_modal('employee_dependent_form').hide('all', modalHideFunction)"><i class="fas fa-times"></i></span>
        </div>
        <div class="sc-modal-body">
            <form method="post" id="employeedependentForm" class="form-record">
                <div class="row">
                    <div class="col-4">
                        <div class="form-group dependent_firstname">
                            <label>FIRST NAME</label>
                            <div class="total_hours">
                                <input type="text" id="dependent_firstname" name="dependent_firstname" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group dependent_middlename">
                            <label>MIDDLE NAME</label>
                            <div class="total_hours">
                                <input type="text" id="dependent_middlename" name="dependent_middlename" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group dependent_lastname">
                            <label>LAST NAME</label>
                            <div class="total_hours">
                                <input type="text" id="dependent_lastname" name="dependent_lastname" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group dependent_birthdate">
                            <label>BIRTH DATE</label>
                            <div class="total_hours">
                                <input type="date" id="dependent_birthdate" name="dependent_birthdate" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group dependent_relationship">
                            <label>RELATIONSHIP</label>
                            <div class="total_hours">
                                <input type="text" id="dependent_relationship" name="dependent_relationship" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group dependent_sex">
                            <label>GENDER</label>
                            <select name="dependent_sex" id="dependent_sex" class="form-control">
                                <option value="MALE">MALE</option>
                                <option value="FEMALE">FEMALE</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group dependent_citizenship">
                            <label>CITIZENSHIP</label>
                            <div class="total_hours">
                                <input type="text" id="dependent_citizenship" name="dependent_citizenship" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group dependent_address">
                            <label>ADDRESS</label>
                            <div class="total_hours">
                                <input type="text" id="dependent_address" name="dependent_address" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group dependent_contact_no">
                            <label>CONTACT NO.</label>
                            <div class="total_hours">
                                <input type="number" id="dependent_contact_no" name="dependent_contact_no" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group dependent_email">
                            <label>EMAIL ADDRESS</label>
                            <div class="total_hours">
                                <input type="email" id="dependent_email" name="dependent_email" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group dependent_designation">
                            <label>BENEFICIARY DESIGNATION</label>
                            <div class="total_hours">
                                <input type="text" id="dependent_designation" name="dependent_designation" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group dependent_notes">
                            <label>ADDITIONAL INFORMATION</label>
                            <div class="total_hours">
                                <input type="text" id="dependent_notes" name="dependent_notes" class="form-control"/>
                            </div>
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


