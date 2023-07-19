<?php

namespace App\Http\Controllers;

use App\Traits\GlobalFunction;
use Auth;
use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    protected $func;

    public function __construct() {
        $this->setup = new Controller();
    }
    
    use GlobalFunction;

    public function get()
    {
        if(request()->ajax()) {
            return datatables()->of(Employee::get())
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function store(Request $request)
    {
        $user_firstname = Employee::where('firstname', $request->firstname)->count();
        $user_middlename = Employee::where('middlename', $request->middlename)->count();
        $user_lastname = Employee::where('lastname', $request->lastname)->count();

        if($user_firstname >= 1 && $user_middlename >= 1 && $user_lastname >= 1) {

            $validate = $request->validate([
                'firstname' => 'required|unique:employees',
                'middlename' => 'required|unique:employees',
                'lastname' => 'required|unique:employees',
                'birthdate' => 'required',
                'sex' => 'required',
                'citizenship' => 'required',
                'email' => 'required|unique:employees',
                'marital_status' => 'required',
                'contact_number_1' => 'required',
                'street_no' => 'required',
                'barangay' => 'required',
                'city' => 'required',
                'province' => 'required',
                'country' => 'required',
                'zip_code' => 'required',
            ]);
    
        }
        else {
            $validate = $request->validate([
                'firstname' => 'required',
                'middlename' => 'required',
                'lastname' => 'required',
                'birthdate' => 'required',
                'sex' => 'required',
                'citizenship' => 'required',
                'email' => 'required|unique:employees',
                'marital_status' => 'required',
                'contact_number_1' => 'required',
                'street_no' => 'required',
                'barangay' => 'required',
                'city' => 'required',
                'province' => 'required',
                'country' => 'required',
                'zip_code' => 'required',
            ]);
        }


        $request['employee_no'] = $this->series('EMP', 'Employee');

            if($request->profile_img !== null) {
                $request['profile_img'] = $this->uploadFile($request->profile_img, 'images/hms/hris/employee/', date('Ymdhis'));
            }
            else {
                $request['profile_img'] = "default.png";
            }
 
 

        $request['workstation_id'] = Auth::user()->workstation_id;
        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        $employee = Employee::create($request->all());

        $this->setup->set_log('Employee Record Created', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" created the employee record ID "'.$employee->employee_no.'"', request()->ip());

        $last_record = array("id" => $employee->id, "employee_no" => $employee->employee_no);

        return response()->json(compact('validate', 'last_record'));
    }

    public function edit($id)
    {
        $employee = Employee::where('id', $id)->orderBy('id')->firstOrFail();

        $this->setup->set_log('Employee Record Viewed', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" viewed the employee ID: "'.$id.'"', request()->ip());

        return response()->json(compact('employee'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'firstname' => 'required|unique:employees,firstname,'.$request->id,
            'middlename' => 'required',
            'lastname' => 'required|unique:employees,lastname,'.$request->id,
            'birthdate' => 'required',
            'sex' => 'required',
            'citizenship' => 'required',
            'email' => 'required|email|unique:employees,email,'.$request->id,
            'marital_status' => 'required',
            'contact_number_1' => 'required',
            'street_no' => 'required',
            'barangay' => 'required',
            'city' => 'required',
            'province' => 'required',
            'country' => 'required',
            'zip_code' => 'required',
        ]);

        if($request->profile_img !== null && $request->profile_img !== '') {
            $request['profile_img'] = $this->uploadFile($request->profile_img, 'images/hms/hris/employee/', date('Ymdhis'));
        }
        else {
            $request['profile_img'] = Employee::where('id', $id)->first()->profile_img;
        }

        Employee::findOrFail($id)->update($request->except('created_by'));

        $this->setup->set_log('Employee Information Updated', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" update employee record with the ID: "'.$id.'"', request()->ip());

        return response()->json(compact('validate'));
    }

    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            Employee::find($item)->delete();
        }

        $this->setup->set_log('Employee Record Deleted', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" delete the employee record with the ID: "'.$item.'"', request()->ip());
        
        return 'Record Deleted';
    }
}
