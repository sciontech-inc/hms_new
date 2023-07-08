<?php

namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{

    public function get()
    {
        if(request()->ajax()) {
            return datatables()->of(Patient::get())
            ->addIndexColumn()
            ->make(true);
        }
    }
     
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patient = Patient::orderBy('id', 'desc')->get();
        // return view('backend.pages.hms.masterfile.patients.index', compact('patient'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

       


        $request['patient_id'] = $this->series('PTNT', 'Patients');

            if($request->profile_img !== null) {
                $request['profile_img'] = $this->uploadFile($request->profile_img, 'images/hms/patients/', date('Ymdhis'));
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

        $patient = Patients::create($request->all());

        $last_record = array("id" => $patient->id, "patient_id" => $patient->patient_id);

        return response()->json(compact('validate', 'last_record'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        //
    }
}
