@php

    $type = '2-view';

@endphp 

@extends('backend.master.index')

@section('title', 'DOCTORS')

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
    <span>MASTERFILE</span>  /  <span class="highlight">DOCTOR LIST</span>
@endsection

@section('left-content')
    @include('backend.partial.component.tab_list', [
        'id'=>'doctors',
        'data'=>array(
            array('id'=>'general', 'title'=>'GENERAL', 'icon'=>' fas fa-file-alt', 'active'=>true, 'disabled'=>false, 'function'=>true),
            array('id'=>'doctor_qualification', 'title'=>'QUALIFICATION & EDUCATION', 'icon'=>' fas fa-university', 'active'=>false, 'disabled'=>true, 'function'=>true),
            array('id'=>'doctor_work', 'title'=>'WORK EXPERIENCE', 'icon'=>' fas fa-business-time', 'active'=>false, 'disabled'=>true, 'function'=>true),
            array('id'=>'doctor_expertise', 'title'=>'EXPERTISE & SPECIALIZATION', 'icon'=>' fas fa-award', 'active'=>false, 'disabled'=>true, 'function'=>true),
            array('id'=>'doctor_research', 'title'=>'RESARCH CONTRIBUTION', 'icon'=>' fas fa-microscope', 'active'=>false, 'disabled'=>true, 'function'=>true),
        )
    ])
@endsection


@section('content')
<div class="row" style="height:100%;">
    <div class="col-12" style="height:100%;">
        <div class="tab" style="height:100%;">
            <div class="tab-content">
                <form class="form-record" method="post" id="doctorsForm">
                    @include('backend.pages.hms.transaction.staff_management.doctor_tab.general_tab')
                    @include('backend.pages.hms.transaction.staff_management.doctor_tab.doctor_qualification_tab')
                    @include('backend.pages.hms.transaction.staff_management.doctor_tab.doctor_work_tab')
                    @include('backend.pages.hms.transaction.staff_management.doctor_tab.doctor_expertise_tab')
                    @include('backend.pages.hms.transaction.staff_management.doctor_tab.doctor_research_tab')

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
<script src="/js/backend/pages/hms/transaction/staff_management/doctor.js"></script>
<script src="https://f001.backblazeb2.com/file/buonzz-assets/jquery.ph-locations-v1.0.0.js"></script>
<script>
  
</script>
@endsection
