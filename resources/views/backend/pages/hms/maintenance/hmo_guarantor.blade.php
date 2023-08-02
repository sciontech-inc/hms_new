@extends('backend.master.index')

@section('title', 'HMOs/GUARANTOR')

@section('breadcrumbs')
    <span>HMOs</span> / <span class="highlight">GUARANTORS</span>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">HMOs/GUARANTOR</h5>
            </div>
            @include('backend.partial.flash-message')
            <div class="col-12">
                <div class="card-body">
                    <table id="hmo_guarantor_table" class="table table-striped" style="width:100%"> </table>
                </div>
            </div>
        </div>
    </div>
</div>

@section('sc-modal')
@parent
<div class="sc-modal-content" id="hmo_guarantor_form">
    <div class="sc-modal-dialog">
        <div class="sc-modal-header">
            <span class="sc-title-bar"></span>
            <span class="sc-close" onclick="scion.create.sc_modal('hmo_guarantor_form').hide('all', modalHideFunction)"><i class="fas fa-times"></i></span>
        </div>
        <div class="sc-modal-body">
            <form method="post" id="hmoguarantorForm" class="form-record">
                <div class="row">
                    <div class="form-group col-md-12 code">
                        <label>CODE</label>
                        <input type="text" class="form-control" id="code" name="code"/>
                    </div>
                    <div class="form-group col-md-12 guarantor_name">
                        <label>GUARANTOR NAME</label>
                        <input type="text" class="form-control" id="guarantor_name" name="guarantor_name"/>
                    </div>
                    <div class="form-group col-md-6 telephone">
                        <label>TELEPHONE</label>
                        <input type="number" class="form-control" id="telephone" name="telephone"/>
                    </div>
                    <div class="form-group col-md-6 fax_no">
                        <label>FAX NO</label>
                        <input type="number" class="form-control" id="fax_no" name="fax_no"/>
                    </div>
                    <div class="form-group col-md-12 contact_no">
                        <label>CONTACT NO</label>
                        <input type="number" class="form-control" id="contact_no" name="contact_no"/>
                    </div>
                    <div class="form-group col-md-12 email">
                        <label>EMAIL</label>
                        <input type="email" class="form-control" id="email" name="email"/>
                    </div>
                    <div class="form-group col-md-12 address">
                        <label>ADDRESS</label>
                        <input type="text" class="form-control" id="address" name="address"/>
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
    <script src="/js/backend/pages/hms/maintenance/hmo_guarantor.js"></script>

@endsection