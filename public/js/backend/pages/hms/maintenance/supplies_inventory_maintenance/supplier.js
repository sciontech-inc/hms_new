$(function() {

    project_type = 'app_module';
    modal_content = 'supplier';
    module_content = 'supplier';
    module_url = '/actions/' + modal_content;
    module_type = 'custom';
    page_title = "Supplier";
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
            { data: "supplier_code", title: "SUPPLIER CODE" },
            { data: "supplier_name", title: "SUPPLIER NAME" },
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
    $('#supplier_table').DataTable().draw();
    scion.create.sc_modal('supplier_form').hide('all', modalHideFunction)
}

function error() {}

function delete_success() {
    $('#supplier_table').DataTable().draw();
}

function delete_error() {}

function generateData() {
    form_data = {
        
        _token: _token,
        supplier_code: $('#supplier_code').val(),
        supplier_name: $('#supplier_name').val(),
        contact_person: $('#contact_person').val(),
        address: $('#address').val(),
        contact_number_1: $('#contact_number_1').val(),
        contact_number_2: $('#contact_number_2').val(),
        email: $('#email').val(),
        terms_agreement: $('#terms_agreement').val(),
        pricing_agreement: $('#pricing_agreement').val(),
        delivery_terms: $('#delivery_terms').val(),
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