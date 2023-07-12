<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\DoctorQualification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class DoctorQualificationController extends Controller
{
    protected $func;

    public function __construct() {
        $this->setup = new Controller();
    }
    
    public function get($id) {
        if(request()->ajax()) {
            return datatables()->of(DoctorQualification::where('doctor_id', $id)->get())
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function store(Request $request)
    {

        $validate = $request->validate([
            'degree' => 'required',
            'institute' => 'required',
            'year' => 'required',

        ]);

        $request['workstation_id'] = Auth::user()->workstation_id;
        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        $doctor_qualification = DoctorQualification::create($request->all());

        $doctor = Doctor::find($doctor_qualification->doctor_id);

        $this->setup->set_log('Doctor Qualification Record Created', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" created the qualification record ID "'.$doctor_qualification->id.'" of doctor "'.$doctor->doctor_id.'"', request()->ip());

        return response()->json(compact('validate'));
    }

    public function edit($id)
    {
        $doctor_qualification = DoctorQualification::where('id', $id)->orderBy('id')->firstOrFail();
        $doctor = Doctor::find($doctor_qualification->doctor_id);

        $this->setup->set_log('Doctor Qualification Record Viewed', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" viewed the qualification record ID "'.$id.'" of doctor "'.$doctor->doctor_id.'"', request()->ip());

        return response()->json(compact('doctor_qualification'));
    }

    public function update(Request $request, $id)
    {
        $request['updated_by'] = Auth::user()->id;
        DoctorQualification::find($id)->update($request->all());

        $doctor = Doctor::find($request->doctor_id);
        $this->setup->set_log('Doctor Qualification Record Updated', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" updated the qualification record ID "'.$id.'" of doctor "'.$doctor->doctor_id.'"', request()->ip());

        return "Record Saved";
    }

    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            DoctorQualification::find($item)->delete();

            $this->setup->set_log('Doctor Qualification Record Deleted', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" deleted the qualification record ID "'.$item.'" of doctor."', request()->ip());
        }

        return 'Record Deleted';
    }
}
