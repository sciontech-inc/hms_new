<div id="contact_addresses_tab" class="form-tab">
    <h5>CONTACT & ADDRESSES</h5>
    <div style="padding: 1em;"></div>
    <div class="row">
        <div class="col-6">
            <div class="form-group phone1">
                <label>CONTACT NUMBER 1 <span class="required">*</span></label>
                <input type="text" class="form-control" name="phone1" id="phone1"/>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group phone2">
                <label>CONTACT NUMBER 2</label>
                <input type="text" class="form-control" name="phone2" id="phone2"/>
            </div>
        </div>
        
        <h3 class="col-12 form-title">ADDRESS 1</h3>
        <div class="col-4">
            <div class="form-group street_1">
                <label>STREET NO. <span class="required">*</span></label>
                <input type="text" class="form-control" name="street_1" id="street_1"/>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group barangay_1">
                <label>BARANGAY <span class="required">*</span></label>
                <input type="text" class="form-control" name="barangay_1" id="barangay_1"/>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group city_1">
                <label>CITY <span class="required">*</span></label>
                <input type="text" class="form-control" name="city_1" id="city_1"/>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group province_1">
                <label>PROVINCE <span class="required">*</span></label>
                <input type="text" class="form-control" name="province_1" id="province_1"/>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group country_1">
                <label>COUNTRY <span class="required">*</span></label>
                <input type="text" class="form-control" name="country_1" id="country_1"/>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group zip_1">
                <label>ZIP CODE <span class="required">*</span></label>
                <input type="text" class="form-control" name="zip_1" id="zip_1"/>
            </div>
        </div>

        <h3 class="col-12 form-title">ADDRESS 2</h3>
        <div class="col-4">
            <div class="form-group street_2">
                <label>STREET NO.</label>
                <input type="text" class="form-control" name="street_2" id="street_2"/>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group barangay_2">
                <label>BARANGAY</label>
                <input type="text" class="form-control" name="barangay_2" id="barangay_2"/>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group city_2">
                <label>CITY</label>
                <input type="text" class="form-control" name="city_2" id="city_2"/>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group province_2">
                <label>PROVINCE</label>
                <input type="text" class="form-control" name="province_2" id="province_2"/>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group country_2">
                <label>COUNTRY</label>
                <input type="text" class="form-control" name="country_2" id="country_2"/>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group zip_2">
                <label>ZIP CODE</label>
                <input type="text" class="form-control" name="zip_2" id="zip_2"/>
            </div>
        </div>
    </div>
</div>


@section('styles')
<style>
    .btn-file {
        position: relative;
        overflow: hidden;
    }
    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        cursor: inherit;
        display: block;
    }
    .form-control {
        font-size: 12px;
    }
    .main {
        overflow-x: hidden;
    }
    .card-header {
        background: #e9e9e9;
    }
    h5.card-title {
        color: #3282b8;
        margin-bottom: 0px;
    }
    h5.title {
        font-size: 12px;
        color: gray;
    }
    p.section-title {
        font-size: 12px;
        color: #b6b6b6;
        margin-bottom: 0px;
    }
    p.notif-title {
        font-weight: bold;
        color: #e02828;
        font-size: 13px;
        margin-bottom: 0px;
    }
    p.notif-title-green {
        font-weight: bold;
        color: #28e04a;
        font-size: 13px;
        margin-bottom: 0px;
    }
    p.notif-description {
        font-size: 10px;
        color: #b6b6b6;
    }
    p.section-desc {
        font-weight: bold;
        color: #6eafdb;
    }
    label.section-label {
        font-weight: bold;
    }
    .payroll-title {
        color: #b6b6b6;
        margin-bottom: 0px !important;
    }
    .payroll-date {
        color: #6eafdb;
        font-weight: bold;
    }
    .employment-status {
        color: #b6b6b6;
        font-size: 12px;
    }
    .job-title {
        font-weight: bold;
        color: #6eafdb;
        margin-bottom: 0px !important;
    }
    .account-balance {
        font-weight: bold;
        font-size: 20px;
    }
    table {
        border-collapse: collapse;
        width: 100%;
        font-size: 10px;
    }

    td, th {
        padding: 5px;
    }
    th {
        color: #6eafdb;
        font-weight: bold;
    }
    table.dtl tr:nth-child(even) {
        background: #efefef;
    }
    table.dtl td, th {
        /* border: 1px solid #dddddd; */
        text-align: left;
        padding: 6px;
    }
    table.wks tr:nth-child(even) {
        background: #e7f5ff;
    }
    table.wks td, th {
        /* border: 1px solid #dddddd; */
        text-align: left;
        padding: 6px;
    }
  </style>
@endsection
