@php
    $type = 'full-view';
@endphp
@extends('backend.master.index')

@section('title', "INFORM CONCENT FORM")

@section('breadcrumbs')
    <span>FORMS / PCF FORMS </span> / <span class="highlight">INFORM CONCENT</span>
@endsection

@section('content')
<div class="row" style="height: 100%;">
    <iframe 
        src="{{ route('forms.consent') }}" 
        style="width:100%; height:100vh; border:none;">
    </iframe>
</div>

@section('sc-modal')
@parent

@endsection
@endsection

@section('scripts')
<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="/js/backend/pages/hms/forms/pcf_form/doctor_order.js"></script>
@endsection

@section('styles')
<link href="{{asset('/css/custom/transaction/nurse_station/rooms_beds.css')}}" rel="stylesheet">

@endsection