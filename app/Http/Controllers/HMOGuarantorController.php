<?php

namespace App\Http\Controllers;

use Auth;
use App\HMOGuarantor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HMOGuarantorController extends Controller
{
    protected $func;

    public function __construct() {
        $this->setup = new Controller();
    }

    public function get() {
        if(request()->ajax()) {
            return datatables()->of(HMOGuarantor::get())
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function store(Request $request)
    {
        $validate = $request->validate([

            'code' => ['required'],
            'guarantor_name' => ['required'],
            'telephone' => ['required'],
            'fax_no' => ['required'],
            'contact_no' => ['required'],
            'email' => ['required'],
            'address' => ['required'],

        ]);
        
   
        $request['workstation_id'] = Auth::user()->workstation_id;
        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        $hmo_gurantor = HMOGuarantor::create($request->all());

        $this->setup->set_log('HMO/Guarantor Record Created', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" created the HMO/Guarantor record with the ID "'.$hmo_gurantor->id. '"', request()->ip());

        return response()->json(compact('validate'));
    }

    public function edit($id)
    {
        $hmo_gurantor = HMOGuarantor::where('id', $id)->orderBy('id')->firstOrFail();

        $this->setup->set_log('HMO/Guarantor Record Viewed', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" viewed the HMO/Guarantor record ID "'.$id. '"', request()->ip());

        return response()->json(compact('hmo_gurantor'));
    }

    public function update(Request $request, $id)
    {
        $request['updated_by'] = Auth::user()->id;
        HMOGuarantor::find($id)->update($request->all());

        $this->setup->set_log('HMO/Guarantor Record Updated', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" updated the HMO/Guarantor record ID "'.$id. '"', request()->ip());

        return "Record Saved";
    }

    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            HMOGuarantor::find($item)->delete();

            $this->setup->set_log('HMO/Guarantor Record Deleted', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" deleted the HMO/Guarantor record ID "'.$item. '"', request()->ip());

        }
        
        return 'Record Deleted';
    }
}
