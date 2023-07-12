<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bed;
use Auth;

class PatientRegisterController extends Controller
{
    public function store(Request $request) {
        if($request->status === 'available') {
            $bed_count = Bed::where('patient_id', $request->patient_id)->count();

            if($bed_count === 0) {
                $validate = $request->validate([
                    'patient_id' => 'required'
                ]);
            }
            else {
                $validate = $request->validate([
                    'patient_id' => 'unique:beds'
                ]);
            }
            $status = 'occupied';
        }
        else {
            $validate = null;
            $status = 'available';
        }

        Bed::where('id', $request->id)->update(['status'=>$status, 'patient_id'=> $request->patient_id, 'updated_by' => Auth::user()->id]);

        $data = array('patient_id'=>$request->patient_id, 'status'=>$status);

        return response()->json(compact('validate', 'data'));
    }
}
