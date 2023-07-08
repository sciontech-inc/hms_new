$(function() {
    
    project_type = 'apps';
    module_content = 'building';
    modal_content = 'facility';
    module_url = '/actions/' + module_content;
    module_type = 'transaction';
    page_title = 'BUILDING';
    tab_active = 'building';
    page_title = "";
    actions = 'save';
    module_type = 'transaction';
    
    scion.centralized_button(true, false, true, true);
    scion.action.tab(tab_active);

    scion.create.table(
        module_content + '_table',  
        module_url + '/get', 
        [
            { data: "id", title:"<input type='checkbox' class='multi-checkbox' onclick='scion.table.checkAll()'/>", render: function(data, type, row, meta) {
                var html = "";
                html += '<input type="checkbox" class="single-checkbox" value="'+row.id+'" onclick="scion.table.checkOne()"/>';
                html += '<a href="#" class="align-middle edit" onclick="scion.record.edit('+"'"+module_url+"/edit/', "+ row.id + ' )"><i class="fas fa-pen"></i></a>';
                return html;
            }},
            { data: "name", title: "BUILDING NAME" }
        ], 'Bfrtip', []
    );


});

function success() {
    switch(actions) {
        case 'save':
            record_id = record.id;
            $('#id').val(record.id);

            actions = 'update';

            scion.centralized_button(false, false, true, true);

            $('.tab-list-menu-item ').removeAttr('disabled');
            break;
        case 'update':
            break;
    }
    $('#' + modal_content + '_table').DataTable().draw();
    scion.create.sc_modal(modal_content + '_form').hide('all', modalHideFunction);
}

function error() {}

function delete_success() {
    $('#' + modal_content + '_table').DataTable().draw();
}

function delete_error() {}

function generateData() {
    switch(module_content) {
        case 'building':
            form_data = {
                _token: _token,
                name: $('#name').val(),
                address: $('#address').val(),
                country: $('#country').val(),
                city: $('#city').val(),
                province: $('#province').val(),
                postal_code: $('#postal_code').val(),
                contact_number: $('#contact_number').val(),
                email: $('#email').val(),
                construction_date: $('#construction_date').val(),
                architectural_style: $('#architectural_style').val(),
                total_area: $('#total_area').val(),
            };

            actions = 'update';

            break;
    }

    return form_data;
}

function generateDeleteItems(){}

function modalShowFunction() {
    scion.centralized_button(true, false, true, true);
}

function modalHideFunction() {
    scion.centralized_button(false, true, true, true);
}

function customFunc() {
    console.log('hello');
}

// EXTRA FUNCTION
function general_func() {
    module_content = 'patient';
    module_url = '/actions/' + modal_content;
    module_type = 'transaction';

    if(record_id !== '') {
        actions = 'update';
    }

    if(actions == 'update') {
        scion.centralized_button(false, false, true, true);
    }
    else {
        scion.centralized_button(true, false, true, true);

    }
}