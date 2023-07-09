<?php

namespace App\Http\Controllers;

use App\Patient;
use App\PatientInsurance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class PatientInsuranceController extends Controller
{
    protected $func;

    public function __construct() {
        $this->setup = new Controller();
    }
    
    public function store(Request $request)
    {

        $validate = $request->validate([
            'provider' => 'required',
            'type' => 'required',
            'policy_no' => 'required',
        ]);

        $request['workstation_id'] = Auth::user()->workstation_id;
        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        $patient_insurance = PatientInsurance::create($request->all());

        $patient = Patient::find($patient_insurance->patient_id);

        $this->setup->set_log('Patient Insurance Record Created', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" created the insurance record ID "'.$patient_insurance->id.'" of patient "'.$patient->patient_id.'"', request()->ip());

        return response()->json(compact('validate'));
    }

    public function edit($id)
    {
        $patient_insurance = PatientInsurance::where('id', $id)->orderBy('id')->firstOrFail();
        $patient = Patient::find($patient_insurance->patient_id);

        $this->setup->set_log('Patient Insurance Record Viewed', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" viewed the insurance record ID "'.$id.'" of patient "'.$patient->patient_id.'"', request()->ip());

        return response()->json(compact('patient_insurance'));
    }

    public function update(Request $request, $id)
    {
        $request['updated_by'] = Auth::user()->id;
        PatientInsurance::find($id)->update($request->all());

        $patient = Patient::find($request->patient_id);
        $this->setup->set_log('Patient Insurance Record Updated', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" updated the insurance record ID "'.$id.'" of patient "'.$patient->patient_id.'"', request()->ip());

        return "Record Saved";
    }

    public function save(Request $request, $id) {
        $output = '';

        $validate = $request->validate([
            'provider' => 'required',
            'type' => 'required',
            'policy_no' => 'required',
        ]);

        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        $insurance = PatientInsurance::where('patient_id', $request->patient_id)->where('policy_no', $request->policy_no)->count();
        if($insurance === 0) {
            $output = 'saved';
            PatientInsurance::create($request->all());
        }
        else {
            $output = "updated";
            PatientInsurance::where('patient_id', $request->patient_id)->update($request->except('_token', 'created_by'));
        }
        return response()->json(compact('validate'));
    }

    public function get($id) {
        if(request()->ajax()) {
            return datatables()->of(PatientInsurance::where('patient_id', $id)->get())
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            PatientInsurance::find($item)->delete();

            $this->setup->set_log('Patient Insurance Record Deleted', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" deleted the insurance record ID "'.$item.'" of patient."', request()->ip());
        }

     
        

        return 'Record Deleted';
    }
}
