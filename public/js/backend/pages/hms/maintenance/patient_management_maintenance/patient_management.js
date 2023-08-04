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

    }
}

function delete_error() {}

function generateData() {

    switch(module_content) {
        
            case 'allergies':
                form_data = {
                    _token: _token,
                    code: $('#code').val(),
                    description: $('#description').val(),
                };
                break;

            case 'service_type':
                form_data = {
                    _token: _token,
                    service_type: $('#service_type').val(),
                    service_description: $('#service_description').val(),
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
            { data: "code", title: "CODE" },
            { data: "description", title: "DESCRIPTION" },
          
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

function modalShowFunction() {
    scion.centralized_button(true, false, true, true);
}

function modalHideFunction() {
    scion.centralized_button(false, true, true, true);
}