<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\DoctorResearch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class DoctorResearchController extends Controller
{
    protected $func;

    public function __construct() {
        $this->setup = new Controller();
    }
    
    public function get($id) {
        if(request()->ajax()) {
            return datatables()->of(DoctorResearch::where('doctor_id', $id)->get())
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function store(Request $request)
    {

        $validate = $request->validate([

            'research_title' => 'required',
            'research_date_of_publication' => 'required',
            'research_contribution_type' => 'required',
            'research_abstract' => 'required',
            'research_area' => 'required',
            'research_impact_factor' => 'required',
            'research_impact_findings' => 'required',
            'research_presentation' => 'required',
            'research_remarks' => 'required',

        ]);

        $request['workstation_id'] = Auth::user()->workstation_id;
        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        $doctor_research = DoctorResearch::create($request->all());

        $doctor = Doctor::find($doctor_research->doctor_id);

        $this->setup->set_log('Doctor Research Contributions Record Created', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" created the research contribution record ID "'.$doctor_research->id.'" of doctor "'.$doctor->doctor_id.'"', request()->ip());

        return response()->json(compact('validate'));
    }

    public function edit($id)
    {
        $doctor_research = DoctorResearch::where('id', $id)->orderBy('id')->firstOrFail();
        $doctor = Doctor::find($doctor_research->doctor_id);

        $this->setup->set_log('Doctor Research Contributions Record Viewed', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" viewed the research contribution record ID "'.$id.'" of doctor "'.$doctor->doctor_id.'"', request()->ip());

        return response()->json(compact('doctor_research'));
    }

    public function update(Request $request, $id)
    {
        $request['updated_by'] = Auth::user()->id;
        DoctorResearch::find($id)->update($request->all());

        $doctor = Doctor::find($request->doctor_id);
        $this->setup->set_log('Doctor Research Contributions Record Updated', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" updated the research contribution record ID "'.$id.'" of doctor "'.$doctor->doctor_id.'"', request()->ip());

        return "Record Saved";
    }

    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            DoctorResearch::find($item)->delete();

            $this->setup->set_log('Doctor Research Contributions Record Deleted', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" deleted the research contribution record ID "'.$item.'" of doctor."', request()->ip());
        }

        return 'Record Deleted';
    }
}
