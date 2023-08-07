var additional_id = null;
$(function() {

    project_type = 'app_module';
    module_content = 'check_up';
    modal_content = 'check_up';
    module_url = '/actions/' + modal_content;
    page_title = 'CHECK UP';
    tab_active = 'general';
    actions = 'save';
    module_type = 'custom';
    
    scion.centralized_button(false, true, true, true);
    scion.action.tab(tab_active);
    
    scion.create.table(
        modal_content + '_table',  
        module_url + '/get', 
        [
            { data: "patient.patient_id", title: "PATIENT ID" },
            { data: null, title: "PATIENT NAME", render:function(data, type, row, meta) {
                return row.patient.firstname + (row.patient.middlename !== null?" " + row.patient.middlename + " ":" ") + row.patient.lastname + (row.patient.suffix !== null?" " + row.patient.suffix:"");
            }},
            { data: null, title: "DATETME", render:function(data, type, row, meta) {
                return moment(row.datetime).format('MMM DD, YYYY hh:mm A');
            }},
        ], 'rti', []
    );
    
    $('body').delegate('#check_up_table tbody tr','dblclick', function () {
        var data = $('#check_up_table').DataTable().row(this).data();

        scion.action.tab('general');
        scion.record.edit('/actions/check_up/edit/', data.id);
        
        $('.tab-list-menu-item ').removeAttr('disabled');

        actions = 'update';

        $('#patient_id').val(data.patient.patient_id);
        $('#name').val(data.patient.firstname + " " + (data.patient.middlename !== null?data.patient.middlename+' ':'') + data.patient.lastname + (data.patient.suffix !== null?' '+data.patient.suffix:''))
        $('#contact_no').val(data.patient.contact_number_1);
    });

    syncData();

});


// DEFAULT FUNCTION
function success(record) {
    switch(actions) {
        case 'save':
            record_id = record.id;
            update_id = record.id;

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
        
    }

}

function delete_error() {}

function generateData() {

    switch(module_content) {
        case 'check_up':
            form_data = {
                _token: _token,
                patient_id: $('#id').val(),
                datetime: $('#datetime').val(),
                doctor_id: $('#doctor_id').val(),
                reason: $('#reason').val(),
                attachment: '',
                check_up_status: $('#check_up_status').val()
            };

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
    page_title = 'CHECK UP';
    module_content = 'check_up';
    modal_content = 'check_up';
    module_url = '/actions/' + module_content;
    module_type = 'custom';

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

function vitals_func() {

    page_title = 'VITALS';
    modal_content = 'vitals';
    module_content = 'vitals';
    module_url = '/actions/' + module_content;
    actions = 'save';
    module_type = 'custom';
    
    additional_id = record_id;

    scion.centralized_button(false, true, true, true);

    if ($.fn.DataTable.isDataTable('#vitals_table')) {
        $('#vitals_table').DataTable().destroy();
    }

    scion.create.table(
        'vitals_table',
        module_url + '/get',
        [
            { data: "id", title:"<input type='checkbox' class='multi-checkbox' onclick='scion.table.checkAll()'/>", render: function(data, type, row, meta) {
                var html = "";
                html += '<input type="checkbox" class="single-checkbox" value="'+row.id+'" onclick="scion.table.checkOne()"/>';
                html += '<a href="#" class="align-middle edit" onclick="social_history_edit('+"'/actions/"+module_content+"/edit/', "+ row.id +')"><i class="fas fa-pen"></i></a>';
                return html;
            }},
            { data: "id", title: "ID" },
            // { data: "sh_record", title: "RECORD" },
            // { data: "sh_category", title: "CATEGORY" },
            // { data: "sh_details", title: "DETAILS" },

        ], 'rti', []
    );
}

function medical_history_func() {

    page_title = 'MEDICAL HISTORY';
    modal_content = 'medical_history';
    module_content = 'medical_history';
    module_url = '/actions/' + module_content;
    actions = 'save';
    module_type = 'custom';
    
    additional_id = record_id;

    scion.centralized_button(false, true, true, true);

    if ($.fn.DataTable.isDataTable('#'+module_content+'_table')) {
        $('#'+module_content+'_table').DataTable().destroy();
    }

    scion.create.table(
        module_content+'_table',
        module_url + '/get',
        [
            { data: "id", title:"<input type='checkbox' class='multi-checkbox' onclick='scion.table.checkAll()'/>", render: function(data, type, row, meta) {
                var html = "";
                html += '<input type="checkbox" class="single-checkbox" value="'+row.id+'" onclick="scion.table.checkOne()"/>';
                html += '<a href="#" class="align-middle edit" onclick="social_history_edit('+"'/actions/"+module_content+"/edit/', "+ row.id +')"><i class="fas fa-pen"></i></a>';
                return html;
            }},
            { data: "id", title: "ID" },
            // { data: "sh_record", title: "RECORD" },
            // { data: "sh_category", title: "CATEGORY" },
            // { data: "sh_details", title: "DETAILS" },

        ], 'rti', []
    );
}

function physical_examination_func() {

    page_title = 'PHYSICAL EXAMINATION';
    modal_content = 'physical_examination';
    module_content = 'physical_examination';
    module_url = '/actions/' + module_content;
    actions = 'save';
    module_type = 'custom';
    
    additional_id = record_id;

    scion.centralized_button(false, true, true, true);

    if ($.fn.DataTable.isDataTable('#'+module_content+'_table')) {
        $('#'+module_content+'_table').DataTable().destroy();
    }

    scion.create.table(
        module_content+'_table',
        module_url + '/get',
        [
            { data: "id", title:"<input type='checkbox' class='multi-checkbox' onclick='scion.table.checkAll()'/>", render: function(data, type, row, meta) {
                var html = "";
                html += '<input type="checkbox" class="single-checkbox" value="'+row.id+'" onclick="scion.table.checkOne()"/>';
                html += '<a href="#" class="align-middle edit" onclick="social_history_edit('+"'/actions/"+module_content+"/edit/', "+ row.id +')"><i class="fas fa-pen"></i></a>';
                return html;
            }},
            { data: "id", title: "ID" },

        ], 'rti', []
    );
}

function laboratory_test_func() {

    page_title = 'LABORATORY TEST';
    modal_content = 'laboratory_test';
    module_content = 'laboratory_test';
    module_url = '/actions/' + module_content;
    actions = 'save';
    module_type = 'custom';
    
    additional_id = record_id;

    scion.centralized_button(false, true, true, true);

    if ($.fn.DataTable.isDataTable('#'+module_content+'_table')) {
        $('#'+module_content+'_table').DataTable().destroy();
    }

    scion.create.table(
        module_content+'_table',
        module_url + '/get',
        [
            { data: "id", title:"<input type='checkbox' class='multi-checkbox' onclick='scion.table.checkAll()'/>", render: function(data, type, row, meta) {
                var html = "";
                html += '<input type="checkbox" class="single-checkbox" value="'+row.id+'" onclick="scion.table.checkOne()"/>';
                html += '<a href="#" class="align-middle edit" onclick="social_history_edit('+"'/actions/"+module_content+"/edit/', "+ row.id +')"><i class="fas fa-pen"></i></a>';
                return html;
            }},
            { data: "id", title: "ID" },

        ], 'rti', []
    );
}

function medication_func() {

    page_title = 'MEDICATION';
    modal_content = 'medication';
    module_content = 'medication';
    module_url = '/actions/' + module_content;
    actions = 'save';
    module_type = 'custom';
    
    additional_id = record_id;

    scion.centralized_button(false, true, true, true);

    if ($.fn.DataTable.isDataTable('#'+module_content+'_table')) {
        $('#'+module_content+'_table').DataTable().destroy();
    }

    scion.create.table(
        module_content+'_table',
        module_url + '/get',
        [
            { data: "id", title:"<input type='checkbox' class='multi-checkbox' onclick='scion.table.checkAll()'/>", render: function(data, type, row, meta) {
                var html = "";
                html += '<input type="checkbox" class="single-checkbox" value="'+row.id+'" onclick="scion.table.checkOne()"/>';
                html += '<a href="#" class="align-middle edit" onclick="social_history_edit('+"'/actions/"+module_content+"/edit/', "+ row.id +')"><i class="fas fa-pen"></i></a>';
                return html;
            }},
            { data: "id", title: "ID" },

        ], 'rti', []
    );
}

function modalShowFunction() {
    scion.centralized_button(true, false, true, true);
}

function modalHideFunction() {
    scion.centralized_button(false, true, true, true);
    $('.tab-list-menu-item ').removeAttr('disabled');
    
}

function displayLookupData(data) {
    $('#name').val(data.firstname + " " + (data.middlename !== null?data.middlename+' ':'') + data.lastname + (data.suffix !== null?' '+data.suffix:''))
    $('#contact_no').val(data.contact_number_1);
    $('#patient_id').val(data.patient_id);
    $('#id').val(data.id);

    actions = 'save';
    record_id = null;
    scion.centralized_button(true, false, true, true);
}


function syncData() {
    $.get('/actions/doctor/list/all', function(response) {
        $.each(response.data, function(i,v) {
            var o = new Option("DR. " + v.firstname + " " + (v.middlename !== null? v.middlename + " ":'') + v.lastname + (v.suffix !== null? " " + v.suffix:''), v.id);
            
            $(o).html("DR. " + v.firstname + " " + (v.middlename !== null? v.middlename + " ":'') + v.lastname + (v.suffix !== null? " " + v.suffix:''));
            $("#doctor_id").append(o);
        });
    });
}

function customFunc() {
    page_title = 'CHECK UP';
    module_content = 'check_up';
    modal_content = 'check_up';
    module_url = '/actions/' + module_content;
    module_type = 'custom';
    tab_active = 'general';
    scion.action.tab(tab_active);
}