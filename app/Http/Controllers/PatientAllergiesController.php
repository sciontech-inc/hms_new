<?php

namespace App\Http\Controllers;

use App\PatientAllergies;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class PatientAllergiesController extends Controller
{
    public function store(Request $request)
    {

        $validate = $request->validate([
            'allergy_allergen' => 'required',
            'allergy_reaction' => 'required',
            'allergy_severity' => 'required',
            'allergy_date_of_onset' => 'required',
            'allergy_treatment' => 'required',
            'allergy_duration' => 'required',
            'source_of_information' => 'required',
            'known_cross_reactives' => 'required',
            'current_management_plan' => 'required',
            'medications_to_avoid' => 'required',
            'severity_of_reaction' => 'required',
            'allergy_anaphylaxis' => 'required',
            'allergy_testing' => 'required',
        ]);

        $request['workstation_id'] = Auth::user()->workstation_id;
        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        PatientAllergies::create($request->all());

        return response()->json(compact('validate'));
    }

    public function edit($id)
    {
        $patient_allergies = PatientAllergies::where('id', $id)->orderBy('id')->firstOrFail();
        return response()->json(compact('patient_allergies'));
    }

    public function update(Request $request, $id)
    {
        $request['updated_by'] = Auth::user()->id;
        PatientAllergies::find($id)->update($request->all());
        return "Record Saved";
    }

    public function save(Request $request, $id) {
        $output = '';

        $validate = $request->validate([
            'allergy_allergen' => 'required',
            'allergy_reaction' => 'required',
            'allergy_severity' => 'required',
            'allergy_date_of_onset' => 'required',
            'allergy_treatment' => 'required',
            'allergy_duration' => 'required',
            'source_of_information' => 'required',
            'known_cross_reactives' => 'required',
            'current_management_plan' => 'required',
            'medications_to_avoid' => 'required',
            'severity_of_reaction' => 'required',
            'allergy_anaphylaxis' => 'required',
            'allergy_testing' => 'required',

        ]);

        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        $insurance = PatientAllergies::where('patient_id', $request->patient_id)->where('allergy_allergen', $request->allergy_allergen)->count();
        if($insurance === 0) {
            $output = 'saved';
            PatientAllergies::create($request->all());
        }
        else {
            $output = "updated";
            PatientAllergies::where('patient_id', $request->patient_id)->update($request->except('_token', 'created_by'));
        }
        return response()->json(compact('validate'));
    }

    public function get($id) {
        if(request()->ajax()) {
            return datatables()->of(PatientAllergies::where('patient_id', $id)->get())
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            PatientAllergies::find($item)->delete();
        }

        return 'Record Deleted';
    }
    
}
