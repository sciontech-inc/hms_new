
var active_id;
var actions;
let ranges = [];
let validateId = null;
$(function() {
    project_type = 'app_module';
    modal_content = 'lab_perform';
    module_url = '/actions/' + modal_content;
    module_content = 'lab_perform';
    module_type = 'custom';
    page_title = 'LABORATORT TEST';
    selected_print = 'iframe';

    scion.centralized_button(false, true, true, false);
    loadCategories();
   scion.create.table(
        modal_content + '_table',  
        module_url + '/noted/get', 
        [
            { data: "id", title:"<input type='checkbox' class='multi-checkbox' onclick='scion.table.checkAll()'/>", render: function(data, type, row, meta) {
                var html = "";
                html += '<input type="checkbox" class="single-checkbox" value="'+row.id+'" onclick="scion.table.checkOne()"/>';
                html += '<a class="align-middle edit" id="'+row.patient_id+'" onclick="scion.record.edit('+"'"+module_url+"/edit/', "+ row.id + ' )"><i class="fas fa-pen"></i></a>';
                html += '<a class="align-middle" onclick="labTestRecord('+row.id+' )"><i class="fas fa-list" style="color:gray"></i></a>';
                html += '<a class="align-middle" onclick="forRelease('+ row.id + ' )"><i class="fas fa-check"></i></a>';

                return html;
            }},
            { data: "patient_id", title: "PATIENT", render: function(data, type, row, meta) {
                html = row.patient.firstname + ' ' + row.patient.middlename + ' ' + row.patient.lastname;
                return html;
            }},
            { data: "transaction_number", title: "TRANSACTION NUMBER" },
            { data: "request_number", title: "REQUEST NUMBER" },
            { data: "physician_name", title: "PHYSICIAN NAME" },
            { data: "datetime_collected", title: "DATE/TIME COLLECTED" },
            { data: "datetime_released", title: "DATE/TIME RELEASED" },
            { data: "clinical_notes", title: "CLINICAL NOTES" },
            {
                data: "perform_by",
                title: "PERFORMED BY",
                render: function (data, type, row, meta) {
                    if (!row.performed_by) return '';
                    return `${row.performed_by.firstname} ${row.performed_by.middlename ?? ''} ${row.performed_by.lastname}`.trim();
                }
            },
            {
                data: "validated_by",
                title: "VALIDATED BY",
                render: function (data, type, row, meta) {
                    if (!row.validated_by) return '';
                    return `${row.validated_by.firstname} ${row.validated_by.middlename ?? ''} ${row.validated_by.lastname}`.trim();
                }
            },
            {
                data: "noted_by",
                title: "NOTED BY",
                render: function (data, type, row, meta) {
                    if (!row.noted_by) return '';
                    return `${row.noted_by.firstname} ${row.noted_by.middlename ?? ''} ${row.noted_by.lastname}`.trim();
                }
            },
            { data: "result_status", title: "RESULTS STATUS" },
        ], 'Bfrtip', []
    );


  $(document).on('click', '.edit', function() {
    let id = this.id; // better than using this.id for numeric IDs

    $.ajax({
        url: `/actions/patient/edit/${id}`,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            if (response) {
                displayLookupData(response.patient);
                actions = 'update';
            }
        },
        error: function(xhr) {
            alert('Failed to fetch patient data');
            console.error(xhr);
        }
    });
});

    $('#sub_category_id').on('change', function() {
        let subCategoryId = $(this).val();
        if (!subCategoryId) {
            ranges = [];
            $('#flag').val('');
            $('#result').val('').prop('disabled', true);
            return;
        }

        $('#result').prop('disabled', false);

        // Fetch ranges once
        $.getJSON(`/actions/sub_range/sub-ranges/${subCategoryId}`, function(data) {
            ranges = data;
            $('#flag').val(''); // reset flag
        });
    });

   $('#result').on('change', function() {
    let result = parseFloat($(this).val());
    let flag = '';

    if (isNaN(result) || ranges.length === 0) {
        $('#flag').val('');
        return;
    }

    ranges.forEach(function(range) {
        if (result >= parseFloat(range.low) && result <= parseFloat(range.high)) {
            flag = range.range_name; // correct column
        }
    });

    $('#flag').val(flag);
});

   $('#category_id').on('change', function () {
    let category_id = $(this).val();

    $('#sub_category_id')
        .prop('disabled', true)
        .html('<option value="">Loading...</option>');

    if (!category_id) {
        $('#sub_category_id')
            .prop('disabled', true)
            .html('<option value="">-- Select Sub Category --</option>');
        return;
    }

    $.ajax({
        url: `/actions/category_test/sub-categories/${category_id}`,
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            let options = '<option value="">-- Select Sub Category --</option>';

            $.each(response, function (index, sub) {
                options += `<option value="${sub.id}">
                                ${sub.test_name}
                            </option>`;
            });

            $('#sub_category_id')
                .html(options)
                .prop('disabled', false);
        },
        error: function () {
            alert('Failed to load sub categories');
        }
    });
});
    
});

function success() {
    switch(actions) {
        case 'save':
            switch(module_content){
                case 'category':
                    actions = 'update';
                break;
                case 'lab_test':
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
                case 'lab_test':
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
        case 'lab_perform':
            form_data = {
                _token: _token,
                patient_id: $('#patient_id_rec').val(),
                transaction_number: $('#transaction_number').val(),
                request_number: $('#request_number').val(),
                physician_name: $('#physician_name').val(),
                datetime_collected: $('#datetime_collected').val(),
                datetime_released: $('#datetime_released').val(),
                clinical_notes: $('#clinical_notes').val(),
            };
            break;
        case 'lab_test':
            form_data = {
                _token: _token,
                lab_test_id: active_id,
                category_id: $('#category_id').val(),
                sub_category_id: $('#sub_category_id').val(),
                result: $('#result').val(),
                flag: $('#flag').val(),
                remarks: $('#remarks').val(),
                status: $('#status').val(),
            };
            break;
    }

    return form_data;
}

function generateDeleteItems(){}

function labTestRecord(id) {
    active_id = id;
    modal_content = 'lab_test';
    module_content = 'lab_test';
    module_url = '/actions/' + modal_content;
    scion.create.sc_modal("lab_test_rec_form", "LABORATORY TEST").show(modalShowFunction);

    if ($.fn.DataTable.isDataTable('#lab_test_table')) {
        $('#lab_test_table').DataTable().clear().destroy();
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
           { data: "category_id", title: "CATEGORY TEST", render: function(data, type, row, meta) {
                html = row.category.category_name;
                return html;
            }},
            { data: "category_id", title: "LABORATORY TEST", render: function(data, type, row, meta) {
                html = row.sub_category.test_name;
                return html;
            }},
            { data: "category_id", title: "UNITS", render: function(data, type, row, meta) {
                html = row.sub_category.unit_of_measure;
                return html;
            }},
            { data: "result", title: "RESULT" },
            { data: "flag", title: "FLAGGED" },
            { data: "remarks", title: "REMARK" },
            { data: "status", title: "STATUS" },
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

function forRelease(id) {

    if (!confirm('Are you sure you want to mark this as NOTED?')) {
        return;
    }

    validateId = id;
    $('#validatePassword').val('');
    scion.create.sc_modal("validateModal", "SECURITY").show(modalShowFunction);
}

function submitValidation() {

    let password = $('#validatePassword').val();

    if (!password) {
        alert('Password is required');
        return;
    }

    $.ajax({
        url: `/actions/lab_perform/release/${validateId}`,
        type: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            password: password
        },
        success: function (response) {
            scion.create.sc_modal(modal_content + '_form').hide('all', modalHideFunction);
            alert(response.message);
            $('#dataTable').DataTable().ajax.reload(null, false);
        },
        error: function (xhr) {
            alert(xhr.responseJSON?.message || 'Validation failed');
        }
    });
}


function displayLookupData(data) {
    $('#name').val(data.firstname + " " + (data.middlename !== null?data.middlename+' ':'') + data.lastname + (data.suffix !== null?' '+data.suffix:''))
    $('#contact_no').val(data.contact_number_1);
    $('#patient_id').val(data.patient_id);
    $('#patient_id_rec').val(data.id);

    actions = 'save';
    record_id = null;
    scion.centralized_button(true, false, true, true);
}

function loadCategories() {
    $.ajax({
        url: "/actions/category_test/record",
        type: "GET",
        dataType: "json",
        success: function (response) {
            let options = '<option value="">-- Select Category --</option>';

            $.each(response.category, function (index, category) {
                options += `<option value="${category.id}">
                                ${category.category_name}
                            </option>`;
            });

            $('#category_id').html(options);
        },
        error: function () {
            alert('Failed to load categories');
        }
    });
}

function customFunc() {}
