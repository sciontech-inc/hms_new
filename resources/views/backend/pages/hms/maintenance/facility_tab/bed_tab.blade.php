
<div id="bed_tab" class="form-tab" style="height: calc(100% - 75px);">
    <h3>BED DETAILS</h3>
    <div class="row bed_form">
        <div class="col-3">
            <div class="form-group floor_id">
                <label>FLOOR NO. <span class="required">*</span>:</label>
                <select name="floor_id" id="floor_id" class="form-control">
                    <option value=""></option>
                </select>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group room_id">
                <label>ROOM NO. <span class="required">*</span>:</label>
                <select name="floor_id" id="floor_id" class="form-control">
                    <option value=""></option>
                </select>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group room_id">
                <label>DEPARTMENT <span class="required">*</span>:</label>
                <select name="floor_id" id="floor_id" class="form-control">
                    <option value=""></option>
                </select>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group bed_type">
                <label>BED TYPE <span class="required">*</span>:</label>
                <select name="bed_type" id="bed_type" class="form-control">
                    <option value=""></option>
                    <option value="standard_bed">Standard Bed</option>
                    <option value="electric_bed">Electric Bed</option>
                    <option value="bariatric_bed">Bariatric Bed</option>
                    <option value="icu_bed">ICU Bed</option>
                    <option value="pediatric_bed">Pediatric Bed</option>
                    <option value="birthing_bed">Birthing Bed</option>
                    <option value="specialty_bed">Specialty Bed</option>
                </select>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group status">
                <label>STATUS <span class="required">*</span>:</label>
                <select name="status" id="status" class="form-control">
                    <option value=""></option>
                    <option value="available">Available</option>
                    <option value="occupied">Occupied</option>
                    <option value="reserved">Reserved</option>
                    <option value="maintenance">Maintenance</option>
                    <option value="cleaning">Cleaning</option>
                    <option value="discharged">Discharged</option>
                    <option value="out_of_order">Out of Order</option>
                    <option value="emergency_only">Emergency Only</option>
                    <option value="on_hold">On Hold</option>
                    <option value="transfer_pending">Transfer Pending</option>
                    <option value="unavailable">Unavailable</option>
                </select>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group bed_features">
                <label>BED FEATURES:</label>
                <textarea name="bed_features" id="bed_features" class="form-control"></textarea>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group bed_size">
                <label>BED SIZE:</label>
                <textarea name="bed_size" id="bed_size" class="form-control"></textarea>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group bed_size">
                <label>BED CONDITION:</label>
                <textarea name="bed_size" id="bed_size" class="form-control"></textarea>
            </div>
        </div>
    </div>
    <div class="bed_table row">
        <div class="col-12">
            <table id="bed_table" class="table table-striped" style="width:100%"></table>
        </div>
    </div>
</div>
