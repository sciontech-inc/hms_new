
<div id="room_tab" class="form-tab" style="height: calc(100% - 75px);">
    <h3>ROOM DETAILS</h3>
    <div class="row room_form">
        <div class="col-3">
            <div class="form-group room_no">
                <label>ROOM NO. <span class="required">*</span>:</label>
                <input type="text" class="form-control" name="room_no" id="room_no"/>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group room_type">
                <label>ROOM TYPE <span class="required">*</span>:</label>
                <select name="room_type" id="room_type" class="form-control">
                    <option value=""></option>
                    <option value="general_patient_rooms">General Patient Rooms</option>
                    <option value="icu">Intensive Care Units (ICU)</option>
                    <option value="nicu">Neonatal Intensive Care Units (NICU)</option>
                    <option value="pediatric_rooms">Pediatric Rooms</option>
                    <option value="operating rooms">Operating Rooms</option>
                    <option value="emergency_rooms">Emergency Rooms</option>
                    <option value="recovery_rooms">Recovery Rooms</option>
                    <option value="labor_delivery_rooms">Labor and Delivery Rooms</option>
                    <option value="examinations_rooms">Examination Rooms</option>
                    <option value="imaging_rooms">Imaging Rooms</option>
                    <option value="isolation_rooms">Isolation Rooms</option>
                    <option value="procedure_rooms">Procedure Rooms</option>
                    <option value="pharmacy">Pharmacy</option>
                    <option value="laboratories">Laboratories</option>
                    <option value="consoltations_rooms">Consultation Rooms</option>
                </select>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group room_name">
                <label>ROOM NAME <span class="required">*</span>:</label>
                <input type="text" class="form-control" name="room_name" id="room_name"/>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group floor_id">
                <label> FLOOR NO. <span class="required">*</span>:</label>
                <select name="floor_id" id="floor_id" class="form-control">
                    <option value=""></option>
                </select>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group capacity">
                <label>CAPACITY <span class="required">*</span>:</label>
                <input type="number" class="form-control" name="capacity" id="room_capacity"/>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group occupancy_status">
                <label>OCCUPANCY STATUS <span class="required">*</span>:</label>
                <select name="occupancy_status" id="occupancy_status" class="form-control">
                    <option value=""></option>
                    <option value="vacant">Vacant</option>
                    <option value="occupied">Occupied</option>
                    <option value="reserved">Reserved</option>
                    <option value="under_maintenance">Under Cleaning/ Maintenance</option>
                    <option value="out_of_service">Out of Service</option>
                    <option value="discharged">Discharged/Ready for Cleaning</option>
                    <option value="onhold">On Hold</option>
                    <option value="emergency_only">Emergency Only</option>
                    <option value="pending_cleaning">Pending Cleaning</option>
                    <option value="out_of_order">Out of Order</option>
                </select>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group availability_schedule">
                <label>AVAILABILITY SCHEDULE :</label>
                <textarea name="availability_schedule" id="availability_schedule" class="form-control"></textarea>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group room_features">
                <label>ROOM FEATURES :</label>
                <textarea name="room_features" id="room_features" class="form-control"></textarea>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group room_size">
                <label>ROOM SIZE :</label>
                <textarea name="room_size" id="room_size" class="form-control"></textarea>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group room_condition">
                <label>ROOM CONDITION :</label>
                <textarea name="room_condition" id="room_condition" class="form-control"></textarea>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group room_usage_restriction">
                <label>ROOM USAGE RESTRICTION :</label>
                <textarea name="room_usage_restriction" id="room_usage_restriction" class="form-control"></textarea>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group room_service">
                <label>ROOM SERVICE :</label>
                <textarea name="room_service" id="room_service" class="form-control"></textarea>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group room_notes">
                <label>ROOM NOTES :</label>
                <textarea name="room_notes" id="room_notes" class="form-control"></textarea>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group room_accessibility">
                <label>ROOM ACCESSIBILITY :</label>
                <textarea name="room_accessibility" id="room_accessibility" class="form-control"></textarea>
            </div>
        </div>
    </div>
    <div class="room_table row">
        <div class="col-12">
            <table id="room_table" class="table table-striped" style="width:100%"></table>
        </div>
    </div>
</div>
