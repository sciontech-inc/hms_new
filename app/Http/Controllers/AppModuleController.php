<?php

namespace App\Http\Controllers;

use App\AppModule;
use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\Controller;

class AppModuleController extends Controller
{
    protected $func;

    public function __construct() {
        $this->setup = new Controller();
    }
    
    public function get() {
        if(request()->ajax()) {
            return datatables()->of(AppModule::with('app')->get())
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'code' => 'required|unique:app_modules',
            'app_id' => 'required',
            'sort_no' => 'required',
        ]);

        $request['workstation_id'] = Auth::user()->workstation_id;
        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        AppModule::create($request->all());
        
        $this->setup->set_log('App Module Added', '"'.$request->name.'" was added at App Module Records.', $request->ip());

        return response()->json(compact('validate'));
    }
    
    public function edit($id)
    {
        $appModule = AppModule::where('id', $id)->orderBy('id')->firstOrFail();

        $this->setup->set_log('App Module Viewed', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" viewed the record ID: "'.$id.'"', request()->ip());
        
        return response()->json(compact('appModule'));
    }

    public function update(Request $request, $id)
    {
        $request['updated_by'] = Auth::user()->id;
        AppModule::find($id)->update($request->all());

        $this->setup->set_log('App Module Updated', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" update the record with the ID: "'.$id.'"', request()->ip());

        return "Record Saved";
    }

    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            AppModule::find($item)->delete();

            $this->setup->set_log('App Module Deleted', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" delete the record with the ID: "'.$item.'"', request()->ip());
        }
        
        return 'Record Deleted';
    }

    public function get_list($id) {
        $data = null;

        if($id === "all") {
            $data = AppModule::where('status', 1)->get();
        }
        else {
            $data = AppModule::where('id', $id)->where('status', 1)->get();
        }
        
        return response()->json(compact('data'));
    }
}
