@php
    $type = '2-view';    
@endphp

@extends('backend.master.index')

@section('title', 'FACILITY')

@section('breadcrumbs')
    <span>MAINTENANCE </span> / <span class="highlight">FACILITY</span>
@endsection

@section('left-content')
    @include('backend.partial.component.tab_list', [
        'id'=>'facility',
        'data'=>array(
            array('id'=>'building', 'title'=>'BUILDING', 'icon'=>' fas fa-hospital', 'active'=>true, 'disabled'=>false, 'function'=>true),
            array('id'=>'floors', 'title'=>'FLOORS', 'icon'=>' fas fa-th-large', 'active'=>false, 'disabled'=>true, 'function'=>true),
            array('id'=>'rooms', 'title'=>'ROOMS', 'icon'=>' fas fa-cube', 'active'=>false, 'disabled'=>true, 'function'=>true),
            array('id'=>'beds', 'title'=>'BEDS', 'icon'=>' fas fa-bed', 'active'=>false, 'disabled'=>true, 'function'=>true),
        )
    ])
@endsection

@section('content')
<div class="row" style="height:100%;">
    <div class="col-12" style="height:100%;">
        <div class="tab" style="height:100%;">
            <div class="tab-content">
                <form class="form-record" method="post" id="patientsForm">
                    <div class="row"> 
                        <div class="col-md-6">
                            <div class="form-group">
                                @include('backend.partial.component.lookup', [
                                    'label' => "BUILDING ID",
                                    'placeholder' => '<NEW>',
                                    'id' => "id",
                                    'title' => "BUILDING ID",
                                    'url' => "/actions/building/get",
                                    'data' => array(
                                        array('data' => "DT_RowIndex", 'title' => "#"),
                                        array('data' => "id", 'title' => "BUILDING NUMBER"),
                                        array('data' => "name", 'title' => "BUILDING NAME")
                                    ),
                                    'disable' => true,
                                    'lookup_module' => 'building',
                                    'modal_type'=> 'all',
                                    'lookup_type' => 'main'
                                ])
                            </div>
                        </div>
                        
                        <div class="col-6">
                            <div class="form-group name">
                                <label>BUILDING NAME <span class="required">*</span>:</label>
                                <input type="text" class="form-control" name="name" id="name"/>
                            </div>
                        </div>
                    </div>
                    @include('backend.pages.hms.maintenance.facility_tab.building_tab')
                </form>
            </div>
        </div>
    </div>
</div>

@section('sc-modal')
@parent
<div class="sc-modal-content" id="app_type_form">
    <div class="sc-modal-dialog">
        <div class="sc-modal-header">
            <span class="sc-title-bar"></span>
            <span class="sc-close" onclick="scion.create.sc_modal('app_type_form').hide('all', modalHideFunction)"><i class="fas fa-times"></i></span>
        </div>
        <div class="sc-modal-body">
            <form id="app_typeForm" method="post" class="form-record">
                <div class="row">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
    

@endsection

@section('scripts')
<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="/js/backend/pages/hms/maintenance/facility.js"></script>
@endsection