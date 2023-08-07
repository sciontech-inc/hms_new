
<div id="medical_history_tab" class="form-tab">
    <h3>MEDICAL HISTORY</h3>
    <div class="vital-measurement-table">
        <div class="row">
            <div class="col-12">
                <table id="medical_history_table" class="table table-striped" style="width:100%"></table>
            </div>
        </div>
    </div>
</div>

@section('sc-modal')
@parent
<div class="sc-modal-content" id="vitals_form">
    <div class="sc-modal-dialog sc-xl">
        <div class="sc-modal-header">
            <span class="sc-title-bar"></span>
            <span class="sc-close" onclick="scion.create.sc_modal('vitals_form').hide('', modalHideFunction)"><i class="fas fa-times"></i></span>
        </div>
        <div class="sc-modal-body">
            <form method="post" id="vitalsForm" class="form-record">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group datetime">
                            <label>DATE AND TIME<span class="required">*</span>:</label>
                            <input type="datetime-local" class="form-control" name="datetime" id="datetime"/>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group heart_rate">
                            <label>HEART RATE<span class="required">*</span>:</label>
                            <input type="text" class="form-control" name="heart_rate" id="heart_rate"/>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group blood_pressure">
                            <label>BLOOD PRESSURE<span class="required">*</span>:</label>
                            <input type="text" class="form-control" name="blood_pressure" id="blood_pressure"/>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group respiratory_rate">
                            <label>RESPIRATORY RATE<span class="required">*</span>:</label>
                            <input type="text" class="form-control" name="respiratory_rate" id="respiratory_rate"/>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group temperature">
                            <label>TEMPERATURE<span class="required">*</span>:</label>
                            <input type="text" class="form-control" name="temperature" id="temperature"/>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group oxygen_saturation">
                            <label>OXYGEN SATURATION<span class="required">*</span>:</label>
                            <input type="text" class="form-control" name="oxygen_saturation" id="oxygen_saturation"/>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group weight">
                            <label>WEIGHT<span class="required">*</span>:</label>
                            <input type="text" class="form-control" name="weight" id="weight"/>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group height">
                            <label>HEIGHT<span class="required">*</span>:</label>
                            <input type="text" class="form-control" name="height" id="height"/>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
