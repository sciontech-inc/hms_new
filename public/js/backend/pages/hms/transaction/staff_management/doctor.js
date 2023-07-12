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

                case 'doctor_qualification':
                    $('#doctor_qualification_table').DataTable().draw();
                    scion.create.sc_modal('doctor_qualification_form').hide('all', modalHideFunction);

                    break;

                case 'doctor_work':
                    $('#doctor_work_table').DataTable().draw();
                    scion.create.sc_modal('doctor_work_form').hide('all', modalHideFunction);

                    break;

                case 'doctor_expertise':
                    $('#doctor_expertise_table').DataTable().draw();
                    scion.create.sc_modal('doctor_expertise_form').hide('all', modalHideFunction);

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

        case 'doctor_qualification':
            $('#doctor_qualification_table').DataTable().draw();
            actions = 'save';
            scion.centralized_button(true, false, true, true);

            break;

        case 'doctor_work':
            $('#doctor_work_table').DataTable().draw();
            actions = 'save';
            scion.centralized_button(true, false, true, true);

            break;
                 
        case 'doctor_expertise':
            $('#doctor_expertise_table').DataTable().draw();
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

            case 'doctor_qualification':
                form_data = {
                    _token: _token,
                    doctor_id: additional_id,
                    degree: $('#degree').val(),
                    description: $('#description').val(),
                    institute: $('#institute').val(),
                    year: $('#year').val(),
                    notes: $('#notes').val(),
                };
    
                actions = 'update';
    
                break;

            case 'doctor_work':
                form_data = {
                    _token: _token,
                    doctor_id: additional_id,
                    organization_name: $('#organization_name').val(),
                    position: $('#position').val(),
                    start_date: $('#start_date').val(),
                    end_date: $('#end_date').val(),
                    responsibilities: $('#responsibilities').val(),
                    special_achievements: $('#special_achievements').val(),
                    department: $('#department').val(),
                    leadership_roles: $('#leadership_roles').val(),
                    collaboration: $('#collaboration').val(),
                    notes: $('#notes').val(),
                };
    
                actions = 'update';
    
                break;

            case 'doctor_expertise':
                form_data = {
                    _token: _token,
                    doctor_id: additional_id,
                    specialization: $('#specialization').val(),
                    sub_specialty: $('#sub_specialty').val(),
                    clinical_focus: $('#clinical_focus').val(),
                    procedures_techniques: $('#procedures_techniques').val(),
                    certification: $('#certification').val(),
                    years_of_experience: $('#years_of_experience').val(),
                    key_professional_achievements: $('#key_professional_achievements').val(),
                    notes: $('#notes').val(),
                };
    
                actions = 'update';
    
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

function doctor_qualification_func() {

    modal_content = 'doctor_qualification';
    module_content = 'doctor_qualification';
    module_url = '/actions/' + module_content;
    actions = 'update';
    module_type = 'custom';

    additional_id = record_id;
    scion.centralized_button(false, true, true, true);


    if ($.fn.DataTable.isDataTable('#doctor_qualification_table')) {
        $('#doctor_qualification_table').DataTable().destroy();
    }

    scion.create.table(
        'doctor_qualification_table',
        module_url + '/get/' + record_id,
        [
            { data: "id", title:"<input type='checkbox' class='multi-checkbox' onclick='scion.table.checkAll()'/>", render: function(data, type, row, meta) {
                var html = "";
                html += '<input type="checkbox" class="single-checkbox" value="'+row.id+'" onclick="scion.table.checkOne()"/>';
                html += '<a href="#" class="align-middle edit" onclick="doctor_qualification_edit('+"'/actions/"+module_content+"/edit/', "+ row.id +')"><i class="fas fa-pen"></i></a>';
                return html;
            }},
            { data: "id", title: "ID" },
            { data: "degree", title: "DEGREE" },
            { data: "description", title: "DESCRIPTION" },
            { data: "institute", title: "INSTITUTE" },
            { data: "year", title: "YEAR" },
            { data: "notes", title: "NOTES" },
        ], 'Bfrtip', []
    );
    
}

function doctor_work_func() {

    modal_content = 'doctor_work';
    module_content = 'doctor_work';
    module_url = '/actions/' + module_content;
    actions = 'update';
    module_type = 'custom';

    additional_id = record_id;
    scion.centralized_button(false, true, true, true);


    if ($.fn.DataTable.isDataTable('#doctor_work_table')) {
        $('#doctor_work_table').DataTable().destroy();
    }

    scion.create.table(
        'doctor_work_table',
        module_url + '/get/' + record_id,
        [
            { data: "id", title:"<input type='checkbox' class='multi-checkbox' onclick='scion.table.checkAll()'/>", render: function(data, type, row, meta) {
                var html = "";
                html += '<input type="checkbox" class="single-checkbox" value="'+row.id+'" onclick="scion.table.checkOne()"/>';
                html += '<a href="#" class="align-middle edit" onclick="doctor_work_edit('+"'/actions/"+module_content+"/edit/', "+ row.id +')"><i class="fas fa-pen"></i></a>';
                return html;
            }},
            { data: "id", title: "ID" },
            { data: "organization_name", title: "ORGANIZATION" },
            { data: "position", title: "POSITION" },
            { data: "start_date", title: "START DATE" },
            { data: "end_date", title: "END DATE" },
            { data: "department", title: "NOTES" },
        ], 'Bfrtip', []
    );
    
}

function doctor_expertise_func() {

    modal_content = 'doctor_expertise';
    module_content = 'doctor_expertise';
    module_url = '/actions/' + module_content;
    actions = 'update';
    module_type = 'custom';

    additional_id = record_id;
    scion.centralized_button(false, true, true, true);


    if ($.fn.DataTable.isDataTable('#doctor_expertise_table')) {
        $('#doctor_expertise_table').DataTable().destroy();
    }

    scion.create.table(
        'doctor_expertise_table',
        module_url + '/get/' + record_id,
        [
            { data: "id", title:"<input type='checkbox' class='multi-checkbox' onclick='scion.table.checkAll()'/>", render: function(data, type, row, meta) {
                var html = "";
                html += '<input type="checkbox" class="single-checkbox" value="'+row.id+'" onclick="scion.table.checkOne()"/>';
                html += '<a href="#" class="align-middle edit" onclick="doctor_expertise_edit('+"'/actions/"+module_content+"/edit/', "+ row.id +')"><i class="fas fa-pen"></i></a>';
                return html;
            }},
            { data: "id", title: "ID" },
            { data: "specialization", title: "EXPERTISE/SPECIALIZATION" },
            { data: "years_of_experience", title: "YEARS OF EXPERIENCE" },

        ], 'Bfrtip', []
    );
    
}

// Edit Custom
function doctor_qualification_edit(url, id) {
    $.get(url+id, function(response){
        actions = 'update';
        
        scion.create.sc_modal(modal_content+"_form", "UPDATE " + page_title).show(modalShowFunction);

        $('#degree').val(response.doctor_qualification.degree);
        $('#description').val(response.doctor_qualification.description);
        $('#institute').val(response.doctor_qualification.institute);
        $('#year').val(response.doctor_qualification.year);
        $('#notes').val(response.doctor_qualification.notes);

        update_id = response.doctor_qualification.id;
    });
}

// Edit Custom
function doctor_work_edit(url, id) {
    $.get(url+id, function(response){
        actions = 'update';
        
        scion.create.sc_modal(modal_content+"_form", "UPDATE " + page_title).show(modalShowFunction);

        $('#organization_name').val(response.doctor_work.organization_name);
        $('#position').val(response.doctor_work.position);
        $('#start_date').val(response.doctor_work.start_date);
        $('#end_date').val(response.doctor_work.end_date);
        $('#responsibilities').val(response.doctor_work.responsibilities);
        $('#special_achievements').val(response.doctor_work.special_achievements);
        $('#department').val(response.doctor_work.department);
        $('#leadership_roles').val(response.doctor_work.leadership_roles);
        $('#collaboration').val(response.doctor_work.collaboration);
        $('#notes').val(response.doctor_work.notes);

        update_id = response.doctor_work.id;
    });
}

// Edit Custom
function doctor_expertise_edit(url, id) {
    $.get(url+id, function(response){
        actions = 'update';
        
        scion.create.sc_modal(modal_content+"_form", "UPDATE " + page_title).show(modalShowFunction);

        $('#specialization').val(response.doctor_expertise.specialization);
        $('#sub_specialty').val(response.doctor_expertise.sub_specialty);
        $('#clinical_focus').val(response.doctor_expertise.clinical_focus);
        $('#procedures_techniques').val(response.doctor_expertise.procedures_techniques);
        $('#certification').val(response.doctor_expertise.certification);
        $('#years_of_experience').val(response.doctor_expertise.years_of_experience);
        $('#key_professional_achievements').val(response.doctor_expertise.key_professional_achievements);
        $('#notes').val(response.doctor_expertise.notes);

        update_id = response.doctor_expertise.id;
    });
}

function modalShowFunction() {
    scion.centralized_button(true, false, true, true);
}

function modalHideFunction() {
    scion.centralized_button(false, true, true, true);
}