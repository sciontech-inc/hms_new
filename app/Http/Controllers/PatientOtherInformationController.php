<?php

namespace App\Http\Controllers;

use App\PatientOtherInformation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class PatientOtherInformationController extends Controller
{
    public function store(Request $request)
    {

        $validate = $request->validate([

            'oi_description' => 'required',
            'oi_remarks' => 'required',

        ]);

        $request['workstation_id'] = Auth::user()->workstation_id;
        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        PatientOtherInformation::create($request->all());

        return response()->json(compact('validate'));
    }

    public function edit($id)
    {
        $other_information = PatientOtherInformation::where('id', $id)->orderBy('id')->firstOrFail();
        return response()->json(compact('other_information'));
    }

    public function update(Request $request, $id)
    {
        $request['updated_by'] = Auth::user()->id;
        PatientOtherInformation::find($id)->update($request->all());
        return "Record Saved";
    }

    public function save(Request $request, $id) {
        $output = '';

        $validate = $request->validate([
            'oi_description' => 'required',
            'oi_remarks' => 'required',

        ]);

        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        $insurance = PatientOtherInformation::where('patient_id', $request->patient_id)->where('oi_description', $request->oi_description)->count();
        if($insurance === 0) {
            $output = 'saved';
            PatientOtherInformation::create($request->all());
        }
        else {
            $output = "updated";
            PatientOtherInformation::where('patient_id', $request->patient_id)->update($request->except('_token', 'created_by'));
        }
        return response()->json(compact('validate'));
    }

    public function get($id) {
        if(request()->ajax()) {
            return datatables()->of(PatientOtherInformation::where('patient_id', $id)->get())
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            PatientOtherInformation::find($item)->delete();
        }

        return 'Record Deleted';
    }
}
