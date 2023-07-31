<?php

namespace App\Http\Controllers;

use Auth;
use App\EWTTaxDescription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EWTTaxDescriptionController extends Controller
{
    protected $func;

    public function __construct() {
        $this->setup = new Controller();
    }

    public function get() {
        if(request()->ajax()) {
            return datatables()->of(EWTTaxDescription::get())
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

        $ewt_tax_description = EWTTaxDescription::create($request->all());

        $this->setup->set_log('EWT Tax Description Record Created', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" created the EWT tax description record with the ID "'.$ewt_tax_description->id. '"', request()->ip());

        return response()->json(compact('validate'));
    }

    public function edit($id)
    {
        $ewt_tax_description = EWTTaxDescription::where('id', $id)->orderBy('id')->firstOrFail();

        $this->setup->set_log('EWT Tax Description Record Viewed', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" viewed the EWT tax description record ID "'.$id. '"', request()->ip());

        return response()->json(compact('ewt_tax_description'));
    }

    public function update(Request $request, $id)
    {
        $request['updated_by'] = Auth::user()->id;
        EWTTaxDescription::find($id)->update($request->all());

        $this->setup->set_log('EWT Tax Description Record Updated', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" updated the EWT tax description record ID "'.$id. '"', request()->ip());

        return "Record Saved";
    }

    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            EWTTaxDescription::find($item)->delete();

            $this->setup->set_log('EWT Tax Description Record Deleted', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" deleted the EWT tax description record ID "'.$item. '"', request()->ip());

        }
        
        return 'Record Deleted';
    }
}
