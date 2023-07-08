<?php

namespace App\Http\Controllers;

use App\MedicalCase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class MedicalCaseController extends Controller
{
    public function store(Request $request)
    {

        $validate = $request->validate([
            'date_recorded' => 'required',
            'chief_complaint' => 'required',
            'diagnostic_tests' => 'required',
            'diagnosis' => 'required',
            'prognosis' => 'required',
            'discharge_summary' => 'required'
        ]);

        $request['workstation_id'] = Auth::user()->workstation_id;
        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        MedicalCase::create($request->all());

        return response()->json(compact('validate'));
    }

    public function edit($id)
    {
        $medical_case = MedicalCase::where('id', $id)->orderBy('id')->firstOrFail();
        return response()->json(compact('medical_case'));
    }

    public function update(Request $request, $id)
    {
        $request['updated_by'] = Auth::user()->id;
        MedicalCase::find($id)->update($request->all());
        return "Record Saved";
    }

    public function save(Request $request, $id) {
        $output = '';

        $validate = $request->validate([
            'date_recorded' => 'required',
            'chief_complaint' => 'required',
            'diagnostic_tests' => 'required',
            'diagnosis' => 'required',
            'prognosis' => 'required',
            'discharge_summary' => 'required'

        ]);

        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        $family = MedicalCase::where('patient_id', $request->patient_id)->where('chief_complaint', $request->chief_complaint)->count();
        if($family === 0) {
            $output = 'saved';
            MedicalCase::create($request->all());
        }
        else {
            $output = "updated";
            MedicalCase::where('patient_id', $request->patient_id)->update($request->except('_token', 'created_by'));
        }
        return response()->json(compact('validate'));
    }

    public function get($id) {
        if(request()->ajax()) {
            return datatables()->of(MedicalCase::where('patient_id', $id)->get())
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            MedicalCase::find($item)->delete();
        }

        return 'Record Deleted';
    }
}
