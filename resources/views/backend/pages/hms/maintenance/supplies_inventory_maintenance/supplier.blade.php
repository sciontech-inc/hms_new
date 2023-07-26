@extends('backend.master.index')

@section('title', 'SUPPLIER')

@section('breadcrumbs')
    <span>MAINTENANCE</span> / <span class="highlight">SUPPLIER</span>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">SUPPLIER: MAINTENANCE SCREEN</h5>
            </div>
            @include('backend.partial.flash-message')
            <div class="col-12">
                <div class="card-body">
                    <table id="supplier_table" class="table table-striped" style="width:100%"> </table>
                </div>
            </div>
        </div>
    </div>
</div>

@section('sc-modal')
@parent
<div class="sc-modal-content" id="supplier_form">
    <div class="sc-modal-dialog sc-xl">
        <div class="sc-modal-header">
            <span class="sc-title-bar"></span>
            <span class="sc-close" onclick="scion.create.sc_modal('supplier_form').hide('all', modalHideFunction)"><i class="fas fa-times"></i></span>
        </div>
        <div class="sc-modal-body">
            <form method="post" id="manufacturerForm" class="form-record">
                <div class="row">
                    <div class="form-group col-md-6 supplier_code">
                        <label>SUPPLIER CODE</label>
                        <input type="text" class="form-control" id="supplier_code" name="supplier_code"/>
                    </div>
                    <div class="form-group col-md-6 supplier_name">
                        <label>SUPPLIER NAME</label>
                        <input type="text" class="form-control" id="supplier_name" name="supplier_name"/>
                    </div>
                    <div class="form-group col-md-6 contact_person">
                        <label>CONTACT PERSON</label>
                        <input type="text" class="form-control" id="contact_person" name="contact_person"/>
                    </div>
                    <div class="form-group col-md-6 email">
                        <label>EMAIL</label>
                        <input type="email" class="form-control" id="email" name="email"/>
                    </div>
                    <div class="form-group col-md-12 address">
                        <label>ADDRESS</label>
                        <textarea class="form-control" name="address" id="address" cols="2" rows="2"></textarea>
                    </div>
                    <div class="form-group col-md-6 contact_number_1">
                        <label>CONTACT NUMBER</label>
                        <input type="number" class="form-control" id="contact_number_1" name="contact_number_1"/>
                    </div>
                    <div class="form-group col-md-6 contact_number_2">
                        <label>CONTACT NUMBER</label>
                        <input type="number" class="form-control" id="contact_number_2" name="contact_number_2"/>
                    </div>
                    <div class="form-group col-md-12 terms_agreement">
                        <label>TERMS & AGREEMENT</label>
                        <input type="text" class="form-control" id="terms_agreement" name="terms_agreement"/>
                    </div>
                    <div class="form-group col-md-12 pricing_agreement">
                        <label>PRICING AGREEMENT</label>
                        <input type="text" class="form-control" id="pricing_agreement" name="pricing_agreement"/>
                    </div>
                    <div class="form-group col-md-12 delivery_terms">
                        <label>DELIVERY TERMS</label>
                        <input type="text" class="form-control" id="delivery_terms" name="delivery_terms"/>
                    </div>
                    <div class="form-group col-md-12 remarks">
                        <label>REMARKS</label>
                        <textarea class="form-control" name="remarks" id="remarks" cols="2" rows="2"></textarea>
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
    <script src="/js/backend/pages/hms/maintenance/supplies_inventory_maintenance/supplier.js"></script>

@endsection