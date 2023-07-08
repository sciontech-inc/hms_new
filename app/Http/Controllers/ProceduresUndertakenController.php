<?php

namespace App\Http\Controllers;

use App\ProceduresUndertaken;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class ProceduresUndertakenController extends Controller
{
    public function store(Request $request)
    {

        $validate = $request->validate([
            'procedure_date' => 'required',
            'procedure_name' => 'required',
            'procedure_description' => 'required',
            'procedure_reason' => 'required',
            'procedure_results' => 'required',
            'pre_procedure_preparation' => 'required',
            'post_procedure_preparation' => 'required',
            'procedure_complications' => 'required',
            'procedure_sedation_used' => 'required',

        ]);

        $request['workstation_id'] = Auth::user()->workstation_id;
        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        ProceduresUndertaken::create($request->all());

        return response()->json(compact('validate'));
    }

    public function edit($id)
    {
        $procedures_undertaken = ProceduresUndertaken::where('id', $id)->orderBy('id')->firstOrFail();
        return response()->json(compact('procedures_undertaken'));
    }

    public function update(Request $request, $id)
    {
        $request['updated_by'] = Auth::user()->id;
        ProceduresUndertaken::find($id)->update($request->all());
        return "Record Saved";
    }

    public function save(Request $request, $id) {
        $output = '';

        $validate = $request->validate([
            'procedure_date' => 'required',
            'procedure_name' => 'required',
            'procedure_description' => 'required',
            'procedure_reason' => 'required',
            'procedure_results' => 'required',
            'pre_procedure_preparation' => 'required',
            'post_procedure_preparation' => 'required',
            'procedure_complications' => 'required',
            'procedure_sedation_used' => 'required',

        ]);

        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        $insurance = ProceduresUndertaken::where('patient_id', $request->patient_id)->where('procedure_name', $request->procedure_name)->count();
        if($insurance === 0) {
            $output = 'saved';
            ProceduresUndertaken::create($request->all());
        }
        else {
            $output = "updated";
            ProceduresUndertaken::where('patient_id', $request->patient_id)->update($request->except('_token', 'created_by'));
        }
        return response()->json(compact('validate'));
    }

    public function get($id) {
        if(request()->ajax()) {
            return datatables()->of(ProceduresUndertaken::where('patient_id', $id)->get())
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            ProceduresUndertaken::find($item)->delete();
        }

        return 'Record Deleted';
    }
}
