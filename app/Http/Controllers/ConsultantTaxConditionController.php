<?php

namespace App\Http\Controllers;

use Auth;
use App\ConsultantTaxCondition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConsultantTaxConditionController extends Controller
{
    protected $func;

    public function __construct() {
        $this->setup = new Controller();
    }

    public function get() {
        if(request()->ajax()) {
            return datatables()->of(ConsultantTaxCondition::get())
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

        $consultant_tax_condition = ConsultantTaxCondition::create($request->all());

        $this->setup->set_log('Consultant Tax Condition Record Created', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" created the consultant tax condition record with the ID "'.$consultant_tax_condition->id. '"', request()->ip());

        return response()->json(compact('validate'));
    }

    public function edit($id)
    {
        $consultant_tax_condition = ConsultantTaxCondition::where('id', $id)->orderBy('id')->firstOrFail();

        $this->setup->set_log('Consultant Tax Condition Record Viewed', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" viewed the consultant tax condition record ID "'.$id. '"', request()->ip());

        return response()->json(compact('consultant_tax_condition'));
    }

    public function update(Request $request, $id)
    {
        $request['updated_by'] = Auth::user()->id;
        ConsultantTaxCondition::find($id)->update($request->all());

        $this->setup->set_log('Consultant Tax Condition Record Updated', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" updated the consultant tax condition record ID "'.$id. '"', request()->ip());

        return "Record Saved";
    }

    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            ConsultantTaxCondition::find($item)->delete();

            $this->setup->set_log('Consultant Tax Condition Record Deleted', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" deleted the consultant tax condition record ID "'.$item. '"', request()->ip());

        }
        
        return 'Record Deleted';
    }
}
