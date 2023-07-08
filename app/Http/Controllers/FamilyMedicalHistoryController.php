<?php

namespace App\Http\Controllers;

use App\FamilyMedicalHistory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class FamilyMedicalHistoryController extends Controller
{
    public function store(Request $request)
    {

        $validate = $request->validate([
            'fm_relationship' => 'required',
            'fm_medical_condition' => 'required',
            'fm_age_at_diagnosis' => 'required',
            'fm_age_at_death' => 'required',
            'fm_cause_of_death' => 'required',
            'fm_other_relevant_medical_history' => 'required',
            'fm_family_history_of_specific_conditions' => 'required',
            'fm_ethnicity' => 'required',
            'fm_lifestyle_factors' => 'required',
            'fm_other_family_members_affected' => 'required',
        ]);

        $request['workstation_id'] = Auth::user()->workstation_id;
        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        FamilyMedicalHistory::create($request->all());

        return response()->json(compact('validate'));
    }

    public function edit($id)
    {
        $family_medical_history = FamilyMedicalHistory::where('id', $id)->orderBy('id')->firstOrFail();
        return response()->json(compact('family_medical_history'));
    }

    public function update(Request $request, $id)
    {
        $request['updated_by'] = Auth::user()->id;
        FamilyMedicalHistory::find($id)->update($request->all());
        return "Record Saved";
    }

    public function save(Request $request, $id) {
        $output = '';

        $validate = $request->validate([
            'fm_relationship' => 'required',
            'fm_medical_condition' => 'required',
            'fm_age_at_diagnosis' => 'required',
            'fm_age_at_death' => 'required',
            'fm_cause_of_death' => 'required',
            'fm_other_relevant_medical_history' => 'required',
            'fm_family_history_of_specific_conditions' => 'required',
            'fm_ethnicity' => 'required',
            'fm_lifestyle_factors' => 'required',
            'fm_other_family_members_affected' => 'required',

        ]);

        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        $insurance = FamilyMedicalHistory::where('patient_id', $request->patient_id)->where('fm_relationship', $request->fm_relationship)->count();
        if($insurance === 0) {
            $output = 'saved';
            FamilyMedicalHistory::create($request->all());
        }
        else {
            $output = "updated";
            FamilyMedicalHistory::where('patient_id', $request->patient_id)->update($request->except('_token', 'created_by'));
        }
        return response()->json(compact('validate'));
    }

    public function get($id) {
        if(request()->ajax()) {
            return datatables()->of(FamilyMedicalHistory::where('patient_id', $id)->get())
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            FamilyMedicalHistory::find($item)->delete();
        }

        return 'Record Deleted';
    }
}
