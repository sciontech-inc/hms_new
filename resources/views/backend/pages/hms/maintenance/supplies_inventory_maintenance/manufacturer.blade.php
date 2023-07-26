@extends('backend.master.index')

@section('title', 'MANUFACTURER')

@section('breadcrumbs')
    <span>MAINTENANCE</span> / <span class="highlight">MANUFACTURER</span>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">MANUFACTURER: MAINTENANCE SCREEN</h5>
            </div>
            @include('backend.partial.flash-message')
            <div class="col-12">
                <div class="card-body">
                    <table id="manufacturer_table" class="table table-striped" style="width:100%"> </table>
                </div>
            </div>
        </div>
    </div>
</div>

@section('sc-modal')
@parent
<div class="sc-modal-content" id="manufacturer_form">
    <div class="sc-modal-dialog sc-xl">
        <div class="sc-modal-header">
            <span class="sc-title-bar"></span>
            <span class="sc-close" onclick="scion.create.sc_modal('manufacturer_form').hide('all', modalHideFunction)"><i class="fas fa-times"></i></span>
        </div>
        <div class="sc-modal-body">
            <form method="post" id="manufacturerForm" class="form-record">
                <div class="row">
                    <div class="form-group col-md-6 manufacturer_code">
                        <label>MANUFACTURER CODE</label>
                        <input type="text" class="form-control" id="manufacturer_code" name="manufacturer_code"/>
                    </div>
                    <div class="form-group col-md-6 manufacturer_name">
                        <label>MANUFACTURER NAME</label>
                        <input type="text" class="form-control" id="manufacturer_name" name="manufacturer_name"/>
                    </div>
                    <div class="form-group col-md-6 contact_person">
                        <label>CONTACT PERSON</label>
                        <input type="text" class="form-control" id="contact_person" name="contact_person"/>
                    </div>
                    <div class="form-group col-md-6 email">
                        <label>EMAIL</label>
                        <input type="email" class="form-control" id="email" name="email"/>
                    </div>
                    <div class="form-group col-md-6 contact_number_1">
                        <label>CONTACT NUMBER</label>
                        <input type="number" class="form-control" id="contact_number_1" name="contact_number_1"/>
                    </div>
                    <div class="form-group col-md-6 contact_number_2">
                        <label>CONTACT NUMBER </label>
                        <input type="number" class="form-control" id="contact_number_2" name="contact_number_2"/>
                    </div>
                    <div class="form-group col-md-12 payment_terms">
                        <label>PAYMENT TERMS</label>
                        <input type="text" class="form-control" id="payment_terms" name="payment_terms"/>
                    </div>
                    <div class="form-group col-md-6 tax_information">
                        <label>TAX INFORMATION</label>
                        <input type="text" class="form-control" id="tax_information" name="tax_information"/>
                    </div>
                    <div class="form-group col-md-6 certification">
                        <label>CERTIFICATION</label>
                        <input type="text" class="form-control" id="certification" name="certification"/>
                    </div>
                    <div class="form-group col-md-12 products">
                        <label>PRODUCTS</label>
                        <input type="text" class="form-control" id="products" name="products"/>
                    </div>
                    <div class="form-group col-md-4 lead_time">
                        <label>LEAD TIME</label>
                        <input type="text" class="form-control" id="lead_time" name="lead_time"/>
                    </div>
                    <div class="form-group col-md-4 delivery_terms">
                        <label>DELIVERY TERMS</label>
                        <input type="text" class="form-control" id="delivery_terms" name="delivery_terms"/>
                    </div>
                    <div class="form-group col-md-4 performance_metrics">
                        <label>PERFORMANCE METRICS</label>
                        <input type="text" class="form-control" id="performance_metrics" name="performance_metrics"/>
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
    <script src="/js/backend/pages/hms/maintenance/supplies_inventory_maintenance/manufacturer.js"></script>

@endsection