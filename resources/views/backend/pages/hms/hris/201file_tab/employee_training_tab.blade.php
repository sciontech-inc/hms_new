<div id="employee_training_tab" class="form-tab">
    <h5>WORK HISTORY</h5>
    <div class="employee-training-table">
        <div class="row">
            <div class="col-12">
                <table id="employee_training_table" class="table table-striped" style="width:100%">
                </table>
            </div>
        </div>
    </div>
</div>



@section('sc-modal')
@parent
<div class="sc-modal-content" id="employee_training_form">
    <div class="sc-modal-dialog sc-xl">
        <div class="sc-modal-header">
            <span class="sc-title-bar"></span>
            <span class="sc-close" onclick="scion.create.sc_modal('employee_training_form').hide('all', modalHideFunction)"><i class="fas fa-times"></i></span>
        </div>
        <div class="sc-modal-body">
            <form method="post" id="employeetrainingForm" class="form-record">
                <div class="row">
                    <div class="col-3">
                        <div class="form-group training_no">
                            <label>TRAINING NO</label>
                            <div class="total_hours">
                                <input type="text" id="training_no" name="training_no" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group training_name">
                            <label>TRAINING NAME</label>
                            <div class="total_hours">
                                <input type="text" id="training_name" name="training_name" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group training_provider">
                            <label>TRAINING PROVIDER</label>
                            <div class="total_hours">
                                <input type="text" id="training_provider" name="training_provider" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group training_description">
                            <label>TRAINING DESCRIPTION</label>
                            <div class="total_hours">
                                <input type="text" id="training_description" name="training_description" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group training_date">
                            <label>TRAINING DATE</label>
                            <div class="total_hours">
                                <input type="date" id="training_date" name="training_date" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group training_location">
                            <label>TRAINING LOCATION</label>
                            <div class="total_hours">
                                <input type="text" id="training_location" name="training_location" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group training_duration">
                            <label>TRAINING DURATION</label>
                            <div class="total_hours">
                                <input type="text" id="training_duration" name="training_duration" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group training_outcome">
                            <label>TRAINING OUTCOME</label>
                            <div class="total_hours">
                                <input type="text" id="training_outcome" name="training_outcome" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group training_type">
                            <label>TRAINING TYPE</label>
                            <div class="total_hours">
                                <input type="text" id="training_type" name="training_type" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group expiration_date">
                            <label>EXPIRATION DATE</label>
                            <div class="total_hours">
                                <input type="date" id="expiration_date" name="expiration_date" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group recertification_date">
                            <label>RECERTIFICATION DATE</label>
                            <div class="total_hours">
                                <input type="date" id="recertification_date" name="recertification_date" class="form-control"/>
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


