<?php

namespace App\Http\Controllers;

use App\Traits\GlobalFunction;
use Auth;
use App\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    protected $func;

    public function __construct() {
        $this->setup = new Controller();
    }
    
    use GlobalFunction;

    public function get()
    {
        if(request()->ajax()) {
            return datatables()->of(Doctor::get())
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function store(Request $request)
    {
        $user_firstname = Doctor::where('firstname', $request->firstname)->count();
        $user_middlename = Doctor::where('middlename', $request->middlename)->count();
        $user_lastname = Doctor::where('lastname', $request->lastname)->count();

        if($user_firstname >= 1 && $user_middlename >= 1 && $user_lastname >= 1) {

            $validate = $request->validate([
                'firstname' => 'required|unique:doctors',
                'middlename' => 'required|unique:doctors',
                'lastname' => 'required|unique:doctors',
                'birthdate' => 'required',
                'sex' => 'required',
                'citizenship' => 'required',
                'email' => 'required|unique:doctors',
                'birthplace' => 'required',
                'marital_status' => 'required',
                'medical_license_no' => 'required',
                'medical_license_expiry_date' => 'required',
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
                'email' => 'required|unique:doctors',
                'birthplace' => 'required',
                'marital_status' => 'required',
                'medical_license_no' => 'required',
                'medical_license_expiry_date' => 'required',
                'contact_number_1' => 'required',
                'street_no' => 'required',
                'barangay' => 'required',
                'city' => 'required',
                'province' => 'required',
                'country' => 'required',
                'zip_code' => 'required',
            ]);
        }


        $request['doctor_id'] = $this->series('DOCT', 'Doctor');

            if($request->profile_img !== null) {
                $request['profile_img'] = $this->uploadFile($request->profile_img, 'images/hms/staff_management/doctor/', date('Ymdhis'));
            }
            else {
                $request['profile_img'] = "default.png";
            }
 
 

        $request['workstation_id'] = Auth::user()->workstation_id;
        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        $doctor = Doctor::create($request->all());

        $this->setup->set_log('Doctor Record Created', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" created the doctor record ID "'.$doctor->doctor_id.'"', request()->ip());

        $last_record = array("id" => $doctor->id, "doctor_id" => $doctor->doctor_id);

        return response()->json(compact('validate', 'last_record'));
    }

    public function edit($id)
    {
        $doctor = Doctor::where('id', $id)->orderBy('id')->firstOrFail();

        $this->setup->set_log('Doctor Record Viewed', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" viewed the doctor ID: "'.$id.'"', request()->ip());

        return response()->json(compact('doctor'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'firstname' => 'required|unique:doctors,firstname,'.$request->id,
            'middlename' => 'required',
            'lastname' => 'required|unique:doctors,lastname,'.$request->id,
            'birthdate' => 'required',
            'sex' => 'required',
            'citizenship' => 'required',
            'email' => 'required|email|unique:doctors,email,'.$request->id,
            'birthplace' => 'required',
            'marital_status' => 'required',
            'medical_license_no' => 'required',
            'medical_license_expiry_date' => 'required',
            'contact_number_1' => 'required',
            'street_no' => 'required',
            'barangay' => 'required',
            'city' => 'required',
            'province' => 'required',
            'country' => 'required',
            'zip_code' => 'required',
        ]);

        if($request->profile_img !== null && $request->profile_img !== '') {
            $request['profile_img'] = $this->uploadFile($request->profile_img, 'images/hms/staff_management/doctor/', date('Ymdhis'));
        }
        else {
            $request['profile_img'] = Doctor::where('id', $id)->first()->profile_img;
        }

        Doctor::findOrFail($id)->update($request->except('created_by'));

        $this->setup->set_log('Doctor Information Updated', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" update doctor record with the ID: "'.$id.'"', request()->ip());

        return response()->json(compact('validate'));
    }

    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            Doctor::find($item)->delete();
        }

        $this->setup->set_log('Doctor Record Deleted', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" delete the doctor record with the ID: "'.$item.'"', request()->ip());
        
        return 'Record Deleted';
    }

}
