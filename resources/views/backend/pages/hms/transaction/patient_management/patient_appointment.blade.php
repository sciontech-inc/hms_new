@php
    $type = 'full-view';
@endphp
@extends('backend.master.index')


@section('title', 'PATIENT APPOINTMENT')

@section('breadcrumbs')
    <span>TRANSACTION / PATIENT MANAGEMENT</span> / <span class="highlight">PATIENT APPOINTMENT</span>
@endsection

@section('content')
<div id='calendar-container' style="height: 100%;">
    <div id='calendar'></div>
</div>

@section('sc-modal')
@parent
<div class="sc-modal-content" id="patient_appointment_form">
    <div class="sc-modal-dialog">
        <div class="sc-modal-header">
            <span class="sc-title-bar"></span>
            <span class="sc-close" onclick="scion.create.sc_modal('patient_appointment_form').hide('all', modalHideFunction)"><i class="fas fa-times"></i></span>
        </div>
        <div class="sc-modal-body">
            <form id="patient_appointmentForm" method="post" class="form-record">
                <div class="row">
                    <div class="col-12 patient_lookup">
                        @include('backend.partial.component.lookup', [
                            'label' => "PATIENT ID",
                            'placeholder' => '<NEW>',
                            'id' => "patient_id",
                            'title' => "PATIENT ID",
                            'url' => "/actions/patient/get",
                            'data' => array(
                                array('data' => "DT_RowIndex", 'title' => "#"),
                                array('data' => "patient_id", 'title' => "Patient ID"),
                                array('data' => "firstname", 'title' => "First Name"),
                                array('data' => "lastname", 'title' => "Last Name"),
                                array('data' => "email", 'title' => "Email"),
                            ),
                            'disable' => true,
                            'lookup_module' => 'patient',
                            'modal_type'=> '',
                            'lookup_type' => 'modal_lookup'
                        ])
                    </div>
                    <div class="form-group col-12 doctor_id">
                        <label for="">PREFFERED DOCTOR:</label>
                        <select name="doctors_id" id="doctors_id" class="form-control" onchange="selectSchedule()">
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="form-group col-6 date">
                        <label for="">PREFFERED DATE:</label>
                        <input type="date" class="form-control" id="date" name="date"  onchange="selectSchedule()" required/>
                    </div>
                    <div class="form-group col-6 time">
                        <label for="">PREFFERED TIME:</label>
                        <select name="time" id="time" class="form-control">
                            <option value=""></option>
                            <option value="TIME">TIME</option>
                        </select>
                    </div>
                    <div class="form-group col-12 reason">
                        <label for="">REASON:</label>
                        <select name="reason" id="reason" class="form-control">
                            <option value=""></option>
                            <option value="GENERAL CHECK-UP">GENERAL CHECK-UP</option>
                            <option value="SPECIFIC HEALTH CONCERN">SPECIFIC HEALTH CONCERN</option>
                        </select>
                    </div>
                    <div class="form-group col-12 appointment_status">
                        <label for="">STATUS:</label>
                        <select name="appointment_status" id="appointment_status" class="form-control">
                            <option value=""></option>
                            <option value="0">CANCELED</option>
                            <option value="1">COMPLETED</option>
                            <option value="2">ONHOLD</option>
                            <option value="3">RESCHEDULE</option>
                            <option value="4">RESERVED</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="sc-modal-content" id="patient_appointment_view">
    <div class="sc-modal-dialog sc-xl">
        <div class="sc-modal-header">
            <span class="sc-title-bar"></span>
            <span class="sc-close" onclick="scion.create.sc_modal('patient_appointment_view').hide('all', modalHideFunction)"><i class="fas fa-times"></i></span>
        </div>
        <div class="sc-modal-body">
            <div class="row">
                <div class="col-12">
                    <h3 id="appointment_reason"></h3>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>PATIENT: </label>
                        <div id="appointment_patient_name"></div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>DOCTOR: </label>
                        <div id="appointment_doctor_name"></div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>SCHEDULE: </label>
                        <div id="appointment_date_time"></div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>APPOINTMENT STATUS: </label>
                        <div id="appointment_display_status"></div>
                    </div>
                </div>
                <div class="col-12">
                    <br><br>
                    <h3>MEDICAL HISTORY</h3>
                    <br>
                    <div class="history-title">MEDICAL CONDITION:</div>
                    <div style="overflow: auto;">
                        <table id="history_medical_condition">
                            <thead>
                                <th>DATE RECORD</th>
                                <th>HOSPITAL NAME</th>
                                <th>IDC10 DESCRIPTION</th>
                                <th>CHIEF COMPLAINT</th>
                                <th>DIAGNOSTIC TESTS</th>
                                <th>DIAGNOSIS</th>
                                <th>PROGNOSIS</th>
                                <th>PHYSICIAN NOTES</th>
                                <th>NURSING NOTES</th>
                                <th>REGISTRATION DATE</th>
                                <th>DISCHARGE DATE</th>
                                <th>DISCHARGE SUMMARY</th>
                                <th>MEDICAL CASE REMARKS</th>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>

                    <div class="history-title">ALLERGIES:</div>
                    <div style="overflow: auto;">
                        <table id="history_allergies">
                            <thead>
                                <th>ALLERGEN</th>
                                <th>REACTION</th>
                                <th>SEVERITY</th>
                                <th>DATE OF ONSET</th>
                                <th>TREATMENT</th>
                                <th>DURATION</th>
                                <th>SOURCE OF INFORMATION</th>
                                <th>KNOWN CROSS-REACTIVES</th>
                                <th>CURRENT MANAGEMENT PLAN</th>
                                <th>MEDICATIONS TO AVOID</th>
                                <th>SEVERITY OF REACTION TO EACH MEDICATION</th>
                                <th>ANAPHYLAXIS</th>
                                <th>ALLERGY TESTING</th>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>

                    <div class="history-title">CURRENT MEDICATION:</div>
                    <div style="overflow: auto;">
                        <table id="history_medication">
                            <thead>
                                <th>MEDICINE</th>
                                <th>DOSES</th>
                                <th>ROUTES OF ADMINISTRATION</th>
                                <th>TYPE</th>
                                <th>DURATION</th>
                                <th>REASON</th>
                                <th>COMPLIANCE</th>
                                <th>REMARKS</th>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
    

@endsection

@section('scripts')
<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="/packages/fullcalendar-6.1.8/dist/index.global.js"></script>
<script src="/packages/fullcalendar-6.1.8/dist/index.global.min.js"></script>
<script src="/js/backend/pages/hms/transaction/patient_management/patient_appointment.js"></script>
@endsection

@section('styles')
<link href="{{asset('/css/custom/transaction/patient_management/patient_appointment.css')}}" rel="stylesheet">
@endsection