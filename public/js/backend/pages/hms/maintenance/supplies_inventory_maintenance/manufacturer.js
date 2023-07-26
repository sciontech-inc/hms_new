$(function() {

    project_type = 'app_module';
    modal_content = 'manufacturer';
    module_content = 'manufacturer';
    module_url = '/actions/' + modal_content;
    module_type = 'custom';
    page_title = "Manufacturer";
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
            { data: "manufacturer_code", title: "MANUFACTURER CODE" },
            { data: "manufacturer_name", title: "MANUFACTURER NAME" },
            { data: "email", title: "EMAIL" },
            { data: "contact_number_1", title: "CONTACT NUMBER" },

           
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
    $('#manufacturer_table').DataTable().draw();
    scion.create.sc_modal('manufacturer_form').hide('all', modalHideFunction)
}

function error() {}

function delete_success() {
    $('#manufacturer_table').DataTable().draw();
}

function delete_error() {}

function generateData() {
    form_data = {
        _token: _token,
        manufacturer_code: $('#manufacturer_code').val(),
        manufacturer_name: $('#manufacturer_name').val(),
        contact_person: $('#contact_person').val(),
        contact_number_1: $('#contact_number_1').val(),
        contact_number_2: $('#contact_number_2').val(),
        email: $('#email').val(),
        payment_terms: $('#payment_terms').val(),
        tax_information: $('#tax_information').val(),
        certification: $('#certification').val(),
        products: $('#products').val(),
        lead_time: $('#lead_time').val(),
        delivery_terms: $('#delivery_terms').val(),
        performance_metrics: $('#performance_metrics').val(),
        contracts: $('#contracts').val(),
        remarks: $('#remarks').val(),
        
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