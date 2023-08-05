<?php

namespace App\Http\Controllers;

use Auth;
use App\Allergies;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AllergiesController extends Controller
{
    protected $func;

    public function __construct() {
        $this->setup = new Controller();
    }

    public function get() {
        if(request()->ajax()) {
            return datatables()->of(Allergies::get())
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function store(Request $request)
    {
        $validate = $request->validate([

            'allergy_code' => ['required'],
            'allergy_description' => ['required'],

        ]);
        
   
        $request['workstation_id'] = Auth::user()->workstation_id;
        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        $allergies = Allergies::create($request->all());

        $this->setup->set_log('Allergies Record Created', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" created the allergies record with the ID "'.$allergies->id. '"', request()->ip());

        return response()->json(compact('validate'));
    }

    public function edit($id)
    {
        $allergies = Allergies::where('id', $id)->orderBy('id')->firstOrFail();

        $this->setup->set_log('Allergies Record Viewed', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" viewed the allergies record ID "'.$id. '"', request()->ip());

        return response()->json(compact('allergies'));
    }

    public function update(Request $request, $id)
    {
        $request['updated_by'] = Auth::user()->id;
        Allergies::find($id)->update($request->all());

        $this->setup->set_log('Allergies Record Updated', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" updated the allergies record ID "'.$id. '"', request()->ip());

        return "Record Saved";
    }

    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            Allergies::find($item)->delete();

            $this->setup->set_log('Allergies Record Deleted', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" deleted the allergies record ID "'.$item. '"', request()->ip());

        }
        
        return 'Record Deleted';
    }
}
