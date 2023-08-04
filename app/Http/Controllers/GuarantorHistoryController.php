<?php

namespace App\Http\Controllers;

use App\Patient;
use App\GuarantorHistory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class GuarantorHistoryController extends Controller
{
    protected $func;

    public function __construct() {
        $this->setup = new Controller();
    }

    public function store(Request $request)
    {

        $validate = $request->validate([

            'guarantor_id' => 'required',
            'account_no' => 'required',

        ]);

        $request['workstation_id'] = Auth::user()->workstation_id;
        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        $guarantor_history = GuarantorHistory::create($request->all());

        $patient = Patient::find($guarantor_history->patient_id);

        $this->setup->set_log('Patient Guarantor History Record Created', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" created the patient guarantor history record ID "'.$guarantor_history->id.'" of patient "'.$patient->patient_id.'"', request()->ip());

        return response()->json(compact('validate'));
    }

    public function edit($id)
    {
        $guarantor_history = GuarantorHistory::where('id', $id)->orderBy('id')->firstOrFail();

        $patient = Patient::find($guarantor_history->patient_id);
        $this->setup->set_log('Patient Guarantor History Record Viewed', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" viewed the patient guarantor history record ID "'.$id.'" of patient "'.$patient->patient_id.'"', request()->ip());

        return response()->json(compact('guarantor_history'));
    }

    public function update(Request $request, $id)
    {
        $request['updated_by'] = Auth::user()->id;
        GuarantorHistory::find($id)->update($request->all());

        $patient = Patient::find($request->patient_id);
        $this->setup->set_log('Patient Guarantor History Record Updated', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" updated the patient guarantor history record ID "'.$id.'" of patient "'.$patient->patient_id.'"', request()->ip());

        return "Record Saved";
    }

    public function save(Request $request, $id) {
        $output = '';

        $validate = $request->validate([

            'guarantor_id' => 'required',
            'account_no' => 'required',

        ]);

        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        $insurance = GuarantorHistory::where('patient_id', $request->patient_id)->where('oi_description', $request->oi_description)->count();
        if($insurance === 0) {
            $output = 'saved';
            GuarantorHistory::create($request->all());
        }
        else {
            $output = "updated";
            GuarantorHistory::where('patient_id', $request->patient_id)->update($request->except('_token', 'created_by'));
        }
        return response()->json(compact('validate'));
    }

    public function get($id) {
        if(request()->ajax()) {
            return datatables()->of(GuarantorHistory::where('patient_id', $id)->get())
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            GuarantorHistory::find($item)->delete();
            $this->setup->set_log('Patient Guarantor History Record Deleted', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" deleted the patient guarantor history record ID "'.$item.'" of patient."', request()->ip());

        }

        return 'Record Deleted';
    }
}
