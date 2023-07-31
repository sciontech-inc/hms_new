<?php

namespace App\Http\Controllers;

use Auth;
use App\ConsultantSpecialization;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConsultantSpecializationController extends Controller
{
    protected $func;

    public function __construct() {
        $this->setup = new Controller();
    }

    public function get() {
        if(request()->ajax()) {
            return datatables()->of(ConsultantSpecialization::get())
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

        $consultant_specialization = ConsultantSpecialization::create($request->all());

        $this->setup->set_log('Consultant Specialization Record Created', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" created the consultant specialization record with the ID "'.$consultant_specialization->id. '"', request()->ip());

        return response()->json(compact('validate'));
    }

    public function edit($id)
    {
        $consultant_specialization = ConsultantSpecialization::where('id', $id)->orderBy('id')->firstOrFail();

        $this->setup->set_log('Consultant Specialization Record Viewed', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" viewed the consultant specialization record ID "'.$id. '"', request()->ip());

        return response()->json(compact('consultant_specialization'));
    }

    public function update(Request $request, $id)
    {
        $request['updated_by'] = Auth::user()->id;
        ConsultantSpecialization::find($id)->update($request->all());

        $this->setup->set_log('Consultant Specialization Record Updated', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" updated the consultant specialization record ID "'.$id. '"', request()->ip());

        return "Record Saved";
    }

    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            ConsultantSpecialization::find($item)->delete();

            $this->setup->set_log('Consultant Specialization Record Deleted', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" deleted the consultant specialization record ID "'.$item. '"', request()->ip());

        }
        
        return 'Record Deleted';
    }
}
