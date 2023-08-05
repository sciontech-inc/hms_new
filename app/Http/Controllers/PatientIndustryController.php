<?php

namespace App\Http\Controllers;

use Auth;
use App\PatientIndustry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PatientIndustryController extends Controller
{
    protected $func;

    public function __construct() {
        $this->setup = new Controller();
    }

    public function get() {
        if(request()->ajax()) {
            return datatables()->of(PatientIndustry::get())
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function store(Request $request)
    {
        $validate = $request->validate([

            'patient_industry_code' => ['required'],
            'patient_industry_description' => ['required'],

        ]);
        
   
        $request['workstation_id'] = Auth::user()->workstation_id;
        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        $patient_industry = PatientIndustry::create($request->all());

        $this->setup->set_log('Patient Industry Record Created', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" created the patient industry record with the ID "'.$patient_industry->id. '"', request()->ip());

        return response()->json(compact('validate'));
    }

    public function edit($id)
    {
        $patient_industry = PatientIndustry::where('id', $id)->orderBy('id')->firstOrFail();

        $this->setup->set_log('Patient Industry Record Viewed', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" viewed the patient industry record ID "'.$id. '"', request()->ip());

        return response()->json(compact('patient_industry'));
    }

    public function update(Request $request, $id)
    {
        $request['updated_by'] = Auth::user()->id;
        PatientIndustry::find($id)->update($request->all());

        $this->setup->set_log('Patient Industry Record Updated', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" updated the patient industry record ID "'.$id. '"', request()->ip());

        return "Record Saved";
    }

    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            PatientIndustry::find($item)->delete();

            $this->setup->set_log('Patient Industry Record Deleted', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" deleted the patient industry record ID "'.$item. '"', request()->ip());

        }
        
        return 'Record Deleted';
    }
}
