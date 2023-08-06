<?php

namespace App\Http\Controllers;

use App\PatientAppointment;
use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\Controller;

class PatientAppointmentController extends Controller
{
    protected $func;

    public function __construct() {
        $this->setup = new Controller();
    }
    
    public function get() {
        if(request()->ajax()) {
            return datatables()->of(AppModule::with('app')->get())
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'patient_id' => 'required',
            'date' => 'required',
            'time' => 'required',
            'doctor_id' => 'required',
            'reason' => 'required',
            'appointment_status' => 'required'
        ]);

        $request['workstation_id'] = Auth::user()->workstation_id;
        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        PatientAppointment::create($request->all());
        
        $this->setup->set_log('Patient Appointment Added', '"'.$request->name.'" was added at Patient Appointment Records.', $request->ip());

        return response()->json(compact('validate'));
    }
    
    public function edit($id)
    {
        $patient_appointment = PatientAppointment::where('id', $id)->orderBy('id')->firstOrFail();

        $this->setup->set_log('Patient Appointment Viewed', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" viewed the record ID: "'.$id.'"', request()->ip());
        
        return response()->json(compact('patient_appointment'));
    }

    public function update(Request $request, $id)
    {
        $request['updated_by'] = Auth::user()->id;
        PatientAppointment::find($id)->update($request->all());

        $this->setup->set_log('Patient Appointment Updated', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" update the record with the ID: "'.$id.'"', request()->ip());

        return "Record Saved";
    }

    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            PatientAppointment::find($item)->delete();

            $this->setup->set_log('Patient Appointment Deleted', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" delete the record with the ID: "'.$item.'"', request()->ip());
        }
        
        return 'Record Deleted';
    }

    public function get_list($id) {
        $data = null;
        
        if($id === "all") {
            $data = PatientAppointment::with('doctor', 'patient')->get();
        }
        else {
            $data = PatientAppointment::with('doctor', 'patient', 'patient.medical_case', 'patient.medicine_taken', 'patient.allergies')->where('id', $id)->firstOrFail();
        }
        
        return response()->json(compact('data'));
    }
}
