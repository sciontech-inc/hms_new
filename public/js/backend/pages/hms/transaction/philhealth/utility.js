$(function() {
    
    project_type = 'app_module';
    module_content = 'pin_verification';
    modal_content = 'philhealth_utility';
    module_url = '/actions/' + module_content;
    module_type = 'transaction';
    page_title = 'PHILHEALTH UTILITY';
    tab_active = 'pin_verification';
    actions = 'save';
    
    scion.centralized_button(true, true, true, true);
    scion.action.tab(tab_active);


});

function success() {
    switch(actions) {
        case 'save':
            switch(module_content){
              
            }
            break;
        case 'update':
            switch(module_content){
              
            }
            break;
    }
    $('#' + modal_content + '_table').DataTable().draw();
    scion.create.sc_modal(modal_content + '_form').hide('all', modalHideFunction);
}

function error() {}

function delete_success() {
    switch(module_content) {
    
    }
}

function delete_error() {}

function generateData() {
    switch(module_content) {
       
    }

    return form_data;
}

function generateDeleteItems(){
    switch(module_content) {
        
    }
}

function modalShowFunction() {
    scion.centralized_button(true, false, true, true);
}

function modalHideFunction() {
    scion.centralized_button(false, true, true, true);
}

// EXTRA FUNCTION
function pin_verification_func() {
    module_content = 'pin_verification';
    module_url = '/actions/' + module_content;
    module_type = 'transaction';
    
  
    if(actions == 'update') {
        scion.centralized_button(false, false, true, true);
    }
    else {
        scion.centralized_button(true, false, true, true);
    }
}

function doctor_accreditation_func() {
    module_content = 'doctor_accreditation';
    module_url = '/actions/' + module_content;
    module_type = 'transaction';
    
  
    if(actions == 'update') {
        scion.centralized_button(false, false, true, true);
    }
    else {
        scion.centralized_button(true, false, true, true);
    }
}

function doctor_accreditation_number_func() {
    module_content = 'doctor_accreditation_number';
    module_url = '/actions/' + module_content;
    module_type = 'transaction';
    
  
    if(actions == 'update') {
        scion.centralized_button(false, false, true, true);
    }
    else {
        scion.centralized_button(true, false, true, true);
    }
}

function single_period_confinement_func() {
    module_content = 'single_period_confinement';
    module_url = '/actions/' + module_content;
    module_type = 'transaction';
    
  
    if(actions == 'update') {
        scion.centralized_button(false, false, true, true);
    }
    else {
        scion.centralized_button(true, false, true, true);
    }
}

