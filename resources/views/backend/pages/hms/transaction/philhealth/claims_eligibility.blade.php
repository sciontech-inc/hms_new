
@extends('backend.master.index')

@section('title', 'CLAIMS ELIGIBILITY')

@section('breadcrumbs')
    <span>TRANSACTION </span> / <span class="highlight">CLAIMS ELIGIBILITY</span>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            @include('backend.partial.flash-message')
            <div class="col-12">
                <div class="card-body">
                    <h3>CHECK SINGLE PERIOD OF CONFINEMENT</h3>
                    <hr>
                    <h5>MEMBER DETAILS</h5>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group pMemberFirstName">
                                <label>MEMBER FIRST NAME <span class="required">*</span>:</label>
                                <input type="text" class="form-control" name="pMemberFirstName" id="pMemberFirstName"/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group pMemberMiddleName">
                                <label>MEMBER MIDDLE NAME <span class="required">*</span>:</label>
                                <input type="text" class="form-control" name="pMemberMiddleName" id="pMemberMiddleName"/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group pMemberLastName">
                                <label>MEMBER LAST NAME <span class="required">*</span>:</label>
                                <input type="text" class="form-control" name="pMemberLastName" id="pMemberLastName"/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group pMemberSuffix">
                                <label>MEMBER SUFFIX <span class="required">*</span>:</label>
                                <input type="text" class="form-control" name="pMemberSuffix" id="pMemberSuffix"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group pPIN">
                                <label>MEMBER PIN <span class="required">*</span>:</label>
                                <input type="text" class="form-control" name="pPIN" id="pPIN"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group pMemberBirthDate">
                                <label>MEMBER BIRTHDATE <span class="required">*</span>:</label>
                                <input type="date" class="form-control" name="pMemberBirthDate" id="pMemberBirthDate"/>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group pMailingAddress">
                                <label>MAILING ADDRESS <span class="required">*</span>:</label>
                                <input type="text" class="form-control" name="pMailingAddress" id="pMailingAddress"/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group pZipCode">
                                <label>ZIP CODE <span class="required">*</span>:</label>
                                <input type="number" class="form-control" name="pZipCode" id="pZipCode"/>
                            </div>
                        </div>
                    </div>
                    <h5>PATIENT DETAILS</h5>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group PhilHealthClaimType">
                                <label>PATIENT IS <span class="required">*</span>:</label>
                                <select name="PhilHealthClaimType" id="PhilHealthClaimType" class="form-control">
                                    <option value="FEE-FOR-SERVICE">FEE-FOR-SERVICE</option>
                                    <option value="PACKAGE">PACKAGE</option>
                                    <option value="CASE-MIX">CASE-MIX</option>
                                    <option value="CASE-RATE">CASE-RATE</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group pAdmissionDate">
                                <label>ADMISSION DATE <span class="required">*</span>:</label>
                                <input type="date" class="form-control" name="pAdmissionDate" id="pAdmissionDate"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group pDischargeDate">
                                <label>DISCHARGE DATE <span class="required">*</span>:</label>
                                <input type="date" class="form-control" name="pDischargeDate" id="pDischargeDate"/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group pPatientFirstName">
                                <label>PATIENT FIRST NAME <span class="required">*</span>:</label>
                                <input type="text" class="form-control" name="pPatientFirstName" id="pPatientFirstName"/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group pPatientMiddleName">
                                <label>PATIENT MIDDLE NAME <span class="required">*</span>:</label>
                                <input type="text" class="form-control" name="pPatientMiddleName" id="pPatientMiddleName"/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group pPatientLastName">
                                <label>PATIENT LAST NAME <span class="required">*</span>:</label>
                                <input type="text" class="form-control" name="pPatientLastName" id="pPatientLastName"/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group pPatientSuffix">
                                <label>PATIENT SUFFIX <span class="required">*</span>:</label>
                                <input type="text" class="form-control" name="pPatientSuffix" id="pPatientSuffix"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group pPatientBirthDate">
                                <label>PATIENT BIRTHDATE <span class="required">*</span>:</label>
                                <input type="date" class="form-control" name="pPatientBirthDate" id="pPatientBirthDate"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group pPatientGender">
                                <label>PATIENT GENDER <span class="required">*</span>:</label>
                                <select name="pPatientGender" id="pPatientGender" class="form-control">
                                    <option value="MALE">MALE</option>
                                    <option value="FEMALE">FEMALE</option>
                            
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group pMembershipType">
                                <label>MEMBERSHIP TYPE <span class="required">*</span>:</label>
                                <select name="pMembershipType" id="pMembershipType" class="form-control">
                                    <option value="S">EMPLOYED PRIVATE</option>
                                    <option value="G">EMPLOYER GOVERNMENT</option>
                                    <option value="I">INDIGENT</option>
                                    <option value="NS">INDIVIDUALLY PAYING</option>
                                    <option value="NO">OFW</option>
                                    <option value="PS">NON-PAYING PRIVATE</option>
                                    <option value="PG">NON-PAYING GOVERNMENT</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group pPEN">
                                <label>PhilHealth EMPLOYER NUMBER <span class="required">*</span>:</label>
                                <input type="text" class="form-control" name="pPEN" id="pPEN"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group pEmployerName">
                                <label>EMPLOYER NAME <span class="required">*</span>:</label>
                                <input type="text" class="form-control" name="pEmployerName" id="pEmployerName"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group pRVS">
                                <label>RVS CODE :</label>
                                <input type="text" class="form-control" name="pRVS" id="pRVS"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group pTotalAmountActual">
                                <label>TOTAL ACTUAL AMOUNT <span class="required">*</span>:</label>
                                <input type="text" class="form-control" name="pTotalAmountActual" id="pTotalAmountActual"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group pTotalAmountClaimed">
                                <label>TOTAL AMOUNT CLAIMED <span class="required">*</span>:</label>
                                <input type="text" class="form-control" name="pTotalAmountClaimed" id="pTotalAmountClaimed"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group pIsFinal">
                                <label>IS FINAL <span class="required">*</span>:</label>
                                <input type="checkbox" id="pIsFinal" name="pIsFinal">
                            </div>
                        </div>
                    </div>
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
        </div>
    </div>
</div>
@endsection
    

@endsection

@section('scripts')
<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="/js/backend/pages/hms/transaction/philhealth/utility.js"></script>
@endsection

