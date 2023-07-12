$(function() {
    project_type = 'app_module';
    modal_content = 'rooms_beds';
    module_url = '/actions/' + modal_content;
    module_type = 'transaction';
    page_title = 'Rooms and Beds';

    customFunc();
});

function customFunc() {
    var building = '';
    $.get('/actions/building/list/all', function(response) {
        $.each(response.data, function(i,v){
            building += "<button onclick='getFloors("+v.id+", "+'"click"'+")' class='main-btn "+(i===0?'active':'')+"' id='building_"+v.id+"'>"+v.name+"</button>";

            if(i === 0) {
                getFloors(v.id, 'load');
            }
        });
        $('#additional_buttons').html(building);
    });
}

function getFloors(id, type) {
    var floor = '';
    $('.main-btn').removeClass('active');
    $('#building_'+id).addClass('active');

    if(type === "click"){
        $.get('/actions/building/info/'+id, function(response){
            var info_design = '';
            var _d = response.data;
            info_design += '<div class="icon"><i class="fas fa-building"></i></div>';
            info_design +='<div class="data-information">';
                info_design += '<h5>BUILDING INFORMATION</h5>';
                info_design += '<ul class="row">';
                    info_design += '<li class="col-12"><b>BUILDING NAME:</b> <div>'+_d.name+'</div></li>';
                    info_design += '<li class="col-12"><b>ADDRESS:</b> <div>'+_d.address+'</div></li>';
                    info_design += '<li class="col-6"><b>COUNTRY:</b> <div>'+_d.country+'</div></li>';
                    info_design += '<li class="col-6"><b>CITY:</b> <div>'+_d.city+'</div></li>';
                    info_design += '<li class="col-6"><b>PROVINCE:</b> <div>'+_d.province+'</div></li>';
                    info_design += '<li class="col-6"><b>POSTAL CODE:</b> <div>'+_d.postal_code+'</div></li>';
                    info_design += '<li class="col-12"><b>CONTACT NUMBER:</b> <div>'+_d.contact_number+'</div></li>';
                    info_design += '<li class="col-12"><b>EMAIL:</b> <div>'+_d.email+'</div></li>';
                    info_design += '<li class="col-12"><b>CONSTRUCTION DATE:</b> <div>'+moment(_d.construction_date).format('MMM DD, YYYY')+'</div></li>';
                    info_design += '<li class="col-12"><b>ARCHITECTURAL STYLE:</b> <div>'+(_d.architectural_style !== null?_d.architectural_style:'-')+'</div></li>';
                    info_design += '<li class="col-12"><b>TOTAL AREA:</b> <div>'+(_d.total_area !== null?_d.total_area:'-')+'</div></li>';
                info_design += '</ul>';
            info_design += '</div>';
            displayInformation(info_design);
        });
    }
    else {

    }

    $.get('/actions/floor/list/'+id, function(response) {
        $.each(response.data, function(i,v){
            floor += "<div class='col-2'>";
                floor += "<button class='item-btn "+(i===0?'active':'')+"' id='floor_"+v.id+"' onclick='getRooms("+v.id+", "+'"click"'+")'>"+v.floor_name+"</button>";
            floor += "</div>";

            if(i===0){
                getRooms(v.id, 'load');
            }
        });
        $('.floor-list').html(floor);
        $('.room-list').html('');
        $('.bed-list').html('');
    });
}

function getRooms(id, type) {
    var room = '';
    $('.floor-list .item-btn').removeClass('active');
    $('#floor_'+id).addClass('active');
    
    if(type === 'click') {
        $.get('/actions/floor/info/'+id, function(response){
            var info_design = '';
            var _d = response.data;
            info_design += '<div class="icon"><i class="fas fa-th-large"></i></div>';
            info_design +='<div class="data-information">';
                info_design += '<h5>FLOOR INFORMATION</h5>';
                info_design += '<ul class="row">';
                    info_design += '<li class="col-6"><b>FLOOR NAME:</b> <div>'+_d.floor_name+'</div></li>';
                    info_design += '<li class="col-6"><b>FLOOR NO.:</b> <div>'+_d.floor_no+'</div></li>';
                    info_design += '<li class="col-6"><b>CAPACITY:</b> <div>'+(_d.capacity!==null?_d.capacity:'--')+'</div></li>';
                info_design += '</ul>';
            info_design += '</div>';
            displayInformation(info_design);
        });
    }
    else {

    }
    
    $.get('/actions/room/list/'+id, function(response) {
        $.each(response.data, function(i,v){
            room += "<li>";
                room += "<button class='item-btn room "+(i===0?'active':'')+"' id='room_"+v.id+"' onclick='getBeds("+v.id+", "+'"click"'+")'><i class='fas fa-cube'></i> "+v.room_name+"</button>";
            room += "</li>";

            if(i===0){
                getBeds(v.id, 'load');
            }
        });
        $('.room-list').html(room);
        $('.bed-list').html('');
    });
}

function getBeds(id, type) {
    var room = '';
    $('.room-list .item-btn').removeClass('active');
    $('#room_'+id).addClass('active');

    
    $.get('/actions/room/info/'+id, function(response){
        var info_design = '';
        var _d = response.data;
        info_design += '<div class="icon"><i class="fas fa-cube"></i></div>';
        info_design +='<div class="data-information">';
            info_design += '<h5>ROOM INFORMATION</h5>';
            info_design += '<ul class="row">';
                info_design += '<li class="col-12"><b>ROOM NO.:</b> <div>'+_d.room_no+'</div></li>';
                info_design += '<li class="col-12"><b>ROOM NAME.:</b> <div>'+_d.room_name+'</div></li>';
                info_design += '<li class="col-12"><b>ROOM TYPE:</b> <div>'+_d.room_type.replaceAll('_',' ').toUpperCase()+'</div></li>';
                info_design += '<li class="col-12"><b>CAPACITY:</b> <div>'+(_d.capacity!==null?_d.capacity:'--')+'</div></li>';
                info_design += '<li class="col-12"><b>STATUS:</b> <div>'+_d.occupancy_status+'</div></li>';
                info_design += '<li class="col-12"><b>AVAILABILITY SCHEDULE:</b> <div>'+(_d.availability_schedule!==null?_d.availability_schedule:'--')+'</div></li>';
                info_design += '<li class="col-12"><b>ROOM FEATURES:</b> <div>'+(_d.room_features!==null?_d.room_features:'--')+'</div></li>';
                info_design += '<li class="col-12"><b>ROOM SIZE:</b> <div>'+(_d.room_size!==null?_d.room_size:'--')+'</div></li>';
                info_design += '<li class="col-12"><b>ROOM CONDITION:</b> <div>'+(_d.room_condition!==null?_d.room_condition:'--')+'</div></li>';
                info_design += '<li class="col-12"><b>ROOM USAGE RESTRICTION:</b> <div>'+(_d.room_usage_restriction!==null?_d.room_usage_restriction:'--')+'</div></li>';
                info_design += '<li class="col-12"><b>ROOM SERVICE:</b> <div>'+(_d.room_service!==null?_d.room_service:'--')+'</div></li>';
                info_design += '<li class="col-12"><b>ROOM NOTES:</b> <div>'+(_d.room_notes!==null?_d.room_notes:'--')+'</div></li>';
                info_design += '<li class="col-12"><b>ROOM ACCESSIBILITY:</b> <div>'+(_d.room_accessibility!==null?_d.room_accessibility:'--')+'</div></li>';
            info_design += '</ul>';
        info_design += '</div>';
        displayInformation(info_design);
    });
    
    $.get('/actions/bed/list/'+id, function(response) {
        $.each(response.data, function(i,v){
            room += "<div class='col-4'>";
                room += "<div class='bed-catalog bed_"+v.status+"' id='bed_"+v.id+"' onclick='admissionForm("+v.id+", \""+v.status+"\", \""+(v.patient_id!==null?v.patient_id:'')+"\", \""+v.bed_no+"\", \""+v.price+"\")'>";
                    room += "<div class='bed-icon'><i class='fas fa-bed'></i></div>";
                    room += "<div class='bed-details'>";
                        room += "<div class='row'>";
                            room += "<div class=col-12><h5>BED DETAILS</h5></div>";
                            room += "<div class=col-12><b>BED NO:</b> <span class='bed-no'>"+v.bed_no+"</span></div>";
                            room += "<div class=col-12><b>PRICE:</b> <span class='bed-price'>"+scion.currency(v.price)+"</span></div><br><br>";
                            room += "<div class=col-12><b>BED TYPE:</b> <span class='bed-type'>"+v.bed_type.replace('_',' ')+"</span></div>";
                            room += "<div class=col-12><b>BED FEATURES:</b> <span class='bed-type'>"+(v.bed_features !== null?v.bed_features:'--')+"</span></div>";
                            room += "<div class=col-12><b>BED SIZE:</b> <span class='bed-type'>"+(v.bed_size !== null?v.bed_size:'--')+"</span></div>";
                            room += "<div class=col-12><b>BED CONDITION:</b> <span class='bed-type'>"+(v.bed_condition !== null?v.bed_condition:'--')+"</span></div>";
                            room += "<div class=col-12><b>BED NOTES:</b> <span class='bed-type'>"+(v.bed_notes !== null?v.bed_notes:'--')+"</span></div>";
                            room += "<div class=col-12><b>BED AVAILABILITY:</b> <span class='bed-type'>"+(v.bed_availability !== null?v.bed_availability:'--')+"</span></div>";
                            room += "<br><br>";
                            room += "<div class=col-12><b>PATIENT ID:</b> <span class='patient-id'>"+(v.patient_id !== null?v.patient_id:'--')+"</span></div>";
                            room += "<div class=col-12><b>STATUS:</b> <span class='status'>"+(v.status !== null?v.status:'--')+"</span></div>";
                        room += "</div>";
                    room += "</div>";
                room += "</div>";
            room += "</div>";
        });

        $('.bed-list').html(room);
    });
}

function displayInformation(design) {
    $('.help-information').css('display', 'block');
    $('form#addmissionForm').css('display', 'none');
    $('.help-information').html(design);
}

function admissionForm(id, status, patient_id, bed_no, price) {
    var info_details = '';
    
    $('#patient_id').val('');
    $('.error-message').remove();

    if($('#bed_'+id).hasClass('selected')) {
        $('.bed-catalog').removeClass('selected');
        $('.help-information').css('display', 'block');
        $('form#addmissionForm').css('display', 'none');
    }
    else {
        $('.bed-catalog').removeClass('selected');
        $('#bed_'+id).addClass('selected');
        
        $('.help-information').css('display', 'none');
        $('form#addmissionForm').css('display', 'block');
    
        if(status === 'available') {
            $('.admission-request-button').html('<button class="button-admit" onclick="updatePatientStatus('+id+', \'available\')">ADMIT</button>');
        }
        else if(status === 'occupied') {
            $('#patient_id').val(patient_id);
            $('.admission-request-button').html('<button class="button-discharge" onclick="updatePatientStatus('+id+',\'occupied\')">DISCHARGE</button>');
        }
        $('.admission-bed-no').text(bed_no);
        $('.admission-price').text(scion.currency(price));
    }
}

function updatePatientStatus(id, status) {
    var data = {
        _token: _token,
        id: id,
        patient_id: status==="available"?$('#patient_id').val():'',
        status: status
    };
    $('.error-message').remove();

    $.post('/actions/patient_register/save', data).done(function(response) {
        $('.room.active').click();

        $('.bed-catalog').removeClass('selected');
        $('.help-information').css('display', 'block');
        $('form#addmissionForm').css('display', 'none');
    }).fail(function(response) {
        for (var field in response.responseJSON.errors) {
            $('#'+field+"_error_message").remove();
            $('.'+field).append('<span id="'+field+'_error_message" class="error-message">'+response.responseJSON.errors[field][0]+'</span>');
        }

        toastr.error(response.responseJSON.message);
    });
}

function modalShowFunction() {
    scion.centralized_button(true, false, true, true);
}

function modalHideFunction() {
    scion.centralized_button(false, true, true, true);
}