<?php

namespace App\Http\Controllers;

use Auth;
use App\ConsultantServiceClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConsultantServiceClassController extends Controller
{
    protected $func;

    public function __construct() {
        $this->setup = new Controller();
    }

    public function get() {
        if(request()->ajax()) {
            return datatables()->of(ConsultantServiceClass::get())
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

        $consultant_service_class = ConsultantServiceClass::create($request->all());

        $this->setup->set_log('Consultant Service Class Record Created', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" created the consultant service class record with the ID "'.$consultant_service_class->id. '"', request()->ip());

        return response()->json(compact('validate'));
    }

    public function edit($id)
    {
        $consultant_service_class = ConsultantServiceClass::where('id', $id)->orderBy('id')->firstOrFail();

        $this->setup->set_log('Consultant Service Class Record Viewed', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" viewed the consultant service class record ID "'.$id. '"', request()->ip());

        return response()->json(compact('consultant_service_class'));
    }

    public function update(Request $request, $id)
    {
        $request['updated_by'] = Auth::user()->id;
        ConsultantServiceClass::find($id)->update($request->all());

        $this->setup->set_log('Consultant Service Class Record Updated', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" updated the consultant service class record ID "'.$id. '"', request()->ip());

        return "Record Saved";
    }

    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            ConsultantServiceClass::find($item)->delete();

            $this->setup->set_log('Consultant Service Class Record Deleted', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" deleted the consultant service class record ID "'.$item. '"', request()->ip());

        }
        
        return 'Record Deleted';
    }
}
