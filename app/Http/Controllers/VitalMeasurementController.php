<?php

namespace App\Http\Controllers;

use App\Patient;
use App\VitalMeasurement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class VitalMeasurementController extends Controller
{
    protected $func;

    public function __construct() {
        $this->setup = new Controller();
    }
    
    public function store(Request $request)
    {

        $validate = $request->validate([
            'vital_date' => 'required',
            'vital_time' => 'required',
            'blood_pressure' => 'required',
            'heart_rate' => 'required',
            'temperature' => 'required',
            'respiratory_rate' => 'required',
            'oxygen_saturation' => 'required',
            'pulse_rate' => 'required',

        ]);

        $request['workstation_id'] = Auth::user()->workstation_id;
        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        $vital_measurement = VitalMeasurement::create($request->all());

        $patient = Patient::find($vital_measurement->patient_id);

        $this->setup->set_log('Vital Signs & Measurement Record Created', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" created the vital signs & measurement record ID "'.$vital_measurement->id.'" of patient "'.$patient->patient_id.'"', request()->ip());

        return response()->json(compact('validate'));
    }

    public function edit($id)
    {
        $vital_measurement = VitalMeasurement::where('id', $id)->orderBy('id')->firstOrFail();

        $patient = Patient::find($vital_measurement->patient_id);
        $this->setup->set_log('Vital Signs & Measurement Record Viewed', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" viewed the vital signs & measurement record ID "'.$id.'" of patient "'.$patient->patient_id.'"', request()->ip());

        return response()->json(compact('vital_measurement'));
    }

    public function update(Request $request, $id)
    {
        $request['updated_by'] = Auth::user()->id;
        VitalMeasurement::find($id)->update($request->all());

        $patient = Patient::find($request->patient_id);
        $this->setup->set_log('Vital Signs & Measurement Record Updated', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" updated the vital signs & measurement record ID "'.$id.'" of patient "'.$patient->patient_id.'"', request()->ip());

        return "Record Saved";
    }

    public function save(Request $request, $id) {
        $output = '';

        $validate = $request->validate([
            'vital_date' => 'required',
            'vital_time' => 'required',
            'blood_pressure' => 'required',
            'heart_rate' => 'required',
            'temperature' => 'required',
            'respiratory_rate' => 'required',
            'oxygen_saturation' => 'required',
            'pulse_rate' => 'required',

        ]);

        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        $insurance = VitalMeasurement::where('patient_id', $request->patient_id)->where('vital_date', $request->vital_date)->where('vital_time', $request->vital_time)->count();
        if($insurance === 0) {
            $output = 'saved';
            VitalMeasurement::create($request->all());
        }
        else {
            $output = "updated";
            VitalMeasurement::where('patient_id', $request->patient_id)->update($request->except('_token', 'created_by'));
        }
        return response()->json(compact('validate'));
    }

    public function get($id) {
        if(request()->ajax()) {
            return datatables()->of(VitalMeasurement::where('patient_id', $id)->get())
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            VitalMeasurement::find($item)->delete();

            $this->setup->set_log('Vital Signs & Measurement Record Deleted', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" deleted the vital signs & measurement record ID "'.$item.'" of patient."', request()->ip());

        }

        return 'Record Deleted';
    }
}
