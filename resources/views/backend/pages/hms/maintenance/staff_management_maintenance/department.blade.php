@extends('backend.master.index')

@section('title', 'DEPARTMENT')

@section('breadcrumbs')
    <span>MAINTENANCE</span> / <span class="highlight">DEPARTMENTS</span>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">DEPARTMENT: MAINTENANCE SCREEN</h5>
            </div>
            @include('backend.partial.flash-message')
            <div class="col-12">
                <div class="card-body">
                    <table id="department_table" class="table table-striped" style="width:100%"> </table>
                </div>
            </div>
        </div>
    </div>
</div>

@section('sc-modal')
@parent
<div class="sc-modal-content" id="department_form">
    <div class="sc-modal-dialog">
        <div class="sc-modal-header">
            <span class="sc-title-bar"></span>
            <span class="sc-close" onclick="scion.create.sc_modal('department_form').hide('all', modalHideFunction)"><i class="fas fa-times"></i></span>
        </div>
        <div class="sc-modal-body">
            <form method="post" id="departmentForm" class="form-record">
                <div class="row">
                    <div class="form-group col-md-12 department_code">
                        <label>DEPARTMENT CODE</label>
                        <input type="text" class="form-control" id="department_code" name="department_code"/>
                    </div>
                    <div class="form-group col-md-12 description">
                        <label>DESCRIPTION</label>
                        <input type="text" class="form-control" id="description" name="description"/>
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
    <script src="/js/backend/pages/hms/maintenance/staff_management_maintenance/department.js"></script>
@endsection