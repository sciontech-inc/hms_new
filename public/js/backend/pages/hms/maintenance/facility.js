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
                case 'room':
                    room_reset();
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

                case 'room':
                    actions = 'save';
                    update_id = record_id;

                    room_reset();

                    $('#' + module_content + '_table').DataTable().draw();
                    
                    break;
            }
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

        case 'floor':
            $('#' + module_content + '_table').DataTable().draw();
            actions = 'save';
            scion.centralized_button(false, false, true, true);

            break;
            
        case 'room':
            $('#' + module_content + '_table').DataTable().draw();
            actions = 'save';
            scion.centralized_button(false, false, true, true);

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
        case 'room':
            form_data = {
                _token: _token,
                action: actions,
                building_id: record_id,
                floor_id: $('#floor_id').val(),
                room_no: $('#room_no').val(),
                room_type: $('#room_type').val(),
                room_name: $('#room_name').val(),
                capacity: $('#room_capacity').val(),
                occupancy_status: $('#occupancy_status').val(),
                availability_schedule: $('#availability_schedule').val(),
                room_features: $('#room_features').val(),
                room_size: $('#room_size').val(),
                room_condition: $('#room_condition').val(),
                room_usage_restriction: $('#room_usage_restriction').val(),
                room_service: $('#room_service').val(),
                room_notes: $('#room_notes').val(),
                room_accessibility: $('#room_accessibility').val(),
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

function room_func() {
    module_content = 'room';
    module_url = '/actions/' + module_content;
    module_type = 'transaction';
    update_id = record_id;

    actions = 'save';
    $('#name').prop('disabled', true);

    room_reset();

    scion.centralized_button(false, false, true, true);
    
    $.get('/actions/floor/list/' + record_id, function(response) {
        $("#floor_id").html('');
        $("#floor_id").append('<option></option>');
        $.each(response.data, function(i,v) {
            var o = new Option(v.floor_name, v.id);
            
            $(o).html(v.floor_name);
            $("#floor_id").append(o);
        });
    });

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
                html += '<a href="#" class="align-middle edit" onclick="room_edit('+"'"+module_url+"/edit/', "+ row.id + ' )"><i class="fas fa-pen"></i></a>';
                return html;
            }},
            { data: "room_name", title: "ROOM NAME" }
        ], 'rtip', []
    );
}

function bed_func() {
    module_content = 'bed';
    module_url = '/actions/' + module_content;
    module_type = 'transaction';
    update_id = record_id;

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
                html += '<a href="#" class="align-middle edit" onclick="room_edit('+"'"+module_url+"/edit/', "+ row.id + ' )"><i class="fas fa-pen"></i></a>';
                return html;
            }},
            { data: "bed_no", title: "BED NO." }
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

function room_edit(url, id) {
    $.get(url+id, function(response){
        actions = 'update';

        $('#room_no').val(response.room.room_no);
        $('#room_type').val(response.room.room_type);
        $('#room_name').val(response.room.room_name);
        $('#floor_id').val(response.room.floor_id);
        $('#room_capacity').val(response.room.capacity);
        $('#occupancy_status').val(response.room.occupancy_status);
        $('#availability_schedule').val(response.room.availability_schedule);
        $('#room_features').val(response.room.room_features);
        $('#room_size').val(response.room.room_size);
        $('#room_condition').val(response.room.room_condition);
        $('#room_usage_restriction').val(response.room.room_usage_restriction);
        $('#room_service').val(response.room.room_service);
        $('#room_notes').val(response.room.room_notes);
        $('#room_accessibility').val(response.room.room_accessibility);

        update_id = response.room.id;
    });
}

// Reset Custom
function floor_reset() {
    $('#floor_no').val('');
    $('#floor_name').val('');
    $('#capacity').val('');

    room_reset();
}

function room_reset() {
    $('.room_form input, .room_form select, .room_form textarea').val('')
}