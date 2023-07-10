<?php

namespace App\Http\Controllers;

use App\Patient;
use App\ProgressConsultation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class ProgressConsultationController extends Controller
{
    protected $func;

    public function __construct() {
        $this->setup = new Controller();
    }
    
    public function store(Request $request)
    {

        $validate = $request->validate([
            
            'progress_date' => 'required',
            'progress_title' => 'required',
            'progress_notes' => 'required',
       
        ]);

        $request['workstation_id'] = Auth::user()->workstation_id;
        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

          
        $progress_consultation = ProgressConsultation::create($request->all());

        $patient = Patient::find($progress_consultation->patient_id);

        $this->setup->set_log('Progress Notes & Consultation Record Created', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" created the progress notes & consultation record ID "'.$progress_consultation->id.'" of patient "'.$patient->patient_id.'"', request()->ip());

        return response()->json(compact('validate'));
    }

    public function edit($id)
    {
        $progress_consultation = ProgressConsultation::where('id', $id)->orderBy('id')->firstOrFail();

        $patient = Patient::find($progress_consultation->patient_id);
        $this->setup->set_log('Progress Notes & Consultation Record Viewed', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" viewed the progress notes & consultation record ID "'.$id.'" of patient "'.$patient->patient_id.'"', request()->ip());

        return response()->json(compact('progress_consultation'));
    }

    public function update(Request $request, $id)
    {
        $request['updated_by'] = Auth::user()->id;
        ProgressConsultation::find($id)->update($request->all());
        
        $patient = Patient::find($request->patient_id);
        $this->setup->set_log('Progress Notes & Consultation Record Updated', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" updated the progress notes & consultation record ID "'.$id.'" of patient "'.$patient->patient_id.'"', request()->ip());

        return "Record Saved";
    }

    public function save(Request $request, $id) {
        $output = '';

        $validate = $request->validate([
            'progress_date' => 'required',
            'progress_title' => 'required',
            'progress_notes' => 'required',
       

        ]);

        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        $insurance = ProgressConsultation::where('patient_id', $request->patient_id)->where('progress_title', $request->progress_title)->count();
        if($insurance === 0) {
            $output = 'saved';
            ProgressConsultation::create($request->all());
        }
        else {
            $output = "updated";
            ProgressConsultation::where('patient_id', $request->patient_id)->update($request->except('_token', 'created_by'));
        }
        return response()->json(compact('validate'));
    }

    public function get($id) {
        if(request()->ajax()) {
            return datatables()->of(ProgressConsultation::where('patient_id', $id)->get())
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            ProgressConsultation::find($item)->delete();

            $this->setup->set_log('Progress Notes & Consultation Record Deleted', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" deleted the progress notes & consultation record ID "'.$item.'" of patient."', request()->ip());

        }

        return 'Record Deleted';
    }
}
