
<div id="general_tab" class="form-tab">
    <div class="row admission-form">

        {{-- ROW 1 --}}
        <div class="col-6">
            <div class="row">
                <div class="col-12 patient_lookup">
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
                <div class="col-12 registry_tracking_no">
                    <div class="form-group row">
                        <label class="col-4">REGISTRY TRACKING NO. <span class="required">*</span>:</label>
                        <div class="col-8">
                            <input type="text" class="form-control lowercase" name="registry_tracking_no" id="registry_tracking_no"/>
                        </div>
                    </div>
                </div>
                <div class="col-12 admission_case_no">
                    <div class="form-group row">
                        <label class="col-4">ADMISSION CASE NO. <span class="required">*</span>:</label>
                        <div class="col-8">
                            <input type="text" class="form-control lowercase" name="admission_case_no" id="admission_case_no"/>
                        </div>
                    </div>
                </div>
                <div class="col-12 osca_id_no">
                    <div class="form-group row">
                        <label class="col-4">OSCA ID NO. <span class="required">*</span>:</label>
                        <div class="col-8">
                            <input type="text" class="form-control lowercase" name="osca_id_no" id="osca_id_no"/>
                        </div>
                    </div>
                </div>
                <div class="col-12 admission_regularity">
                    <div class="form-group row">
                        <label class="col-4">ADMISSION REGULARITY<span class="required">*</span>:</label>
                        <div class="col-8">
                            <input type="number" class="form-control" name="admission_regularity" id="admission_regularity"/>
                        </div>
                    </div>
                </div>
                <div class="col-12 status">
                    <div class="form-group row">
                        <label class="col-4">STATUS <span class="required">*</span>:</label>
                        <div class="col-8">
                            <select name="status" id="status" class="form-control">
                                <option value="1">ACTIVE</option>
                                <option value="1">INACTIVE</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-12 admission_datetime">
                    <div class="form-group row">
                        <label class="col-4">ADMISSION DATE TIME <span class="required">*</span>:</label>
                        <div class="col-8">
                            <input type="datetime-local" class="form-control" name="admission_datetime" id="admission_datetime"/>
                        </div>
                    </div>
                </div>
                <div class="col-12 arrival_datetime">
                    <div class="form-group row">
                        <label class="col-4">ARRIVAL DATE TIME <span class="required">*</span>:</label>
                        <div class="col-8">
                            <input type="datetime-local" class="form-control" name="arrival_datetime" id="arrival_datetime"/>
                        </div>
                    </div>
                </div>
                <div class="col-12 mgh_datetime">
                    <div class="form-group row">
                        <label class="col-4">MGH DATE TIME <span class="required">*</span>:</label>
                        <div class="col-8">
                            <input type="datetime-local" class="form-control" name="mgh_datetime" id="mgh_datetime"/>
                        </div>
                    </div>
                </div>
                <div class="col-12 discharge_datetime">
                    <div class="form-group row">
                        <label class="col-4">DISCHARGE DATE TIME <span class="required">*</span>:</label>
                        <div class="col-8">
                            <input type="datetime-local" class="form-control" name="discharge_datetime" id="discharge_datetime"/>
                        </div>
                    </div>
                </div>
                <div class="col-12 admission_case_group">
                    <div class="form-group row">
                        <label class="col-4">ADMISSION CASE GROUP <span class="required">*</span>:</label>
                        <div class="col-8">
                            <select name="admission_case_group" id="admission_case_group" class="form-control">
                                <option value="case_group">CASE GROUP</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-12 admission_case_type">
                    <div class="form-group row">
                        <label class="col-4">ADMISSION CASE TYPE <span class="required">*</span>:</label>
                        <div class="col-8">
                            <select name="admission_case_type" id="admission_case_type" class="form-control">
                                <option value="case_group">CASE TYPE</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-12 transaction_type">
                    <div class="form-group row">
                        <label class="col-4">TRANSACTION TYPE <span class="required">*</span>:</label>
                        <div class="col-8">
                            <select name="transaction_type" id="transaction_type" class="form-control">
                                <option value="transaction_type">TRANSACTION TYPE</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-12 patient_category">
                    <div class="form-group row">
                        <label class="col-4">PATIENT CATEGORY <span class="required">*</span>:</label>
                        <div class="col-8">
                            <select name="patient_category" id="patient_category" class="form-control">
                                <option value="patient_category">PATIENT CATEGORY</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-12 hospitalization_plan">
                    <div class="form-group row">
                        <label class="col-4">HOSPITALIZATION PLAN <span class="required">*</span>:</label>
                        <div class="col-8">
                            <select name="hospitalization_plan" id="hospitalization_plan" class="form-control">
                                <option value="hospitalization_plan">HOSPITALIZATION PLAN</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-12 membership">
                    <div class="form-group row">
                        <label class="col-4">MEMBERSHIP <span class="required">*</span>:</label>
                        <div class="col-8">
                            <select name="membership" id="membership" class="form-control">
                                <option value="membership">MEMBERSHIP</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-12 service_type">
                    <div class="form-group row">
                        <label class="col-4">SERVICE TYPE <span class="required">*</span>:</label>
                        <div class="col-8">
                            <select name="service_type" id="service_type" class="form-control">
                                <option value="service_type">SERVICE TYPE</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-12 sub_service_type">
                    <div class="form-group row">
                        <label class="col-4">SUB SERVICE TYPE <span class="required">*</span>:</label>
                        <div class="col-8">
                            <select name="sub_service_type" id="sub_service_type" class="form-control">
                                <option value="service_type">SUB SERVICE TYPE</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-12 referred_from">
                    <div class="form-group row">
                        <label class="col-4">REFERRED FROM <span class="required">*</span>:</label>
                        <div class="col-8">
                            <select name="referred_from" id="referred_from" class="form-control">
                                <option value="referred_from">REFERRED FROM</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- ROW 2 --}}
        <div class="col-6">
            <div class="row">
                <div class="col-12 price_group">
                    <div class="form-group row">
                        <label class="col-4">PRICE GROUP <span class="required">*</span>:</label>
                        <div class="col-8">
                            <select name="price_group" id="price_group" class="form-control">
                                <option value="price_group">PRICE GROUP</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-12 price_scheme">
                    <div class="form-group row">
                        <label class="col-4">PRICING SCHEME <span class="required">*</span>:</label>
                        <div class="col-8">
                            <select name="price_scheme" id="price_scheme" class="form-control">
                                <option value="price_scheme">PRICE SCHEME</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-12 discount_scheme">
                    <div class="form-group row">
                        <label class="col-4">DISCOUNT SCHEME/ SOCIAL SERVICE <span class="required">*</span>:</label>
                        <div class="col-8">
                            <select name="discount_scheme" id="discount_scheme" class="form-control">
                                <option value="discount_scheme">DISCOUNT SCHEME</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-12 classification">
                    <div class="form-group row">
                        <label class="col-4">CLASSIFICATION <span class="required">*</span>:</label>
                        <div class="col-8">
                            <select name="classification" id="classification" class="form-control">
                                <option value="classification">CLASSIFICATION</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-12 how_admitted">
                    <div class="form-group row">
                        <label class="col-4">HOW ADMITTED <span class="required">*</span>:</label>
                        <div class="col-8">
                            <select name="how_admitted" id="how_admitted" class="form-control">
                                <option value="how_admitted">HOW ADMITTED</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-12 source_of_admission">
                    <div class="form-group row">
                        <label class="col-4">SOURCE OF ADMISSION <span class="required">*</span>:</label>
                        <div class="col-8">
                            <select name="source_of_admission" id="source_of_admission" class="form-control">
                                <option value="source_of_admission">SOURCE OF ADMISSION</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-12 type_of_delivery">
                    <div class="form-group row">
                        <label class="col-4">TYPE OF DELIVERY <span class="required">*</span>:</label>
                        <div class="col-8">
                            <select name="type_of_delivery" id="type_of_delivery" class="form-control">
                                <option value="type_of_delivery">TYPE OF DELIVERY</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-12 case_indicator">
                    <div class="form-group row">
                        <label class="col-4">CASE INDICATORS <span class="required">*</span>:</label>
                        <div class="col-8">
                            <select name="case_indicator" id="case_indicator" class="form-control">
                                <option value="case_indicator">CASE INDICATORS</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-12 newborn_baby">
                    <div class="form-group row">
                        <label class="col-4"></label>
                        <div class="col-8">
                            <div class="form-check">
                                <input type="checkbox" name="newborn_baby" id="newborn_baby" class="form-check-input"/>
                                <label for="newborn_baby">WITH NEWBORN BABY?</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 newborn_status">
                    <div class="form-group row">
                        <label class="col-4">NEW BORN STATUS <span class="required">*</span>:</label>
                        <div class="col-8">
                            <select name="newborn_status" id="newborn_status" class="form-control">
                                <option value="newborn_status">NEW BORN STATUS</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-12 disposition">
                    <div class="form-group row">
                        <label class="col-4">DISPOSITION <span class="required">*</span>:</label>
                        <div class="col-8">
                            <select name="disposition" id="disposition" class="form-control">
                                <option value="disposition">DISPOSITION</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-12 admission_result">
                    <div class="form-group row">
                        <label class="col-4">ADMISSION RESULT <span class="required">*</span>:</label>
                        <div class="col-8">
                            <select name="admission_result" id="admission_result" class="form-control">
                                <option value="admission_result">ADMISSION RESULT</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-12 type_of_death">
                    <div class="form-group row">
                        <label class="col-4">TYPE OF DEATH <span class="required">*</span>:</label>
                        <div class="col-8">
                            <select name="type_of_death" id="type_of_death" class="form-control">
                                <option value="type_of_death">TYPE OF DEATH</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-12 death_datetime">
                    <div class="form-group row">
                        <label class="col-4">DEATH DATETIME <span class="required">*</span>:</label>
                        <div class="col-8">
                            <input type="datetime-local" class="form-control" name="death_datetime" id="death_datetime"/>
                        </div>
                    </div>
                </div>
                <div class="col-12 paralegal">
                    <div class="form-group row">
                        <label class="col-4">PARA-LEGAL INDICATORS (IF ADMISSION RESULT IS EXPIRED)</label>
                        <div class="col-8">
                            <div class="form-check">
                                <input type="checkbox" name="expired" id="expired" class="form-check-input"/>
                                <label for="expired">EXPIRED/DIED IN LESS THAN 48 HOURS UPON ADMISSION</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="autopsy" id="autopsy" class="form-check-input"/>
                                <label for="autopsy">AUTOPSY IS DONE</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 medical_package">
                    <div class="form-group row">
                        <label class="col-4"></label>
                        <div class="col-8">
                            <div class="form-check">
                                <input type="checkbox" name="medical_package" id="medical_package" class="form-check-input" disabled/>
                                <label for="medical_package">WITH MEDICAL PACKAGE?</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-12 mother_account">
            <div class="form-group row">
                <label class="col-2">MOTHER ACCOUNT <span class="required">*</span>:</label>
                <div class="col-10">
                    <input type="text" class="form-control" name="mother_account" id="mother_account"/>
                </div>
            </div>
        </div>
        <div class="col-12 remarks">
            <div class="form-group row">
                <label class="col-2">NOTES/ REMARKS<span class="required">*</span>:</label>
                <div class="col-10">
                    <textarea name="remarks" id="remarks" class="form-control"></textarea>
                </div>
            </div>
        </div>
    </div>
</div>
