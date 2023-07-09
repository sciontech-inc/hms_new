@extends('backend.master.index')

@section('title', 'APP TYPE')

@section('breadcrumbs')
    <span>SETUP / APP SETUP</span> / <span class="highlight">APP TYPE</span>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            @include('backend.partial.flash-message')
            <div class="col-12">
                <div class="card-body">
                    <table id="app_type_table" class="table table-striped" style="width:100%"></table>
                </div>
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
                    <div class="form-group col-12 name">
                        <label for="">NAME:</label>
                        <input type="text" class="form-control" id="name" name="name" required/>
                    </div>
                    <div class="form-group col-12 code">
                        <label for="">CODE:</label>
                        <input type="text" class="form-control" id="code" name="code" required/>
                    </div>
                    <div class="form-group col-12 sort_no">
                        <label for="">SORT NO.:</label>
                        <input type="number" class="form-control" id="sort_no" name="sort_no" value="0" min="0" required/>
                    </div>
                    <div class="form-group col-12 status">
                        <label for="">STATUS:</label>
                        <select name="status" id="status" class="form-control">
                            <option value="1">ACTIVE</option>
                            <option value="0">INACTIVE</option>
                        </select>
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
<script src="/js/backend/pages/hms/setup/app_setup/app_type.js"></script>
@endsection