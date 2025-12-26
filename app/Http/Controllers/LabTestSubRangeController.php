<?php

namespace App\Http\Controllers;

use App\LabTestSubRange;
use Illuminate\Http\Request;
use Auth;

class LabTestSubRangeController extends Controller
{
    protected $func;

    public function __construct() {
        $this->setup = new Controller();
    }

    public function get() {
        if(request()->ajax()) {
            return datatables()->of(LabTestSubRange::get())
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function getRanges($sub_category_id)
    {
        $ranges = LabTestSubRange::where('sub_category_id', $sub_category_id)->get();

        return response()->json($ranges);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'sub_category_id' => ['required'],
            'range_code' => ['required'],
            'range_name' => ['required'],
            'low' => ['required'],
            'high' => ['required'],
        ]);
   
        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        $sub_range = LabTestSubRange::create($request->all());

        $this->setup->set_log('LabTestSubRange Record Created', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" created the range name "'.$sub_range->name. '"', request()->ip());

        return response()->json(compact('validate'));
    }

    public function edit($id)
    {
        $sub_range = LabTestSubRange::where('id', $id)->orderBy('id')->firstOrFail();

        $this->setup->set_log('LabTestSubRange Record Viewed', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" viewed the range record ID "'.$id. '"', request()->ip());

        return response()->json(compact('sub_range'));
    }

    public function update(Request $request, $id)
    {
        $request['updated_by'] = Auth::user()->id;
        LabTestSubRange::find($id)->update($request->all());

        $this->setup->set_log('LabTestSubRange Record Updated', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" updated the sub_range record ID "'.$id. '"', request()->ip());

        return "Record Saved";
    }

    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            LabTestSubRange::find($item)->delete();

            $this->setup->set_log('LabTestSubRange Record Deleted', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" deleted the sub_range record ID "'.$item. '"', request()->ip());

        }
        
        return 'Record Deleted';
    }
}
