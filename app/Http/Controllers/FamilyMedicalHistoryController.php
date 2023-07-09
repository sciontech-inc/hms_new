<?php

namespace App\Http\Controllers;

use App\Patient;
use App\FamilyMedicalHistory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class FamilyMedicalHistoryController extends Controller
{

    protected $func;

    public function __construct() {
        $this->setup = new Controller();
    }
    
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

        $family_medical_history = FamilyMedicalHistory::create($request->all());

        $patient = Patient::find($family_medical_history->patient_id);

        $this->setup->set_log('Family Medical History Record Created', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" created the family medical history ID "'.$family_medical_history->id.'" of patient "'.$patient->patient_id.'"', request()->ip());

        return response()->json(compact('validate'));
    }

    public function edit($id)
    {
        $family_medical_history = FamilyMedicalHistory::where('id', $id)->orderBy('id')->firstOrFail();

        $patient = Patient::find($family_medical_history->patient_id);
        $this->setup->set_log('Family Medical History Record Viewed', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" viewed the family medical history ID "'.$id.'" of patient "'.$patient->patient_id.'"', request()->ip());

        return response()->json(compact('family_medical_history'));
    }

    public function update(Request $request, $id)
    {
        $request['updated_by'] = Auth::user()->id;
        FamilyMedicalHistory::find($id)->update($request->all());

        $patient = Patient::find($request->patient_id);
        $this->setup->set_log('Family Medical History Record Updated', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" updated the family medical history ID "'.$id.'" of patient "'.$patient->patient_id.'"', request()->ip());

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

            $this->setup->set_log('Family Medical History Record Deleted', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" deleted the family medical history ID "'.$item.'" of patient."', request()->ip());

        }

        return 'Record Deleted';
    }
}
