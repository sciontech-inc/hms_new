<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\DoctorWork;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class DoctorWorkController extends Controller
{
    protected $func;

    public function __construct() {
        $this->setup = new Controller();
    }
    
    public function get($id) {
        if(request()->ajax()) {
            return datatables()->of(DoctorWork::where('doctor_id', $id)->get())
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function store(Request $request)
    {

        $validate = $request->validate([
            'organization_name' => 'required',
            'position' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'responsibilities' => 'required',
            'department' => 'required',

        ]);

        $request['workstation_id'] = Auth::user()->workstation_id;
        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        $doctor_work = DoctorWork::create($request->all());

        $doctor = Doctor::find($doctor_work->doctor_id);

        $this->setup->set_log('Doctor Work Experience Record Created', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" created the work experience record ID "'.$doctor_work->id.'" of doctor "'.$doctor->doctor_id.'"', request()->ip());

        return response()->json(compact('validate'));
    }

    public function edit($id)
    {
        $doctor_work = DoctorWork::where('id', $id)->orderBy('id')->firstOrFail();
        $doctor = Doctor::find($doctor_work->doctor_id);

        $this->setup->set_log('Doctor Work Experience Record Viewed', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" viewed the work experience record ID "'.$id.'" of doctor "'.$doctor->doctor_id.'"', request()->ip());

        return response()->json(compact('doctor_work'));
    }

    public function update(Request $request, $id)
    {
        $request['updated_by'] = Auth::user()->id;
        DoctorWork::find($id)->update($request->all());

        $doctor = Doctor::find($request->doctor_id);
        $this->setup->set_log('Doctor Work Experience Record Updated', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" updated the work experience record ID "'.$id.'" of doctor "'.$doctor->doctor_id.'"', request()->ip());

        return "Record Saved";
    }

    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            DoctorWork::find($item)->delete();

            $this->setup->set_log('Doctor Work Experience Record Deleted', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" deleted the work experience record ID "'.$item.'" of doctor."', request()->ip());
        }

        return 'Record Deleted';
    }
}
