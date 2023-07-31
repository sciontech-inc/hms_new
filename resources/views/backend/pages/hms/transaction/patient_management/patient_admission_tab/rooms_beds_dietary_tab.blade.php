<div id="rooms_beds_dietary_tab" class="form-tab">
    <div class="row rooms_beds_dietary_form">
        <div class="col-6">
            <div class="col-12 building_id">
                <div class="form-group row">
                    <label class="col-4">BUILDING NO <span class="required">*</span>:</label>
                    <div class="col-8">
                        <select name="building_id" id="building_id" class="form-control" onchange="buildingSelect()">
                            <option value=""></option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-12 floor_id">
                <div class="form-group row">
                    <label class="col-4">FLOOR NO <span class="required">*</span>:</label>
                    <div class="col-8">
                        <select name="floor_id" id="floor_id" class="form-control" onchange="floorSelect()">
                            <option value=""></option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-12 room_id">
                <div class="form-group row">
                    <label class="col-4">ROOM NO <span class="required">*</span>:</label>
                    <div class="col-8">
                        <select name="room_id" id="room_id" class="form-control" onchange="roomSelect()">
                            <option value=""></option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-12 bed_id">
                <div class="form-group row">
                    <label class="col-4">BED NO <span class="required">*</span>:</label>
                    <div class="col-8">
                        <select name="bed_id" id="bed_id" class="form-control">
                            <option value=""></option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-12 room_type">
                <div class="form-group row">
                    <label class="col-4">ROOM TYPE <span class="required">*</span>:</label>
                    <div class="col-8">
                        <input type="text" class="form-control" name="type" id="type" disabled/>
                    </div>
                </div>
            </div>
            <div class="col-12 start_datetime">
                <div class="form-group row">
                    <label class="col-4">START DATE TIME <span class="required">*</span>:</label>
                    <div class="col-8">
                        <input type="datetime-local" class="form-control" name="start_datetime" id="start_datetime"/>
                    </div>
                </div>
            </div>
            <div class="col-12 end_datetime">
                <div class="form-group row">
                    <label class="col-4">END DATE TIME <span class="required">*</span>:</label>
                    <div class="col-8">
                        <input type="datetime-local" class="form-control" name="end_datetime" id="end_datetime"/>
                    </div>
                </div>
            </div>
            <div class="col-12 status">
                <div class="form-group row">
                    <label class="col-4">STATUS <span class="required">*</span>:</label>
                    <div class="col-8">
                        <select name="status" id="room_status" class="form-control">
                            <option value="1">ACTIVE</option>
                            <option value="0">INACTIVE</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>