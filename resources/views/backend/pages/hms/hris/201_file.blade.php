@php

    $type = '2-view';

@endphp 

@extends('backend.master.index')

@section('title', '201 File')

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
    <span>MASTERFILE</span>  /  <span class="highlight">201 File</span>
@endsection

@section('left-content')
    @include('backend.partial.component.tab_list', [
        'id'=>'201file',
        'data'=>array(
            array('id'=>'general', 'title'=>'GENERAL', 'icon'=>' fas fa-file-alt', 'active'=>true, 'disabled'=>false, 'function'=>true),
            array('id'=>'employee_education', 'title'=>'EDUCATIONAL BACKGROUND', 'icon'=>' fas fa-graduation-cap', 'active'=>false, 'disabled'=>true, 'function'=>true),
            array('id'=>'employee_work', 'title'=>'WORK HISTORY', 'icon'=>' fas fa-business-time', 'active'=>false, 'disabled'=>true, 'function'=>true),
            array('id'=>'employee_performance', 'title'=>'PERFORMANCE RECORDS', 'icon'=>' fas fa-chart-bar', 'active'=>false, 'disabled'=>true, 'function'=>true),
            array('id'=>'employee_movement', 'title'=>'EMPLOYEE MOVEMENT', 'icon'=>' fas fa-retweet', 'active'=>false, 'disabled'=>true, 'function'=>true),
            array('id'=>'employee_health', 'title'=>'HEALTH RECORD', 'icon'=>' fas fa-file-medical', 'active'=>false, 'disabled'=>true, 'function'=>true),
            array('id'=>'employee_training', 'title'=>'TRAININGS', 'icon'=>' fas fa-chalkboard-teacher', 'active'=>false, 'disabled'=>true, 'function'=>true),
            array('id'=>'employee_certification', 'title'=>'CERTIFICATIONS', 'icon'=>' fas fa-certificate', 'active'=>false, 'disabled'=>true, 'function'=>true),
            array('id'=>'employee_dependent', 'title'=>'DEPENDENTS', 'icon'=>' fas fa-users', 'active'=>false, 'disabled'=>true, 'function'=>true),

        
        )
    ])
@endsection


@section('content')
<div class="row" style="height:100%;">
    <div class="col-12" style="height:100%;">
        <div class="tab" style="height:100%;">
            <div class="tab-content">
                <form class="form-record" method="post" id="employeeForm">
                    @include('backend.pages.hms.hris.201file_tab.general_tab')
                    @include('backend.pages.hms.hris.201file_tab.employee_education_tab')
                    @include('backend.pages.hms.hris.201file_tab.employee_work_tab')
                    @include('backend.pages.hms.hris.201file_tab.employee_performance_tab')
                    @include('backend.pages.hms.hris.201file_tab.employee_movement_tab')
                    @include('backend.pages.hms.hris.201file_tab.employee_health_tab')
                    @include('backend.pages.hms.hris.201file_tab.employee_training_tab')
                    @include('backend.pages.hms.hris.201file_tab.employee_certification_tab')
                    @include('backend.pages.hms.hris.201file_tab.employee_dependent_tab')

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
<script src="/js/backend/pages/hms/hris/201file.js"></script>
<script src="https://f001.backblazeb2.com/file/buonzz-assets/jquery.ph-locations-v1.0.0.js"></script>
<script>
</script>
@endsection
