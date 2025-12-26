@php
    $type = 'full-view';    
@endphp

@extends('backend.master.index')

@section('title', 'LABORATORY TEST (VALIDATE)')

@section('breadcrumbs')
    <span>TRANSACTION / PATIENT MANAGEMENT</span> / <span class="highlight">LABORATORY - VALIDATE</span>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            @include('backend.partial.flash-message')
            <div class="col-12">
                <div class="card-body">
                    <table id="lab_perform_table" class="table table-striped" style="width:100%"></table>
                </div>
            </div>
        </div>
    </div>
</div>

@section('sc-modal')
@parent
<div class="sc-modal-content" id="lab_perform_form">
    <div class="sc-modal-dialog sc-md">
        <div class="sc-modal-header">
            <span class="sc-title-bar"></span>
            <span class="sc-close" onclick="scion.create.sc_modal('lab_perform_form').hide('all', modalHideFunction)"><i class="fas fa-times"></i></span>
        </div>
        <div class="sc-modal-body">
            <form id="appForm" method="post" class="form-record">
                @csrf
                    <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            @include('backend.partial.component.lookup', [
                                'label' => "PATIENT ID",
                                'placeholder' => '<NEW>',
                                'id' => "patient_id",
                                'title' => "PATIENT ID",
                                'url' => "/actions/patient/get",
                                'data' => array(
                                    array('data' => "DT_RowIndex", 'title' => "#"),
                                    array('data' => "patient_id", 'title' => "Patient ID"),
                                    array('data' => "firstname", 'title' => "First Name"),
                                    array('data' => "lastname", 'title' => "Last Name"),
                                    array('data' => "email", 'title' => "Email"),
                                ),
                                'disable' => true,
                                'lookup_module' => 'patient',
                                'modal_type'=> '',
                                'lookup_type' => 'modal_lookup'
                            ])
                        </div>
                    </div>
                    <div class="form-group col-12 test_name">
                        <label for="">PATIENT NAME:</label>
                        <input type="hidden" class="form-control" id="patient_id_rec" name="patient_id_rec" required/>
                        <input type="text" class="form-control" id="name" name="name" required/>
                    </div>
                    <div class="form-group col-12 test_name">
                        <label for="">CONTACT NUMBER:</label>
                        <input type="text" class="form-control" id="contact_no" name="contact_no" required/>
                    </div>
                    <div class="form-group col-6 unit_of_measure">
                        <label for="">TRANSACTION #:</label>
                        <input type="text" class="form-control" id="transaction_number" name="transaction_number" required/>
                    </div>
                    <div class="form-group col-6 unit_of_measure">
                        <label for="">REQUEST #:</label>
                        <input type="text" class="form-control" id="request_number" name="request_number" required/>
                    </div>
                    <div class="form-group col-12 unit_of_measure">
                        <label for="">PHYSICIAN NAME:</label>
                        <input type="text" class="form-control" id="physician_name" name="physician_name" required/>
                    </div>
                    <div class="form-group col-12">
                        <label for="">DATE COLLECTED:</label>
                        <input type="datetime-local" class="form-control" name="datetime_collected" id="datetime_collected"/>
                    </div>
                      <div class="form-group col-12 test_name">
                        <label for="">STATUS</label>
                        <select name="result_status" id="result_status" class="form-control">
                            <option value="PENDING">PENDING</option>
                            <option value="PERFORMED">PERFORMED</option>
                            <option value="VALIDATED">VALIDATED</option>
                            <option value="NOTED">NOTED</option>
                            <option value="RELEASED">RELEASED</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('sc-modal')
@parent
<div class="sc-modal-content" id="lab_test_rec_form">
    <div class="sc-modal-dialog sc-xl">
        <div class="sc-modal-header">
            <span class="sc-title-bar"></span>
            <span class="sc-close" onclick="scion.create.sc_modal('lab_test_form').hide('all', modalHideFunction)"><i class="fas fa-times"></i></span>
        </div>
        <div class="sc-modal-body">
            <table id="lab_test_table" class="table table-striped" style="width:100%"></table>
        </div>
    </div>
</div>
@endsection

@section('sc-modal')
@parent
<div class="sc-modal-content" id="validateModal">
    <div class="sc-modal-dialog sc-xl">
        <div class="sc-modal-header">
            <span class="sc-title-bar"></span>
            <span class="sc-close" onclick="scion.create.sc_modal('lab_test_form').hide('all', modalHideFunction)"><i class="fas fa-times"></i></span>
        </div>
        <div class="sc-modal-body">
            <div class="modal-header">
                <h5 class="modal-title">Confirm Action</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <p class="text-danger font-weight-bold">
                    By entering your password, you authorize the use of your
                    <u>digital signature and specimen</u> on printed laboratory documents.
                </p>

                <input type="password"
                       id="validatePassword"
                       class="form-control"
                       placeholder="Enter your password"
                       autocomplete="off">
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" onclick="submitValidation()">Confirm</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('sc-modal')
@parent
<div class="sc-modal-content" id="lab_test_form">
    <div class="sc-modal-dialog sc-md">
        <div class="sc-modal-header">
            <span class="sc-title-bar"></span>
            <span class="sc-close" onclick="scion.create.sc_modal('lab_test_form').hide('all', modalHideFunction)"><i class="fas fa-times"></i></span>
        </div>
        <div class="sc-modal-body">
            <form id="appForm" method="post" class="form-record">
                @csrf
                    <div class="row">
                    <div class="form-group col-12 test_name">
                        <label for="">CATEGORY TEST:</label>
                        <select name="category_id" id="category_id" class="form-control"></select>
                    </div>
                    <div class="form-group col-12 test_name">
                        <label for="">SUB-CATEGORY TEST:</label>
                        <select name="sub_category_id" id="sub_category_id" class="form-control" disabled></select>
                    </div>
                    <div class="form-group col-6 unit_of_measure">
                        <label for="">RESULT:</label>
                        <input type="text" class="form-control" id="result" name="result" required/>
                    </div>
                    <div class="form-group col-6 unit_of_measure">
                        <label for="">FLAG:</label>
                        <input type="text" class="form-control" id="flag" name="flag" required/>
                    </div>
                    <div class="form-group col-12 unit_of_measure">
                        <label for="">REMARKS:</label>
                        <input type="text" class="form-control" id="remarks" name="remarks" required/>
                    </div>
                    <div class="form-group col-12 test_name">
                        <label for="">STATUS</label>
                        <select name="status" id="status" class="form-control">
                            <option value="PENDING">PENDING</option>
                            <option value="PERFORMED">PERFORMED</option>
                            <option value="VALIDATED">VALIDATED</option>
                            <option value="NOTED">NOTED</option>
                            <option value="RELEASED">RELEASED</option>
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
<script src="/js/backend/pages/hms/transaction/patient_management/laboratory_validated.js"></script>
@endsection

@section('styles')
<link href="{{asset('/css/custom/app_setup/app.css')}}" rel="stylesheet">
<style>
    #lab_test_form {
        z-index: 2;
    }

     #sub_range {
        z-index: 3;
    }

    #sub_range_form {
        z-index: 4;
    }
</style>
@endsection