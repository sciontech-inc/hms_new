<?php

namespace App\Http\Controllers;

use App\Patient;
use App\SocialHistory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class SocialHistoryController extends Controller
{
    
    protected $func;

    public function __construct() {
        $this->setup = new Controller();
    }
    
    public function store(Request $request)
    {

        $validate = $request->validate([
            'sh_record' => 'required',
            'sh_category' => 'required',
            'sh_details' => 'required',
        ]);

        $request['workstation_id'] = Auth::user()->workstation_id;
        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        $social_history = SocialHistory::create($request->all());

        $patient = Patient::find($social_history->patient_id);

        $this->setup->set_log('Social History Record Created', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" created the social history record ID "'.$social_history->id.'" of patient "'.$patient->patient_id.'"', request()->ip());

        return response()->json(compact('validate'));
    }

    public function edit($id)
    {
        $social_history = SocialHistory::where('id', $id)->orderBy('id')->firstOrFail();

        $patient = Patient::find($social_history->patient_id);
        $this->setup->set_log('Social History Record Viewed', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" viewed the social history record ID "'.$id.'" of patient "'.$patient->patient_id.'"', request()->ip());

        return response()->json(compact('social_history'));
    }

    public function update(Request $request, $id)
    {
        $request['updated_by'] = Auth::user()->id;
        SocialHistory::find($id)->update($request->all());

        $patient = Patient::find($request->patient_id);
        $this->setup->set_log('Social History Record Updated', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" updated the social history record ID "'.$id.'" of patient "'.$patient->patient_id.'"', request()->ip());

        return "Record Saved";
    }

    public function save(Request $request, $id) {
        $output = '';

        $validate = $request->validate([
            'sh_record' => 'required',
            'sh_category' => 'required',
            'sh_details' => 'required',

        ]);

        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        $insurance = SocialHistory::where('patient_id', $request->patient_id)->where('sh_record', $request->sh_record)->count();
        if($insurance === 0) {
            $output = 'saved';
            SocialHistory::create($request->all());
        }
        else {
            $output = "updated";
            SocialHistory::where('patient_id', $request->patient_id)->update($request->except('_token', 'created_by'));
        }
        return response()->json(compact('validate'));
    }

    public function get($id) {
        if(request()->ajax()) {
            return datatables()->of(SocialHistory::where('patient_id', $id)->get())
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            SocialHistory::find($item)->delete();

            $this->setup->set_log('Social History Record Deleted', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" deleted the social history record ID "'.$item.'" of patient."', request()->ip());

        }

        return 'Record Deleted';
    }
}
