<?php

namespace App\Http\Controllers;

use App\Employee;
use App\EmployeeCertification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class EmployeeCertificationController extends Controller
{
    protected $func;

    public function __construct() {
        $this->setup = new Controller();
    }
    
    public function get($id) {
        if(request()->ajax()) {
            return datatables()->of(EmployeeCertification::where('employee_no', $id)->get())
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function store(Request $request)
    {

        $validate = $request->validate([

            'certification_no' => 'required',
            'certification_name' => 'required',
            'certification_authority' => 'required',
            'certification_description' => 'required',
            'certification_date' => 'required',
            'certification_expiration_date' => 'required',
            'certification_level' => 'required',
            'certification_status' => 'required',
            'certification_achievements' => 'required',
            'certification_renewal_date' => 'required',
            'certification_recertification_date' => 'required',

        ]);

        $request['workstation_id'] = Auth::user()->workstation_id;
        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        $employee_certification = EmployeeCertification::create($request->all());

        $employee = Employee::find($employee_certification->employee_no);

        $this->setup->set_log('Employee Certification Record Created', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" created the certification record ID "'.$employee_certification->id.'" of employee "'.$employee->employee_no.'"', request()->ip());

        return response()->json(compact('validate'));
    }

    public function edit($id)
    {
        $employee_certification = EmployeeCertification::where('id', $id)->orderBy('id')->firstOrFail();
        $employee = Employee::find($employee_certification->employee_no);

        $this->setup->set_log('Employee Certification Record Viewed', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" viewed the certification record ID "'.$id.'" of employee "'.$employee->employee_no.'"', request()->ip());

        return response()->json(compact('employee_certification'));
    }

    public function update(Request $request, $id)
    {
        $request['updated_by'] = Auth::user()->id;
        EmployeeCertification::find($id)->update($request->all());

        $employee = Employee::find($request->employee_no);
        $this->setup->set_log('Employee Certification Record Updated', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" updated the certification record ID "'.$id.'" of employee "'.$employee->employee_no.'"', request()->ip());

        return "Record Saved";
    }

    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            EmployeeCertification::find($item)->delete();

            $this->setup->set_log('Employee Certification Record Deleted', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" deleted the certification record ID "'.$item.'" of employee."', request()->ip());
        }

        return 'Record Deleted';
    }
}
