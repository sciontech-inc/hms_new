@extends('backend.master.index')

@section('title', 'SERVICE TYPE')

@section('breadcrumbs')
    <span>MAINTENANCE</span> / <span class="highlight">SERVICE TYPE</span>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">SERVICE TYPE: MAINTENANCE SCREEN</h5>
            </div>
            @include('backend.partial.flash-message')
            <div class="col-12">
                <div class="card-body">
                    <table id="service_type_table" class="table table-striped" style="width:100%"> </table>
                </div>
            </div>
        </div>
    </div>
</div>

@section('sc-modal')
@parent
<div class="sc-modal-content" id="service_type_form">
    <div class="sc-modal-dialog">
        <div class="sc-modal-header">
            <span class="sc-title-bar"></span>
            <span class="sc-close" onclick="scion.create.sc_modal('service_type_form').hide('all', modalHideFunction)"><i class="fas fa-times"></i></span>
        </div>
        <div class="sc-modal-body">
            <form method="post" id="servicetypeForm" class="form-record">
                <div class="row">
                    <div class="form-group col-md-12 service_type">
                        <label>SERVICE TYPE</label>
                        <input type="text" class="form-control" id="service_type" name="service_type"/>
                    </div>
                    <div class="form-group col-md-12 service_description">
                        <label>SERVICE DESCRIPTION</label>
                        <input type="text" class="form-control" id="service_description" name="service_description"/>
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
    <script src="/js/backend/pages/hms/maintenance/patient_management_maintenance/service_type.js"></script>

@endsection