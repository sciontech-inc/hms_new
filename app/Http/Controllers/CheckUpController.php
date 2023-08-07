<?php

namespace App\Http\Controllers;

use Auth;
use App\CheckUp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckUpController extends Controller
{
    protected $func;

    public function __construct() {
        $this->setup = new Controller();
    }

    public function get() {
        if(request()->ajax()) {
            return datatables()->of(CheckUp::with('patient')->get())
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'patient_id' => 'required',
            'datetime' => 'required',
            'doctor_id' => 'required',
            'check_up_status' => 'required',
        ]);

        $request['workstation_id'] = Auth::user()->workstation_id;
        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        $check_up = CheckUp::create($request->all());
        $this->setup->set_log('Check Up Added', '"'.$request->patient_id.'" was added at Check Up Records.', $request->ip());

        $last_record = array("id" => $check_up->id);

        return response()->json(compact('validate', 'last_record'));
    }
    
    public function edit($id)
    {
        $check_up = CheckUp::with('patient')->where('id', $id)->orderBy('id')->firstOrFail();

        $this->setup->set_log('Check Up Viewed', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" viewed the record ID: "'.$id.'"', request()->ip());
        return response()->json(compact('check_up'));
    }

    public function update(Request $request, $id)
    {
        $request['updated_by'] = Auth::user()->id;
        CheckUp::find($id)->update($request->all());

        $this->setup->set_log('Check Up Updated', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" update the record with the ID: "'.$id.'"', request()->ip());
        
        return "Record Saved";
    }

    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            CheckUp::find($item)->delete();

            $this->setup->set_log('Check Up Deleted', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" delete the record with the ID: "'.$item.'"', request()->ip());
        }
        
        return 'Record Deleted';
    }

    public function get_list($id) {
        $data = null;

        if($id === "all") {
            $data = CheckUp::with('patient')->get();
        }
        else {
            $data = CheckUp::with('patient')->where('id', $id)->get();
        }
        
        return response()->json(compact('data'));
    }

    public function get_info($id) {
        $data = CheckUp::with('patient')->where('id', $id)->firstOrFail();
        return response()->json(compact('data'));
    }
}
