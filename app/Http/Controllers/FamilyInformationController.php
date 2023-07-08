<?php

namespace App\Http\Controllers;

use App\FamilyInformation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class FamilyInformationController extends Controller
{
    public function store(Request $request)
    {

        $validate = $request->validate([
            'family_fullname' => 'required',
            'family_birthdate' => 'required',
            'family_relationship' => 'required',
            'family_sex' => 'required',
            'family_address' => 'required',
            'family_contact_no' => 'required'
        ]);

        $request['workstation_id'] = Auth::user()->workstation_id;
        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        FamilyInformation::create($request->all());

        return response()->json(compact('validate'));
    }

    public function edit($id)
    {
        $family_information = FamilyInformation::where('id', $id)->orderBy('id')->firstOrFail();
        return response()->json(compact('family_information'));
    }

    public function update(Request $request, $id)
    {
        $request['updated_by'] = Auth::user()->id;
        FamilyInformation::find($id)->update($request->all());
        return "Record Saved";
    }

    
    public function save(Request $request, $id) {
        $output = '';

        $validate = $request->validate([
            'family_fullname' => 'required',
            'family_birthdate' => 'required',
            'family_relationship' => 'required',
            'family_sex' => 'required',
            'family_address' => 'required',
            'family_contact_no' => 'required'

        ]);

        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        $family = FamilyInformation::where('patient_id', $request->patient_id)->where('family_fullname', $request->family_fullname)->count();
        if($family === 0) {
            $output = 'saved';
            FamilyInformation::create($request->all());
        }
        else {
            $output = "updated";
            FamilyInformation::where('patient_id', $request->patient_id)->update($request->except('_token', 'created_by'));
        }
        return response()->json(compact('validate'));
    }

    public function get($id) {
        if(request()->ajax()) {
            return datatables()->of(FamilyInformation::where('patient_id', $id)->get())
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            FamilyInformation::find($item)->delete();
        }

        return 'Record Deleted';
    }
}
