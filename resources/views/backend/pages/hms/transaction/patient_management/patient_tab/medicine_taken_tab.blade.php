
<div id="medicine_taken_tab" class="form-tab">
    <h5>MEDICINE TAKEN</h5>
    <div class="medicine-taken-table">
        <div class="row">
            <div class="col-12">
                <table id="medicine_taken_table" class="table table-striped" style="width:100%">
                </table>
            </div>
        </div>
    </div>
</div>

@section('sc-modal')
@parent
<div class="sc-modal-content" id="medicine_taken_form">
    <div class="sc-modal-dialog sc-xl">
        <div class="sc-modal-header">
            <span class="sc-title-bar"></span>
            <span class="sc-close" onclick="scion.create.sc_modal('medicine_taken_form').hide('all', modalHideFunction)"><i class="fas fa-times"></i></span>
        </div>
        <div class="sc-modal-body">
            <form method="post" id="medicinetakenForm" class="form-record">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group medicine_name">
                            <label>NAME</label>
                            <input type="text" class="form-control" name="medicine_name" id="medicine_name"/>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group medicine_doses">
                            <label>DOSES </label>
                            <input type="text" class="form-control" name="medicine_doses" id="medicine_doses"/>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group routes_of_administration">
                            <label>ROUTES OF ADMINISTRATION </label>
                            <input type="text" class="form-control" name="routes_of_administration" id="routes_of_administration"/>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group medicine_type">
                            <label>TYPE </label>
                            <input type="text" class="form-control" name="medicine_type" id="medicine_type"/>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group medicine_duration">
                            <label>DURATION </label>
                            <input type="text" class="form-control" name="medicine_duration" id="medicine_duration"/>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group medicine_reason">
                            <label>REASON </label>
                            <input type="text" class="form-control" name="medicine_reason" id="medicine_reason"/>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group medicine_compliance">
                            <label>COMPLIANCE </label>
                            <select name="medicine_compliance" id="medicine_compliance" class="form-control">
                                <option value="PRESCRIBED">Prescribed</option>
                                <option value="NOT PRESCRIBED">Not Prescribed</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group medicine_remarks">
                            <label>REMARKS </label>
                            <textarea type="text" class="form-control" name="medicine_remarks" id="medicine_remarks"></textarea>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

