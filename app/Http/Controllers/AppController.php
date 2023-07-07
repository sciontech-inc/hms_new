<?php

namespace App\Http\Controllers;

use App\App;
use Illuminate\Http\Request;
use Auth;

class AppController extends Controller
{
    public function get() {
        if(request()->ajax()) {
            return datatables()->of(App::with('app_type')->get())
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'code' => 'required|unique:apps',
            'app_type_id' => 'required',
            'sort_no' => 'required',
            'icon' => 'required',
        ]);

        $request['workstation_id'] = Auth::user()->workstation_id;
        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        App::create($request->all());

        return response()->json(compact('validate'));
    }
    
    public function edit($id)
    {
        $app = App::where('id', $id)->orderBy('id')->firstOrFail();
        return response()->json(compact('app'));
    }

    public function update(Request $request, $id)
    {
        $request['updated_by'] = Auth::user()->id;
        App::find($id)->update($request->all());
        return "Record Saved";
    }

    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            App::find($item)->delete();
        }
        
        return 'Record Deleted';
    }
    
    public function get_list($id) {
        $data = null;

        if($id === "all") {
            $data = App::where('status', 1)->get();
        }
        else {
            $data = App::where('id', $id)->where('status', 1)->get();
        }
        
        return response()->json(compact('data'));
    }
}
