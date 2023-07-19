<div id="employee_certification_tab" class="form-tab">
    <h5>WORK HISTORY</h5>
    <div class="employee-training-table">
        <div class="row">
            <div class="col-12">
                <table id="employee_certification_table" class="table table-striped" style="width:100%">
                </table>
            </div>
        </div>
    </div>
</div>



@section('sc-modal')
@parent
<div class="sc-modal-content" id="employee_certification_form">
    <div class="sc-modal-dialog sc-xl">
        <div class="sc-modal-header">
            <span class="sc-title-bar"></span>
            <span class="sc-close" onclick="scion.create.sc_modal('employee_certification_form').hide('all', modalHideFunction)"><i class="fas fa-times"></i></span>
        </div>
        <div class="sc-modal-body">
            <form method="post" id="employeecertificationForm" class="form-record">
                <div class="row">
                    <div class="col-4 certification_no">
                        <div class="form-group certification_no">
                            <label>CERTIFICATION NO</label>
                            <div class="total_hours">
                                <input type="text" id="certification_no" name="certification_no" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 certification_name">
                        <div class="form-group certification_name">
                            <label>NAME</label>
                            <div class="total_hours">
                                <input type="text" id="certification_name" name="certification_name" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 certification_authority">
                        <div class="form-group certification_authority">
                            <label>CERTIFICATION AUTHORITY</label>
                            <div class="total_hours">
                                <input type="text" id="certification_authority" name="certification_authority" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 certification_description">
                        <div class="form-group certification_description">
                            <label>DESCRIPTION</label>
                            <div class="total_hours">
                                <input type="text" id="certification_description" name="certification_description" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 certification_date">
                        <div class="form-group certification_date">
                            <label>CERTIFICATION DATE</label>
                            <div class="total_hours">
                                <input type="date" id="certification_date" name="certification_date" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 certification_expiration_date">
                        <div class="form-group certification_expiration_date">
                            <label>EXPIRATION DATE</label>
                            <div class="total_hours">
                                <input type="date" id="certification_expiration_date" name="certification_expiration_date" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 certification_level">
                        <div class="form-group certification_level">
                            <label>CERTIFICATION LEVEL</label>
                            <div class="total_hours">
                                <input type="text" id="certification_level" name="certification_level" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 certification_status">
                        <div class="form-group certification_status">
                            <label>CERTIFICATION STATUS <span class="required">*</span></label>
                            <select name="certification_status" id="certification_status" class="form-control">
                                <option value="Active">Active</option>
                                <option value="Expired">Expired</option>
                                <option value="Revoked">Revoked</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-4 certification_renewal_date">
                        <div class="form-group certification_renewal_date">
                            <label>CERTIFICATION RENEWAL DATE</label>
                            <div class="total_hours">
                                <input type="date" id="certification_renewal_date" name="certification_renewal_date" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 certification_recertification_date">
                        <div class="form-group certification_recertification_date">
                            <label>RECERTIFICATION DATE</label>
                            <div class="total_hours">
                                <input type="date" id="certification_recertification_date" name="certification_recertification_date" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 certification_achievements">
                        <div class="form-group certification_achievements">
                            <label>CERTIFICATION ACHIEVEMENTS</label>
                            <div class="total_hours">
                                <input type="text" id="certification_achievements" name="certification_achievements" class="form-control"/>
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


