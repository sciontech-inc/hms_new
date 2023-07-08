<div id="vital_measurement_tab" class="form-tab">
    <h5>VITAL MEASUREMENTS</h5>
    <div class="vital-measurement-table">
        <div class="row">
            <div class="col-12">
                <table id="vital_measurement_table" class="table table-striped" style="width:100%">
                </table>
            </div>
        </div>
    </div>
</div>

@section('sc-modal')
@parent
<div class="sc-modal-content" id="vital_measurement_form">
    <div class="sc-modal-dialog sc-xl">
        <div class="sc-modal-header">
            <span class="sc-title-bar"></span>
            <span class="sc-close" onclick="scion.create.sc_modal('vital_measurement_form').hide('all', modalHideFunction)"><i class="fas fa-times"></i></span>
        </div>
        <div class="sc-modal-body">
            <form method="post" id="vitalmeasurementForm" class="form-record">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group vital_date">
                            <label>DATE TAKEN<span class="required">*</span></label>
                            <input type="date" class="form-control" name="vital_date" id="vital_date"/>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group vital_time">
                            <label>TIME TAKEN<span class="required">*</span></label>
                            <input type="time" class="form-control" name="vital_time" id="vital_time"/>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group blood_pressure">
                            <label>BLOOD PRESSURE <span class="required">*</span></label>
                            <input type="text" class="form-control" name="blood_pressure" id="blood_pressure"/>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group heart_rate">
                            <label>HEART RATE <span class="required">*</span></label>
                            <input type="text" class="form-control" name="heart_rate" id="heart_rate"/>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group temperature">
                            <label>TEMPERATURE <span class="required">*</span></label>
                            <input type="text" class="form-control" name="temperature" id="temperature"/>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group respiratory_rate">
                            <label>RESPIRATORY RATE <span class="required">*</span></label>
                            <input type="text" class="form-control" name="respiratory_rate" id="respiratory_rate"/>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group oxygen_saturation">
                            <label>OXYGEN SATURATION <span class="required">*</span></label>
                            <input type="text" class="form-control" name="oxygen_saturation" id="oxygen_saturation"/>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group pulse_rate">
                            <label>PULSE RATE <span class="required">*</span></label>
                            <input type="text" class="form-control" name="pulse_rate" id="pulse_rate"/>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group vital_remarks">
                            <label>REMARKS<span class="required">*</span></label>
                            <textarea type="text" class="form-control" name="vital_remarks" id="vital_remarks"></textarea>
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
