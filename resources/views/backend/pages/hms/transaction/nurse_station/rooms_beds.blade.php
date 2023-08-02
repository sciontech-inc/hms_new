@php
    $type = 'full-view';
@endphp
@extends('backend.master.index')

@section('title', 'ROOMS AND BEDS')

@section('breadcrumbs')
    <span>TRANSACTION / NURSE STATION </span> / <span class="highlight">ROOMS AND BEDS</span>
@endsection

@section('content')
<div class="row" style="height: 100%;">
    <div class="col-md-9" style="height: 100%;">
        <div style="height: 100%;">
            <h5>FLOOR LIST</h5>
            <div class="row floor-list">
            </div>
            <br>
            <div class="row" style="height: calc(100% - 123px);">
                <div class="col-3" style="height: 100%;">
                    <h5>ROOM LIST</h5>
                    <ul class="room-list"></ul>
                </div>
                <div class="col-9" style="overflow: auto; overflow-x:hidden !important; height: 100%;">
                    <h5>BED LIST</h5>
                    <div class="row bed-list"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3" style="height: 100%;">
        <form class="form-record" method="post" id="addmissionForm">
            <div id="admission_form" class="row">
                <div class="col-12">
                    <h5>ADMISSION FORM</h5>
                </div>
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
                            'modal_type'=> 'all',
                            'lookup_type' => 'main'
                        ])
                    </div>
                </div>
                <div class="col-12">
                    <label>BED NO.:</label>
                    <div class="admission admission-bed-no">--</div>
                    <label>PRICE.:</label>
                    <div class="admission admission-price">--</div>
                </div>
                <div class="col-12">
                    <div class="admission-request-button text-right"></div>
                </div>
            </div>
        </form>

        <div class="help-information">
        </div>
    </div>
</div>

@section('sc-modal')
@parent

@endsection
@endsection

@section('scripts')
<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="/js/backend/pages/hms/transaction/nurse_station/room_beds.js"></script>
@endsection

@section('styles')
<link href="{{asset('/css/custom/transaction/nurse_station/rooms_beds.css')}}" rel="stylesheet">
@endsection