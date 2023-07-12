<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\DoctorExpertise;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class DoctorExpertiseController extends Controller
{
    protected $func;

    public function __construct() {
        $this->setup = new Controller();
    }
    
    public function get($id) {
        if(request()->ajax()) {
            return datatables()->of(DoctorExpertise::where('doctor_id', $id)->get())
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function store(Request $request)
    {

        $validate = $request->validate([
            'specialization' => 'required',
            'years_of_experience' => 'required',

        ]);

        $request['workstation_id'] = Auth::user()->workstation_id;
        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        $doctor_expertise = DoctorExpertise::create($request->all());

        $doctor = Doctor::find($doctor_expertise->doctor_id);

        $this->setup->set_log('Doctor Expertise & Specialization Record Created', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" created the expertise & specialization record ID "'.$doctor_expertise->id.'" of doctor "'.$doctor->doctor_id.'"', request()->ip());

        return response()->json(compact('validate'));
    }

    public function edit($id)
    {
        $doctor_expertise = DoctorExpertise::where('id', $id)->orderBy('id')->firstOrFail();
        $doctor = Doctor::find($doctor_expertise->doctor_id);

        $this->setup->set_log('Doctor Expertise & Specialization Record Viewed', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" viewed the expertise & specialization record ID "'.$id.'" of doctor "'.$doctor->doctor_id.'"', request()->ip());

        return response()->json(compact('doctor_expertise'));
    }

    public function update(Request $request, $id)
    {
        $request['updated_by'] = Auth::user()->id;
        DoctorExpertise::find($id)->update($request->all());

        $doctor = Doctor::find($request->doctor_id);
        $this->setup->set_log('Doctor Expertise & Specialization Record Updated', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" updated the expertise & specialization record ID "'.$id.'" of doctor "'.$doctor->doctor_id.'"', request()->ip());

        return "Record Saved";
    }

    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            DoctorExpertise::find($item)->delete();

            $this->setup->set_log('Doctor Expertise & Specialization Record Deleted', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" deleted the expertise & specialization record ID "'.$item.'" of doctor."', request()->ip());
        }

        return 'Record Deleted';
    }
}
