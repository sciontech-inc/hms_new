$(function() {

    project_type = 'apps';
    modal_content = 'hmo_guarantor';
    module_content = 'hmo_guarantor';
    module_url = '/actions/' + modal_content;
    module_type = 'custom';
    page_title = "HMOs/Guarantor";
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
            { data: "code", title: "CODE" },
            { data: "guarantor_name", title: "GUARANTOR NAME" },
            { data: "email", title: "EMAIL" },
            { data: "contact_no", title: "CONTACT NUMBER" },

           
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
    $('#hmo_guarantor_table').DataTable().draw();
    scion.create.sc_modal('hmo_guarantor_form').hide('all', modalHideFunction)
}

function error() {}

function delete_success() {
    $('#hmo_guarantor_table').DataTable().draw();
}

function delete_error() {}

function generateData() {
    form_data = {
        _token: _token,
        code: $('#code').val(),
        guarantor_name: $('#guarantor_name').val(),
        telephone: $('#telephone').val(),
        fax_no: $('#fax_no').val(),
        contact_no: $('#contact_no').val(),
        email: $('#email').val(),
        address: $('#address').val(),
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