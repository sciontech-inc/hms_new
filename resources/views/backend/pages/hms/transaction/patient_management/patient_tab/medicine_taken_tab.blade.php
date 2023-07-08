
<div id="medicine_taken_tab" class="form-tab">
    <h5>MEDICINE TAKEN</h5>
    <div class="medicine-taken-table">
        <div class="row">
            <div class="col-12">
                <table id="medicine_taken_table" class="table table-striped" style="width:100%">
                </table>
            </div>
        </div>
    </div>
</div>

@section('sc-modal')
@parent
<div class="sc-modal-content" id="medicine_taken_form">
    <div class="sc-modal-dialog sc-xl">
        <div class="sc-modal-header">
            <span class="sc-title-bar"></span>
            <span class="sc-close" onclick="scion.create.sc_modal('medicine_taken_form').hide('all', modalHideFunction)"><i class="fas fa-times"></i></span>
        </div>
        <div class="sc-modal-body">
            <form method="post" id="medicinetakenForm" class="form-record">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group medicine_name">
                            <label>NAME</label>
                            <input type="text" class="form-control" name="medicine_name" id="medicine_name"/>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group medicine_doses">
                            <label>DOSES </label>
                            <input type="text" class="form-control" name="medicine_doses" id="medicine_doses"/>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group routes_of_administration">
                            <label>ROUTES OF ADMINISTRATION </label>
                            <input type="text" class="form-control" name="routes_of_administration" id="routes_of_administration"/>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group medicine_type">
                            <label>TYPE </label>
                            <input type="text" class="form-control" name="medicine_type" id="medicine_type"/>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group medicine_duration">
                            <label>DURATION </label>
                            <input type="text" class="form-control" name="medicine_duration" id="medicine_duration"/>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group medicine_reason">
                            <label>REASON </label>
                            <input type="text" class="form-control" name="medicine_reason" id="medicine_reason"/>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group medicine_compliance">
                            <label>COMPLIANCE </label>
                            <select name="medicine_compliance" id="medicine_compliance" class="form-control">
                                <option value="PRESCRIBED">Prescribed</option>
                                <option value="NOT PRESCRIBED">Not Prescribed</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group medicine_remarks">
                            <label>REMARKS </label>
                            <textarea type="text" class="form-control" name="medicine_remarks" id="medicine_remarks"></textarea>
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
