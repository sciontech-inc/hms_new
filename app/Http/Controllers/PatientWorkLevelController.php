<?php

namespace App\Http\Controllers;

use Auth;
use App\PatientWorkLevel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PatientWorkLevelController extends Controller
{
    protected $func;

    public function __construct() {
        $this->setup = new Controller();
    }

    public function get() {
        if(request()->ajax()) {
            return datatables()->of(PatientWorkLevel::get())
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function store(Request $request)
    {
        $validate = $request->validate([

            'patient_work_level_code' => ['required'],
            'patient_work_level_description' => ['required'],

        ]);
        
   
        $request['workstation_id'] = Auth::user()->workstation_id;
        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        $patient_work_level = PatientWorkLevel::create($request->all());

        $this->setup->set_log('Patient Work Level Record Created', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" created the patient work level record with the ID "'.$patient_work_level->id. '"', request()->ip());

        return response()->json(compact('validate'));
    }

    public function edit($id)
    {
        $patient_work_level = PatientWorkLevel::where('id', $id)->orderBy('id')->firstOrFail();

        $this->setup->set_log('Patient Work Level Record Viewed', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" viewed the patient work level record ID "'.$id. '"', request()->ip());

        return response()->json(compact('patient_work_level'));
    }

    public function update(Request $request, $id)
    {
        $request['updated_by'] = Auth::user()->id;
        PatientWorkLevel::find($id)->update($request->all());

        $this->setup->set_log('Patient Work Level Record Updated', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" updated the patient work level record ID "'.$id. '"', request()->ip());

        return "Record Saved";
    }

    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            PatientWorkLevel::find($item)->delete();

            $this->setup->set_log('Patient Work Level Record Deleted', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" deleted the patient work level record ID "'.$item. '"', request()->ip());

        }
        
        return 'Record Deleted';
    }
}
