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


});

function success() {
    switch(actions) {
        case 'save':
            switch(module_content){
                case 'building':
                    
                    record_id = record.id;
                    $('#id').val(record.id);
                    console.log(record);

                    actions = 'update';

                    scion.centralized_button(false, false, true, true);

                    $('.tab-list-menu-item ').removeAttr('disabled');

                    break;
                    
                case 'floor':
                    floor_reset();

                    $('#' + module_content + '_table').DataTable().draw();
                    
                    break;
            }
            break;
        case 'update':
            switch(module_content){
                case 'floor':
                    actions = 'save';
                    update_id = record_id;

                    floor_reset();

                    $('#' + module_content + '_table').DataTable().draw();
                    
                    break;
            }
            break;
            break;
    }
    $('#' + modal_content + '_table').DataTable().draw();
    scion.create.sc_modal(modal_content + '_form').hide('all', modalHideFunction);
}

function error() {}

function delete_success() {
    switch(module_content) {
        case 'building':
            var form_id = $('.form-record')[0].id;
            $('#'+form_id)[0].reset();
            actions = 'save';
            scion.centralized_button(true, false, true, true);

            break;
    }
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
        case 'floor':
            form_data = {
                _token: _token,
                action: actions,
                building_id: record_id,
                floor_no: $('#floor_no').val(),
                floor_name: $('#floor_name').val(),
                floor_plan: '',
                capacity: $('#capacity').val(),
            };

            break;
    }

    return form_data;
}

function generateDeleteItems(){
    switch(module_content) {
        case 'building':
            delete_data = [record_id];
            break;
    }
}

function modalShowFunction() {
    scion.centralized_button(true, false, true, true);
}

function modalHideFunction() {
    scion.centralized_button(false, true, true, true);
}

function customFunc() {}

// EXTRA FUNCTION
function building_func() {
    module_content = 'building';
    module_url = '/actions/' + module_content;
    module_type = 'transaction';
    update_id = record_id;
    
    floor_reset();

    if(record_id !== '') {
        actions = 'update';
    }

    if(actions == 'update') {
        scion.centralized_button(false, false, true, true);
    }
    else {
        scion.centralized_button(true, false, true, true);
    }
    $('#name').prop('disabled', false);
}

function floor_func() {
    module_content = 'floor';
    module_url = '/actions/' + module_content;
    module_type = 'transaction';
    update_id = record_id;
    
    floor_reset();

    actions = 'save';
    $('#name').prop('disabled', true);

    scion.centralized_button(false, false, true, true);

    if ($.fn.DataTable.isDataTable('#' + module_content + '_table')) {
        $('#' + module_content + '_table').DataTable().clear().destroy();
    }
    
    scion.create.table(
        module_content + '_table',  
        module_url + '/get/' + record_id, 
        [
            { data: "id", title:"<input type='checkbox' class='multi-checkbox' onclick='scion.table.checkAll()'/>", render: function(data, type, row, meta) {
                var html = "";
                html += '<input type="checkbox" class="single-checkbox" value="'+row.id+'" onclick="scion.table.checkOne()"/>';
                html += '<a href="#" class="align-middle edit" onclick="floor_edit('+"'"+module_url+"/edit/', "+ row.id + ' )"><i class="fas fa-pen"></i></a>';
                return html;
            }},
            { data: "floor_name", title: "FLOOR NAME" }
        ], 'rtip', []
    );
}


// Edit Custom
function floor_edit(url, id) {
    $.get(url+id, function(response){
        actions = 'update';
        $('#floor_no').val(response.floor.floor_no);
        $('#floor_name').val(response.floor.floor_name);
        $('#capacity').val(response.floor.capacity);
        update_id = response.floor.id;
    });
}

// Reset Custom
function floor_reset() {
    $('#floor_no').val('');
    $('#floor_name').val('');
    $('#capacity').val('');
}