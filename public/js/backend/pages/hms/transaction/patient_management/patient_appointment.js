var calendar = null;

$(function() {
    project_type = 'app_module';
    modal_content = 'patient_appointment';
    module_url = '/actions/' + modal_content;
    module_type = 'custom';
    page_title = 'PATIENT APPOINTMENT';

    scion.centralized_button(false, true, true, true);
    
    syncData();
    calendarView();

});

function success() {
    switch(actions) {
        case 'save':
            calendarView();
            break;
        case 'update':
            break;
    }
    scion.create.sc_modal(modal_content + '_form').hide('all', modalHideFunction);
}

function error() {}

function delete_success() {}

function delete_error() {}

function generateData() {
    form_data = {
        _token: _token,
        patient_id: $('#id').val(),
        date: $('#date').val(),
        time: $('#time').val(),
        doctor_id: $('#doctors_id').val(),
        reason: $('#reason').val(),
        appointment_status: $('#appointment_status').val()
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

function customFunc() {
}

function syncData() {
    $.get('/actions/doctor/list/all', function(response) {
        $.each(response.data, function(i,v) {
            var o = new Option("DR. " + v.firstname + " " + (v.middlename !== null? v.middlename + " ":'') + v.lastname + (v.suffix !== null? " " + v.suffix:''), v.id);
            
            $(o).html("DR. " + v.firstname + " " + (v.middlename !== null? v.middlename + " ":'') + v.lastname + (v.suffix !== null? " " + v.suffix:''));
            $("#doctors_id").append(o);
        });
    });
}

function calendarView() {
    
    var calendarEl = document.getElementById('calendar');

    calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'multiMonthYear,dayGridMonth,timeGridWeek,listWeek'
        },
        initialView: 'multiMonthYear',
        initialDate: new Date(),
        editable: true,
        selectable: true,
        dayMaxEvents: true, 
        select: function(arg) {
            // var title = prompt('Event Title:');
            // if (title) {
            //     calendar.addEvent({
            //         title: title,
            //         start: arg.start,
            //         end: arg.end,
            //         allDay: arg.allDay
            //     })
            // }
            // calendar.unselect()
            // console.log(arg);
        },
        eventClick: function(arg) {
            var el = arg.el.children[0];
            var data_id = $('#' + el.id).attr('data-id');

            $.get(module_url + '/list/' + data_id, function(response) {
                var record = response.data;
                var appointment_status = record.appointment_status;
                var table_medical_case = '';
                var table_allergies = '';
                var table_medication = '';

                switch(appointment_status) {
                    case 0:
                        appointment_status = "<span class='status-"+appointment_status+"'>CANCELED</span>";
                        break;
                    case 1:
                        appointment_status = "<span class='status-"+appointment_status+"'>COMPLETED</span>";
                        break;
                    case 2:
                        appointment_status = "<span class='status-"+appointment_status+"'>ONHOLD</span>";
                        break;
                    case 3:
                        appointment_status = "<span class='status-"+appointment_status+"'>RESCHED</span>";
                        break;
                    case 4:
                        appointment_status = "<span class='status-"+appointment_status+"'>RESERVED</span>";
                        break;
                }

                $('#appointment_reason').text(record.reason);
                $('#appointment_patient_name').text(record.patient.firstname + " " + (record.patient.middlename !== null?record.patient.middlename+" ":"") + record.patient.lastname + (record.patient.suffix !== null?" "+record.patient.suffix:""));
                $('#appointment_doctor_name').text(record.doctor.firstname + " " + (record.doctor.middlename !== null?record.doctor.middlename+" ":"") + record.doctor.lastname + (record.doctor.suffix !== null?" "+record.doctor.suffix:""));
                $('#appointment_date_time').text(moment(record.date + " " + record.time).format('MMM DD, YYYY hh:mm A'));
                $('#appointment_display_status').html(appointment_status);

                $.each(record.patient.medical_case, function(i, v) {
                    table_medical_case += "<tr>";
                        table_medical_case += "<td>"+moment(v.date_recorded).format('MMM DD,YYYY')+"</td>";
                        table_medical_case += "<td>"+v.hospital_name+"</td>";
                        table_medical_case += "<td>"+v.icd10_description+"</td>";
                        table_medical_case += "<td>"+v.chief_complaint+"</td>";
                        table_medical_case += "<td>"+v.diagnostic_tests+"</td>";
                        table_medical_case += "<td>"+v.diagnosis+"</td>";
                        table_medical_case += "<td>"+v.prognosis+"</td>";
                        table_medical_case += "<td>"+v.physician_notes+"</td>";
                        table_medical_case += "<td>"+v.nursing_notes+"</td>";
                        table_medical_case += "<td>"+moment(v.registration_date).format('MMM DD,YYYY')+"</td>";
                        table_medical_case += "<td>"+moment(v.discharge_date).format('MMM DD,YYYY')+"</td>";
                        table_medical_case += "<td>"+v.discharge_summary+"</td>";
                        table_medical_case += "<td>"+v.medical_case_remarks+"</td>";
                    table_medical_case += "</tr>";
                });
                
                $.each(record.patient.allergies, function(i, v) {
                    table_allergies += "<tr>";
                        table_allergies += "<td>"+v.allergy_allergen+"</td>";
                        table_allergies += "<td>"+v.allergy_reaction+"</td>";
                        table_allergies += "<td>"+v.allergy_severity+"</td>";
                        table_allergies += "<td>"+v.allergy_date_of_onset+"</td>";
                        table_allergies += "<td>"+v.allergy_treatment+"</td>";
                        table_allergies += "<td>"+v.allergy_duration+"</td>";
                        table_allergies += "<td>"+v.source_of_information+"</td>";
                        table_allergies += "<td>"+v.current_management_plan+"</td>";
                        table_allergies += "<td>"+v.medications_to_avoid+"</td>";
                        table_allergies += "<td>"+v.severity_of_reaction+"</td>";
                        table_allergies += "<td>"+v.allergy_anaphylaxis+"</td>";
                        table_allergies += "<td>"+v.allergy_testing+"</td>";
                        table_allergies += "<td>"+v.other_relevant_medical_history+"</td>";
                    table_allergies += "</tr>";
                });
                
                $.each(record.patient.medicine_taken, function(i, v) {
                    table_medication += "<tr>";
                        table_medication += "<td>"+v.medicine_name+"</td>";
                        table_medication += "<td>"+v.medicine_doses+"</td>";
                        table_medication += "<td>"+v.routes_of_administration+"</td>";
                        table_medication += "<td>"+v.medicine_type+"</td>";
                        table_medication += "<td>"+v.medicine_duration+"</td>";
                        table_medication += "<td>"+v.medicine_reason+"</td>";
                        table_medication += "<td>"+v.medicine_compliance+"</td>";
                        table_medication += "<td>"+v.medicine_remarks+"</td>";
                    table_medication += "</tr>";
                });

                $('table#history_medical_condition tbody').html(table_medical_case);
                $('table#history_allergies tbody').html(table_allergies);
                $('table#history_medication tbody').html(table_medication);

                scion.create.sc_modal('patient_appointment_view', 'PATIENT APPOINTMENT').show(modalShowFunction);
            });
            
        },
        eventContent: function( info ) {
            return {html: info.event.title};
        }
    });

    
    $.get(module_url + '/list/all', function(response) {
        var record = response.data;

        $.each(record, function(i, v) {
            var start = new Date(v.date + " " + v.time.replace( /(\d{2})-(\d{2})-(\d{4})/, "$2/$1/$3"));
            var date = new Date(v.date + " " + v.time.replace( /(\d{2})-(\d{2})-(\d{4})/, "$2/$1/$3"));
            var hour = date.getHours();
            var end = date.setHours(hour + 1);

            var card_event = "";

            card_event += "<div class='event-card status-"+v.appointment_status+"' id='event_card_"+v.id+"' data-id='"+v.id+"'>";
                card_event += "<div class='reason'>"+v.reason+"</div>";
                card_event += "<div class='appointment-info name'><b>PATIENT: </b>"+(v.patient.firstname + " " + (v.patient.middlename !== null?v.patient.middlename+" ":"") + v.patient.lastname + (v.patient.suffix !== null?" "+v.patient.suffix:""))+"</div>";
                card_event += "<div class='appointment-info doctor'><b>DOCTOR: </b>"+(v.doctor.firstname + " " + (v.doctor.middlename !== null?v.doctor.middlename+" ":"") + v.doctor.lastname + (v.doctor.suffix !== null?" "+v.doctor.suffix:""))+"</div>";
                card_event += "<div class='appointment-info time'><b>TIME: </b>"+moment(start).format('hh:mm A')+" - "+moment(end).format('hh:mm A')+"</div>";
            card_event += "</div>";
            
            calendar.addEvent({
                id: v.id,
                title: card_event,
                start: start,
                end: end
            });

            calendar.unselect();
        });
    });


    calendar.render();
}

function selectSchedule() {
    if($('#doctors_id').val() !== "" && $('#date').val() !== "") {
        $.post('/actions/scheduling/get-schedule', { _token: _token, date: $('#date').val(), doctors_id: $('#doctors_id').val() }).done(function(response) {
            $("#time").html("<option val=''></option>");
            if(response.time.length === 0) {
                toastr.error('No Schedule Available');
            }
            else {
                $.each(response.time, function(i,v) {
                    var o = new Option(v, v);
                    
                    $(o).html(v);
                    $("#time").append(o);
                });
            }
        }).fail(function(response) {});
    }
}