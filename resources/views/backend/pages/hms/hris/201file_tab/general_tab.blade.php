
<div id="general_tab" class="form-tab">
    <h3>GENERAL TAB</h3>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <div class="employee-picture">
                    <label>EMPLOYEE PICTURE</label>
                    <div id="" onclick="$('#profile_img').click()">
                        <img src="/images/hms/hris/employee/default.png" alt="" width="200px" id="viewer" class="image-previewer" data-cropzee="profile_img">
                    </div>
                    <input id="profile_img" type="file" name="profile_img" class="form-control" onchange="scion.fileView(event)" style="display:none;">
                    <button class="btn btn-primary" type="button" onclick="$('#profile_img').click()" style="width:100%;">Select Photo</button>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <div class="employee-picture">
                    <label>EMPLOYEE'S QR CODE</label>
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
                    'label' => "EMPLOYEE NO",
                    'placeholder' => '<NEW>',
                    'id' => "employee_no",
                    'title' => "EMPLOYEE NO",
                    'url' => "/actions/employee/get",
                    'data' => array(
                        array('data' => "DT_RowIndex", 'title' => "#"),
                        array('data' => "employee_no", 'title' => "Employee No"),
                        array('data' => "firstname", 'title' => "First Name"),
                        array('data' => "lastname", 'title' => "Last Name"),
                        array('data' => "email", 'title' => "Email"),
                    ),
                    'disable' => true,
                    'lookup_module' => 'employee',
                    'modal_type'=> 'all',
                    'lookup_type' => 'main'
                ])
            </div>
        </div>
        <div class="col-6">
            <div class="form-group status">
                <label>STATUS <span class="required">*</span></label>
                <select name="status" id="status" class="form-control">
                    <option value="1">Active</option>
                    <option value="0">In-active</option>
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
            <div class="form-group birthdate">
                <label>BIRTHDATE <span class="required">*</span></label>
                <input type="date" class="form-control" name="birthdate" id="birthdate"/>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group sex">
                <label>SEX <span class="required">*</span></label>
                <select name="sex" id="sex" class="form-control">
                    <option value="male">MALE</option>
                    <option value="female">FEMALE</option>
                </select>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group citizenship">
                <label>CITIZENSHIP <span class="required">*</span></label>
                <input type="text" class="form-control" name="citizenship" id="citizenship"/>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group contact_number_1">
                <label>CONTACT NUMBER 1 <span class="required">*</span></label>
                <input type="text" class="form-control" name="contact_number_1" id="contact_number_1"/>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group contact_number_2">
                <label>CONTACT NUMBER 2</label>
                <input type="text" class="form-control" name="contact_number_2" id="contact_number_2"/>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group email">
                <label>EMAIL ADDRESS</label>
                <input type="email" class="form-control" name="email" id="email"/>
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
                <input type="text" class="form-control" name="zip_code" id="zip_code"/>
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
                <input type="text" class="form-control" name="zip_code_2" id="zip_code_2"/>
            </div>
        </div>

        <h3 class="col-12 form-title">MARITAL INFORMATION</h3>
        <div class="col-6">
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
        <div class="col-6">
            <div class="form-group spouse_name">
                <label>SPOUSE'S NAME</label>
                <input type="text" class="form-control" name="spouse_name" id="spouse_name"/>
            </div>
        </div>

        <h3 class="col-12 form-title">JOB INFORMATION</h3>
        <div class="col-6">
            <div class="form-group job_title">
                <label>JOB TITLE</label>
                <input type="text" class="form-control" name="spouse_workphone" id="spouse_workphone"/>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group job_supervisor">
                <label>SUPERVISOR</label>
                <input type="text" class="form-control" name="job_supervisor" id="job_supervisor"/>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group work_location">
                <label>WORK LOCATION</label>
                <input type="text" class="form-control" name="work_location" id="work_location"/>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group work_email">
                <label>WORK EMAIL</label>
                <input type="text" class="form-control" name="work_email" id="work_email"/>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group work_telephone">
                <label>WORK TELEPHONE</label>
                <input type="text" class="form-control" name="work_telephone" id="work_telephone"/>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group work_mobile">
                <label>WORK MOBILE</label>
                <input type="text" class="form-control" name="work_mobile" id="work_mobile"/>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group start_date">
                <label>START DATE <span class="required">*</span></label>
                <input type="date" class="form-control" name="start_date" id="start_date"/>
            </div>
        </div>

        <h3 class="col-12 form-title">EMERGENCY CONTACT</h3>
        <div class="col-6">
            <div class="form-group emergency_contact_name">
                <label>NAME</label>
                <input type="text" class="form-control" name="emergency_contact_name" id="emergency_contact_name"/>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group emergency_contact_no">
                <label>CONTACT NUMBER</label>
                <input type="text" class="form-control" name="emergency_contact_no" id="emergency_contact_no"/>
            </div>
        </div>

        <h3 class="col-12 form-title">BENEFITS AND OTHERS</h3>
        <div class="col-12">
            <div class="form-group bank_account">
                <label>BANK ACCOUNT</label>
                <input type="text" class="form-control" name="bank_account" id="bank_account"/>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group tin">
                <label>TIN NUMBER</label>
                <input type="text" class="form-control" name="tin" id="tin"/>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group sss">
                <label>SSS NUMBER</label>
                <input type="text" class="form-control" name="sss" id="sss"/>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group pagibig">
                <label>PAGIBIG NUMBER</label>
                <input type="text" class="form-control" name="pagibig" id="pagibig"/>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group philhealth">
                <label>PHILHEALTH</label>
                <input type="text" class="form-control" name="philhealth" id="philhealth"/>
            </div>
        </div>
    </div>
</div>