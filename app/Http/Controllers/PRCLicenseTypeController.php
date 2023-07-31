<?php

namespace App\Http\Controllers;

use Auth;
use App\PRCLicenseType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PRCLicenseTypeController extends Controller
{
    protected $func;

    public function __construct() {
        $this->setup = new Controller();
    }

    public function get() {
        if(request()->ajax()) {
            return datatables()->of(PRCLicenseType::get())
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

        $prc_license_type = PRCLicenseType::create($request->all());

        $this->setup->set_log('PRC License Type Record Created', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" created the PRC license type record with the ID "'.$prc_license_type->id. '"', request()->ip());

        return response()->json(compact('validate'));
    }

    public function edit($id)
    {
        $prc_license_type = PRCLicenseType::where('id', $id)->orderBy('id')->firstOrFail();

        $this->setup->set_log('PRC License Type Record Viewed', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" viewed the PRC license type record ID "'.$id. '"', request()->ip());

        return response()->json(compact('prc_license_type'));
    }

    public function update(Request $request, $id)
    {
        $request['updated_by'] = Auth::user()->id;
        PRCLicenseType::find($id)->update($request->all());

        $this->setup->set_log('PRC License Type Record Updated', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" updated the PRC license type record ID "'.$id. '"', request()->ip());

        return "Record Saved";
    }

    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            PRCLicenseType::find($item)->delete();

            $this->setup->set_log('PRC License Type Record Deleted', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" deleted the PRC license type record ID "'.$item. '"', request()->ip());

        }
        
        return 'Record Deleted';
    }
}
