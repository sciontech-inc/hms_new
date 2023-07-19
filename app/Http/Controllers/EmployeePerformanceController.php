<?php

namespace App\Http\Controllers;

use App\Employee;
use App\EmployeePerformance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class EmployeePerformanceController extends Controller
{
    protected $func;

    public function __construct() {
        $this->setup = new Controller();
    }
    
    public function get($id) {
        if(request()->ajax()) {
            return datatables()->of(EmployeePerformance::where('employee_no', $id)->get())
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function store(Request $request)
    {

        $validate = $request->validate([
            'evaluation_date' => 'required',
            'employee_position' => 'required',
            'evaluation_officer' => 'required',
            'rating' => 'required',

        ]);

        $request['workstation_id'] = Auth::user()->workstation_id;
        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        $employee_performance = EmployeePerformance::create($request->all());

        $employee = Employee::find($employee_performance->employee_no);

        $this->setup->set_log('Employee Performance Record Created', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" created the performance record ID "'.$employee_performance->id.'" of employee "'.$employee->employee_no.'"', request()->ip());

        return response()->json(compact('validate'));
    }

    public function edit($id)
    {
        $employee_performance = EmployeePerformance::where('id', $id)->orderBy('id')->firstOrFail();
        $employee = Employee::find($employee_performance->employee_no);

        $this->setup->set_log('Employee Performance Record Viewed', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" viewed the performance record ID "'.$id.'" of employee "'.$employee->employee_no.'"', request()->ip());

        return response()->json(compact('employee_performance'));
    }

    public function update(Request $request, $id)
    {
        $request['updated_by'] = Auth::user()->id;
        EmployeePerformance::find($id)->update($request->all());

        $employee = Employee::find($request->employee_no);
        $this->setup->set_log('Employee Performance Record Updated', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" updated the performance record ID "'.$id.'" of employee "'.$employee->employee_no.'"', request()->ip());

        return "Record Saved";
    }

    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            EmployeePerformance::find($item)->delete();

            $this->setup->set_log('Employee Performance Record Deleted', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" deleted the performance record ID "'.$item.'" of employee."', request()->ip());
        }

        return 'Record Deleted';
    }
}
