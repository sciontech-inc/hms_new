<?php

namespace App\Http\Controllers;

use Auth;
use App\ConsultantServiceType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConsultantServiceTypeController extends Controller
{
    protected $func;

    public function __construct() {
        $this->setup = new Controller();
    }

    public function get() {
        if(request()->ajax()) {
            return datatables()->of(ConsultantServiceType::get())
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

        $consultant_service_type = ConsultantServiceType::create($request->all());

        $this->setup->set_log('Consultant Service Type Record Created', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" created the consultant service type record with the ID "'.$consultant_service_type->id. '"', request()->ip());

        return response()->json(compact('validate'));
    }

    public function edit($id)
    {
        $consultant_service_type = ConsultantServiceType::where('id', $id)->orderBy('id')->firstOrFail();

        $this->setup->set_log('Consultant Service Type Record Viewed', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" viewed the consultant service type record ID "'.$id. '"', request()->ip());

        return response()->json(compact('consultant_service_type'));
    }

    public function update(Request $request, $id)
    {
        $request['updated_by'] = Auth::user()->id;
        ConsultantServiceType::find($id)->update($request->all());

        $this->setup->set_log('Consultant Service Type Record Updated', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" updated the consultant service type record ID "'.$id. '"', request()->ip());

        return "Record Saved";
    }

    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            ConsultantServiceType::find($item)->delete();

            $this->setup->set_log('Consultant Service Type Record Deleted', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" deleted the consultant service type record ID "'.$item. '"', request()->ip());

        }
        
        return 'Record Deleted';
    }
}
