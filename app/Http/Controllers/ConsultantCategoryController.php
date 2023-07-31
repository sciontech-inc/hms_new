<?php

namespace App\Http\Controllers;

use Auth;
use App\ConsultantCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConsultantCategoryController extends Controller
{
    protected $func;

    public function __construct() {
        $this->setup = new Controller();
    }

    public function get() {
        if(request()->ajax()) {
            return datatables()->of(ConsultantCategory::get())
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

        $consultant_category = ConsultantCategory::create($request->all());

        $this->setup->set_log('Consultant Category Record Created', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" created the consultant category record with the ID "'.$consultant_category->id. '"', request()->ip());

        return response()->json(compact('validate'));
    }

    public function edit($id)
    {
        $consultant_category = ConsultantCategory::where('id', $id)->orderBy('id')->firstOrFail();

        $this->setup->set_log('Consultant Category Record Viewed', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" viewed the consultant category record ID "'.$id. '"', request()->ip());

        return response()->json(compact('consultant_category'));
    }

    public function update(Request $request, $id)
    {
        $request['updated_by'] = Auth::user()->id;
        ConsultantCategory::find($id)->update($request->all());

        $this->setup->set_log('Consultant Category Record Updated', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" updated the consultant category record ID "'.$id. '"', request()->ip());

        return "Record Saved";
    }

    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            ConsultantCategory::find($item)->delete();

            $this->setup->set_log('Consultant Category Record Deleted', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" deleted the consultant category record ID "'.$item. '"', request()->ip());

        }
        
        return 'Record Deleted';
    }
}
