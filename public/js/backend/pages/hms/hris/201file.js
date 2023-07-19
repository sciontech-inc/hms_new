var additional_id = null;
$(function() {

    project_type = 'apps';
    module_content = 'employee';
    modal_content = '201_file';
    module_url = '/actions/' + module_content;
    module_type = 'transaction';
    page_title = 'Employee';
    tab_active = 'general';
    actions = 'save';
    module_type = 'transaction';
    storage_url = '/hms/hris/employee' ;
    
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
            $('#employee_no').val(record.employee_no);

            actions = 'update';

            scion.centralized_button(false, false, false, true);

            $('.tab-list-menu-item ').removeAttr('disabled');

            break;

        case 'update':

            switch(module_content) {

                case 'employee_education':
                    $('#employee_education_table').DataTable().draw();
                    scion.create.sc_modal('employee_education_form').hide('all', modalHideFunction);

                    break;
                case 'employee_work':
                    $('#employee_work_table').DataTable().draw();
                    scion.create.sc_modal('employee_work_form').hide('all', modalHideFunction);

                    break;
                case 'employee_performance':
                    $('#employee_performance_table').DataTable().draw();
                    scion.create.sc_modal('employee_performance_form').hide('all', modalHideFunction);

                    break;
                case 'employee_movement':
                    $('#employee_movement_table').DataTable().draw();
                    scion.create.sc_modal('employee_movement_form').hide('all', modalHideFunction);

                    break;
                case 'employee_health':
                    $('#employee_health_table').DataTable().draw();
                    scion.create.sc_modal('employee_health_form').hide('all', modalHideFunction);

                    break;
                case 'employee_training':
                    $('#employee_training_table').DataTable().draw();
                    scion.create.sc_modal('employee_training_form').hide('all', modalHideFunction);

                    break;
                case 'employee_certification':
                    $('#employee_certification_table').DataTable().draw();
                    scion.create.sc_modal('employee_certification_form').hide('all', modalHideFunction);

                    break;
                case 'employee_dependent':
                    $('#employee_dependent_table').DataTable().draw();
                    scion.create.sc_modal('employee_dependent_form').hide('all', modalHideFunction);

                    break;
            }
            
            break;
    }
}

function error() {}

function delete_success() {

    switch(module_content) {
        case 'employee':

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

        case 'employee_education':
            $('#employee_education_table').DataTable().draw();
            actions = 'save';
            scion.centralized_button(true, false, true, true);

            break;
        case 'employee_work':
            $('#employee_work_table').DataTable().draw();
            actions = 'save';
            scion.centralized_button(true, false, true, true);

            break;
        case 'employee_performance':
            $('#employee_performance_table').DataTable().draw();
            actions = 'save';
            scion.centralized_button(true, false, true, true);

            break;
        case 'employee_movement':
            $('#employee_movement_table').DataTable().draw();
            actions = 'save';
            scion.centralized_button(true, false, true, true);

            break;
        case 'employee_health':
            $('#employee_health_table').DataTable().draw();
            actions = 'save';
            scion.centralized_button(true, false, true, true);

            break;
        case 'employee_training':
            $('#employee_training_table').DataTable().draw();
            actions = 'save';
            scion.centralized_button(true, false, true, true);

            break;
        case 'employee_certification':
            $('#employee_certification_table').DataTable().draw();
            actions = 'save';
            scion.centralized_button(true, false, true, true);

            break;
        case 'employee_dependent':
            $('#employee_dependent_table').DataTable().draw();
            actions = 'save';
            scion.centralized_button(true, false, true, true);

            break;


    }

}

function delete_error() {}

function generateData() {

    switch(module_content) {
        
        case 'employee':

            form_data = {
                _token: _token,
                firstname: $('#firstname').val(),
                middlename: $('#middlename').val(),
                lastname: $('#lastname').val(),
                suffix: $('#suffix').val(),
                birthdate: $('#birthdate').val(),
                sex: $('#sex').val(),
                citizenship: $('#citizenship').val(),
                contact_number_1: $('#contact_number_1').val(),
                contact_number_2: $('#contact_number_2').val(),
                email: $('#email').val(),
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
                marital_status: $('#marital_status').val(),
                spouse_name: $('#spouse_name').val(),
                job_title: $('#job_title').val(),
                supervisor: $('#supervisor').val(),
                work_location: $('#work_location').val(),
                work_email: $('#work_email').val(),
                work_telephone: $('#work_telephone').val(),
                work_mobile: $('#work_mobile').val(),
                start_date: $('#start_date').val(),
                emergency_contact_name: $('#emergency_contact_name').val(),
                emergency_contact_no: $('#emergency_contact_no').val(),
                bank_account: $('#bank_account').val(),
                tin: $('#tin').val(),
                sss: $('#sss').val(),
                pagibig: $('#pagibig').val(),
                philhealth: $('#philhealth').val(),
                notes: $('#notes').val(),
                status: $('#status').val(),
                profile_img: ($('#profile_img').val() !== ''?cropzeeGetImage('profile_img'):'')
                
            };

                break;

            case 'employee_education':
                form_data = {
                    _token: _token,
                    employee_no: additional_id,
                    educational_attainment: $('#educational_attainment').val(),
                    course: $('#course').val(),
                    school_year: $('#school_year').val(),
                    school: $('#school').val(),
                };
    
                actions = 'update';
    
                break;
            case 'employee_work':
                form_data = {
                    _token: _token,
                    employee_no: additional_id,
                    company: $('#company').val(),
                    position: $('#position').val(),
                    date_hired: $('#date_hired').val(),
                    date_of_resignation: $('#date_of_resignation').val(),
                    remarks: $('#remarks').val(),

                };
    
                actions = 'update';
    
                break;
            case 'employee_performance':
                form_data = {
                    _token: _token,
                    employee_no: additional_id,
                    evaluation_date: $('#evaluation_date').val(),
                    employee_position: $('#employee_position').val(),
                    evaluation_officer: $('#evaluation_officer').val(),
                    rating: $('#rating').val(),
                    approved_by: $('#approved_by').val(),
                    status: $('#status').val(),

                };
    
                actions = 'update';
    
                break;

            case 'employee_movement':
                form_data = {
                    _token: _token,
                    employee_no: additional_id,
                    filed_by: $('#filed_by').val(),
                    changes: $('#changes').val(),
                    effective_date: $('#effective_date').val(),
                    remarks: $('#remarks').val(),
                    approved_by: $('#approved_by').val(),
                    status: $('#status').val(),

                };
    
                actions = 'update';
    
                break;

            case 'employee_health':
                form_data = {
                    _token: _token,
                    employee_no: additional_id,
                    record_date: $('#record_date').val(),
                    record_description: $('#record_description').val(),
                    attending_physician: $('#attending_physician').val(),
                    diagnosis: $('#diagnosis').val(),
                    test_result: $('#test_result').val(),
                    record_note: $('#record_note').val(),

                };
    
                actions = 'update';
    
                break;

            case 'employee_training':
                form_data = {
                    _token: _token,
                    employee_no: additional_id,
                    training_no: $('#training_no').val(),
                    training_name: $('#training_name').val(),
                    training_provider: $('#training_provider').val(),
                    training_description: $('#training_description').val(),
                    training_date: $('#training_date').val(),
                    training_location: $('#training_location').val(),
                    training_duration: $('#training_duration').val(),
                    training_outcome: $('#training_outcome').val(),
                    training_type: $('#training_type').val(),
                    expiration_date: $('#expiration_date').val(),
                    recertification_date: $('#recertification_date').val(),

                };
    
                actions = 'update';
    
                break;

            case 'employee_certification':
                form_data = {
                    _token: _token,
                    employee_no: additional_id,
                    certification_no: $('#certification_no').val(),
                    certification_name: $('#certification_name').val(),
                    certification_authority: $('#certification_authority').val(),
                    certification_description: $('#certification_description').val(),
                    certification_date: $('#certification_date').val(),
                    certification_expiration_date: $('#certification_expiration_date').val(),
                    certification_level: $('#certification_level').val(),
                    certification_status: $('#certification_status').val(),
                    certification_achievements: $('#certification_achievements').val(),
                    certification_renewal_date: $('#certification_renewal_date').val(),
                    certification_recertification_date: $('#certification_recertification_date').val(),

                };
    
                actions = 'update';
    
                break;

            case 'employee_dependent':
                form_data = {
                    _token: _token,
                    employee_no: additional_id,
                    dependent_firstname: $('#dependent_firstname').val(),
                    dependent_middlename: $('#dependent_middlename').val(),
                    dependent_lastname: $('#dependent_lastname').val(),
                    dependent_birthdate: $('#dependent_birthdate').val(),
                    dependent_relationship: $('#dependent_relationship').val(),
                    dependent_sex: $('#dependent_sex').val(),
                    dependent_citizenship: $('#dependent_citizenship').val(),
                    dependent_address: $('#dependent_address').val(),
                    dependent_contact_no: $('#dependent_contact_no').val(),
                    dependent_email: $('#dependent_email').val(),
                    dependent_designation: $('#dependent_designation').val(),
                    dependent_notes: $('#dependent_notes').val(),

                };
    
                actions = 'update';
    
                break;
    }

    return form_data;
}

function generateDeleteItems() {
    switch(module_content) {
        case 'employee':
            delete_data = [record_id];
            break;
    }
}

// EXTRA FUNCTION
function general_func() {
    module_content = 'employee';
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

function employee_education_func() {

    modal_content = 'employee_education';
    module_content = 'employee_education';
    module_url = '/actions/' + module_content;
    actions = 'update';
    module_type = 'custom';

    additional_id = record_id;
    scion.centralized_button(false, true, true, true);


    if ($.fn.DataTable.isDataTable('#employee_education_table')) {
        $('#employee_education_table').DataTable().destroy();
    }

    scion.create.table(
        'employee_education_table',
        module_url + '/get/' + record_id,
        [
            { data: "id", title:"<input type='checkbox' class='multi-checkbox' onclick='scion.table.checkAll()'/>", render: function(data, type, row, meta) {
                var html = "";
                html += '<input type="checkbox" class="single-checkbox" value="'+row.id+'" onclick="scion.table.checkOne()"/>';
                html += '<a href="#" class="align-middle edit" onclick="employee_education_edit('+"'/actions/"+module_content+"/edit/', "+ row.id +')"><i class="fas fa-pen"></i></a>';
                return html;
            }},
            { data: "id", title: "ID" },
            { data: "educational_attainment", title: "EDUCATIONAL ATTAINMENT" },
            { data: "course", title: "COURSE" },
            { data: "school_year", title: "SCHOOL YEAR" },
            { data: "school", title: "SCHOOL" },
        ], 'Bfrtip', []
    );
    
}


function employee_work_func() {

    modal_content = 'employee_work';
    module_content = 'employee_work';
    module_url = '/actions/' + module_content;
    actions = 'update';
    module_type = 'custom';

    additional_id = record_id;
    scion.centralized_button(false, true, true, true);


    if ($.fn.DataTable.isDataTable('#employee_work_table')) {
        $('#employee_work_table').DataTable().destroy();
    }

    scion.create.table(
        'employee_work_table',
        module_url + '/get/' + record_id,
        [
            { data: "id", title:"<input type='checkbox' class='multi-checkbox' onclick='scion.table.checkAll()'/>", render: function(data, type, row, meta) {
                var html = "";
                html += '<input type="checkbox" class="single-checkbox" value="'+row.id+'" onclick="scion.table.checkOne()"/>';
                html += '<a href="#" class="align-middle edit" onclick="employee_work_edit('+"'/actions/"+module_content+"/edit/', "+ row.id +')"><i class="fas fa-pen"></i></a>';
                return html;
            }},
            { data: "id", title: "ID" },
            { data: "company", title: "COMPANY" },
            { data: "position", title: "POSITION" },
            { data: "date_hired", title: "DATE HIRED" },
            { data: "date_of_resignation", title: "DATE OF RESIGNATION" },
        ], 'Bfrtip', []
    );
    
}

function employee_performance_func() {

    modal_content = 'employee_performance';
    module_content = 'employee_performance';
    module_url = '/actions/' + module_content;
    actions = 'update';
    module_type = 'custom';

    additional_id = record_id;
    scion.centralized_button(false, true, true, true);


    if ($.fn.DataTable.isDataTable('#employee_performance_table')) {
        $('#employee_performance_table').DataTable().destroy();
    }

    scion.create.table(
        'employee_performance_table',
        module_url + '/get/' + record_id,
        [
            { data: "id", title:"<input type='checkbox' class='multi-checkbox' onclick='scion.table.checkAll()'/>", render: function(data, type, row, meta) {
                var html = "";
                html += '<input type="checkbox" class="single-checkbox" value="'+row.id+'" onclick="scion.table.checkOne()"/>';
                html += '<a href="#" class="align-middle edit" onclick="employee_performance_edit('+"'/actions/"+module_content+"/edit/', "+ row.id +')"><i class="fas fa-pen"></i></a>';
                return html;
            }},
            { data: "id", title: "ID" },
            { data: "evaluation_date", title: "EVALUATION DATE" },
            { data: "employee_position", title: "EMPLOYEE POSITION" },
            { data: "evaluation_officer", title: "EVALUATION OFFICER" },
            { data: "rating", title: "RATING" },
        ], 'Bfrtip', []
    );
    
}

function employee_movement_func() {

    modal_content = 'employee_movement';
    module_content = 'employee_movement';
    module_url = '/actions/' + module_content;
    actions = 'update';
    module_type = 'custom';

    additional_id = record_id;
    scion.centralized_button(false, true, true, true);


    if ($.fn.DataTable.isDataTable('#employee_movement_table')) {
        $('#employee_movement_table').DataTable().destroy();
    }

    scion.create.table(
        'employee_movement_table',
        module_url + '/get/' + record_id,
        [
            { data: "id", title:"<input type='checkbox' class='multi-checkbox' onclick='scion.table.checkAll()'/>", render: function(data, type, row, meta) {
                var html = "";
                html += '<input type="checkbox" class="single-checkbox" value="'+row.id+'" onclick="scion.table.checkOne()"/>';
                html += '<a href="#" class="align-middle edit" onclick="employee_movement_edit('+"'/actions/"+module_content+"/edit/', "+ row.id +')"><i class="fas fa-pen"></i></a>';
                return html;
            }},
            { data: "id", title: "ID" },
            { data: "filed_by", title: "FILED BY" },
            { data: "changes", title: "CHANGES" },
            { data: "effective_date", title: "EFFECTIVE DATE" },
        ], 'Bfrtip', []
    );
    
}

function employee_health_func() {

    modal_content = 'employee_health';
    module_content = 'employee_health';
    module_url = '/actions/' + module_content;
    actions = 'update';
    module_type = 'custom';

    additional_id = record_id;
    scion.centralized_button(false, true, true, true);


    if ($.fn.DataTable.isDataTable('#employee_health_table')) {
        $('#employee_health_table').DataTable().destroy();
    }

    scion.create.table(
        'employee_health_table',
        module_url + '/get/' + record_id,
        [
            { data: "id", title:"<input type='checkbox' class='multi-checkbox' onclick='scion.table.checkAll()'/>", render: function(data, type, row, meta) {
                var html = "";
                html += '<input type="checkbox" class="single-checkbox" value="'+row.id+'" onclick="scion.table.checkOne()"/>';
                html += '<a href="#" class="align-middle edit" onclick="employee_health_edit('+"'/actions/"+module_content+"/edit/', "+ row.id +')"><i class="fas fa-pen"></i></a>';
                return html;
            }},
            { data: "id", title: "ID" },
            { data: "record_date", title: "RECORD DATE" },
            { data: "record_description", title: "RECORD DESCRIPTION" },
            { data: "diagnosis", title: "DIAGNOSIS" },
            { data: "test_result", title: "TEST RESULT" },
        ], 'Bfrtip', []
    );
    
}

function employee_training_func() {

    modal_content = 'employee_training';
    module_content = 'employee_training';
    module_url = '/actions/' + module_content;
    actions = 'update';
    module_type = 'custom';

    additional_id = record_id;
    scion.centralized_button(false, true, true, true);


    if ($.fn.DataTable.isDataTable('#employee_training_table')) {
        $('#employee_training_table').DataTable().destroy();
    }

    scion.create.table(
        'employee_training_table',
        module_url + '/get/' + record_id,
        [
            { data: "id", title:"<input type='checkbox' class='multi-checkbox' onclick='scion.table.checkAll()'/>", render: function(data, type, row, meta) {
                var html = "";
                html += '<input type="checkbox" class="single-checkbox" value="'+row.id+'" onclick="scion.table.checkOne()"/>';
                html += '<a href="#" class="align-middle edit" onclick="employee_training_edit('+"'/actions/"+module_content+"/edit/', "+ row.id +')"><i class="fas fa-pen"></i></a>';
                return html;
            }},
            { data: "id", title: "ID" },
            { data: "training_name", title: "TRAINING NAME" },
            { data: "training_provider", title: "TRAINING PROVIDER" },
            { data: "training_date", title: "TRAINING DATE" },
            { data: "expiration_date", title: "EXPIRATION DATE" },
            { data: "recertification_date", title: "RECERTIFICATION DATE" },

        ], 'Bfrtip', []
    );
    
}

function employee_certification_func() {

    modal_content = 'employee_certification';
    module_content = 'employee_certification';
    module_url = '/actions/' + module_content;
    actions = 'update';
    module_type = 'custom';

    additional_id = record_id;
    scion.centralized_button(false, true, true, true);


    if ($.fn.DataTable.isDataTable('#employee_certification_table')) {
        $('#employee_certification_table').DataTable().destroy();
    }

    scion.create.table(
        'employee_certification_table',
        module_url + '/get/' + record_id,
        [
            { data: "id", title:"<input type='checkbox' class='multi-checkbox' onclick='scion.table.checkAll()'/>", render: function(data, type, row, meta) {
                var html = "";
                html += '<input type="checkbox" class="single-checkbox" value="'+row.id+'" onclick="scion.table.checkOne()"/>';
                html += '<a href="#" class="align-middle edit" onclick="employee_certification_edit('+"'/actions/"+module_content+"/edit/', "+ row.id +')"><i class="fas fa-pen"></i></a>';
                return html;
            }},
            { data: "id", title: "ID" },
            { data: "certification_name", title: "CERTIFICATION NAME" },
            { data: "certification_authority", title: "CERTIFICATION AUTHORITY" },
            { data: "certification_description", title: "DESCRIPTION" },
            { data: "certification_expiration_date", title: "EXPIRATION DATE" },
            { data: "certification_status", title: "STATUS" },
            { data: "certification_renewal_date", title: "RENEWAL DATE" },

        ], 'Bfrtip', []
    );
    
}

function employee_dependent_func() {

    modal_content = 'employee_dependent';
    module_content = 'employee_dependent';
    module_url = '/actions/' + module_content;
    actions = 'update';
    module_type = 'custom';

    additional_id = record_id;
    scion.centralized_button(false, true, true, true);


    if ($.fn.DataTable.isDataTable('#employee_dependent_table')) {
        $('#employee_dependent_table').DataTable().destroy();
    }

    scion.create.table(
        'employee_dependent_table',
        module_url + '/get/' + record_id,
        [
            { data: "id", title:"<input type='checkbox' class='multi-checkbox' onclick='scion.table.checkAll()'/>", render: function(data, type, row, meta) {
                var html = "";
                html += '<input type="checkbox" class="single-checkbox" value="'+row.id+'" onclick="scion.table.checkOne()"/>';
                html += '<a href="#" class="align-middle edit" onclick="employee_dependent_edit('+"'/actions/"+module_content+"/edit/', "+ row.id +')"><i class="fas fa-pen"></i></a>';
                return html;
            }},
            { data: "id", title: "ID" },
            { data: "dependent_firstname", title: "FIRST NAME" },
            { data: "dependent_lastname", title: "LAST NAME" },
            { data: "dependent_relationship", title: "RELATIONSHIP" },
            { data: "dependent_sex", title: "SEX" },
            { data: "dependent_designation", title: "DESIGNATION" },

        ], 'Bfrtip', []
    );
    
}

// Edit Custom
function employee_education_edit(url, id) {
    $.get(url+id, function(response){
        actions = 'update';
        
        scion.create.sc_modal(modal_content+"_form", "UPDATE " + page_title).show(modalShowFunction);

        $('#educational_attainment').val(response.employee_education.educational_attainment);
        $('#course').val(response.employee_education.course);
        $('#school_year').val(response.employee_education.school_year);
        $('#school').val(response.employee_education.school);

        update_id = response.employee_education.id;
    });
}


// Edit Custom
function employee_work_edit(url, id) {
    $.get(url+id, function(response){
        actions = 'update';
        
        scion.create.sc_modal(modal_content+"_form", "UPDATE " + page_title).show(modalShowFunction);

        $('#company').val(response.employee_work.company);
        $('#position').val(response.employee_work.position);
        $('#date_hired').val(response.employee_work.date_hired);
        $('#date_of_resignation').val(response.employee_work.date_of_resignation);
        $('#remarks').val(response.employee_work.remarks);

        update_id = response.employee_work.id;
    });
}


// Edit Custom
function employee_performance_edit(url, id) {
    $.get(url+id, function(response){
        actions = 'update';
        
        scion.create.sc_modal(modal_content+"_form", "UPDATE " + page_title).show(modalShowFunction);

        $('#evaluation_date').val(response.employee_performance.evaluation_date);
        $('#employee_position').val(response.employee_performance.employee_position);
        $('#evaluation_officer').val(response.employee_performance.evaluation_officer);
        $('#rating').val(response.employee_performance.rating);

        update_id = response.employee_performance.id;
    });
}

// Edit Custom
function employee_movement_edit(url, id) {
    $.get(url+id, function(response){
        actions = 'update';
        
        scion.create.sc_modal(modal_content+"_form", "UPDATE " + page_title).show(modalShowFunction);

        $('#filed_by').val(response.employee_movement.filed_by);
        $('#changes').val(response.employee_movement.changes);
        $('#effective_date').val(response.employee_movement.effective_date);
        $('#remarks').val(response.employee_movement.remarks);

        update_id = response.employee_movement.id;
    });
}

// Edit Custom
function employee_health_edit(url, id) {
    $.get(url+id, function(response){
        actions = 'update';
        
        scion.create.sc_modal(modal_content+"_form", "UPDATE " + page_title).show(modalShowFunction);

        $('#record_date').val(response.employee_health.record_date);
        $('#record_description').val(response.employee_health.record_description);
        $('#attending_physician').val(response.employee_health.attending_physician);
        $('#diagnosis').val(response.employee_health.diagnosis);
        $('#test_result').val(response.employee_health.test_result);
        $('#record_note').val(response.employee_health.record_note);

        update_id = response.employee_health.id;
    });
}

// Edit Custom
function employee_training_edit(url, id) {
    $.get(url+id, function(response){
        actions = 'update';
        
        scion.create.sc_modal(modal_content+"_form", "UPDATE " + page_title).show(modalShowFunction);

        $('#training_no').val(response.employee_training.training_no);
        $('#training_name').val(response.employee_training.training_name);
        $('#training_provider').val(response.employee_training.training_provider);
        $('#training_description').val(response.employee_training.training_description);
        $('#training_date').val(response.employee_training.training_date);
        $('#training_location').val(response.employee_training.training_location);
        $('#training_duration').val(response.employee_training.training_duration);
        $('#training_outcome').val(response.employee_training.training_outcome);
        $('#training_type').val(response.employee_training.training_type);
        $('#expiration_date').val(response.employee_training.expiration_date);
        $('#recertification_date').val(response.employee_training.recertification_date);

        update_id = response.employee_training.id;
    });
}

// Edit Custom
function employee_certification_edit(url, id) {
    $.get(url+id, function(response){
        actions = 'update';
        
        scion.create.sc_modal(modal_content+"_form", "UPDATE " + page_title).show(modalShowFunction);

        $('#certification_no').val(response.employee_certification.certification_no);
        $('#certification_name').val(response.employee_certification.certification_name);
        $('#certification_authority').val(response.employee_certification.certification_authority);
        $('#certification_description').val(response.employee_certification.certification_description);
        $('#certification_date').val(response.employee_certification.certification_date);
        $('#certification_expiration_date').val(response.employee_certification.certification_expiration_date);
        $('#certification_level').val(response.employee_certification.certification_level);
        $('#certification_status').val(response.employee_certification.certification_status);
        $('#certification_achievements').val(response.employee_certification.certification_achievements);
        $('#certification_renewal_date').val(response.employee_certification.certification_renewal_date);
        $('#certification_recertification_date').val(response.employee_certification.certification_recertification_date);

        update_id = response.employee_certification.id;
    });
}

// Edit Custom
function employee_dependent_edit(url, id) {
    $.get(url+id, function(response){
        actions = 'update';
        
        scion.create.sc_modal(modal_content+"_form", "UPDATE " + page_title).show(modalShowFunction);

        $('#dependent_firstname').val(response.employee_dependent.dependent_firstname);
        $('#dependent_middlename').val(response.employee_dependent.dependent_middlename);
        $('#dependent_lastname').val(response.employee_dependent.dependent_lastname);
        $('#dependent_birthdate').val(response.employee_dependent.dependent_birthdate);
        $('#dependent_relationship').val(response.employee_dependent.dependent_relationship);
        $('#dependent_sex').val(response.employee_dependent.dependent_sex);
        $('#dependent_citizenship').val(response.employee_dependent.dependent_citizenship);
        $('#dependent_address').val(response.employee_dependent.dependent_address);
        $('#dependent_contact_no').val(response.employee_dependent.dependent_contact_no);
        $('#dependent_email').val(response.employee_dependent.dependent_email);
        $('#dependent_designation').val(response.employee_dependent.dependent_designation);
        $('#dependent_notes').val(response.employee_dependent.dependent_notes);


        update_id = response.employee_dependent.id;
    });
}

function modalShowFunction() {
    scion.centralized_button(true, false, true, true);
}

function modalHideFunction() {
    scion.centralized_button(false, true, true, true);
}