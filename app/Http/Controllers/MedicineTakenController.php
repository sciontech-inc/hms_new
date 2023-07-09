<?php

namespace App\Http\Controllers;

use App\Patient;
use App\MedicineTaken;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class MedicineTakenController extends Controller
{
    protected $func;

    public function __construct() {
        $this->setup = new Controller();
    }
    
    public function store(Request $request)
    {

        $validate = $request->validate([
            'medicine_name' => 'required',
            'medicine_doses' => 'required',
            'routes_of_administration' => 'required',
            'medicine_type' => 'required',
            'medicine_duration' => 'required',
            'medicine_reason' => 'required',
            'medicine_compliance' => 'required',

        ]);

        $request['workstation_id'] = Auth::user()->workstation_id;
        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        $medicine_taken = MedicineTaken::create($request->all());

        $patient = Patient::find($medicine_taken->patient_id);

        $this->setup->set_log('Medicine Taken Record Created', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" created the medicine taken record ID "'.$medicine_taken->id.'" of patient "'.$patient->patient_id.'"', request()->ip());

        return response()->json(compact('validate'));
    }

    public function edit($id)
    {
        $medicine_taken = MedicineTaken::where('id', $id)->orderBy('id')->firstOrFail();

        $patient = Patient::find($medicine_taken->patient_id);
        $this->setup->set_log('Medicine Taken Record Viewed', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" viewed the medicine taken record ID "'.$id.'" of patient "'.$patient->patient_id.'"', request()->ip());

        return response()->json(compact('medicine_taken'));
    }

    public function update(Request $request, $id)
    {
        $request['updated_by'] = Auth::user()->id;
        MedicineTaken::find($id)->update($request->all());

        $patient = Patient::find($request->patient_id);
        $this->setup->set_log('Medicine Taken Record Updated', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" updated the medicine taken record ID "'.$id.'" of patient "'.$patient->patient_id.'"', request()->ip());

        return "Record Saved";
    }

    public function save(Request $request, $id) {
        $output = '';

        $validate = $request->validate([
            'medicine_name' => 'required',
            'medicine_doses' => 'required',
            'routes_of_administration' => 'required',
            'medicine_type' => 'required',
            'medicine_duration' => 'required',
            'medicine_reason' => 'required',
            'medicine_compliance' => 'required',

        ]);

        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        $medicine = MedicineTaken::where('patient_id', $request->patient_id)->where('medicine_name', $request->medicine_name)->count();
        if($medicine === 0) {
            $output = 'saved';
            MedicineTaken::create($request->all());
        }
        else {
            $output = "updated";
            MedicineTaken::where('patient_id', $request->patient_id)->update($request->except('_token', 'created_by'));
        }
        return response()->json(compact('validate'));
    }

    public function get($id) {
        if(request()->ajax()) {
            return datatables()->of(MedicineTaken::where('patient_id', $id)->get())
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            MedicineTaken::find($item)->delete();

            $this->setup->set_log('Medicine Taken Record Deleted', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" deleted the medicine taken record ID "'.$item.'" of patient."', request()->ip());

        }

        return 'Record Deleted';
    }
}
