<?php

namespace App\Http\Controllers;

use Auth;
use App\ConsultantClassCode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConsultantClassCodeController extends Controller
{
    protected $func;

    public function __construct() {
        $this->setup = new Controller();
    }

    public function get() {
        if(request()->ajax()) {
            return datatables()->of(ConsultantClassCode::get())
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function store(Request $request)
    {
        $validate = $request->validate([

            'code' => ['required'],
            'description' => ['required'],

        ]);
   
        $request['workstation_id'] = Auth::user()->workstation_id;
        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        $consultant_class_code = ConsultantClassCode::create($request->all());

        $this->setup->set_log('Consultant Class Code Record Created', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" created the consultant class code record with the ID "'.$consultant_class_code->id. '"', request()->ip());

        return response()->json(compact('validate'));
    }

    public function edit($id)
    {
        $consultant_class_code = ConsultantClassCode::where('id', $id)->orderBy('id')->firstOrFail();

        $this->setup->set_log('Consultant Class Code Record Viewed', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" viewed the consultant class code record ID "'.$id. '"', request()->ip());

        return response()->json(compact('consultant_class_code'));
    }

    public function update(Request $request, $id)
    {
        $request['updated_by'] = Auth::user()->id;
        ConsultantClassCode::find($id)->update($request->all());

        $this->setup->set_log('Consultant Class Code Record Updated', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" updated the consultant class code record ID "'.$id. '"', request()->ip());

        return "Record Saved";
    }

    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            ConsultantClassCode::find($item)->delete();

            $this->setup->set_log('Consultant Class Code Record Deleted', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" deleted the consultant class code record ID "'.$item. '"', request()->ip());

        }
        
        return 'Record Deleted';
    }
}
