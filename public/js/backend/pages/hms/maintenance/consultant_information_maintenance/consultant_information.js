$(function() {

    project_type = 'apps';
    modal_content = 'consultant_information_maintenance';
    module_content = 'consultant_information_maintenance';
    module_url = '/actions/' + modal_content;
    module_type = 'transaction_2';
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

                case 'consultant_category':
                    $('#consultant_category_table').DataTable().draw();
                    scion.create.sc_modal('consultant_category_form').hide('all', modalHideFunction)
                    break;

                case 'consultant_service_class':
                    $('#consultant_service_class_table').DataTable().draw();
                    scion.create.sc_modal('consultant_service_class_form').hide('all', modalHideFunction)
                    break;

                case 'consultant_specialization':
                    $('#consultant_specialization_table').DataTable().draw();
                    scion.create.sc_modal('consultant_specialization_form').hide('all', modalHideFunction)
                    break;

                case 'consultant_service_type':
                    $('#consultant_service_type_table').DataTable().draw();
                    scion.create.sc_modal('consultant_service_type_form').hide('all', modalHideFunction)
                    break;

                case 'consultant_class_code':
                    $('#consultant_class_code_table').DataTable().draw();
                    scion.create.sc_modal('consultant_class_code_form').hide('all', modalHideFunction)
                    break;

                case 'consultant_department':
                    $('#consultant_department_table').DataTable().draw();
                    scion.create.sc_modal('consultant_department_form').hide('all', modalHideFunction)
                    break;

                case 'ewt_tax_description':
                    $('#ewt_tax_description_table').DataTable().draw();
                    scion.create.sc_modal('ewt_tax_description_form').hide('all', modalHideFunction)
                    break;

                case 'consultant_vat_condition':
                    $('#consultant_vat_condition_table').DataTable().draw();
                    scion.create.sc_modal('consultant_vat_condition_form').hide('all', modalHideFunction)
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
                
                case 'consultant_category':
                    $('#consultant_category_table').DataTable().draw();
                    scion.create.sc_modal('consultant_category_form').hide('all', modalHideFunction)
                    break;

                case 'consultant_service_class':
                    $('#consultant_service_class_table').DataTable().draw();
                    scion.create.sc_modal('consultant_service_class_form').hide('all', modalHideFunction)
                    break;

                case 'consultant_specialization':
                    $('#consultant_specialization_table').DataTable().draw();
                    scion.create.sc_modal('consultant_specialization_form').hide('all', modalHideFunction)
                    break;

                case 'consultant_service_type':
                    $('#consultant_service_type_table').DataTable().draw();
                    scion.create.sc_modal('consultant_service_type_form').hide('all', modalHideFunction)
                    break;

                case 'consultant_class_code':
                    $('#consultant_class_code_table').DataTable().draw();
                    scion.create.sc_modal('consultant_class_code_form').hide('all', modalHideFunction)
                    break;
                    
                case 'consultant_department':
                    $('#consultant_department_table').DataTable().draw();
                    scion.create.sc_modal('consultant_department_form').hide('all', modalHideFunction)
                    break;

                case 'ewt_tax_description':
                    $('#ewt_tax_description_table').DataTable().draw();
                    scion.create.sc_modal('ewt_tax_description_form').hide('all', modalHideFunction)
                    break;

                case 'consultant_vat_condition':
                    $('#consultant_vat_condition_table').DataTable().draw();
                    scion.create.sc_modal('consultant_vat_condition_form').hide('all', modalHideFunction)
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
        
        case 'consultant_category':
            $('#consultant_category_table').DataTable().draw();
            actions = 'save';
            scion.centralized_button(true, false, true, true);

            break;

        case 'consultant_service_class':
            $('#consultant_service_class_table').DataTable().draw();
            actions = 'save';
            scion.centralized_button(true, false, true, true);

            break;

        case 'consultant_specialization':
            $('#consultant_specialization_table').DataTable().draw();
            actions = 'save';
            scion.centralized_button(true, false, true, true);

            break;

        case 'consultant_service_type':
            $('#consultant_service_type_table').DataTable().draw();
            actions = 'save';
            scion.centralized_button(true, false, true, true);

            break;

        case 'consultant_class_code':
            $('#consultant_class_code_table').DataTable().draw();
            actions = 'save';
            scion.centralized_button(true, false, true, true);

            break;

        case 'consultant_department':
            $('#consultant_department_table').DataTable().draw();
            actions = 'save';
            scion.centralized_button(true, false, true, true);

            break;

        case 'ewt_tax_description':
            $('#ewt_tax_description_table').DataTable().draw();
            actions = 'save';
            scion.centralized_button(true, false, true, true);

            break;

        case 'consultant_vat_condition':
            $('#consultant_vat_condition_table').DataTable().draw();
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

            case 'consultant_category':
                form_data = {
                    _token: _token,
                    code: $('#code').val(),
                    description: $('#description').val(),
                };
                break;

            case 'consultant_service_class':
                form_data = {
                    _token: _token,
                    code: $('#code').val(),
                    description: $('#description').val(),
                };
                break;

            case 'consultant_specialization':
                form_data = {
                    _token: _token,
                    code: $('#code').val(),
                    description: $('#description').val(),
                };
                break;

            case 'consultant_service_type':
                form_data = {
                    _token: _token,
                    code: $('#code').val(),
                    description: $('#description').val(),
                };
                break;

            case 'consultant_class_code':
                form_data = {
                    _token: _token,
                    code: $('#code').val(),
                    description: $('#description').val(),
                };
                break;

            case 'consultant_department':
                form_data = {
                    _token: _token,
                    code: $('#code').val(),
                    description: $('#description').val(),
                };
                break;

            case 'ewt_tax_description':
                form_data = {
                    _token: _token,
                    code: $('#code').val(),
                    description: $('#description').val(),
                };
                break;

            case 'consultant_vat_condition':
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

    modal_content = 'prc_license_type';
    module_content = 'prc_license_type';
    module_url = '/actions/' + modal_content;
    module_type = 'transaction_2';
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
    module_type = 'transaction_2';
    page_title = "PHIC Group";
    actions = 'save';

    scion.centralized_button(false, true, true, true);

    if ($.fn.DataTable.isDataTable('#phic_group_table')) {
        $('#phic_group_table').DataTable().destroy();
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


function consultant_category_func() {

    modal_content = 'consultant_category';
    module_content = 'consultant_category';
    module_url = '/actions/' + modal_content;
    module_type = 'transaction_2';
    page_title = "Category";
    actions = 'save';

    scion.centralized_button(false, true, true, true);

    if ($.fn.DataTable.isDataTable('#consultant_category_table')) {
        $('#consultant_category_table').DataTable().destroy();
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

function consultant_service_class_func() {

    modal_content = 'consultant_service_class';
    module_content = 'consultant_service_class';
    module_url = '/actions/' + modal_content;
    module_type = 'transaction_2';
    page_title = "Service Class";
    actions = 'save';

    scion.centralized_button(false, true, true, true);

    if ($.fn.DataTable.isDataTable('#consultant_service_class_table')) {
        $('#consultant_service_class_table').DataTable().destroy();
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

function consultant_specialization_func() {

    modal_content = 'consultant_specialization';
    module_content = 'consultant_specialization';
    module_url = '/actions/' + modal_content;
    module_type = 'custom';
    page_title = "Specialization";
    actions = 'save';

    scion.centralized_button(false, true, true, true);

    if ($.fn.DataTable.isDataTable('#consultant_specialization_table')) {
        $('#consultant_specialization_table').DataTable().destroy();
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

function consultant_service_type_func() {

    modal_content = 'consultant_service_type';
    module_content = 'consultant_service_type';
    module_url = '/actions/' + modal_content;
    module_type = 'custom';
    page_title = "Service Type";
    actions = 'save';

    scion.centralized_button(false, true, true, true);

    if ($.fn.DataTable.isDataTable('#consultant_service_type_table')) {
        $('#consultant_service_type_table').DataTable().destroy();
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

function consultant_class_code_func() {

    modal_content = 'consultant_class_code';
    module_content = 'consultant_class_code';
    module_url = '/actions/' + modal_content;
    module_type = 'custom';
    page_title = "Class Code";
    actions = 'save';

    scion.centralized_button(false, true, true, true);

    if ($.fn.DataTable.isDataTable('#consultant_class_code_table')) {
        $('#consultant_class_code_table').DataTable().destroy();
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

function consultant_department_func() {

    modal_content = 'consultant_department';
    module_content = 'consultant_department';
    module_url = '/actions/' + modal_content;
    module_type = 'custom';
    page_title = "Department";
    actions = 'save';

    scion.centralized_button(false, true, true, true);

    if ($.fn.DataTable.isDataTable('#consultant_department_table')) {
        $('#consultant_department_table').DataTable().destroy();
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

function ewt_tax_description_func() {

    modal_content = 'ewt_tax_description';
    module_content = 'ewt_tax_description';
    module_url = '/actions/' + modal_content;
    module_type = 'custom';
    page_title = "EWT Tax Description";
    actions = 'save';

    scion.centralized_button(false, true, true, true);

    if ($.fn.DataTable.isDataTable('#ewt_tax_description_table')) {
        $('#ewt_tax_description_table').DataTable().destroy();
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

function consultant_vat_condition_func() {

    modal_content = 'consultant_vat_condition';
    module_content = 'consultant_vat_condition';
    module_url = '/actions/' + modal_content;
    module_type = 'custom';
    page_title = "VAT Condition";
    actions = 'save';

    scion.centralized_button(false, true, true, true);

    if ($.fn.DataTable.isDataTable('#consultant_vat_condition_table')) {
        $('#consultant_vat_condition_table').DataTable().destroy();
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