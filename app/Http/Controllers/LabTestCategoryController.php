<?php

namespace App\Http\Controllers;

use App\LabTestCategory;
use App\LabTestSubCategory;
use Illuminate\Http\Request;
use Auth;

class LabTestCategoryController extends Controller
{
    protected $func;

    public function __construct() {
        $this->setup = new Controller();
    }

    public function get() {
        if(request()->ajax()) {
            return datatables()->of(LabTestCategory::get())
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'code' => ['required'],
            'category_name' => ['required'],
            'description' => ['required'],
        ]);
   
        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        $category = LabTestCategory::create($request->all());

        $this->setup->set_log('LabTestCategory Record Created', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" created the category name "'.$category->name. '"', request()->ip());

        return response()->json(compact('validate'));
    }

    public function edit($id)
    {
        $category = LabTestCategory::where('id', $id)->orderBy('id')->firstOrFail();

        $this->setup->set_log('LabTestCategory Record Viewed', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" viewed the category record ID "'.$id. '"', request()->ip());

        return response()->json(compact('category'));
    }

    public function record()
    {
        $category = LabTestCategory::orderBy('id')->get();
        return response()->json(compact('category'));
    }

    public function getByCategory($category_id)
    {
        return LabTestSubCategory::where('category_id', $category_id)->get();
    }

    public function update(Request $request, $id)
    {
        $request['updated_by'] = Auth::user()->id;
        LabTestCategory::find($id)->update($request->all());

        $this->setup->set_log('LabTestCategory Record Updated', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" updated the category record ID "'.$id. '"', request()->ip());

        return "Record Saved";
    }

    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            LabTestCategory::find($item)->delete();

            $this->setup->set_log('LabTestCategory Record Deleted', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" deleted the category record ID "'.$item. '"', request()->ip());

        }
        
        return 'Record Deleted';
    }
}
