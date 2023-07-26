<?php

namespace App\Http\Controllers;

use Auth;
use App\ServiceType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceTypeController extends Controller
{
    protected $func;

    public function __construct() {
        $this->setup = new Controller();
    }

    public function get() {
        if(request()->ajax()) {
            return datatables()->of(ServiceType::get())
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function store(Request $request)
    {
        $validate = $request->validate([

            'service_type' => ['required'],
            'service_description' => ['required'],

        ]);
        
   
        $request['workstation_id'] = Auth::user()->workstation_id;
        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        $service_type = ServiceType::create($request->all());

        $this->setup->set_log('Service Type Record Created', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" created the service type record with the ID "'.$service_type->id. '"', request()->ip());

        return response()->json(compact('validate'));
    }

    public function edit($id)
    {
        $service_type = ServiceType::where('id', $id)->orderBy('id')->firstOrFail();

        $this->setup->set_log('Service Type Record Viewed', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" viewed the service type record ID "'.$id. '"', request()->ip());

        return response()->json(compact('service_type'));
    }

    public function update(Request $request, $id)
    {
        $request['updated_by'] = Auth::user()->id;
        ServiceType::find($id)->update($request->all());

        $this->setup->set_log('Service Type Record Updated', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" updated the service type record ID "'.$id. '"', request()->ip());

        return "Record Saved";
    }

    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            ServiceType::find($item)->delete();

            $this->setup->set_log('Service Type Record Deleted', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" deleted the service type record ID "'.$item. '"', request()->ip());

        }
        
        return 'Record Deleted';
    }
}
