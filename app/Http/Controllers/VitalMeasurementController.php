<?php

namespace App\Http\Controllers;

use App\VitalMeasurement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class VitalMeasurementController extends Controller
{
    
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

        VitalMeasurement::create($request->all());

        return response()->json(compact('validate'));
    }

    public function edit($id)
    {
        $vital_measurement = VitalMeasurement::where('id', $id)->orderBy('id')->firstOrFail();
        return response()->json(compact('vital_measurement'));
    }

    public function update(Request $request, $id)
    {
        $request['updated_by'] = Auth::user()->id;
        VitalMeasurement::find($id)->update($request->all());
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
        }

        return 'Record Deleted';
    }
}
