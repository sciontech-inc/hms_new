<?php

namespace App\Http\Controllers;

use App\Patient;
use App\PatientAllergies;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class PatientAllergiesController extends Controller
{
    protected $func;

    public function __construct() {
        $this->setup = new Controller();
    }
    
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

        $patient_allergies = PatientAllergies::create($request->all());

        $patient = Patient::find($patient_allergies->patient_id);

        $this->setup->set_log('Patient Allergies Record Created', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" created the patient allergies record ID "'.$patient_allergies->id.'" of patient "'.$patient->patient_id.'"', request()->ip());

        return response()->json(compact('validate'));
    }

    public function edit($id)
    {
        $patient_allergies = PatientAllergies::where('id', $id)->orderBy('id')->firstOrFail();

        $patient = Patient::find($patient_allergies->patient_id);
        $this->setup->set_log('Patient Allergies Record Viewed', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" viewed the patient allergies record ID "'.$id.'" of patient "'.$patient->patient_id.'"', request()->ip());

        return response()->json(compact('patient_allergies'));
    }

    public function update(Request $request, $id)
    {
        $request['updated_by'] = Auth::user()->id;
        PatientAllergies::find($id)->update($request->all());

        $patient = Patient::find($request->patient_id);
        $this->setup->set_log('Patient Allergies Record Updated', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" updated the patient allergies record ID "'.$id.'" of patient "'.$patient->patient_id.'"', request()->ip());

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

            $this->setup->set_log('Patient Allergies Record Deleted', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" deleted the patient allergies record ID "'.$item.'" of patient."', request()->ip());

        }

        return 'Record Deleted';
    }
    
}
