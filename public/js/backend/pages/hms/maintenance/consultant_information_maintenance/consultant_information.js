$(function() {

    project_type = 'apps';
    modal_content = 'consultant_information_maintenance';
    module_content = 'consultant_information_maintenance';
    module_url = '/actions/' + modal_content;
    module_type = 'custom';
    page_title = "Consultant Information";
    actions = 'save';
    tab_active = 'prc_license_type';

    scion.centralized_button(false, true, true, true);

    scion.action.tab(tab_active);


});


function success() {
    switch(actions) {
        
        case 'save':

            switch(module_content) {

                case 'prc_license_type':
                    $('#prc_license_type_table').DataTable().draw();
                    scion.create.sc_modal('prc_license_type_form').hide('all', modalHideFunction)
                    break;

                case 'phic_group':
                    $('#phic_group_table').DataTable().draw();
                    scion.create.sc_modal('phic_group_form').hide('all', modalHideFunction)
                    break;

            }


            break;
        case 'update':

            switch(module_content) {

                case 'prc_license_type':
                    $('#prc_license_type_table').DataTable().draw();
                    scion.create.sc_modal('prc_license_type_form').hide('all', modalHideFunction)
                    break;

                case 'phic_group':
                    $('#phic_group_table').DataTable().draw();
                    scion.create.sc_modal('phic_group_form').hide('all', modalHideFunction)
                    break;

            }

            break;
    }

}


function error() {}

function delete_success() {

    switch(module_content) {

        case 'prc_license_type':
            $('#prc_license_type_table').DataTable().draw();
            actions = 'save';
            scion.centralized_button(true, false, true, true);

            break;

        case 'phic_group':
            $('#phic_group_table').DataTable().draw();
            actions = 'save';
            scion.centralized_button(true, false, true, true);

            break;

    }

}

function delete_error() {}

function generateData() {

    switch(module_content) {
        
            case 'prc_license_type':
                form_data = {
                    _token: _token,
                    code: $('#code').val(),
                    description: $('#description').val(),
                    
                };
                break;

            case 'phic_group':
                form_data = {
                    _token: _token,
                    code: $('#code').val(),
                    description: $('#description').val(),
                    
                };
                break;

    }

    return form_data;
}

function generateDeleteItems() {

}

function prc_license_type_func() {

    project_type = 'apps';
    modal_content = 'prc_license_type';
    module_content = 'prc_license_type';
    module_url = '/actions/' + modal_content;
    module_type = 'custom';
    page_title = "PRC License Type";
    actions = 'save';


    scion.centralized_button(false, true, true, true);


    if ($.fn.DataTable.isDataTable('#prc_license_type_table')) {
        $('#prc_license_type_table').DataTable().destroy();
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

function phic_group_func() {

    modal_content = 'phic_group';
    module_content = 'phic_group';
    module_url = '/actions/' + modal_content;
    module_type = 'custom';
    page_title = "PHIC Group";
    actions = 'save';


    scion.centralized_button(false, true, true, true);

    if ($.fn.DataTable.isDataTable('#phic_group_table')) {
        $('phic_group_table').DataTable().destroy();
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

function modalShowFunction() {
    scion.centralized_button(true, false, true, true);
}

function modalHideFunction() {
    scion.centralized_button(false, true, true, true);
}