@php

    $type = '2-view';

@endphp 

@extends('backend.master.index')

@section('title', 'CONSULTANT INFORMATION MAINTENANCES')

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
    <span>MAINTENANCE</span>  /  <span class="highlight">CONSULTANT INFORMATION</span>
@endsection

@section('left-content')
    @include('backend.partial.component.tab_list', [
        'id'=>'consultant_information',
        'data'=>array(
            array('id'=>'prc_license_type', 'title'=>'PRC LICENSE TYPE', 'icon'=>' fas fa-id-badge', 'active'=>true, 'disabled'=>false, 'function'=>true),
            array('id'=>'phic_group', 'title'=>'PHIC GROUP', 'icon'=>' fas fa-layer-group', 'active'=>false, 'disabled'=>false, 'function'=>true),
            
        )
    ])
@endsection


@section('content')
<div class="row" style="height:100%;">
    <div class="col-12" style="height:100%;">
        <div class="tab" style="height:100%;">
            <div class="tab-content">
                <form class="form-record" method="post" id="consultantinformationForm">
                    @include('backend.pages.hms.maintenance.consultant_information_maintenance.consultant_information_tab.prc_license_type_tab')
                    @include('backend.pages.hms.maintenance.consultant_information_maintenance.consultant_information_tab.phic_group_tab')

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
<script src="/js/backend/pages/hms/maintenance/consultant_information_maintenance/consultant_information.js"></script>
<script src="https://f001.backblazeb2.com/file/buonzz-assets/jquery.ph-locations-v1.0.0.js"></script>
<script>
  
</script>
@endsection
