@php
    $type = 'full-view';
@endphp
@extends('backend.master.index')

@section('title', 'CHECK UP')

@section('additional_button')
{{-- <button type="button" onclick="" class="admit" id="admit" disabled>
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
</button> --}}
@endsection

@section('breadcrumbs')
    <span>TRANSACTION / PATIENT MANAGEMENT </span> / <span class="highlight">CHECK UP</span>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <table id="check_up_table" class="table table-striped" style="width:100%"></table>
    </div>
</div>

@section('sc-modal')
@parent
<div class="sc-modal-content" id="check_up_form">
    <div class="sc-modal-dialog sc-xl">
        <div class="sc-modal-header">
            <span class="sc-title-bar"></span>
            <span class="sc-close" onclick="scion.create.sc_modal('check_up_form').hide('all', modalHideFunction)"><i class="fas fa-times"></i></span>
        </div>
        <div class="sc-modal-body">
            <form id="check_upForm" method="post" class="form-record">
                <div class="row">
                    <div class="col-3">
                        @include('backend.partial.component.tab_list', [
                            'id'=>'facility',
                            'data'=>array(
                                array('id'=>'general', 'title'=>'GENERAL', 'icon'=>' fas fa-hospital', 'active'=>true, 'disabled'=>false, 'function'=>true),
                                array('id'=>'vitals', 'title'=>'VITALS', 'icon'=>' fas fa-th-large', 'active'=>false, 'disabled'=>true, 'function'=>true),
                                array('id'=>'medical_history', 'title'=>'DIAGNOSIS: MEDICAL HISTORY', 'icon'=>' fas fa-cube', 'active'=>false, 'disabled'=>true, 'function'=>true),
                                array('id'=>'physical_examination', 'title'=>'DIAGNOSIS: PHYSICAL EXAMINATION', 'icon'=>' fas fa-bed', 'active'=>false, 'disabled'=>true, 'function'=>true),
                                array('id'=>'laboratory_test', 'title'=>'DIAGNOSIS: LABORATORY TEST', 'icon'=>' fas fa-bed', 'active'=>false, 'disabled'=>true, 'function'=>true),
                                array('id'=>'medication', 'title'=>'MEDICATION', 'icon'=>' fas fa-bed', 'active'=>false, 'disabled'=>true, 'function'=>true),
                            )
                        ])
                    </div>
                    <div class="col-9">
                        @include('backend.pages.hms.transaction.patient_management.check_up_tab.general_tab')
                        @include('backend.pages.hms.transaction.patient_management.check_up_tab.vitals_tab')
                        @include('backend.pages.hms.transaction.patient_management.check_up_tab.medical_history_tab')
                        @include('backend.pages.hms.transaction.patient_management.check_up_tab.physical_examination_tab')
                        @include('backend.pages.hms.transaction.patient_management.check_up_tab.laboratory_test_tab')
                        @include('backend.pages.hms.transaction.patient_management.check_up_tab.medication_tab')
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
<script src="/js/backend/pages/hms/transaction/patient_management/check_up.js"></script>
@endsection

@section('styles')
<link href="{{asset('/css/custom/transaction/patient_management/check_up.css')}}" rel="stylesheet">
@endsection
