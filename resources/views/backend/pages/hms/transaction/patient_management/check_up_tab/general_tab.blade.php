
<div id="general_tab" class="form-tab">
    <h3>GENERAL TAB</h3>
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                @include('backend.partial.component.lookup', [
                    'label' => "PATIENT ID",
                    'placeholder' => '<NEW>',
                    'id' => "patient_id",
                    'title' => "PATIENT ID",
                    'url' => "/actions/patient/get",
                    'data' => array(
                        array('data' => "DT_RowIndex", 'title' => "#"),
                        array('data' => "patient_id", 'title' => "Patient ID"),
                        array('data' => "firstname", 'title' => "First Name"),
                        array('data' => "lastname", 'title' => "Last Name"),
                        array('data' => "email", 'title' => "Email"),
                    ),
                    'disable' => true,
                    'lookup_module' => 'patient',
                    'modal_type'=> '',
                    'lookup_type' => 'modal_lookup'
                ])
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label>PATIENT NAME:</label>
                <input type="text" class="form-control" name="name" id="name" disabled/>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label>PATIENT CONTACT NO.:</label>
                <input type="text" class="form-control" name="contact_no" id="contact_no" disabled/>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group datetime">
                <label>DATE AND TIME <span class="required">*</span></label>
                <input type="datetime-local" class="form-control" name="datetime" id="datetime"/>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group doctor_id">
                <label>DOCTOR <span class="required">*</span></label>
                <select name="doctor_id" id="doctor_id" class="form-control">
                    <option value=""></option>
                </select>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group reason">
                <label>REASON</label>
                <textarea name="reason" id="reason" class="form-control"></textarea>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group attachment">
                <label>ATTACHMENT(PRESCRIPTION)</label>
                <input type="file" class="form-control" name="attachment" id="attachment"/>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group check_up_status">
                <label>STATUS <span class="required">*</span></label>
                <select name="check_up_status" id="check_up_status" class="form-control">
                    <option value=""></option>
                    <option value="0">CANCELED</option>
                    <option value="1">COMPLETED</option>
                </select>
            </div>
        </div>
    </div>
</div>