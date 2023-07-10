var additional_id = null;
$(function() {

    project_type = 'app_module';
    module_content = 'doctor';
    modal_content = 'doctor';
    module_url = '/actions/' + modal_content;
    module_type = 'transaction';
    page_title = 'Doctor';
    modal_content = 'doctor';
    tab_active = 'general';
    page_title = "";
    actions = 'save';
    module_type = 'transaction';
    storage_url = '/hms/staff_management/doctor' ;
    
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
            $('#doctor_id').val(record.doctor_id);

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
            }
            
            break;
    }
}

function error() {}

function delete_success() {

    switch(module_content) {
        case 'doctor':

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
            
    }

}

function delete_error() {}

function generateData() {

    switch(module_content) {
        
        case 'doctor':

            form_data = {
                _token: _token,
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
                medical_license_no: $('#medical_license_no').val(),
                medical_license_expiry_date: $('#medical_license_expiry_date').val(),
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
    }

    return form_data;
}

function generateDeleteItems() {
    switch(module_content) {
        case 'doctor':
            delete_data = [record_id];
            break;
    }
}

// EXTRA FUNCTION
function general_func() {
    module_content = 'doctor';
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

function modalShowFunction() {
    scion.centralized_button(true, false, true, true);
}

function modalHideFunction() {
    scion.centralized_button(false, true, true, true);
}