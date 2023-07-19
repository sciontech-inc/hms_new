<?php

namespace App\Http\Controllers;

use App\Employee;
use App\EmployeeEducation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class EmployeeEducationController extends Controller
{
    protected $func;

    public function __construct() {
        $this->setup = new Controller();
    }
    
    public function get($id) {
        if(request()->ajax()) {
            return datatables()->of(EmployeeEducation::where('employee_no', $id)->get())
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function store(Request $request)
    {

        $validate = $request->validate([
            'educational_attainment' => 'required',
            'school_year' => 'required',
            'school' => 'required',

        ]);

        $request['workstation_id'] = Auth::user()->workstation_id;
        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        $employee_education = EmployeeEducation::create($request->all());

        $employee = Employee::find($employee_education->employee_no);

        $this->setup->set_log('Employee Education Record Created', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" created the education record ID "'.$employee_education->id.'" of employee "'.$employee->employee_no.'"', request()->ip());

        return response()->json(compact('validate'));
    }

    public function edit($id)
    {
        $employee_education = EmployeeEducation::where('id', $id)->orderBy('id')->firstOrFail();
        $employee = Employee::find($employee_education->employee_no);

        $this->setup->set_log('Employee Education Record Viewed', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" viewed the education record ID "'.$id.'" of employee "'.$employee->employee_no.'"', request()->ip());

        return response()->json(compact('employee_education'));
    }

    public function update(Request $request, $id)
    {
        $request['updated_by'] = Auth::user()->id;
        EmployeeEducation::find($id)->update($request->all());

        $employee = Employee::find($request->employee_no);
        $this->setup->set_log('Employee Education Record Updated', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" updated the education record ID "'.$id.'" of employee "'.$employee->employee_no.'"', request()->ip());

        return "Record Saved";
    }

    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            EmployeeEducation::find($item)->delete();

            $this->setup->set_log('Employee Education Record Deleted', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" deleted the education record ID "'.$item.'" of employee."', request()->ip());
        }

        return 'Record Deleted';
    }
}
