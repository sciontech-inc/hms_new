@php
    $type = 'full-view';
@endphp
@extends('backend.master.index')

@section('title', 'PATIENT ADMISSION')

@section('additional_button')
<button type="button" onclick="" class="admit" id="admit" disabled>
    <i class="fas fa-file"></i> ADMIT
</button>
<button type="button" onclick="" class="profile" id="profile" disabled>
    <i class="fas fa-file"></i> PATIENT PROFILE
</button>
<button type="button" onclick="" class="hold" id="hold" disabled>
    <i class="fas fa-file"></i> HOLD, RELEASE
</button>
<button type="button" onclick="" class="relocate" id="relocate" disabled>
    <i class="fas fa-file"></i> RELOCATE
</button>
<button type="button" onclick="" class="discharge" id="discharge" disabled>
    <i class="fas fa-file"></i> DISCHARGE
</button>
<button type="button" onclick="" class="re-admit" id="re-admit" disabled>
    <i class="fas fa-file"></i> RE-ADMIT
</button>
@endsection

@section('breadcrumbs')
    <span>TRANSACTION / PATIENT_MANAGEMENT</span> / <span class="highlight">PATIENT ADMISSION</span>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <table id="patient_admission_table" class="table table-striped" style="width:100%"></table>
    </div>
</div>

@section('sc-modal')
@parent
<div class="sc-modal-content" id="patient_admission_form">
    <div class="sc-modal-dialog sc-xl">
        <div class="sc-modal-header">
            <span class="sc-title-bar"></span>
            <span class="sc-close" onclick="scion.create.sc_modal('app_type_form').hide('all', modalHideFunction)"><i class="fas fa-times"></i></span>
        </div>
        <div class="sc-modal-body">
            <form id="patient_admissionForm" method="post" class="form-record">
                <div class="row">
                    <div class="col-3">
                        @include('backend.partial.component.tab_list', [
                            'id'=>'facility',
                            'data'=>array(
                                array('id'=>'general', 'title'=>'GENERAL', 'icon'=>' fas fa-file', 'active'=>true, 'disabled'=>false, 'function'=>true),
                                array('id'=>'rooms_beds_dietary', 'title'=>'ROOMS, BEDS, DIETARY', 'icon'=>' fas fa-file', 'active'=>false, 'disabled'=>true, 'function'=>true)
                            )
                        ])
                    </div>
                    <div class="col-9">
                        @include('backend.pages.hms.transaction.patient_management.patient_admission_tab.general_tab')
                        @include('backend.pages.hms.transaction.patient_management.patient_admission_tab.rooms_beds_dietary_tab')
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
    

@endsection

@section('scripts')
<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="/js/backend/pages/hms/transaction/patient_management/patient_admission.js"></script>
@endsection

@section('styles')
<link href="{{asset('/css/custom/transaction/patient_management/patient_admission.css')}}" rel="stylesheet">
@endsection