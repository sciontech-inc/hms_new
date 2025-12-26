
var active_id;
var actions;

$(function() {
    project_type = 'app_module';
    modal_content = 'category_test';
    module_url = '/actions/' + modal_content;
    module_content = 'category';
    module_type = 'custom';
    page_title = 'CATEGORY TEST';

    scion.centralized_button(false, true, true, true);
    
    scion.create.table(
        modal_content + '_table',  
        module_url + '/get', 
        [
            { data: "id", title:"<input type='checkbox' class='multi-checkbox' onclick='scion.table.checkAll()'/>", render: function(data, type, row, meta) {
                var html = "";
                html += '<input type="checkbox" class="single-checkbox" value="'+row.id+'" onclick="scion.table.checkOne()"/>';
                html += '<a href="#" class="align-middle edit" onclick="scion.record.edit('+"'"+module_url+"/edit/', "+ row.id + ' )"><i class="fas fa-pen"></i></a>';
                html += '<a href="#" class="align-middle" onclick="subCategory('+row.id+' )"><i class="fas fa-list" style="color:gray"></i></a>';
                return html;
            }},
            { data: "code", title: "CODE" },
            { data: "category_name", title: "CATEGORY NAME" },
            { data: "description", title: "DESCRIPTION" },
        ], 'Bfrtip', []
    );
});

function success() {
    switch(actions) {
        case 'save':
            switch(module_content){
                case 'category':
                    actions = 'update';
                break;
                case 'sub_category':
                    actions = 'update';
                break;
                case 'sub_range':
                    actions = 'update';
                break;
            }
            break;
        case 'update':
            switch(module_content){
                case 'category':
                    actions = 'save';
                    update_id = record_id;
                break;
                case 'sub_category':
                    actions = 'save';
                    update_id = record_id;
                break;
                case 'sub_range':
                    actions = 'save';
                    update_id = record_id;
                break;
            }
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
        case 'category':
            form_data = {
                _token: _token,
                code: $('#code').val(),
                category_name: $('#category_name').val(),
                description: $('#description').val(),
            };
            break;
        case 'sub_category':
            form_data = {
                _token: _token,
                sub_code:$('#sub_code').val(),
                test_name: $('#test_name').val(),
                category_id: active_id,
                unit_of_measure: $('#unit_of_measure').val(),
            };
            break;
        case 'sub_range':
            form_data = {
                _token: _token,
                range_code:$('#range_code').val(),
                range_name: $('#range_name').val(),
                sub_category_id: active_id,
                low: $('#low').val(),
                high: $('#high').val(),
            };
            break;
    }

    return form_data;
}

function generateDeleteItems(){}

function subCategory(id) {
    active_id = id;
    modal_content = 'sub_category';
    module_content = 'sub_category';
    module_url = '/actions/' + modal_content;
    scion.create.sc_modal("sub_category", "SUB CATEGORY").show(modalShowFunction);

    if ($.fn.DataTable.isDataTable('#sub_category_table')) {
        $('#sub_category_table').DataTable().clear().destroy();
    }

    scion.create.table(
        modal_content + '_table',  
        module_url + '/get/' + id, 
        [
            { data: "id", title:"<input type='checkbox' class='multi-checkbox' onclick='scion.table.checkAll()'/>", render: function(data, type, row, meta) {
                var html = "";
                html += '<input type="checkbox" class="single-checkbox" value="'+row.id+'" onclick="scion.table.checkOne()"/>';
                html += '<a href="#" class="align-middle edit" onclick="scion.record.edit('+"'"+module_url+"/edit/', "+ row.id + ' )"><i class="fas fa-pen"></i></a>';
                html += '<a href="#" class="align-middle" onclick="subRange('+row.id+' )"><i class="fas fa-list" style="color:gray"></i></a>';
                return html;
            }},
            { data: "sub_code", title: "CODE" },
            { data: "test_name", title: "TEST NAME" },
            { data: "category_id", title:"CATEGORY", render: function(data, type, row, meta) {
                var html = row.category.category_name;
                return html;
            }},
            { data: "unit_of_measure", title: "UNIT OF MEASURE" },
        ], 'Bfrtip', []
    );

    scion.centralized_button(false, true, true, true);
}

function subRange(id) {
    active_id = id;
    modal_content = 'sub_range';
    module_content = 'sub_range';
    module_url = '/actions/' + modal_content;
    scion.create.sc_modal("sub_range", "SUB CATEGORY RANGE").show(modalShowFunction);

    if ($.fn.DataTable.isDataTable('#sub_range_table')) {
        $('#sub_range_table').DataTable().clear().destroy();
    }

    scion.create.table(
        modal_content + '_table',  
        module_url + '/get/' + id, 
        [
            { data: "id", title:"<input type='checkbox' class='multi-checkbox' onclick='scion.table.checkAll()'/>", render: function(data, type, row, meta) {
                var html = "";
                html += '<input type="checkbox" class="single-checkbox" value="'+row.id+'" onclick="scion.table.checkOne()"/>';
                html += '<a href="#" class="align-middle edit" onclick="scion.record.edit('+"'"+module_url+"/edit/', "+ row.id + ' )"><i class="fas fa-pen"></i></a>';
                return html;
            }},
            { data: "range_code", title: "CODE" },
            { data: "range_name", title: "TEST NAME" },
            { data: "low", title: "LOW" },
            { data: "high", title: "HIGH" },
        ], 'Bfrtip', []
    );

    scion.centralized_button(false, true, true, true);
}

function modalShowFunction() {
    scion.centralized_button(true, false, true, true);
}

function modalHideFunction() {
    scion.centralized_button(false, true, true, true);
}

function customFunc() {}
