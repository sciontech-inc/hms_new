$(function() {
    
    project_type = 'app_module';
    module_content = 'patient_admission';
    modal_content = 'patient_admission';
    module_url = '/actions/' + module_content;
    module_type = 'transaction';
    page_title = 'PATIENT REGISTER';
    tab_active = 'general';
    page_title = "PATIENT ADMISSION";
    actions = 'save';
    module_type = 'custom';
    
    scion.centralized_button(false, true, true, true);
    scion.action.tab(tab_active);
    
    scion.create.table(
        modal_content + '_table',  
        module_url + '/get', 
        [
            { data: "patient_id", title: "PATIENT ID" },
            { data: "admission_case_no", title: "ADMISSION NO." },
            { data: null, title: "PATIENT NAME", render:function(data, type, row, meta) {
                return row.patient.firstname + (row.patient.middlename !== null?" " + row.patient.middlename + " ":" ") + row.patient.lastname + (row.patient.suffix !== null?" " + row.patient.suffix:"")
            } },
        ], 'rti', []
    );

    
    $('body').delegate('#patient_admission_table tbody tr','dblclick', function () {
        var data = $('#patient_admission_table').DataTable().row(this).data();

        scion.record.edit('/actions/patient_admission/edit/', data.id);
        
        $('.tab-list-menu-item ').removeAttr('disabled');

        actions = 'update';
    });

});

function success(record) {
    switch(actions) {
        case 'save':
            switch(module_content){
                case 'patient_admission':
                    record_id = record.id;
                    $('#id').val(record.id);

                    actions = 'update';

                    scion.centralized_button(true, false, true, true);

                    $('.tab-list-menu-item ').removeAttr('disabled');

                    break;
            }
            break;
        case 'update':
            switch(module_content){
                case 'patient_admission':
                    actions = 'save';
                    update_id = record_id;

                    $('#' + module_content + '_table').DataTable().draw();
                    $('.tab-list-menu-item ').removeAttr('disabled');
                    
                    break;
            }
            break;
    }
    $('#' + modal_content + '_table').DataTable().draw();
}

function error() {}

function delete_success() {
    switch(module_content) {
        case 'general':
            var form_id = $('.form-record')[0].id;
            $('#'+form_id)[0].reset();
            actions = 'save';
            scion.centralized_button(true, false, true, true);

            break;
    }
}

function delete_error() {}

function generateData() {
    switch(module_content) {
        case 'patient_admission':
            form_data = {
                _token: _token,
                patient_id: $('#patient_id').val(),
                registry_tracking_no: $('#registry_tracking_no').val(),
                admission_case_no: $('#admission_case_no').val(),
                osca_id_no: $('#osca_id_no').val(),
                admission_regularity: $('#admission_regularity').val(),
                status: $('#status').val(),
                admission_datetime: $('#admission_datetime').val(),
                arrival_datetime: $('#arrival_datetime').val(),
                mgh_datetime: $('#mgh_datetime').val(),
                discharge_datetime: $('#discharge_datetime').val(),
                admission_case_group: $('#admission_case_group').val(),
                admission_case_type: $('#admission_case_type').val(),
                transaction_type: $('#transaction_type').val(),
                patient_category: $('#patient_category').val(),
                hospitalization_plan: $('#hospitalization_plan').val(),
                membership: $('#membership').val(),
                service_type: $('#service_type').val(),
                sub_service_type: $('#sub_service_type').val(),
                referred_from: $('#referred_from').val(),
                price_group: $('#price_group').val(),
                price_scheme: $('#price_scheme').val(),
                discount_scheme: $('#discount_scheme').val(),
                classification: $('#classification').val(),
                how_admitted: $('#how_admitted').val(),
                source_of_admission: $('#source_of_admission').val(),
                type_of_delivery: $('#type_of_delivery').val(),
                case_indicator: $('#case_indicator').val(),
                newborn_status: $('#newborn_status').val(),
                disposition: $('#disposition').val(),
                admission_result: $('#admission_result').val(),
                type_of_death: $('#type_of_death').val(),
                death_datetime: $('#death_datetime').val(),
                newborn_baby: $('#newborn_baby')[0].checked === true? 1:0,
                expired: $('#expired')[0].checked === true? 1:0,
                autopsy: $('#autopsy')[0].checked === true? 1:0,
                medical_package: $('#medical_package')[0].checked === true? 1:0
            };


            break;
    }

    return form_data;
}

function generateDeleteItems(){
    switch(module_content) {
        case 'general':
            delete_data = [record_id];
            break;
    }
}

function modalShowFunction() {
    scion.centralized_button(true, false, true, true);
}

function modalHideFunction() {
    scion.centralized_button(false, true, true, true);
}

function customFunc() {
    console.log('hello');
}

// EXTRA FUNCTION
function general_func() {
    module_content = 'patient_admission';
    module_url = '/actions/' + module_content;
    module_type = 'custom';
    update_id = record_id;

    if(record_id !== '') {
        actions = 'update';
    }

    if(actions == 'update') {
        scion.centralized_button(false, false, true, true);
    }
    else {
        scion.centralized_button(true, false, true, true);
    }
}

function rooms_beds_dietary_func () {
    module_content = 'rooms_beds_dietary';
    module_url = '/actions/' + module_content;
    module_type = 'custom';
    update_id = record_id;

    if(record_id !== '') {
        actions = 'update';
    }

    if(actions == 'update') {
        scion.centralized_button(false, false, true, true);
    }
    else {
        scion.centralized_button(true, false, true, true);
    }
    
    $.get('/actions/building/list/all', function(response) {
        $("#building_id").html('');
        $("#building_id").append('<option></option>');
        $.each(response.data, function(i,v) {
            var o = new Option(v.name, v.id);
            
            $(o).html(v.name);
            $("#building_id").append(o);
        });
    });
}