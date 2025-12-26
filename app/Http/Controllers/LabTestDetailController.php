<?php

namespace App\Http\Controllers;

use App\LabTestDetail;
use Illuminate\Http\Request;
use Auth;

class LabTestDetailController extends Controller
{
    protected $func;

    public function __construct() {
        $this->setup = new Controller();
    }

    public function get() {
        if(request()->ajax()) {
            return datatables()->of(LabTestDetail::with('labTest', 'category', 'subCategory')->get())
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'lab_test_id'         => ['required'],
            'category_id' => ['required', 'string', 'max:50'],
            'sub_category_id'     => ['required', 'string', 'max:50'],
            'result'     => ['nullable', 'string', 'max:255'],
            'flag' => ['nullable'],
            'remarks' => ['nullable'],
            'status' => ['nullable'],
        ]);

        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        $lab_test = LabTestDetail::create($request->all());

        $this->setup->set_log('LabTestDetail Record Created', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" created the lab_test name "'.$lab_test->name. '"', request()->ip());

        return response()->json(compact('validate'));
    }

    public function edit($id)
    {
        $lab_test = LabTestDetail::where('id', $id)->orderBy('id')->firstOrFail();

        $this->setup->set_log('LabTestDetail Record Viewed', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" viewed the lab_test record ID "'.$id. '"', request()->ip());

        return response()->json(compact('lab_test'));
    }

    public function update(Request $request, $id)
    {
        $request['updated_by'] = Auth::user()->id;
        LabTestDetail::find($id)->update($request->all());

        $this->setup->set_log('LabTestDetail Record Updated', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" updated the lab_test record ID "'.$id. '"', request()->ip());

        return "Record Saved";
    }

    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            LabTestDetail::find($item)->delete();

            $this->setup->set_log('LabTestDetail Record Deleted', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" deleted the lab_test record ID "'.$item. '"', request()->ip());

        }
        
        return 'Record Deleted';
    }
}
