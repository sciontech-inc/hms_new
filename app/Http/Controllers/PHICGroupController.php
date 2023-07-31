<?php

namespace App\Http\Controllers;

use Auth;
use App\PHICGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PHICGroupController extends Controller
{
    protected $func;

    public function __construct() {
        $this->setup = new Controller();
    }

    public function get() {
        if(request()->ajax()) {
            return datatables()->of(PHICGroup::get())
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

        $phic_group = PHICGroup::create($request->all());

        $this->setup->set_log('PHIC Group Record Created', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" created the PHIC Group record with the ID "'.$phic_group->id. '"', request()->ip());

        return response()->json(compact('validate'));
    }

    public function edit($id)
    {
        $phic_group = PHICGroup::where('id', $id)->orderBy('id')->firstOrFail();

        $this->setup->set_log('PHIC Group Record Viewed', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" viewed the PHIC Group record ID "'.$id. '"', request()->ip());

        return response()->json(compact('phic_group'));
    }

    public function update(Request $request, $id)
    {
        $request['updated_by'] = Auth::user()->id;
        PHICGroup::find($id)->update($request->all());

        $this->setup->set_log('PHIC Group Record Updated', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" updated the PHIC Group record ID "'.$id. '"', request()->ip());

        return "Record Saved";
    }

    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            PHICGroup::find($item)->delete();

            $this->setup->set_log('PHIC Group Record Deleted', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" deleted the PHIC Group record ID "'.$item. '"', request()->ip());

        }
        
        return 'Record Deleted';
    }
}
