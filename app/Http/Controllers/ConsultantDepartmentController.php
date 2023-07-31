<?php

namespace App\Http\Controllers;

use Auth;
use App\ConsultantDepartment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConsultantDepartmentController extends Controller
{
    protected $func;

    public function __construct() {
        $this->setup = new Controller();
    }

    public function get() {
        if(request()->ajax()) {
            return datatables()->of(ConsultantDepartment::get())
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function store(Request $request)
    {
        $validate = $request->validate([

            'code' => ['required'],
            'description' => ['required'],

        ]);
   
        $request['workstation_id'] = Auth::user()->workstation_id;
        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        $consultant_department = ConsultantDepartment::create($request->all());

        $this->setup->set_log('Consultant Department Record Created', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" created the consultant department record with the ID "'.$consultant_department->id. '"', request()->ip());

        return response()->json(compact('validate'));
    }

    public function edit($id)
    {
        $consultant_department = ConsultantDepartment::where('id', $id)->orderBy('id')->firstOrFail();

        $this->setup->set_log('Consultant Department Record Viewed', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" viewed the consultant department record ID "'.$id. '"', request()->ip());

        return response()->json(compact('consultant_department'));
    }

    public function update(Request $request, $id)
    {
        $request['updated_by'] = Auth::user()->id;
        ConsultantDepartment::find($id)->update($request->all());

        $this->setup->set_log('Consultant Department Record Updated', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" updated the consultant department record ID "'.$id. '"', request()->ip());

        return "Record Saved";
    }

    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            ConsultantDepartment::find($item)->delete();

            $this->setup->set_log('Consultant Department Record Deleted', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" deleted the consultant department record ID "'.$item. '"', request()->ip());

        }
        
        return 'Record Deleted';
    }
}
