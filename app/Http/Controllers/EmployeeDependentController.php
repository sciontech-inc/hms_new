<?php

namespace App\Http\Controllers;

use App\Employee;
use App\EmployeeDependent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class EmployeeDependentController extends Controller
{
    protected $func;

    public function __construct() {
        $this->setup = new Controller();
    }
    
    public function get($id) {
        if(request()->ajax()) {
            return datatables()->of(EmployeeDependent::where('employee_no', $id)->get())
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function store(Request $request)
    {

        $validate = $request->validate([
            'dependent_firstname' => 'required',
            'dependent_lastname' => 'required',
            'dependent_birthdate' => 'required',
            'dependent_relationship' => 'required',
            'dependent_sex' => 'required',
            'dependent_address' => 'required',
            'dependent_sex' => 'required',
            'dependent_sex' => 'required',

        ]);

        $request['workstation_id'] = Auth::user()->workstation_id;
        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        $employee_dependent = EmployeeDependent::create($request->all());

        $employee = Employee::find($employee_dependent->employee_no);

        $this->setup->set_log('Employee Dependent Record Created', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" created the dependent record ID "'.$employee_dependent->id.'" of employee "'.$employee->employee_no.'"', request()->ip());

        return response()->json(compact('validate'));
    }

    public function edit($id)
    {
        $employee_dependent = EmployeeDependent::where('id', $id)->orderBy('id')->firstOrFail();
        $employee = Employee::find($employee_dependent->employee_no);

        $this->setup->set_log('Employee Dependent Record Viewed', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" viewed the dependent record ID "'.$id.'" of employee "'.$employee->employee_no.'"', request()->ip());

        return response()->json(compact('employee_dependent'));
    }

    public function update(Request $request, $id)
    {
        $request['updated_by'] = Auth::user()->id;
        EmployeeDependent::find($id)->update($request->all());

        $employee = Employee::find($request->employee_no);
        $this->setup->set_log('Employee Dependent Record Updated', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" updated the dependent record ID "'.$id.'" of employee "'.$employee->employee_no.'"', request()->ip());

        return "Record Saved";
    }

    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            EmployeeDependent::find($item)->delete();

            $this->setup->set_log('Employee Dependent Record Deleted', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" deleted the dependent record ID "'.$item.'" of employee."', request()->ip());
        }

        return 'Record Deleted';
    }
}
