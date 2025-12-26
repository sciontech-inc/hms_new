<?php

namespace App\Http\Controllers;

use App\LabTestSubCategory;
use Illuminate\Http\Request;
use Auth;

class LabTestSubCategoryController extends Controller
{
    protected $func;

    public function __construct() {
        $this->setup = new Controller();
    }

    public function get($id) {
        if(request()->ajax()) {
            return datatables()->of(LabTestSubCategory::where('category_id', $id)->with('category')->get())
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'sub_code' => ['required'],
            'test_name' => ['required'],
            'category_id' => ['required'],
            'unit_of_measure' => ['required'],
        ]);
   
        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        $sub_category = LabTestSubCategory::create($request->all());

        $this->setup->set_log('LabTestSubCategory Record Created', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" created the sub category name "'.$sub_category->name. '"', request()->ip());

        return response()->json(compact('validate'));
    }

    public function edit($id)
    {
        $sub_category = LabTestSubCategory::where('id', $id)->orderBy('id')->firstOrFail();

        $this->setup->set_log('LabTestSubCategory Record Viewed', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" viewed the sub category record ID "'.$id. '"', request()->ip());

        return response()->json(compact('sub_category'));
    }

    public function update(Request $request, $id)
    {
        $request['updated_by'] = Auth::user()->id;
        LabTestSubCategory::find($id)->update($request->all());

        $this->setup->set_log('LabTestSubCategory Record Updated', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" updated the sub_category record ID "'.$id. '"', request()->ip());

        return "Record Saved";
    }

    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            LabTestSubCategory::find($item)->delete();

            $this->setup->set_log('LabTestSubCategory Record Deleted', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" deleted the sub_category record ID "'.$item. '"', request()->ip());

        }
        
        return 'Record Deleted';
    }
}
