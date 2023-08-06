<?php

namespace App\Http\Controllers;

use App\Traits\GlobalFunction;
use App\Patient;
use App\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PatientController extends Controller
{

    protected $func;

    public function __construct() {
        $this->setup = new Controller();
    }
    
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
                'mr_locator_no' => 'required',
                'weight' => 'required',
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
                'dialect' => 'required',
                'temp' => 'required',
                'bp' => 'required',
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
                'mr_locator_no' => 'required',
                'weight' => 'required',
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
                'dialect' => 'required',
                'temp' => 'required',
                'bp' => 'required',
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
        
        $password = str_replace(" ","",$request->lastname).str_replace("-","",$request->birthdate);
        $data = array('firstname' => $request->firstname, 'lastname' => $request->lastname, 'email' => $request->email, 'password' => Hash::make($password), 'status' => 1, 'workstation_id' => 1, 'created_by' => 1, 'updated_by' => 1);
        User::create($data);

        $this->setup->set_log('Patient Record Created', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" created the patient record ID "'.$patient->patient_id.'"', request()->ip());

        $last_record = array("id" => $patient->id, "patient_id" => $patient->patient_id);

        return response()->json(compact('validate', 'last_record'));
    }

    public function edit($id)
    {
        $patient = Patient::where('id', $id)->orderBy('id')->firstOrFail();

        $this->setup->set_log('Patient Record Viewed', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" viewed the patient ID: "'.$id.'"', request()->ip());

        return response()->json(compact('patient'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'firstname' => 'required|unique:patients,firstname,'.$request->id,
            'middlename' => 'required',
            'lastname' => 'required|unique:patients,lastname,'.$request->id,
            'mr_locator_no' => 'required',
            'weight' => 'required',
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
            'dialect' => 'required',
            'temp' => 'required',
            'bp' => 'required',
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

        $this->setup->set_log('Patient Information Updated', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" update patient record with the ID: "'.$id.'"', request()->ip());

        return response()->json(compact('validate'));
    }

    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            Patient::find($item)->delete();
        }

        $this->setup->set_log('Patient Deleted', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" delete the patient record with the ID: "'.$item.'"', request()->ip());
        
        return 'Record Deleted';
    }
}
