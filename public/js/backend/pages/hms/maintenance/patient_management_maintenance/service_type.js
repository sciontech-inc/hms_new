$(function() {

    project_type = 'app_module';
    modal_content = 'service_type';
    module_content = 'service_type';
    module_url = '/actions/' + modal_content;
    module_type = 'custom';
    page_title = "Service Type";
    actions = 'save';

    scion.centralized_button(false, true, true, true);

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

});

function success() {
    switch(actions) {
        case 'save':
            break;
        case 'update':
            break;
    }
    $('#service_type_table').DataTable().draw();
    scion.create.sc_modal('service_type_form').hide('all', modalHideFunction)
}

function error() {}

function delete_success() {
    $('#service_type_table').DataTable().draw();
}

function delete_error() {}

function generateData() {
    form_data = {
        _token: _token,
        service_type: $('#service_type').val(),
        service_description: $('#service_description').val(),
        
    };

    return form_data;
}

function generateDeleteItems(){}


function modalShowFunction() {
    scion.centralized_button(true, false, true, true);
}

function modalHideFunction() {
    scion.centralized_button(false, true, true, true);
}