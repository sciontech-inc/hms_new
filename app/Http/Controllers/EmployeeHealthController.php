<?php

namespace App\Http\Controllers;

use App\Employee;
use App\EmployeeHealth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class EmployeeHealthController extends Controller
{
    protected $func;

    public function __construct() {
        $this->setup = new Controller();
    }
    
    public function get($id) {
        if(request()->ajax()) {
            return datatables()->of(EmployeeHealth::where('employee_no', $id)->get())
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function store(Request $request)
    {

        $validate = $request->validate([
            'record_date' => 'required',
            'record_description' => 'required',
            'attending_physician' => 'required',
            'diagnosis' => 'required',
            'test_result' => 'required',


        ]);

        $request['workstation_id'] = Auth::user()->workstation_id;
        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        $employee_health = EmployeeHealth::create($request->all());

        $employee = Employee::find($employee_health->employee_no);

        $this->setup->set_log('Employee Health Record Created', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" created the health record ID "'.$employee_health->id.'" of employee "'.$employee->employee_no.'"', request()->ip());

        return response()->json(compact('validate'));
    }

    public function edit($id)
    {
        $employee_health = EmployeeHealth::where('id', $id)->orderBy('id')->firstOrFail();
        $employee = Employee::find($employee_health->employee_no);

        $this->setup->set_log('Employee Health Record Viewed', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" viewed the health record ID "'.$id.'" of employee "'.$employee->employee_no.'"', request()->ip());

        return response()->json(compact('employee_health'));
    }

    public function update(Request $request, $id)
    {
        $request['updated_by'] = Auth::user()->id;
        EmployeeHealth::find($id)->update($request->all());

        $employee = Employee::find($request->employee_no);
        $this->setup->set_log('Employee Health Record Updated', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" updated the health record ID "'.$id.'" of employee "'.$employee->employee_no.'"', request()->ip());

        return "Record Saved";
    }

    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            EmployeeHealth::find($item)->delete();

            $this->setup->set_log('Employee Health Record Deleted', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" deleted the health record ID "'.$item.'" of employee."', request()->ip());
        }

        return 'Record Deleted';
    }
}
