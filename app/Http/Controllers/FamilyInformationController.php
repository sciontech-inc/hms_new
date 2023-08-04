<?php

namespace App\Http\Controllers;

use App\Patient;
use App\FamilyInformation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class FamilyInformationController extends Controller
{

    protected $func;

    public function __construct() {
        $this->setup = new Controller();
    }
    
    public function store(Request $request)
    {

        $validate = $request->validate([
            'family_fullname' => 'required',
            'family_birthdate' => 'required',
            'family_relationship' => 'required',
            'family_sex' => 'required',
            'family_address' => 'required',
            'family_contact_no' => 'required'
        ]);

        if($request->set_as_emergency_contact == 'on')
        { 
            $request['set_as_emergency_contact'] = 'EMERGENCY CONTACT';
        }

        $request['workstation_id'] = Auth::user()->workstation_id;
        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        $family_information = FamilyInformation::create($request->all());

        $patient = Patient::find($family_information->patient_id);

        $this->setup->set_log('Family Information Record Created', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" created the family information ID "'.$family_information->id.'" of patient "'.$patient->patient_id.'"', request()->ip());


        return response()->json(compact('validate'));
    }

    public function edit($id)
    {
        $family_information = FamilyInformation::where('id', $id)->orderBy('id')->firstOrFail();

        $patient = Patient::find($family_information->patient_id);
        $this->setup->set_log('Family Information Record Viewed', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" viewed the family information ID "'.$id.'" of patient "'.$patient->patient_id.'"', request()->ip());

        return response()->json(compact('family_information'));
    }

    public function update(Request $request, $id)
    {
        $request['updated_by'] = Auth::user()->id;
        FamilyInformation::find($id)->update($request->all());

        $patient = Patient::find($request->patient_id);
        $this->setup->set_log('Family Information Record Updated', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" updated the family information ID "'.$id.'" of patient "'.$patient->patient_id.'"', request()->ip());

        return "Record Saved";
    }

    
    public function save(Request $request, $id) {
        $output = '';

        $validate = $request->validate([
            'family_fullname' => 'required',
            'family_birthdate' => 'required',
            'family_relationship' => 'required',
            'family_sex' => 'required',
            'family_address' => 'required',
            'family_contact_no' => 'required'

        ]);

        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        $family = FamilyInformation::where('patient_id', $request->patient_id)->where('family_fullname', $request->family_fullname)->count();
        if($family === 0) {
            $output = 'saved';
            FamilyInformation::create($request->all());
        }
        else {
            $output = "updated";
            FamilyInformation::where('patient_id', $request->patient_id)->update($request->except('_token', 'created_by'));
        }
        return response()->json(compact('validate'));
    }

    public function get($id) {
        if(request()->ajax()) {
            return datatables()->of(FamilyInformation::where('patient_id', $id)->get())
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            FamilyInformation::find($item)->delete();

            $this->setup->set_log('Family Information Record Deleted', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" deleted the family information ID "'.$item.'" of patient."', request()->ip());
        }

        return 'Record Deleted';
    }
}
