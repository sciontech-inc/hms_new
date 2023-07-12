<?php

namespace App\Http\Controllers;

use Auth;
use App\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DepartmentController extends Controller
{
    
    protected $func;

    public function __construct() {
        $this->setup = new Controller();
    }

    public function get() {
        if(request()->ajax()) {
            return datatables()->of(Department::get())
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'department_code' => ['required'],
            'description' => ['required'],

        ]);
        
   
        $request['workstation_id'] = Auth::user()->workstation_id;
        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        Department::create($request->all());

        return response()->json(compact('validate'));
    }

    public function edit($id)
    {
        $department = Department::where('id', $id)->orderBy('id')->firstOrFail();
        return response()->json(compact('department'));
    }

    public function update(Request $request, $id)
    {
        $request['updated_by'] = Auth::user()->id;
        Department::find($id)->update($request->all());
        return "Record Saved";
    }

    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            Department::find($item)->delete();
        }
        
        return 'Record Deleted';
    }
}
