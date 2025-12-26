@extends('backend.master.index')

@section('title', 'CATEGORY (LABORATORY TEST)')

@section('breadcrumbs')
    <span>MAINTENANCE / LABORATORY TEST</span> / <span class="highlight">CATEGORY</span>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            @include('backend.partial.flash-message')
            <div class="col-12">
                <div class="card-body">
                    <table id="category_test_table" class="table table-striped" style="width:100%"></table>
                </div>
            </div>
        </div>
    </div>
</div>

@section('sc-modal')
@parent
<div class="sc-modal-content" id="sub_category">
    <div class="sc-modal-dialog sc-xl">
        <div class="sc-modal-header">
            <span class="sc-title-bar"></span>
            <span class="sc-close" onclick="scion.create.sc_modal('category_test_form').hide('all', modalHideFunction)"><i class="fas fa-times"></i></span>
        </div>
        <div class="sc-modal-body">
            <table id="sub_category_table" class="table table-striped" style="width:100%"></table>
        </div>
    </div>
</div>
@endsection

@section('sc-modal')
@parent
<div class="sc-modal-content" id="category_test_form">
    <div class="sc-modal-dialog">
        <div class="sc-modal-header">
            <span class="sc-title-bar"></span>
            <span class="sc-close" onclick="scion.create.sc_modal('category_test_form').hide('all', modalHideFunction)"><i class="fas fa-times"></i></span>
        </div>
        <div class="sc-modal-body">
            <form id="appForm" method="post" class="form-record">
                <div class="row">
                    <div class="form-group col-12 code">
                        <label for="">CODE:</label>
                        <input type="text" class="form-control" id="code" name="code" required/>
                    </div>
                    <div class="form-group col-12 code">
                        <label for="">CATEGORY NAME:</label>
                        <input type="text" class="form-control" id="category_name" name="category_name" required/>
                    </div>
                    <div class="form-group col-12 code">
                        <label for="">DESCRIPTION:</label>
                        <input type="text" class="form-control" id="description" name="description" required/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
    

@section('sc-modal')
@parent
<div class="sc-modal-content" id="sub_range">
    <div class="sc-modal-dialog sc-xl">
        <div class="sc-modal-header">
            <span class="sc-title-bar"></span>
            <span class="sc-close" onclick="scion.create.sc_modal('sub_range_form').hide('all', modalHideFunction)"><i class="fas fa-times"></i></span>
        </div>
        <div class="sc-modal-body">
            <table id="sub_range_table" class="table table-striped" style="width:100%"></table>
        </div>
    </div>
</div>
@endsection

@section('sc-modal')
@parent
<div class="sc-modal-content" id="sub_category_form">
    <div class="sc-modal-dialog">
        <div class="sc-modal-header">
            <span class="sc-title-bar"></span>
            <span class="sc-close" onclick="scion.create.sc_modal('sub_category_form').hide('all', modalHideFunction)"><i class="fas fa-times"></i></span>
        </div>
        <div class="sc-modal-body">
            <form id="appForm" method="post" class="form-record">
                <div class="row">
                    <div class="form-group col-12 sub_code">
                        <label for="">CODE:</label>
                        <input type="text" class="form-control" id="sub_code" name="sub_code" required/>
                    </div>
                    <div class="form-group col-12 test_name">
                        <label for="">TEST NAME:</label>
                        <input type="text" class="form-control" id="test_name" name="test_name" required/>
                    </div>
                    <div class="form-group col-12 unit_of_measure">
                        <label for="">UNIT OF MEASURE:</label>
                        <input type="text" class="form-control" id="unit_of_measure" name="unit_of_measure" required/>
                    </div>
                    
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('sc-modal')
@parent
<div class="sc-modal-content" id="sub_range_form">
    <div class="sc-modal-dialog">
        <div class="sc-modal-header">
            <span class="sc-title-bar"></span>
            <span class="sc-close" onclick="scion.create.sc_modal('sub_range_form').hide('all', modalHideFunction)"><i class="fas fa-times"></i></span>
        </div>
        <div class="sc-modal-body">
            <form id="appForm" method="post" class="form-record">
                <div class="row">
                    <div class="form-group col-12 sub_code">
                        <label for="">CODE:</label>
                        <input type="text" class="form-control" id="range_code" name="range_code" required/>
                    </div>
                    <div class="form-group col-12 test_name">
                        <label for="">NAME:</label>
                        <input type="text" class="form-control" id="range_name" name="range_name" required/>
                    </div>
                    <div class="form-group col-12 unit_of_measure">
                        <label for="">LOW:</label>
                        <input type="text" class="form-control" id="low" name="low" required/>
                    </div>
                    <div class="form-group col-12 unit_of_measure">
                        <label for="">HIGH:</label>
                        <input type="text" class="form-control" id="high" name="high" required/>
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
<script src="/js/backend/pages/hms/maintenance/lab_test/category_test.js"></script>
@endsection

@section('styles')
<link href="{{asset('/css/custom/app_setup/app.css')}}" rel="stylesheet">
<style>
    #sub_category_form {
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