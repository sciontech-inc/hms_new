var additional_id = null;
$(function() {

    project_type = 'app_module';
    module_content = 'patient';
    modal_content = 'patient';
    module_url = '/actions/' + modal_content;
    module_type = 'transaction';
    page_title = 'Patient';
    modal_content = 'patient';
    tab_active = 'general';
    page_title = "";
    actions = 'save';
    module_type = 'transaction';
    storage_url = '/hms/patient_management/patient' ;
    
    scion.centralized_button(true, false, true, true);
    scion.action.tab(tab_active);

    // general_func();

    $("#profile_img").cropzee({
        allowedInputs: ['png','jpg','jpeg']
    });


});


// DEFAULT FUNCTION
function success(record) {
    switch(actions) {
        case 'save':
            
            record_id = record.id;
            $('#patient_id').val(record.patient_id);

            actions = 'update';

            scion.centralized_button(false, false, false, true);

            $('.tab-list-menu-item ').removeAttr('disabled');

            break;

        case 'update':

            switch(module_content) {
                case 'patient_insurance':
                    $('#patient_insurance_table').DataTable().draw();
                    scion.create.sc_modal('patient_insurance_form').hide('all', modalHideFunction);
                    break;
                case 'family_information':
                    $('#family_information_table').DataTable().draw();
                    scion.create.sc_modal('family_information_form').hide('all', modalHideFunction);
                    break;
                case 'medical_cases':
                    $('#medical_cases_table').DataTable().draw();
                    scion.create.sc_modal('medical_cases_form').hide('all', modalHideFunction);
                    break;
                case 'medicine_taken':
                    $('#medicine_taken_table').DataTable().draw();
                    scion.create.sc_modal('medicine_taken_form').hide('all', modalHideFunction);
                    break;
                case 'procedures_undertaken':
                    $('#procedures_undertaken_table').DataTable().draw();
                    scion.create.sc_modal('procedures_undertaken_form').hide('all', modalHideFunction);
                    break;
                case 'patient_allergies':
                    $('#patient_allergies_table').DataTable().draw();
                    scion.create.sc_modal('patient_allergies_form').hide('all', modalHideFunction);
                    break;
                case 'progress_consultation':
                    $('#progress_consultation_table').DataTable().draw();
                    scion.create.sc_modal('progress_consultation_form').hide('all', modalHideFunction);
                    break;
                case 'vital_measurement':
                    $('#vital_measurement_table').DataTable().draw();
                    scion.create.sc_modal('vital_measurement_form').hide('all', modalHideFunction);
                    break;
                case 'family_medical_history':
                    $('#family_medical_history_table').DataTable().draw();
                    scion.create.sc_modal('family_medical_history_form').hide('all', modalHideFunction);
                    break;
                case 'social_history':
                    $('#social_history_table').DataTable().draw();
                    scion.create.sc_modal('social_history_form').hide('all', modalHideFunction);
                    break;
                case 'other_information':
                    $('#other_information_table').DataTable().draw();
                    scion.create.sc_modal('other_information_form').hide('all', modalHideFunction);
                    break;
    }
            
            break;
    }
}

function error() {}

function delete_success() {

    switch(module_content) {
        case 'patient':

            var record_length = $('.form-record').length - 1;

            var form_id = $('.form-record')[record_length].id;
            $('#'+form_id)[0].reset();
            if($('.image-previewer').length !== 0) {
                $('.image-previewer').attr('src', '/images' + storage_url + '/default.png');
            }
            if($('#barcode').length !== 0) {
                $('#barcode').attr('src', '/images/default.png');
            }
            actions = 'save';
            scion.centralized_button(true, false, true, true);

            break;
        case 'patient_insurance':
            $('#patient_insurance_table').DataTable().draw();
            actions = 'save';
            scion.centralized_button(true, false, true, true);

            break;
        case 'family_information':
            $('#family_information_table').DataTable().draw();
            actions = 'save';
            scion.centralized_button(true, false, true, true);

            break;
        case 'medical_cases':
            $('#medical_cases_table').DataTable().draw();
            actions = 'save';
            scion.centralized_button(true, false, true, true);

            break;
        case 'medicine_taken':
            $('#medicine_taken_table').DataTable().draw();
            actions = 'save';
            scion.centralized_button(true, false, true, true);

            break;
        case 'procedures_undertaken':
            $('#procedures_undertaken_table').DataTable().draw();
            actions = 'save';
            scion.centralized_button(true, false, true, true);

            break;
        case 'patient_allergies':
            $('#patient_allergies_table').DataTable().draw();
            actions = 'save';
            scion.centralized_button(true, false, true, true);

            break;
        case 'progress_consultation':
            $('#progress_consultation_table').DataTable().draw();
            actions = 'save';
            scion.centralized_button(true, false, true, true);

            break;
        case 'vital_measurement':
            $('#vital_measurement_table').DataTable().draw();
            actions = 'save';
            scion.centralized_button(true, false, true, true);

            break;
        case 'family_medical_history':
            $('#family_medical_history_table').DataTable().draw();
            actions = 'save';
            scion.centralized_button(true, false, true, true);

            break;
        case 'social_history':
            $('#social_history_table').DataTable().draw();
            actions = 'save';
            scion.centralized_button(true, false, true, true);

            break;
        case 'other_information':
            $('#other_information_table').DataTable().draw();
            actions = 'save';
            scion.centralized_button(true, false, true, true);

            break;
            
    }

}

function delete_error() {}

function generateData() {

    switch(module_content) {
        
        case 'patient':

            form_data = {
                _token: _token,
                // patient_id: $('#patient_id').val(),
                firstname: $('#firstname').val(),
                middlename: $('#middlename').val(),
                lastname: $('#lastname').val(),
                suffix: $('#suffix').val(),
                birthdate: $('#birthdate').val(),
                sex: $('#sex').val(),
                citizenship: $('#citizenship').val(),
                email: $('#email').val(),
                birthplace: $('#birthplace').val(),
                marital_status: $('#marital_status').val(),
                body_marks: $('#body_marks').val(),
                nationality: $('#nationality').val(),
                religion: $('#religion').val(),
                blood_type: $('#blood_type').val(),
                occupation: $('#occupation').val(),
                remarks: $('#remarks').val(),
                referred_by: $('#referred_by').val(),
                contact_number_1: $('#contact_number_1').val(),
                contact_number_2: $('#contact_number_2').val(),
                street_no: $('#street_no').val(),
                barangay: $('#barangay').val(),
                city: $('#city').val(),
                province: $('#province').val(),
                country : $('#country').val(),
                zip_code : $('#zip_code').val(),
                street_no_2: $('#street_no_2').val(),
                barangay_2: $('#barangay_2').val(),
                city_2: $('#city_2').val(),
                province_2: $('#province_2').val(),
                country_2 : $('#country_2').val(),
                zip_code_2 : $('#zip_code_2').val(),
                status: $('#status').val(),
                profile_img: ($('#profile_img').val() !== ''?cropzeeGetImage('profile_img'):'')
                
            };


            break;
        case 'patient_insurance':
            form_data = {
                _token: _token,
                patient_id: additional_id,
                provider: $('#provider').val(),
                type: $('#type').val(),
                policy_no: $('#policy_no').val(),
                group_policy_no: $('#group_policy_no').val(),
                insurance_notes: $('#insurance_notes').val(),
            };

            actions = 'update';

            break;
        case 'family_information':
            form_data = {
                _token: _token,
                patient_id: additional_id,
                family_fullname: $('#family_fullname').val(),
                family_birthdate: $('#family_birthdate').val(),
                family_relationship: $('#family_relationship').val(),
                family_sex: $('#family_sex').val(),
                family_citizenship: $('#family_citizenship').val(),
                family_address: $('#family_address').val(),
                family_contact_no: $('#family_contact_no').val(),
                family_email: $('#family_email').val(),
                family_remarks	: $('#family_remarks').val(),
            };

            actions = 'update';

            break;
        case 'medical_cases':
            form_data = {
                _token: _token,
                patient_id: additional_id,
                date_recorded: $('#date_recorded').val(),
                chief_complaint: $('#chief_complaint').val(),
                diagnostic_tests: $('#diagnostic_tests').val(),
                diagnosis: $('#diagnosis').val(),
                prognosis: $('#prognosis').val(),
                physician_notes: $('#physician_notes').val(),
                nursing_notes: $('#nursing_notes').val(),
                discharge_summary: $('#discharge_summary').val(),
                medical_case_remarks: $('#medical_case_remarks').val(),
            };

            actions = 'update';

                break;
        case 'medicine_taken':
            form_data = {
                _token: _token,
                patient_id: additional_id,
                medicine_name: $('#medicine_name').val(),
                medicine_doses: $('#medicine_doses').val(),
                routes_of_administration: $('#routes_of_administration').val(),
                medicine_type: $('#medicine_type').val(),
                medicine_duration: $('#medicine_duration').val(),
                medicine_reason: $('#medicine_reason').val(),
                medicine_compliance: $('#medicine_compliance').val(),
                medicine_remarks: $('#medicine_remarks').val(),
            };

            actions = 'update';

                break;
        case 'procedures_undertaken':
            form_data = {
                _token: _token,
                patient_id: additional_id,
                procedure_date: $('#procedure_date').val(),
                procedure_name: $('#procedure_name').val(),
                procedure_description: $('#procedure_description').val(),
                procedure_reason: $('#procedure_reason').val(),
                procedure_results: $('#procedure_results').val(),
                pre_procedure_preparation: $('#pre_procedure_preparation').val(),
                post_procedure_preparation: $('#post_procedure_preparation').val(),
                procedure_complications: $('#procedure_complications').val(),
                procedure_sedation_used: $('#procedure_sedation_used').val(),
                procedure_remarks: $('#procedure_remarks').val(),

            };

            actions = 'update';

                break;
        case 'patient_allergies':
            form_data = {
                _token: _token,
                patient_id: additional_id,
                allergy_allergen: $('#allergy_allergen').val(),
                allergy_reaction: $('#allergy_reaction').val(),
                allergy_severity: $('#allergy_severity').val(),
                allergy_date_of_onset: $('#allergy_date_of_onset').val(),
                allergy_treatment: $('#allergy_treatment').val(),
                allergy_duration: $('#allergy_duration').val(),
                source_of_information: $('#source_of_information').val(),
                known_cross_reactives: $('#known_cross_reactives').val(),
                current_management_plan: $('#current_management_plan').val(),
                medications_to_avoid: $('#medications_to_avoid').val(),
                severity_of_reaction: $('#severity_of_reaction').val(),
                allergy_anaphylaxis: $('#allergy_anaphylaxis').val(),
                allergy_testing: $('#allergy_testing').val(),
                other_relevant_medical_history: $('#other_relevant_medical_history').val(),

            };

            actions = 'update';

                break;
        case 'progress_consultation':
            form_data = {
                _token: _token,
                patient_id: additional_id,
                progress_date: $('#progress_date').val(),
                progress_title: $('#progress_title').val(),
                progress_notes: $('#progress_notes').val(),

            };

            actions = 'update';

                break;
        case 'vital_measurement':
            form_data = {
                _token: _token,
                patient_id: additional_id,
                vital_date: $('#vital_date').val(),
                vital_time: $('#vital_time').val(),
                blood_pressure: $('#blood_pressure').val(),
                heart_rate: $('#heart_rate').val(),
                temperature: $('#temperature').val(),
                respiratory_rate: $('#respiratory_rate').val(),
                oxygen_saturation: $('#oxygen_saturation').val(),
                pulse_rate: $('#pulse_rate').val(),
                vital_remarks: $('#vital_remarks').val(),

            };

            actions = 'update';

                break;
        case 'family_medical_history':
            form_data = {
                _token: _token,
                patient_id: additional_id,
                fm_relationship: $('#fm_relationship').val(),
                fm_medical_condition: $('#fm_medical_condition').val(),
                fm_age_at_diagnosis: $('#fm_age_at_diagnosis').val(),
                fm_age_at_death: $('#fm_age_at_death').val(),
                fm_cause_of_death: $('#fm_cause_of_death').val(),
                fm_other_relevant_medical_history: $('#fm_other_relevant_medical_history').val(),
                fm_family_history_of_specific_conditions: $('#fm_family_history_of_specific_conditions').val(),
                fm_ethnicity: $('#fm_ethnicity').val(),
                fm_lifestyle_factors: $('#fm_lifestyle_factors').val(),
                fm_other_family_members_affected: $('#fm_other_family_members_affected').val(),
                fm_remarks: $('#fm_remarks').val(),

            };

            actions = 'update';

                break;
        case 'social_history':
            form_data = {
                _token: _token,
                patient_id: additional_id,
                sh_record: $('#sh_record').val(),
                sh_category: $('#sh_category').val(),
                sh_details: $('#sh_details').val(),
                
            };

            actions = 'update';

                break;
        case 'other_information':
            form_data = {
                _token: _token,
                patient_id: additional_id,
                oi_description: $('#oi_description').val(),
                oi_remarks: $('#oi_remarks').val(),
            };

            actions = 'update';

                break;
    }

    return form_data;
}

function generateDeleteItems() {
    switch(module_content) {
        case 'patient':
            delete_data = [record_id];
            break;
    }
}

// EXTRA FUNCTION
function general_func() {
    module_content = 'patient';
    module_url = '/actions/' + module_content;
    module_type = 'transaction';

    if(record_id !== '') {
        actions = 'update';
    }

    if(actions == 'update') {
        scion.centralized_button(false, false, false, true);
    }
    else {
        scion.centralized_button(true, false, true, true);

    }
}

function patient_insurance_func() {

    modal_content = 'patient_insurance';
    module_content = 'patient_insurance';
    module_url = '/actions/' + module_content;
    actions = 'update';
    module_type = 'custom';

    additional_id = record_id;
    scion.centralized_button(false, true, true, true);


    if ($.fn.DataTable.isDataTable('#patient_insurance_table')) {
        $('#patient_insurance_table').DataTable().destroy();
    }

    scion.create.table(
        'patient_insurance_table',
        module_url + '/get/' + record_id,
        [
            { data: "id", title:"<input type='checkbox' class='multi-checkbox' onclick='scion.table.checkAll()'/>", render: function(data, type, row, meta) {
                var html = "";
                html += '<input type="checkbox" class="single-checkbox" value="'+row.id+'" onclick="scion.table.checkOne()"/>';
                html += '<a href="#" class="align-middle edit" onclick="patient_insurance_edit('+"'/actions/"+module_content+"/edit/', "+ row.id +')"><i class="fas fa-pen"></i></a>';
                return html;
            }},
            { data: "id", title: "ID" },
            { data: "provider", title: "PROVIDER" },
            { data: "type", title: "TYPE" },
            { data: "policy_no", title: "POLICY NO" },
            { data: "group_policy_no", title: "GROUP POLICY NO" },
            { data: "insurance_notes", title: "NOTES" },
        ], 'Bfrtip', []
    );
    
}

function family_information_func() {

    modal_content = 'family_information';
    module_content = 'family_information';
    module_url = '/actions/' + module_content;
    actions = 'update';
    module_type = 'custom';

    additional_id = record_id;
    scion.centralized_button(false, true, true, true);

    if ($.fn.DataTable.isDataTable('#family_information_table')) {
        $('#family_information_table').DataTable().destroy();
    }

    scion.create.table(
        'family_information_table',
        module_url + '/get/' + record_id,
        [
            { data: "id", title:"<input type='checkbox' class='multi-checkbox' onclick='scion.table.checkAll()'/>", render: function(data, type, row, meta) {
                var html = "";
                html += '<input type="checkbox" class="single-checkbox" value="'+row.id+'" onclick="scion.table.checkOne()"/>';
                html += '<a href="#" class="align-middle edit" onclick="family_information_edit('+"'/actions/"+module_content+"/edit/', "+ row.id +')"><i class="fas fa-pen"></i></a>';
                return html;
            }},
            { data: "id", title: "ID" },
            { data: "family_fullname", title: "FULL NAME" },
            { data: "family_birthdate", title: "BIRTHDATE" },
            { data: "family_relationship", title: "RELATIONSHIP" },
            { data: "family_contact_no", title: "CONTACT NO" },
        ], 'Bfrtip', []
    );
}

function medical_cases_func() {

    modal_content = 'medical_cases';
    module_content = 'medical_cases';
    module_url = '/actions/' + module_content;
    actions = 'update';
    module_type = 'custom';

    additional_id = record_id;
    scion.centralized_button(false, true, true, true);

    if ($.fn.DataTable.isDataTable('#medical_cases_table')) {
        $('#medical_cases_table').DataTable().destroy();
    }

    scion.create.table(
        'medical_cases_table',
        module_url + '/get/' + record_id,
        [
            { data: "id", title:"<input type='checkbox' class='multi-checkbox' onclick='scion.table.checkAll()'/>", render: function(data, type, row, meta) {
                var html = "";
                html += '<input type="checkbox" class="single-checkbox" value="'+row.id+'" onclick="scion.table.checkOne()"/>';
                html += '<a href="#" class="align-middle edit" onclick="medical_case_edit('+"'/actions/"+module_content+"/edit/', "+ row.id +')"><i class="fas fa-pen"></i></a>';
                return html;
            }},
            { data: "id", title: "ID" },
            { data: "date_recorded", title: "DATE RECORDED" },
            { data: "chief_complaint", title: "CHIEF COMPLAINT" },
            { data: "diagnosis", title: "DIAGNOSIS" },
            { data: "prognosis", title: "PROGNOSIS" },
            { data: "discharge_summary", title: "DISCHARGE SUMMARY" },

        ], 'Bfrtip', []
    );
}

function medicine_taken_func() {

    modal_content = 'medicine_taken';
    module_content = 'medicine_taken';
    module_url = '/actions/' + module_content;
    actions = 'update';
    module_type = 'custom';
    
    additional_id = record_id;

    scion.centralized_button(false, true, true, true);

    if ($.fn.DataTable.isDataTable('#medicine_taken_table')) {
        $('#medicine_taken_table').DataTable().destroy();
    }

    scion.create.table(
        'medicine_taken_table',
        module_url + '/get/' + record_id,
        [
            { data: "id", title:"<input type='checkbox' class='multi-checkbox' onclick='scion.table.checkAll()'/>", render: function(data, type, row, meta) {
                var html = "";
                html += '<input type="checkbox" class="single-checkbox" value="'+row.id+'" onclick="scion.table.checkOne()"/>';
                html += '<a href="#" class="align-middle edit" onclick="medicine_taken_edit('+"'/actions/"+module_content+"/edit/', "+ row.id +')"><i class="fas fa-pen"></i></a>';
                return html;
            }},
            { data: "id", title: "ID" },
            { data: "medicine_name", title: "MEDICINE NAME" },
            { data: "medicine_doses", title: "MEDICINE DOSES" },
            { data: "medicine_type", title: "MEDICINE TYPE" },
            { data: "medicine_duration", title: "MEDICINE DURATION" },
            { data: "medicine_reason", title: "MEDICINE REASON" },

        ], 'Bfrtip', []
    );
}

function procedures_undertaken_func() {

    modal_content = 'procedures_undertaken';
    module_content = 'procedures_undertaken';
    module_url = '/actions/' + module_content;
    actions = 'update';
    module_type = 'custom';
    
    additional_id = record_id;

    scion.centralized_button(false, true, true, true);

    if ($.fn.DataTable.isDataTable('#procedures_undertaken_table')) {
        $('#procedures_undertaken_table').DataTable().destroy();
    }

    scion.create.table(
        'procedures_undertaken_table',
        module_url + '/get/' + record_id,
        [
            { data: "id", title:"<input type='checkbox' class='multi-checkbox' onclick='scion.table.checkAll()'/>", render: function(data, type, row, meta) {
                var html = "";
                html += '<input type="checkbox" class="single-checkbox" value="'+row.id+'" onclick="scion.table.checkOne()"/>';
                html += '<a href="#" class="align-middle edit" onclick="procedures_undertaken_edit('+"'/actions/"+module_content+"/edit/', "+ row.id +')"><i class="fas fa-pen"></i></a>';
                return html;
            }},
            { data: "id", title: "ID" },
            { data: "procedure_date", title: "PROCEDURE DATE" },
            { data: "procedure_name", title: "PROCEDURE NAME" },
            { data: "procedure_reason", title: "PROCEDURE REASON" },
            { data: "procedure_results", title: "PROCEDURE RESULTS" },
            { data: "procedure_complications", title: "PROCEDURE COMPLICATIONS" },

        ], 'Bfrtip', []
    );
}

function patient_allergies_func() {

    modal_content = 'patient_allergies';
    module_content = 'patient_allergies';
    module_url = '/actions/' + module_content;
    actions = 'update';
    module_type = 'custom';
    
    additional_id = record_id;

    scion.centralized_button(false, true, true, true);

    if ($.fn.DataTable.isDataTable('#patient_allergies_table')) {
        $('#patient_allergies_table').DataTable().destroy();
    }

    scion.create.table(
        'patient_allergies_table',
        module_url + '/get/' + record_id,
        [
            { data: "id", title:"<input type='checkbox' class='multi-checkbox' onclick='scion.table.checkAll()'/>", render: function(data, type, row, meta) {
                var html = "";
                html += '<input type="checkbox" class="single-checkbox" value="'+row.id+'" onclick="scion.table.checkOne()"/>';
                html += '<a href="#" class="align-middle edit" onclick="patient_allergies_edit('+"'/actions/"+module_content+"/edit/', "+ row.id +')"><i class="fas fa-pen"></i></a>';
                return html;
            }},
            { data: "id", title: "ID" },
            { data: "allergy_allergen", title: "ALLERGEN" },
            { data: "allergy_reaction", title: "REACTION" },
            { data: "allergy_severity", title: "SEVERITY" },
            { data: "allergy_date_of_onset", title: "DATE OF ONSET" },
            // { data: "allergy_treatment", title: "TREATMENT" },
            // { data: "allergy_duration", title: "DURATION" },
            // { data: "allergy_anaphylaxis", title: "ANAPHYLAXIS" },

        ], 'Bfrtip', []
    );
}

function progress_consultation_func() {

    modal_content = 'progress_consultation';
    module_content = 'progress_consultation';
    module_url = '/actions/' + module_content;
    actions = 'update';
    module_type = 'custom';
    
    additional_id = record_id;

    scion.centralized_button(false, true, true, true);

    if ($.fn.DataTable.isDataTable('#progress_consultation_table')) {
        $('#progress_consultation_table').DataTable().destroy();
    }

    scion.create.table(
        'progress_consultation_table',
        module_url + '/get/' + record_id,
        [
            { data: "id", title:"<input type='checkbox' class='multi-checkbox' onclick='scion.table.checkAll()'/>", render: function(data, type, row, meta) {
                var html = "";
                html += '<input type="checkbox" class="single-checkbox" value="'+row.id+'" onclick="scion.table.checkOne()"/>';
                html += '<a href="#" class="align-middle edit" onclick="progress_consultation_edit('+"'/actions/"+module_content+"/edit/', "+ row.id +')"><i class="fas fa-pen"></i></a>';
                return html;
            }},
            { data: "id", title: "ID" },
            { data: "progress_date", title: "PROGRESS DATE" },
            { data: "progress_title", title: "PROGRESS TITLE" },
            { data: "progress_notes", title: "PROGRESS NOTES" },

        ], 'Bfrtip', []
    );
}

function vital_measurement_func() {

    modal_content = 'vital_measurement';
    module_content = 'vital_measurement';
    module_url = '/actions/' + module_content;
    actions = 'update';
    module_type = 'custom';
    
    additional_id = record_id;

    scion.centralized_button(false, true, true, true);


    if ($.fn.DataTable.isDataTable('#vital_measurement_table')) {
        $('#vital_measurement_table').DataTable().destroy();
    }

    scion.create.table(
        'vital_measurement_table',
        module_url + '/get/' + record_id,
        [
            { data: "id", title:"<input type='checkbox' class='multi-checkbox' onclick='scion.table.checkAll()'/>", render: function(data, type, row, meta) {
                var html = "";
                html += '<input type="checkbox" class="single-checkbox" value="'+row.id+'" onclick="scion.table.checkOne()"/>';
                html += '<a href="#" class="align-middle edit" onclick="vital_measurement_edit('+"'/actions/"+module_content+"/edit/', "+ row.id +')"><i class="fas fa-pen"></i></a>';
                return html;
            }},
            { data: "id", title: "ID" },
            { data: "vital_date", title: "PROGRESS DATE" },
            { data: "vital_time", title: "VITAL TIME" },
            { data: "vital_remarks", title: "REMARKS" },
    

        ], 'Bfrtip', []
    );
}

function family_medical_history_func() {

    modal_content = 'family_medical_history';
    module_content = 'family_medical_history';
    module_url = '/actions/' + module_content;
    actions = 'update';
    module_type = 'custom';
    
    additional_id = record_id;

    scion.centralized_button(false, true, true, true);

    if ($.fn.DataTable.isDataTable('#family_medical_history_table')) {
        $('#family_medical_history_table').DataTable().destroy();
    }

    scion.create.table(
        'family_medical_history_table',
        module_url + '/get/' + record_id,
        [
            { data: "id", title:"<input type='checkbox' class='multi-checkbox' onclick='scion.table.checkAll()'/>", render: function(data, type, row, meta) {
                var html = "";
                html += '<input type="checkbox" class="single-checkbox" value="'+row.id+'" onclick="scion.table.checkOne()"/>';
                html += '<a href="#" class="align-middle edit" onclick="family_medical_history_edit('+"'/actions/"+module_content+"/edit/', "+ row.id +')"><i class="fas fa-pen"></i></a>';
                return html;
            }},
            { data: "id", title: "ID" },
            { data: "fm_relationship", title: "RELATIONSHIP" },
            { data: "fm_medical_condition", title: "MEDICAL CONDITION" },
            { data: "fm_age_at_diagnosis", title: "AGE AT DIAGNOSIS" },
            { data: "fm_age_at_death", title: "AGE AT DEATH" },
            { data: "fm_cause_of_death", title: "CAUSE OF DEATH" },

        ], 'Bfrtip', []
    );
}

function social_history_func() {

    modal_content = 'social_history';
    module_content = 'social_history';
    module_url = '/actions/' + module_content;
    actions = 'update';
    module_type = 'custom';
    
    additional_id = record_id;

    scion.centralized_button(false, true, true, true);

    if ($.fn.DataTable.isDataTable('#social_history_table')) {
        $('#social_history_table').DataTable().destroy();
    }

    scion.create.table(
        'social_history_table',
        module_url + '/get/' + record_id,
        [
            { data: "id", title:"<input type='checkbox' class='multi-checkbox' onclick='scion.table.checkAll()'/>", render: function(data, type, row, meta) {
                var html = "";
                html += '<input type="checkbox" class="single-checkbox" value="'+row.id+'" onclick="scion.table.checkOne()"/>';
                html += '<a href="#" class="align-middle edit" onclick="social_history_edit('+"'/actions/"+module_content+"/edit/', "+ row.id +')"><i class="fas fa-pen"></i></a>';
                return html;
            }},
            { data: "id", title: "ID" },
            { data: "sh_record", title: "RECORD" },
            { data: "sh_category", title: "CATEGORY" },
            { data: "sh_details", title: "DETAILS" },
 
        ], 'Bfrtip', []
    );
}

function other_information_func() {

    modal_content = 'other_information';
    module_content = 'other_information';
    module_url = '/actions/' + module_content;
    actions = 'update';
    module_type = 'custom';
    
    additional_id = record_id;

    scion.centralized_button(false, true, true, true);

    if ($.fn.DataTable.isDataTable('#other_information_table')) {
        $('#other_information_table').DataTable().destroy();
    }

    scion.create.table(
        'other_information_table',
        module_url + '/get/' + record_id,
        [
            { data: "id", title:"<input type='checkbox' class='multi-checkbox' onclick='scion.table.checkAll()'/>", render: function(data, type, row, meta) {
                var html = "";
                html += '<input type="checkbox" class="single-checkbox" value="'+row.id+'" onclick="scion.table.checkOne()"/>';
                html += '<a href="#" class="align-middle edit" onclick="other_information_edit('+"'/actions/"+module_content+"/edit/', "+ row.id +')"><i class="fas fa-pen"></i></a>';
                return html;
            }},
            { data: "id", title: "ID" },
            { data: "oi_description", title: "RECORD" },
            { data: "oi_remarks", title: "CATEGORY" },
 
        ], 'Bfrtip', []
    );
}

// Edit Custom
function patient_insurance_edit(url, id) {
    $.get(url+id, function(response){
        actions = 'update';
        
        scion.create.sc_modal(modal_content+"_form", "UPDATE " + page_title).show(modalShowFunction);

        $('#provider').val(response.patient_insurance.provider);
        $('#type').val(response.patient_insurance.type);
        $('#policy_no').val(response.patient_insurance.policy_no);
        $('#group_policy_no').val(response.patient_insurance.group_policy_no);
        $('#insurance_notes').val(response.patient_insurance.insurance_notes);

        update_id = response.patient_insurance.id;
    });
}

// Edit Custom
function family_information_edit(url, id) {
    $.get(url+id, function(response){
        actions = 'update';
        
        scion.create.sc_modal(modal_content+"_form", "UPDATE " + page_title).show(modalShowFunction);
        
        $('#family_fullname').val(response.family_information.family_fullname);
        $('#family_birthdate').val(response.family_information.family_birthdate);
        $('#family_relationship').val(response.family_information.family_relationship);
        $('#family_sex').val(response.family_information.family_sex);
        $('#family_citizenship').val(response.family_information.family_citizenship);
        $('#family_address').val(response.family_information.family_address);
        $('#family_contact_no').val(response.family_information.family_contact_no);
        $('#family_email').val(response.family_information.family_email);
        $('#family_remarks').val(response.family_information.family_remarks);

        update_id = response.family_information.id;
    });
}

// Edit Custom
function medical_case_edit(url, id) {
    $.get(url+id, function(response){
        actions = 'update';
        
        scion.create.sc_modal(modal_content+"_form", "UPDATE " + page_title).show(modalShowFunction);
        
        $('#date_recorded').val(response.medical_case.date_recorded);
        $('#chief_complaint').val(response.medical_case.chief_complaint);
        $('#diagnostic_tests').val(response.medical_case.diagnostic_tests);
        $('#diagnosis').val(response.medical_case.diagnosis);
        $('#prognosis').val(response.medical_case.prognosis);
        $('#physician_notes').val(response.medical_case.physician_notes);
        $('#nursing_notes').val(response.medical_case.nursing_notes);
        $('#discharge_summary').val(response.medical_case.discharge_summary);
        $('#medical_case_remarks').val(response.medical_case.medical_case_remarks);

        update_id = response.medical_case.id;
    });
}

// Edit Custom
function medicine_taken_edit(url, id) {
    $.get(url+id, function(response){
        actions = 'update';
        
        scion.create.sc_modal(modal_content+"_form", "UPDATE " + page_title).show(modalShowFunction);
        
        $('#medicine_name').val(response.medicine_taken.medicine_name);
        $('#medicine_doses').val(response.medicine_taken.medicine_doses);
        $('#routes_of_administration').val(response.medicine_taken.routes_of_administration);
        $('#medicine_type').val(response.medicine_taken.medicine_type);
        $('#medicine_duration').val(response.medicine_taken.medicine_duration);
        $('#medicine_reason').val(response.medicine_taken.medicine_reason);
        $('#medicine_compliance').val(response.medicine_taken.medicine_compliance);
        $('#medicine_remarks').val(response.medicine_taken.medicine_remarks);

        update_id = response.medicine_taken.id;
    });
}

// Edit Custom
function procedures_undertaken_edit(url, id) {
    $.get(url+id, function(response){
        actions = 'update';
        
        scion.create.sc_modal(modal_content+"_form", "UPDATE " + page_title).show(modalShowFunction);
        
        $('#procedure_date').val(response.procedures_undertaken.procedure_date);
        $('#procedure_name').val(response.procedures_undertaken.procedure_name);
        $('#procedure_description').val(response.procedures_undertaken.procedure_description);
        $('#procedure_reason').val(response.procedures_undertaken.procedure_reason);
        $('#procedure_results').val(response.procedures_undertaken.procedure_results);
        $('#pre_procedure_preparation').val(response.procedures_undertaken.pre_procedure_preparation);
        $('#post_procedure_preparation').val(response.procedures_undertaken.post_procedure_preparation);
        $('#procedure_complications').val(response.procedures_undertaken.procedure_complications);
        $('#procedure_sedation_used').val(response.procedures_undertaken.procedure_sedation_used);
        $('#procedure_remarks').val(response.procedures_undertaken.procedure_remarks);


        update_id = response.procedures_undertaken.id;
    });
}

// Edit Custom
function patient_allergies_edit(url, id) {
    $.get(url+id, function(response){
        actions = 'update';
        
        scion.create.sc_modal(modal_content+"_form", "UPDATE " + page_title).show(modalShowFunction);
        
        $('#allergy_allergen').val(response.patient_allergies.allergy_allergen);
        $('#allergy_reaction').val(response.patient_allergies.allergy_reaction);
        $('#allergy_severity').val(response.patient_allergies.allergy_severity);
        $('#allergy_date_of_onset').val(response.patient_allergies.allergy_date_of_onset);
        $('#allergy_treatment').val(response.patient_allergies.allergy_treatment);
        $('#allergy_duration').val(response.patient_allergies.allergy_duration);
        $('#source_of_information').val(response.patient_allergies.source_of_information);
        $('#known_cross_reactives').val(response.patient_allergies.known_cross_reactives);
        $('#current_management_plan').val(response.patient_allergies.current_management_plan);
        $('#medications_to_avoid').val(response.patient_allergies.medications_to_avoid);
        $('#severity_of_reaction').val(response.patient_allergies.severity_of_reaction);
        $('#allergy_anaphylaxis').val(response.patient_allergies.allergy_anaphylaxis);
        $('#allergy_testing').val(response.patient_allergies.allergy_testing);
        $('#other_relevant_medical_history').val(response.patient_allergies.other_relevant_medical_history);


        update_id = response.patient_allergies.id;
    });
}

// Edit Custom
function progress_consultation_edit(url, id) {
    $.get(url+id, function(response){
        actions = 'update';
        
        scion.create.sc_modal(modal_content+"_form", "UPDATE " + page_title).show(modalShowFunction);
        
        $('#progress_date').val(response.progress_consultation.progress_date);
        $('#progress_title').val(response.progress_consultation.progress_title);
        $('#progress_notes').val(response.progress_consultation.progress_notes);
      

        update_id = response.progress_consultation.id;
    });
}

// Edit Custom
function vital_measurement_edit(url, id) {
    $.get(url+id, function(response){
        actions = 'update';
        
        scion.create.sc_modal(modal_content+"_form", "UPDATE " + page_title).show(modalShowFunction);
        
        $('#vital_date').val(response.vital_measurement.vital_date);
        $('#vital_time').val(response.vital_measurement.vital_time);
        $('#blood_pressure').val(response.vital_measurement.blood_pressure);
        $('#heart_rate').val(response.vital_measurement.heart_rate);
        $('#temperature').val(response.vital_measurement.temperature);
        $('#respiratory_rate').val(response.vital_measurement.respiratory_rate);
        $('#oxygen_saturation').val(response.vital_measurement.oxygen_saturation);
        $('#pulse_rate').val(response.vital_measurement.pulse_rate);
        $('#vital_remarks').val(response.vital_measurement.vital_remarks);

        update_id = response.vital_measurement.id;
    });
}


// Edit Custom
function family_medical_history_edit(url, id) {
    $.get(url+id, function(response){
        actions = 'update';
        
        scion.create.sc_modal(modal_content+"_form", "UPDATE " + page_title).show(modalShowFunction);
        
        $('#fm_relationship').val(response.family_medical_history.fm_relationship);
        $('#fm_medical_condition').val(response.family_medical_history.fm_medical_condition);
        $('#fm_age_at_diagnosis').val(response.family_medical_history.fm_age_at_diagnosis);
        $('#fm_age_at_death').val(response.family_medical_history.fm_age_at_death);
        $('#fm_other_relevant_medical_history').val(response.family_medical_history.fm_other_relevant_medical_history);
        $('#fm_family_history_of_specific_conditions').val(response.family_medical_history.fm_family_history_of_specific_conditions);
        $('#fm_ethnicity').val(response.family_medical_history.fm_ethnicity);
        $('#fm_lifestyle_factors').val(response.family_medical_history.fm_lifestyle_factors);
        $('#fm_other_family_members_affected').val(response.family_medical_history.fm_other_family_members_affected);
        $('#fm_remarks').val(response.family_medical_history.fm_remarks);

        update_id = response.family_medical_history.id;
    });
}



// Edit Custom
function social_history_edit(url, id) {
    $.get(url+id, function(response){
        actions = 'update';
        
        scion.create.sc_modal(modal_content+"_form", "UPDATE " + page_title).show(modalShowFunction);
        
        $('#sh_record').val(response.social_history.sh_record);
        $('#sh_category').val(response.social_history.sh_category);
        $('#sh_details').val(response.social_history.sh_details);

        update_id = response.social_history.id;
    });
}

// Edit Custom
function other_information_edit(url, id) {
    $.get(url+id, function(response){
        actions = 'update';
        
        scion.create.sc_modal(modal_content+"_form", "UPDATE " + page_title).show(modalShowFunction);
        
        $('#oi_description').val(response.other_information.oi_description);
        $('#oi_remarks').val(response.other_information.oi_remarks);

        update_id = response.other_information.id;
    });
}

function modalShowFunction() {
    scion.centralized_button(true, false, true, true);
}

function modalHideFunction() {
    scion.centralized_button(false, true, true, true);
}