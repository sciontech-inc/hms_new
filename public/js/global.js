
var delete_data = [];
var record_id = null;
var update_id = null;
var modal_content = null;
var module_content = null;
var module_url = null;
var module_type = null;
var project_type = null;
var actions = null;
var _token = $('meta[name="csrf-token"]').attr('content');
var additional_id = null;

var form_data = {};
var tab_active = null;
var lookup_type = '';

var selected_data = {};
var selected_dataProxy = null;
var selected_print = null;

toastr.options.positionClass = 'toast-bottom-right';

var scion = {
    record: {
        new() {
            record_id = null;
            
            if(module_type === "custom") {
                
                $('.form-record')[0].reset();
                scion.create.sc_modal(modal_content+"_form", page_title).show(modalShowFunction);

                record_id = additional_id;
            }
            else if(module_type === "transaction") {

                record_length = $('.form-record').length - 1;
                
                scion.centralized_button(true, false, true, true);
                actions = 'save';
                $('.form-record')[record_length].reset();

                $('.tab-list-menu-item ').attr("disabled", 'disabled');

                if($('.image-previewer').length !== 0) {
                    $('.image-previewer').attr('src', '/images' + storage_url + '/default.png');
                }
            }
            if(module_type === "transaction_2") {
                $('.form-record')[0].reset();
                scion.create.sc_modal(modal_content+"_form", page_title).show(modalShowFunction);
            }
            else if(module_type === "settings") {
                scion.create.modal('NEW RECORD', 'form').show();
            }
            
            actions = 'save';
            
            if(typeof(customFunc) != "undefined"){
                customFunc();
            }
        },
        save(generateData, success, error) {
            $('.error-message').remove();
            if(actions === 'save') {
                $.post(module_url+'/'+actions, generateData())
                .done(function(response) {
                    if(typeof(success) != "undefined"){
                        success(response.last_record);
                    }
                    toastr.success('Record Saved!');
                    
                    if(module_type === "maintenance") {
                        scion.create.modal().hide();
                    }
                    else if(module_type === "transaction") {
                        scion.centralized_button(false, false, false, true);
                    }

                    form_data = {};
                })
                .fail(function(response) {
                    for (var field in response.responseJSON.errors) {
                        $('#'+field+"_error_message").remove();
                        $('.'+field).append('<span id="'+field+'_error_message" class="error-message">'+response.responseJSON.errors[field][0]+'</span>');
                    }
                    if(typeof(error) != "undefined"){
                        error();
                    }
                    toastr.error(response.responseJSON.message);
                });
            }
            else {
                $.post(module_url+'/'+actions+"/"+update_id, generateData())
                .done(function(response) {
                    if(typeof(success) != "undefined"){
                        success();
                    }
                    toastr.success('Record Saved!');

                    if(module_type === "maintenance") {
                        scion.create.modal().hide();
                    }
                    else if(module_type === "transaction") {
                        scion.centralized_button(false, false, false, true);
                    }
                    
                    form_data = {};
                })
                .fail(function(response) {
                    for (var field in response.responseJSON.errors) {
                        $('#'+field+"_error_message").remove();
                        $('.'+field).append('<span id="'+field+'_error_message" class="error-message">'+response.responseJSON.errors[field][0]+'</span>');
                    }
                    if(typeof(error) != "undefined"){
                        error();
                    }
                    toastr.error(response.responseJSON.message);
                });
            }
        },
        edit(url, id) {
            
            var form_id = $('.form-record')[0].id;
            actions = 'update';

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url + id,
                method: 'get',
                data: {},
                success: function(data) {
                    record_id = id;
                    update_id = id;

                    if(lookup_type !== "sub" ) {
                        $.each(data, function() {
                            $.each(this, function(k, v) {
                                
                                if($('#'+k).length !== 0) {
                                    if($('#'+k)[0].type === 'checkbox') {
                                        $('#'+k).prop('checked', v === 1?true:false);
                                    }
                                    else if($('#'+k)[0].type === 'file') {
                                        $('.image-previewer').attr('src', '/images'+storage_url+'/'+v+'');
                                    }
                                    else if($('#'+k)[0].type === 'fieldset') {
                                        var val = v;
                                        var key = k;
                                        $.each($('.custom-modal #'+k+' input'), (k,v)=>{
                                            $('#'+v.id)[0].checked = $('#'+v.id).val() == val?true:false;
                                        });
                                    }
                                    else if($('#'+k)[0].type === 'select-one') {
                                        $('#'+k).val(v).change();
                                    }
                                    else {
                                        $('#'+k).val(v);

                                           // Custom code
                                           if(k === 'patient_id') {
                                            $('#barcode').attr('src', 'https://api.qrserver.com/v1/create-qr-code/?data=' + v + '&amp;size=50x50');
                                        }

                                    }
                                }
                                else {
                                    if(typeof v === 'object' && v !== null) {
                                        $.each(v, function(k, v) {
                                            if($('#'+k).length !== 0) {
                                                if($('#'+k)[0].type === 'checkbox') {
                                                    $('#'+k).prop('checked', v === 1?true:false);
                                                }
                                                else if($('#'+k)[0].type === 'file') {
                                                    $('.image-previewer').attr('src', '/images'+storage_url+'/'+v+'');
                                                }
                                                else if($('#'+k)[0].type === 'select-one') {
                                                    $('#'+k).val(v).change();
                                                }
                                                else {
                                                    $('#'+k).val(v);

                                                }
                                            }
                                        });
                                    }
                                }
                            });
                        });
                    }
                    else {
                        $('#'+form_id)[0].reset();
                        selected_data = data;
                        selected_dataProxy = new Proxy(selected_data, {
                            get: (o, property) => {
                                $('#' + property + '_no').val(o[property][property+"_no"]);
                                subFunction(property);
                            },
                            set: (o, property, value) => {
                                // console.log(o, property, value);
                            }
                        });
                        return selected_dataProxy.employee;
                    }
                    
                    if(module_type === "custom") {
                        if(lookup_type !== "sub") {
                            scion.create.sc_modal(modal_content+"_form", "UPDATE " + page_title).show(modalShowFunction);
                        }
                    }
                    else if(module_type === "transaction") {
                        $('#' + tab_active).click();
                    }
                }
            });
            
            
        },
        delete(generateDeleteItems) {
            
            if(typeof(generateDeleteItems) != 'undefined') {
                generateDeleteItems();
            }

            $('#selectedCount').text(delete_data.length);
            scion.create.modal('DELETE RECORD', 'delete').show();

            return {
                yes: function(success, error) {
                    $.post(module_url + '/destroy', {'_token': _token, data: delete_data})
                    .done(function(response) {
                        delete_data = [];
                        $('.single-checkbox').prop('checked', false);

                        scion.create.modal().hide();
                        if(typeof(success) != 'undefined'){
                            success();
                        }

                        toastr.success('Record Deleted!');
                    })
                    .fail(function(response) {
                        if(typeof(error) != 'undefined'){
                            error();
                        }
                        toastr.error(response.responseJSON.message);
                    });
                },
                no: function() {
                    scion.create.modal().hide();
                }
            }
        },
        get(param, data, success, error) {
            $.post(module_url + '/' + param, {'_token': _token, data: data})
            .done(function(response) {
                if(typeof(success) != 'undefined'){
                    success(response);
                }
                return response;
            })
            .fail(function(response) {
                if(typeof(error) != 'undefined'){
                    error(response);
                }
                return response;
            });
        }
    },
    create: {
        random(length) {
            var result = '';
            var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var charactersLength = characters.length;
            for ( var i = 0; i < length; i++ ) {
              result += characters.charAt(Math.floor(Math.random() * charactersLength));
            }

            return result;
        },
        table(field_id, url, data, dom, buttons, paging, ordering, scroll) {
            var column = eval(data);

            if(scroll !== undefined) {
                var table = $('#'+field_id).DataTable({
                    responsive: true,
                    // processing: true,
                    serverSide: true,
                    paging: paging,
                    ordering: ordering,
                    scrollY: scroll,
                    dom: dom,
                    buttons: buttons,
                    ajax: {
                        url: url,
                        type: 'GET'
                    },
                    columns: column
                });
            }
            else {
                var table = $('#'+field_id).DataTable({
                    responsive: true,
                    // processing: true,
                    serverSide: true,
                    paging: paging,
                    ordering: ordering,
                    dom: dom,
                    buttons: buttons,
                    ajax: {
                        url: url,
                        type: 'GET'
                    },
                    columns: column
                });
            }
            
            
            // table.clear().draw();
        },
        modal(title, type) {
            var modal = $('.custom-modal');
            $('.custom-modal-title').text(title);

            switch(type){
                case "form":
                    $('.custom-modal-body').html($('#'+modal_content).html());
                    scion.centralized_button(true, false, true, true);
                    break;
                case "delete":
                    $('.custom-modal-body').html($('#deleteModal').html());
                    scion.centralized_button(true, true, true, true);
                    break;
            }

            return {
                show: function() {
                    modal.css('display', 'block');
                },
                hide: function() {
                    modal.css('display', 'none');
                    scion.table.checked.getAllSelected();
                }
            }
        },
        sc_modal(id, title, getLookup) {
            var modal = $('.sc-modal');
            $('#' + id + ' .sc-title-bar').html(title);
            
            return {
                show: function(modalShowFunction) {
                    if(typeof(getLookup) != "undefined"){
                        getLookup();
                    }
                    
                    if(typeof(modalShowFunction) != "undefined") {
                        modalShowFunction();
                    }
                    $('#'+id).css('display', 'block');
                    modal.css('display', 'block');
                },
                hide: function(type, modalHideFunction) {
                    if(typeof(modalHideFunction) != "undefined") {
                        modalHideFunction();
                    }
                    $('#'+id).css('display', 'none');
                    $('#'+id + '.sc-modal-content').css('display', 'none');

                    if(id === 'lookup_company_no') {
                        modal.css('display', 'none');
                    }

                    if(type === "all") {
                        modal.css('display', 'none');
                    }
                }
            }
        },
        additional_button(buttons) {
            var button = "";
            $.each(buttons, function(i, val) {
                button += "<button class='"+val.id+"' id='"+val.id+"' "+(val.disable===true?"disabled":"")+">"+val.title+"</button>";
            });

            $('#additional_buttons').html(button);
        }
    },
    lookup(id, url, data) {
        if ($.fn.DataTable.isDataTable('#'+id)) {
            $('#' + id).DataTable().destroy();
        }
        scion.create.table(id, url, JSON.parse(data), 'frtip', []);
    },
    fileView(event) {
        var output = document.getElementById('viewer');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src);
        }
    },
    centralized_button(nw, sv, dlt, prnt) {
        $('#nw').prop('disabled', nw);
        $('#sv').prop('disabled', sv);
        $('#dlt').prop('disabled', dlt);
        $('#prnt').prop('disabled', prnt);
    },
    table: {
        checkOne() {
            event.stopPropagation();
            
            scion.table.checked.getAllSelected();
            // FOR UNCHECKING THE MAIN CHECKBOX
            $('.multi-checkbox').prop('checked', $('.single-checkbox:checked').length !== $('.single-checkbox').length?false:true);
            
        },
        checkAll() {
            event.stopPropagation();

            $('.single-checkbox').prop('checked', $('.multi-checkbox')[0].checked === true? true:false);
            
            scion.table.checked.getAllSelected();
        },
        checked: {
            getAllSelected() {
                delete_data = [];

                $.each($('.single-checkbox:checked'), (i, val) => {
                    delete_data.push(val.value);
                })

                if($('.single-checkbox:checked').length > 0) {
                    scion.centralized_button(true, true, false, true);
                }
                else if($('.single-checkbox:checked').length == 0){
                    scion.centralized_button(false, true, true, true);
                }
            }
        }
    },
    input: {
        getValue(id) {
            return $('#'+id).val();
        }
    },
    action: {
        tab(id, extra) {
            tab_active = id;
            $('.tab-list-menu button').removeClass('active');
            $('#'+id).addClass('active');
            $('.form-tab').css('display', 'none');
            $('#'+id+'_tab').css('display', 'block');
            
            if(typeof(extra) != "undefined"){
                extra();
            }
        },
        notification(subject, details, modules, source_id, link, type, tagged_id, status) {
            var data = {
                _token: _token,
                subject: subject,
                details: details,
                module: modules,
                source_id: source_id,
                link: link,
                type: type,
                tagged_id: tagged_id,
                status: status
            };
            console.log(data);
        }
    },
    getDateRange(date, noDate){
        const today = new Date(date);

        const firstDay = new Date(today.setDate(today.getDate() - today.getDay()));
        const currentDay = new Date(today.setDate(today.getDate() - today.getDay() + (noDate-1)));
        const lastDay = new Date(today.setDate(today.getDate() - today.getDay() + 6));

        return { first: moment(currentDay).format('YYYY-MM-DD'), current: moment(currentDay).format('YYYY-MM-DD'), last: moment(lastDay).format('YYYY-MM-DD') };
    },
    get: {
        salary(entry, type, salary) {
            var _data = {
                "_token": _token,
                "entry": entry,
                "type": type
            }
            $.post('/payroll/compensation/salary', _data)
            .done(function(response) {
                if(typeof(salary) != "undefined"){
                    salary(response);
                }
            });
        }
    },
    sc_modal_show(modal, page_title) {
        $('.sc-modal-content').css('display', 'none');
        scion.create.sc_modal(modal, page_title).show(modalShowFunction);
    },
    currency(total) {
        var neg = false;
        if(total < 0) {
            neg = true;
            total = Math.abs(total);
        }
        return (neg ? "-₱ " : '₱ ') + parseFloat(total, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString();
    },
    print() {
        if(selected_print !== null) {
            var divContents = document.getElementById(selected_print).innerHTML;
            var a = window.open('', '', 'height=800, width=1200');
            a.document.write('<html>');
            a.document.write('<head>');
            a.document.write('<link href="/css/custom.css" rel="stylesheet"></link>');
            a.document.write('<link href="/css/custom/'+modal_content+'.css" rel="stylesheet"></link>');
            a.document.write('</head>');
            a.document.write('<body id="print_canvas">');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();

            setTimeout(function() {
                a.print();
            }, 2000);
        }
        else {
            $('.buttons-print').click()
        }
    }
}

$('body').delegate('form input[type="text"]:not(.lowercase), form textarea', 'keyup', function() {
    this.value = this.value.toUpperCase();
}).delegate('form', 'submit', function() {
    event.preventDefault();
});;

$(function() {
    $.post('/actions/access/get_permission', { _token: _token, project_type: project_type, project_code: modal_content }).done(function(response) {
        if(response.access.add === 0) {
            $('#nw').remove();
        }
        if(response.access.edit === 0) {
            $('.dataTable a.edit').remove();
        }
        
        if(response.access.add === 0 && response.access.edit === 0) {
            $('#sv').remove();
        }

        if(response.access.delete === 0) {
            $('#dlt').remove();
        }

        if(response.access.print === 0) {
            $('#prnt').remove();
        }
        $('.action-button button, .dataTable a.edit').css('display','inline-block');
    });
});