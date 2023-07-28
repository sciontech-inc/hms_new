<?php

namespace App\Http\Controllers;

use Auth;
use App\PatientAdmission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PatientAdmissionController extends Controller
{
    protected $func;

    public function __construct() {
        $this->setup = new Controller();
    }

    public function get() {
        if(request()->ajax()) {
            return datatables()->of(PatientAdmission::with('patient')->get())
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'patient_id' => 'required',
            'registry_tracking_no' => 'required',
            'admission_case_no' => 'required',
            'osca_id_no' => 'required'
        ]);

        $request['workstation_id'] = Auth::user()->workstation_id;
        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        $patient_admission = PatientAdmission::create($request->all());
        $last_record = array("id" => $patient_admission->id);

        $this->setup->set_log('Patient Admission Added', '"'.$request->patient_id.'" was added at Patient Admission Records.', $request->ip());

        return response()->json(compact('validate', 'last_record'));
    }
    
    public function edit($id)
    {
        $patient_admission = PatientAdmission::where('id', $id)->orderBy('id')->firstOrFail();

        $this->setup->set_log('Patient Admission Viewed', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" viewed the record ID: "'.$id.'"', request()->ip());
        return response()->json(compact('patient_admission'));
    }

    public function update(Request $request, $id)
    {
        $request['updated_by'] = Auth::user()->id;
        PatientAdmission::find($id)->update($request->all());

        $this->setup->set_log('Patient Admission Updated', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" update the record with the ID: "'.$id.'"', request()->ip());
        
        return "Record Saved";
    }

    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            Floor::find($item)->delete();

            $this->setup->set_log('Floor Deleted', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" delete the record with the ID: "'.$item.'"', request()->ip());
        }
        
        return 'Record Deleted';
    }

    public function get_list($id) {
        $data = null;

        if($id === "all") {
            $data = Floor::orderBy('floor_no','asc')->get();
        }
        else {
            $data = Floor::where('building_id', $id)->orderBy('floor_no','asc')->get();
        }
        
        return response()->json(compact('data'));
    }

    public function get_info($id) {
        $data = Floor::where('id', $id)->firstOrFail();
        return response()->json(compact('data'));
    }
}
