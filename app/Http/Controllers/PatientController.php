<?php

namespace App\Http\Controllers;

use App\Traits\GlobalFunction;
use App\Patient;
use Auth;
use Illuminate\Http\Request;

class PatientController extends Controller
{

    use GlobalFunction;
    

    public function get()
    {
        if(request()->ajax()) {
            return datatables()->of(Patient::get())
            ->addIndexColumn()
            ->make(true);
        }
    }
     
    public function store(Request $request)
    {
        $user_firstname = Patient::where('firstname', $request->firstname)->count();
        $user_middlename = Patient::where('middlename', $request->middlename)->count();
        $user_lastname = Patient::where('lastname', $request->lastname)->count();

        if($user_firstname >= 1 && $user_middlename >= 1 && $user_lastname >= 1) {

            $validate = $request->validate([
                'firstname' => 'required|unique:patients',
                'middlename' => 'required|unique:patients',
                'lastname' => 'required|unique:patients',
                'birthdate' => 'required',
                'sex' => 'required',
                'citizenship' => 'required',
                'email' => 'required|unique:patients',
                'birthplace' => 'required',
                'marital_status' => 'required',
                'body_marks' => 'required',
                'nationality' => 'required',
                'religion' => 'required',
                'blood_type' => 'required',
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
                'email' => 'required|unique:patients',
                'birthplace' => 'required',
                'marital_status' => 'required',
                'body_marks' => 'required',
                'nationality' => 'required',
                'religion' => 'required',
                'blood_type' => 'required',
                'contact_number_1' => 'required',
                'street_no' => 'required',
                'barangay' => 'required',
                'city' => 'required',
                'province' => 'required',
                'country' => 'required',
                'zip_code' => 'required',
            ]);
        }

       


        $request['patient_id'] = $this->series('PTNT', 'Patient');

            if($request->profile_img !== null) {
                $request['profile_img'] = $this->uploadFile($request->profile_img, 'images/hms/patient_management/patient/', date('Ymdhis'));
            }
            else {
                $request['profile_img'] = "default.png";
            }
 
        // $qrCodeData =  $request->patient_id; 


        // $qrCode = QrCode::format('png')->size(300)->generate($qrCodeData);

        // $fileName = $request->patient_id.'qr.png';
        // $filePath = public_path('images/hms/patients/qr/' . $fileName);
        // file_put_contents($filePath, $qrCode);

        // $request['qr_code'] = $fileName; 

        $request['workstation_id'] = Auth::user()->workstation_id;
        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        $patient = Patient::create($request->all());

        $last_record = array("id" => $patient->id, "patient_id" => $patient->patient_id);

        return response()->json(compact('validate', 'last_record'));
    }

    public function edit($id)
    {
        $patient = Patient::where('id', $id)->orderBy('id')->firstOrFail();
        return response()->json(compact('patient'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'firstname' => 'required|unique:patients,firstname,'.$request->id,
            'middlename' => 'required',
            'lastname' => 'required|unique:patients,lastname,'.$request->id,
            'birthdate' => 'required',
            'sex' => 'required',
            'citizenship' => 'required',
            'email' => 'required|email|unique:patients,email,'.$request->id,
            'birthplace' => 'required',
            'marital_status' => 'required',
            'body_marks' => 'required',
            'nationality' => 'required',
            'religion' => 'required',
            'blood_type' => 'required',
            'contact_number_1' => 'required',
            'street_no' => 'required',
            'barangay' => 'required',
            'city' => 'required',
            'province' => 'required',
            'country' => 'required',
            'zip_code' => 'required',
        ]);

        if($request->profile_img !== null && $request->profile_img !== '') {
            $request['profile_img'] = $this->uploadFile($request->profile_img, 'images/hms/patient_management/patient/', date('Ymdhis'));
        }
        else {
            $request['profile_img'] = Patient::where('id', $id)->first()->profile_img;
        }

        Patient::findOrFail($id)->update($request->except('created_by'));
        return response()->json(compact('validate'));
    }

    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            Patient::find($item)->delete();
        }
        
        return 'Record Deleted';
    }
}
