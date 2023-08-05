$(function() {

    project_type = 'apps';
    modal_content = 'patient_management_maintenance';
    module_content = 'patient_management_maintenance';
    module_url = '/actions/' + modal_content;
    module_type = 'transaction_2';
    page_title = "Patient Management Maintenances";
    actions = 'save';
    tab_active = 'allergies';

    scion.centralized_button(false, true, true, true);

    scion.action.tab(tab_active);


});

function success() {
    switch(actions) {
        
        case 'save':

            switch(module_content) {

                case 'allergies':
                    $('#allergies_table').DataTable().draw();
                    scion.create.sc_modal('allergies_form').hide('all', modalHideFunction)
                    break;

                case 'service_type':
                    $('#service_type_table').DataTable().draw();
                    scion.create.sc_modal('service_type_form').hide('all', modalHideFunction)
                    break;

                case 'patient_industry':
                    $('#patient_industry_table').DataTable().draw();
                    scion.create.sc_modal('patient_industry_form').hide('all', modalHideFunction)
                    break;

                case 'patient_work_level':
                    $('#patient_work_level_table').DataTable().draw();
                    scion.create.sc_modal('patient_work_level_form').hide('all', modalHideFunction)
                    break;
            }

            break;

        case 'update':

            switch(module_content) {

                case 'allergies':
                    $('#allergies_table').DataTable().draw();
                    scion.create.sc_modal('allergies_form').hide('all', modalHideFunction)
                    break;

                case 'service_type':
                    $('#service_type_table').DataTable().draw();
                    scion.create.sc_modal('service_type_form').hide('all', modalHideFunction)
                    break;

                case 'patient_industry':
                    $('#patient_industry_table').DataTable().draw();
                    scion.create.sc_modal('patient_industry_form').hide('all', modalHideFunction)
                    break;

                case 'patient_work_level':
                    $('#patient_work_level_table').DataTable().draw();
                    scion.create.sc_modal('patient_work_level_form').hide('all', modalHideFunction)
                    break;
            }

            break;
    }
}

function error() {}

function delete_success() {

    switch(module_content) {

        case 'allergies':
            $('#allergies_table').DataTable().draw();
            actions = 'save';
            scion.centralized_button(true, false, true, true);

            break;

        case 'service_type':
            $('#service_type_table').DataTable().draw();
            actions = 'save';
            scion.centralized_button(true, false, true, true);

            break;

        case 'patient_industry':
            $('#patient_industry_table').DataTable().draw();
            actions = 'save';
            scion.centralized_button(true, false, true, true);

            break;

        case 'patient_work_level':
            $('#patient_work_level_table').DataTable().draw();
            actions = 'save';
            scion.centralized_button(true, false, true, true);

            break;

    }
}

function delete_error() {}

function generateData() {

    switch(module_content) {
        
            case 'allergies':
                form_data = {
                    _token: _token,
                    allergy_code: $('#allergy_code').val(),
                    allergy_description: $('#allergy_description').val(),
                };
                break;

            case 'service_type':
                form_data = {
                    _token: _token,
                    service_type: $('#service_type').val(),
                    service_description: $('#service_description').val(),
                };
                break;

            case 'patient_industry':
                form_data = {
                    _token: _token,
                    patient_industry_code: $('#patient_industry_code').val(),
                    patient_industry_description: $('#patient_industry_description').val(),
                };
                break;

            case 'patient_work_level':
                form_data = {
                    _token: _token,
                    patient_work_level_code: $('#patient_work_level_code').val(),
                    patient_work_level_description: $('#patient_work_level_description').val(),
                };
                break;

    }

    return form_data;
}

function generateDeleteItems() {

}

function allergies_func() {

    modal_content = 'allergies';
    module_content = 'allergies';
    module_url = '/actions/' + modal_content;
    module_type = 'tab_maintenance';
    page_title = "Allergies";
    actions = 'save';

    scion.centralized_button(false, true, true, true);

    if ($.fn.DataTable.isDataTable('#allergies_table')) {
        $('#allergies_table').DataTable().destroy();
    }

    scion.create.table(
        module_content + '_table',  
        module_url + '/get', 
        [
            { data: "id", title:"<input type='checkbox' class='multi-checkbox' onclick='scion.table.checkAll()'/>", render: function(data, type, row, meta) {
                var html = "";
                html += '<input type="checkbox" class="single-checkbox" value="'+row.id+'" onclick="scion.table.checkOne()"/>';
                html += '<a href="#" class="align-middle edit" onclick="scion.record.edit('+"'/actions/"+module_content+"/edit/', "+ row.id +')"><i class="fas fa-pen"></i></a>';
                return html;
            }},
            { data: "id", title: "ID" },
            { data: "allergy_code", title: "CODE" },
            { data: "allergy_description", title: "DESCRIPTION" },
          
        ], 'Bfrtip', []
    );

}

function service_type_func() {

    modal_content = 'service_type';
    module_content = 'service_type';
    module_url = '/actions/' + modal_content;
    module_type = 'tab_maintenance';
    page_title = "Service Type";
    actions = 'save';

    scion.centralized_button(false, true, true, true);

    if ($.fn.DataTable.isDataTable('#service_type_table')) {
        $('#service_type_table').DataTable().destroy();
    }

    scion.create.table(
        module_content + '_table',  
        module_url + '/get', 
        [
            { data: "id", title:"<input type='checkbox' class='multi-checkbox' onclick='scion.table.checkAll()'/>", render: function(data, type, row, meta) {
                var html = "";
                html += '<input type="checkbox" class="single-checkbox" value="'+row.id+'" onclick="scion.table.checkOne()"/>';
                html += '<a href="#" class="align-middle edit" onclick="scion.record.edit('+"'/actions/"+module_content+"/edit/', "+ row.id +')"><i class="fas fa-pen"></i></a>';
                return html;
            }},
            { data: "id", title: "ID" },
            { data: "service_type", title: "SERVICE TYPE" },
            { data: "service_description", title: "SERVICE DESCRIPTION" },
          
        ], 'Bfrtip', []
    );

}

function patient_industry_func() {

    modal_content = 'patient_industry';
    module_content = 'patient_industry';
    module_url = '/actions/' + modal_content;
    module_type = 'tab_maintenance';
    page_title = "Patient Industry";
    actions = 'save';

    scion.centralized_button(false, true, true, true);

    if ($.fn.DataTable.isDataTable('#patient_industry_table')) {
        $('#patient_industry_table').DataTable().destroy();
    }

    scion.create.table(
        module_content + '_table',  
        module_url + '/get', 
        [
            { data: "id", title:"<input type='checkbox' class='multi-checkbox' onclick='scion.table.checkAll()'/>", render: function(data, type, row, meta) {
                var html = "";
                html += '<input type="checkbox" class="single-checkbox" value="'+row.id+'" onclick="scion.table.checkOne()"/>';
                html += '<a href="#" class="align-middle edit" onclick="scion.record.edit('+"'/actions/"+module_content+"/edit/', "+ row.id +')"><i class="fas fa-pen"></i></a>';
                return html;
            }},
            { data: "id", title: "ID" },
            { data: "patient_industry_code", title: "CODE" },
            { data: "patient_industry_description", title: "DESCRIPTION" },
          
        ], 'Bfrtip', []
    );

}

function patient_work_level_func() {

    modal_content = 'patient_work_level';
    module_content = 'patient_work_level';
    module_url = '/actions/' + modal_content;
    module_type = 'tab_maintenance';
    page_title = "Patient Work Level";
    actions = 'save';

    scion.centralized_button(false, true, true, true);

    if ($.fn.DataTable.isDataTable('#patient_work_level_table')) {
        $('#patient_work_level_table').DataTable().destroy();
    }

    scion.create.table(
        module_content + '_table',  
        module_url + '/get', 
        [
            { data: "id", title:"<input type='checkbox' class='multi-checkbox' onclick='scion.table.checkAll()'/>", render: function(data, type, row, meta) {
                var html = "";
                html += '<input type="checkbox" class="single-checkbox" value="'+row.id+'" onclick="scion.table.checkOne()"/>';
                html += '<a href="#" class="align-middle edit" onclick="scion.record.edit('+"'/actions/"+module_content+"/edit/', "+ row.id +')"><i class="fas fa-pen"></i></a>';
                return html;
            }},
            { data: "id", title: "ID" },
            { data: "patient_work_level_code", title: "CODE" },
            { data: "patient_work_level_description", title: "DESCRIPTION" },
          
        ], 'Bfrtip', []
    );

}
function modalShowFunction() {
    scion.centralized_button(true, false, true, true);
}

function modalHideFunction() {
    scion.centralized_button(false, true, true, true);
}