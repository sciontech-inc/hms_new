
@extends('backend.master.index')

@section('title', 'PHILHEALTH UTILITY')

@section('breadcrumbs')
    <span>TRANSACTION </span> / <span class="highlight">PHILHEALTH UTILITY</span>
@endsection

@section('left-content')
    @include('backend.partial.component.tab_list', [
        'id'=>'facility',
        'data'=>array(
            array('id'=>'pin_verification', 'title'=>'PIN VERIFICATION', 'icon'=>' fas fa-key', 'active'=>true, 'disabled'=>false, 'function'=>true),
            array('id'=>'doctor_accreditation', 'title'=>'DOCTOR ACCREDITATION CHECK', 'icon'=>' fas fa-certificate', 'active'=>false, 'disabled'=>false, 'function'=>true),
            array('id'=>'doctor_accreditation_number', 'title'=>'DOCTOR ACCREDITATION NUMBER', 'icon'=>' fas fa-user-md', 'active'=>false, 'disabled'=>false, 'function'=>true),
            array('id'=>'single_period_confinement', 'title'=>'CHECK SINGLE PERIOD OF CONFINEMENT', 'icon'=>' fas fa-file-archive', 'active'=>false, 'disabled'=>false, 'function'=>true),

        )
    ])
@endsection

@section('content')
<div class="row" style="height:100%;">
    <div class="col-12" style="height:100%;">
        <div class="tab" style="height:100%;">
            <div class="tab-content" style="height:100%;max-height:none !important;">
                <form class="form-record" method="post" id="utilityForm" style="height:100%;">
                    @include('backend.pages.hms.transaction.philhealth.utility_tab.pin_verification_tab')
                    @include('backend.pages.hms.transaction.philhealth.utility_tab.doctor_accreditation_tab')
                    @include('backend.pages.hms.transaction.philhealth.utility_tab.doctor_accreditation_number_tab')
                    @include('backend.pages.hms.transaction.philhealth.utility_tab.single_period_confinement_tab')
            
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
        </div>
    </div>
</div>
@endsection
    

@endsection

@section('scripts')
<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="/js/backend/pages/hms/transaction/philhealth/utility.js"></script>
@endsection

