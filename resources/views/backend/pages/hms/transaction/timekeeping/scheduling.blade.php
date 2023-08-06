@php
    $type = 'full-view';
@endphp
@extends('backend.master.index')

@section('title', 'SCHEDULING')

@section('breadcrumbs')
    <span>TRANSACTION / TIMEKEEPING</span> / <span class="highlight">SCHEDULING</span>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">SCHEDULING</h5>
            </div>
            @include('backend.partial.flash-message')
            <div class="col-12">
                <div class="card-body">
                    <div class="row">
                        {{-- <div class="col-2">
                            <div class="form-group">
                                <select name="department" id="department" class="form-control" onchange="filter(this.value)">
                                    <option value="all">ALL DEPARTMENT</option>
                                    @foreach ($departments as $department)
                                        <option value="{{$department->id}}">{{$department->description}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}
                        <div class="col-4">
                            <div class="form-group">
                                <input type="date" class="form-control" name="date-filter" id="date-filter" onchange="filter('all')"/>
                            </div>
                        </div>
                        <div class="col-8 text-right">
                            <button class="btn btn-danger btn-xl btn-action btn-copy" onclick="copySchedule()">COPY</button>
                            <button class="btn btn-warning btn-xl btn-action btn-paste" style="display:none;" onclick="pasteSchedule()">PASTE</button>
                        </div>
                    </div>
                    <table id="doctor_table" class="table table-striped" style="width:100%"></table>
                </div>
            </div>
        </div>
    </div>
</div>

@section('sc-modal')
@parent
<div class="sc-modal-content" id="scheduling_form">
    <div class="sc-modal-dialog sc-xl">
        <div class="sc-modal-header">
            <span class="sc-title-bar"></span>
            <span class="sc-close" onclick="scion.create.sc_modal('scheduling_form').hide('all', modalHideFunction)"><i class="fas fa-times"></i></span>
        </div>
        <div class="sc-modal-body">
            <form method="post" id="schedulingForm" class="form-record">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="form-group type">
                            <label>TYPE <span class="required">*</span></label>
                            <select name="type" id="type" class="form-control" onchange="selectType(this.value)">
                                <option value="">SELECT TYPE</option>
                                <option value="0">WORK</option>
                                <option value="1">OFF</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="form-group type_description" style="display:none;">
                            <label>TYPE DESCRIPTION <span class="required">*</span></label>
                            <input type="text" class="form-control lowercase" name="type_description" id="type_description"/>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group start_time">
                            <label>START TIME <span class="required">*</span></label>
                            <input type="datetime-local" class="form-control" name="start_time" id="start_time"/>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group end_time">
                            <label>END TIME <span class="required">*</span></label>
                            <input type="datetime-local" class="form-control" name="end_time" id="end_time"/>
                        </div>
                    </div>
                    {{-- <div class="col-xl-6 ">
                        <div class="form-group work_assignment_id">
                            <label>WORK ASSIGNMENT <span class="required">*</span></label>
                            <select name="work_assignment_id" id="work_assignment_id" class="form-control">
                                <option value="">SELECT WORK ASSIGNMENT</option>
                                @foreach ($work_assignments as $work_assignment)
                                    <option value="{{ $work_assignment->id }}">{{ $work_assignment->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group earning_id">
                            <label>EARNINGS <span class="required">*</span></label>
                            <select name="earning_id" id="earning_id" class="form-control">
                                <option value="">SELECT EARNINGS</option>
                                @foreach ($earnings as $earning)
                                    <option value="{{ $earning->id }}">{{ $earning->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> --}}
                    <div class="col-xl-12">
                        <div class="form-group status">
                            <label>STATUS <span class="required">*</span></label>
                            <select name="status" id="status" class="form-control">
                                <option value="1">ACTIVE</option>
                                <option value="0">INACTIVE</option>
                            </select>
                        </div>
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
    <script src="/js/backend/pages/hms/transaction/time_keeping/scheduling.js"></script>
@endsection

@section('styles-2')
    <link href="{{asset('/css/custom/transaction/timekeeping/scheduling.css')}}" rel="stylesheet">
@endsection