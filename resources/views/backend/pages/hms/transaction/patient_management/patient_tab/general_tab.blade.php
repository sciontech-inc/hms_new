
<div id="general_tab" class="form-tab">
    <h3>GENERAL TAB</h3>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <div class="employee-picture">
                    <label>PATIENT PICTURE</label>
                    <div id="" onclick="$('#profile_img').click()">
                        <img src="/images/hms/patient_management/patient/default.png" alt="" width="200px" id="viewer" class="image-previewer" data-cropzee="profile_img">
                    </div>
                    <input id="profile_img" type="file" name="profile_img" class="form-control" onchange="scion.fileView(event)" style="display:none;">
                    <button class="btn btn-primary" type="button" onclick="$('#profile_img').click()" style="width:100%;">Select Photo</button>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <div class="employee-picture">
                    <label>PATIENT'S QR CODE</label>
                    <div>
                        <img id='barcode' src="/images/default.png" alt="" title="HELLO" width="50" height="50" />
                        <label for=""></label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
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
                    'modal_type'=> 'all',
                    'lookup_type' => 'main'
                ])
            </div>
        </div>
        <div class="col-6">
            <div class="form-group status">
                <label>STATUS <span class="required">*</span></label>
                <select name="status" id="status" class="form-control">
                    <option value="1">ACTIVE</option>
                    <option value="2">DISCHARGED</option>
                    <option value="3">FOR MGH CLEARANCE</option>
                    <option value="4">CLEARED</option>
                    <option value="5">MGH</option>
                    <option value="6">UNTAGGED AS MGH</option>
                    <option value="7">CANCELLED</option>
                    <option value="8">DIED</option>
                </select>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group firstname">
                <label>FIRST NAME <span class="required">*</span></label>
                <input type="text" class="form-control" name="firstname" id="firstname"/>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group middlename">
                <label>MIDDLE NAME</label>
                <input type="text" class="form-control" name="middlename" id="middlename"/>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group lastname">
                <label>LAST NAME <span class="required">*</span></label>
                <input type="text" class="form-control" name="lastname" id="lastname"/>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group suffix">
                <label>SUFFIX</label>
                <input type="text" class="form-control" name="suffix" id="suffix"/>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group mr_locator_no">
                <label>M.R. LOCATOR NO</label>
                <input type="text" class="form-control" name="mr_locator_no" id="mr_locator_no"/>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group nickname">
                <label>NICKNAME</label>
                <input type="text" class="form-control" name="nickname" id="nickname"/>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group alias">
                <label>ALIAS </label>
                <input type="text" class="form-control" name="alias" id="alias"/>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group birthdate">
                <label>BIRTH DATE <span class="required">*</span></label>
                <input type="date" class="form-control" name="birthdate" id="birthdate"/>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group birth_time">
                <label>BIRTH TIME</label>
                <input type="time" class="form-control" name="birth_time" id="birth_time"/>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group sex">
                <label>SEX <span class="required">*</span></label>
                <select name="sex" id="sex" class="form-control">
                    <option value="MALE">MALE</option>
                    <option value="FEMALE">FEMALE</option>
                </select>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group citizenship">
                <label>CITIZENSHIP <span class="required">*</span></label>
                <input type="text" class="form-control" name="citizenship" id="citizenship"/>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group email">
                <label>EMAIL ADDRESS</label>
                <input type="email" class="form-control" name="email" id="email"/>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group birthplace">
                <label>BIRTH PLACE</label>
                <input type="text" class="form-control" name="birthplace" id="birthplace"/>
            </div>
        </div>
        <div class="col-4">
             <div class="form-group marital_status">
                <label>MARITAL STATUS <span class="required">*</span></label>
                <select name="marital_status" id="marital_status" class="form-control">
                    <option value="SINGLE">SINGLE</option>
                    <option value="MARRIED">MARRIED</option>
                    <option value="DIVORCED">DIVORCED</option>
                    <option value="SEPARATED">SEPARATED</option>
                    <option value="WIDOWED">WIDOWED</option>
                </select>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group body_marks">
                <label>BODY MARKS</label>
                <input type="text" class="form-control" name="body_marks" id="body_marks"/>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group weight">
                <label>WEIGHT</label>
                <input type="text" class="form-control" name="weight" id="weight"/>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group nationality">
                <label>NATIONALITY</label>
                <input type="text" class="form-control" name="nationality" id="nationality"/>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group religion">
                <label>RELIGION</label>
                <input type="text" class="form-control" name="religion" id="religion"/>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group dialect">
                <label>DIALECT</label>
                <input type="text" class="form-control" name="dialect" id="dialect"/>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group ethnicity">
                <label>ETHNICITY</label>
                <input type="text" class="form-control" name="ethnicity" id="ethnicity"/>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group bp">
                <label>BLOOD PRESSURE</label>
                <input type="text" class="form-control" name="bp" id="bp"/>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group temp">
                <label>TEMPERATURE</label>
                <input type="text" class="form-control" name="temp" id="temp"/>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group blood_type">
                <label>BLOOD TYPE</label>
                <input type="text" class="form-control" name="blood_type" id="blood_type"/>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group passport_no">
                <label>PASSPORT NO.</label>
                <input type="text" class="form-control" name="passport_no" id="passport_no"/>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group is_child">
                <label class="custom-control custom-checkbox m-0">
                    <input type="checkbox" name="is_child" id="is_child" class="custom-control-input">
                    <span class="custom-control-label">CHILD?</span>
              </label>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group is_personal_data_released">
                <label class="custom-control custom-checkbox m-0">
                    <input type="checkbox" name="is_personal_data_released" id="is_personal_data_released" class="custom-control-input">
                    <span class="custom-control-label">NO PERSONAL DATE RELEASED TO OTHER PARTIES</span>
              </label>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group xray_file_no">
                <label>XRAY FILE NO.</label>
                <input type="text" class="form-control" name="xray_file_no" id="xray_file_no"/>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group non_local">
                <label class="custom-control custom-checkbox m-0">
                    <input type="checkbox" name="non_local" id="non_local" class="custom-control-input">
                    <span class="custom-control-label">NON-LOCAL?</span>
              </label>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group is_no_communication_from_company">
                <label class="custom-control custom-checkbox m-0">
                    <input type="checkbox" name="is_no_communication_from_company" id="is_no_communication_from_company" class="custom-control-input">
                    <span class="custom-control-label">NO COMMUNICATION FROM COMPANY</span>
              </label>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group is_hospital_employee">
                <label class="custom-control custom-checkbox m-0">
                    <input type="checkbox" name="is_hospital_employee" id="is_hospital_employee" class="custom-control-input">
                    <span class="custom-control-label">HOSPITAL EMPLOYEE?</span>
              </label>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group is_blacklisted">
                <label class="custom-control custom-checkbox m-0">
                    <input type="checkbox" name="is_blacklisted" id="is_blacklisted" class="custom-control-input">
                    <span class="custom-control-label">MARK THIS PATIENT AS BLACKLISTED </span>
              </label>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group is_confidential_patient">
                <label class="custom-control custom-checkbox m-0">
                    <input type="checkbox" name="is_confidential_patient" id="is_confidential_patient" class="custom-control-input">
                    <span class="custom-control-label">CONFIDENTIAL PATIENT RECORD</span>   
              </label>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group is_fictitious_birth_date">
                <label class="custom-control custom-checkbox m-0">
                    <input type="checkbox" name="is_fictitious_birth_date" id="is_fictitious_birth_date" class="custom-control-input">
                    <span class="custom-control-label">IS FICTITIOUS BIRTHDATE</span>
              </label>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group localization">
                <label>LOCALIZATION</label>
                <input type="text" class="form-control" name="localization" id="localization"/>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group industry">
                <label>INDUSTRY</label>
                <input type="text" class="form-control" name="industry" id="industry"/>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group work_level">
                <label>WORK LEVEL</label>
                <input type="text" class="form-control" name="work_level" id="work_level"/>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group company">
                <label>COMPANY</label>
                <input type="text" class="form-control" name="company" id="company"/>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group tin_no">
                <label>TIN NO.</label>
                <input type="text" class="form-control" name="tin_no" id="tin_no"/>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group occupation">
                <label>OCCUPATION</label>
                <input type="text" class="form-control" name="occupation" id="occupation"/>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group referred_by">
                <label>REFERRED BY</label>
                <input type="text" class="form-control" name="referred_by" id="referred_by"/>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group referred_by">
                <label>REMARKS</label>
                <textarea name="remarks" id="remarks" rows="3" class="form-control"></textarea>
            </div>
        </div>
        <hr>
        <div class="col-12">
            <label for="contact-address">CONTACT AND ADDRESSES</label>
        </div>
        <div class="col-6">
            <div class="form-group contact_number_1">
                <label>CONTACT NUMBER 1 <span class="required">*</span></label>
                <input type="number" class="form-control" name="contact_number_1" id="contact_number_1"/>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group contact_number_2">
                <label>CONTACT NUMBER 2</label>
                <input type="number" class="form-control" name="contact_number_2" id="contact_number_2"/>
            </div>
        </div>
        <h3 class="col-12 form-title">ADDRESS 1</h3>
        <div class="col-4">
            <div class="form-group street_no">
                <label>STREET NO. <span class="required">*</span></label>
                <input type="text" class="form-control" name="street_no" id="street_no"/>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group barangay">
                <label>BARANGAY <span class="required">*</span></label>
                <input type="text" class="form-control" name="barangay" id="barangay"/>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group city">
                <label>CITY <span class="required">*</span></label>
                <input type="text" class="form-control" name="city" id="city"/>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group province">
                <label>PROVINCE <span class="required">*</span></label>
                <input type="text" class="form-control" name="province" id="province"/>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group country">
                <label>COUNTRY <span class="required">*</span></label>
                <input type="text" class="form-control" name="country" id="country"/>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group zip_code">
                <label>ZIP CODE <span class="required">*</span></label>
                <input type="number" class="form-control" name="zip_code" id="zip_code"/>
            </div>
        </div>

        <h3 class="col-12 form-title">ADDRESS 2</h3>
        <div class="col-4">
            <div class="form-group street_no_2">
                <label>STREET NO.</label>
                <input type="text" class="form-control" name="street_no_2" id="street_no_2"/>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group barangay_2">
                <label>BARANGAY</label>
                <input type="text" class="form-control" name="barangay_2" id="barangay_2"/>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group city_2">
                <label>CITY</label>
                <input type="text" class="form-control" name="city_2" id="city_2"/>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group province_2">
                <label>PROVINCE</label>
                <input type="text" class="form-control" name="province_2" id="province_2"/>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group country_2">
                <label>COUNTRY</label>
                <input type="text" class="form-control" name="country_2" id="country_2"/>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group zip_code_2">
                <label>ZIP CODE</label>
                <input type="number" class="form-control" name="zip_code_2" id="zip_code_2"/>
            </div>
        </div>
    </div>
</div>