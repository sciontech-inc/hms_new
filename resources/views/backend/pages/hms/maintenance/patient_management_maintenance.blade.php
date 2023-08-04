@php

    $type = '2-view';

@endphp 

@extends('backend.master.index')

@section('title', 'PATIENT MANAGEMENT MAINTENANCES')

@section('styles')
<style>
    .sc-modal-dialog {
        max-width: 720px;
        background: #fff;
        top: 20px;
        position: relative;
        margin: auto;
        border-radius: 9px;
    }
    img#barcode {
        width: 160px;
        height: auto;
    }

</style>

@endsection

@section('breadcrumbs')
    <span>MAINTENANCE</span>  /  <span class="highlight">PATIENT MANAGEMENT</span>
@endsection

@section('left-content')
    @include('backend.partial.component.tab_list', [
        'id'=>'patient_management',
        'data'=>array(
            array('id'=>'allergies', 'title'=>'ALLERGIES', 'icon'=>' fas fa-virus', 'active'=>true, 'disabled'=>false, 'function'=>true),
            array('id'=>'service_type', 'title'=>'SERVICE TYPE', 'icon'=>' fas fa-clipboard-list', 'active'=>true, 'disabled'=>false, 'function'=>true),
            array('id'=>'patient_industry', 'title'=>'PATIENT INDUSTRY', 'icon'=>' fas fa-industry', 'active'=>true, 'disabled'=>false, 'function'=>true),
            array('id'=>'patient_work_level', 'title'=>'PATIENT WORK LEVEL', 'icon'=>' fas fa-briefcase', 'active'=>true, 'disabled'=>false, 'function'=>true),
       
        )
    ])
@endsection


@section('content')
<div class="row" style="height:100%;">
    <div class="col-12" style="height:100%;">
        <div class="tab" style="height:100%;">
            <div class="tab-content">
                <form class="form-record" method="post" id="patientmanagementForm">
                    @include('backend.pages.hms.maintenance.patient_management_maintenance.patient_management_tab.allergies_tab')
                    @include('backend.pages.hms.maintenance.patient_management_maintenance.patient_management_tab.service_type_tab')
                    @include('backend.pages.hms.maintenance.patient_management_maintenance.patient_management_tab.patient_industry_tab')
                    @include('backend.pages.hms.maintenance.patient_management_maintenance.patient_management_tab.patient_work_level_tab')

                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('right-content')
<div class="row">
    <div class="col-md-12">
      
    </div>
</div>
@endsection

@section('scripts')
<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="/js/backend/pages/hms/maintenance/patient_management_maintenance/patient_management.js"></script>
<script src="https://f001.backblazeb2.com/file/buonzz-assets/jquery.ph-locations-v1.0.0.js"></script>
<script>
  
</script>
@endsection
