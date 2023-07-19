<?php

namespace App\Http\Controllers;

use App\Employee;
use App\EmployeeTraining;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class EmployeeTrainingController extends Controller
{
    protected $func;

    public function __construct() {
        $this->setup = new Controller();
    }
    
    public function get($id) {
        if(request()->ajax()) {
            return datatables()->of(EmployeeTraining::where('employee_no', $id)->get())
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function store(Request $request)
    {

        $validate = $request->validate([
            'training_no' => 'required',
            'training_name' => 'required',
            'training_provider' => 'required',
            'training_description' => 'required',
            'training_date' => 'required',
            'training_location' => 'required',
            'training_duration' => 'required',
            'training_outcome' => 'required',
            'training_type' => 'required',
            'expiration_date' => 'required',
            'recertification_date' => 'required',

        ]);

        $request['workstation_id'] = Auth::user()->workstation_id;
        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        $employee_training = EmployeeTraining::create($request->all());

        $employee = Employee::find($employee_training->employee_no);

        $this->setup->set_log('Employee Training Record Created', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" created the training record ID "'.$employee_training->id.'" of employee "'.$employee->employee_no.'"', request()->ip());

        return response()->json(compact('validate'));
    }

    public function edit($id)
    {
        $employee_training = EmployeeTraining::where('id', $id)->orderBy('id')->firstOrFail();
        $employee = Employee::find($employee_training->employee_no);

        $this->setup->set_log('Employee Training Record Viewed', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" viewed the training record ID "'.$id.'" of employee "'.$employee->employee_no.'"', request()->ip());

        return response()->json(compact('employee_training'));
    }

    public function update(Request $request, $id)
    {
        $request['updated_by'] = Auth::user()->id;
        EmployeeTraining::find($id)->update($request->all());

        $employee = Employee::find($request->employee_no);
        $this->setup->set_log('Employee Training Record Updated', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" updated the training record ID "'.$id.'" of employee "'.$employee->employee_no.'"', request()->ip());

        return "Record Saved";
    }

    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            EmployeeTraining::find($item)->delete();

            $this->setup->set_log('Employee Training Record Deleted', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" deleted the training record ID "'.$item.'" of employee."', request()->ip());
        }

        return 'Record Deleted';
    }
}
