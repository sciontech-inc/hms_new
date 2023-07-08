<?php

namespace App\Http\Controllers;

use App\App;
use App\Access;
use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\Controller;

class AppController extends Controller
{
    protected $func;

    public function __construct() {
        $this->setup = new Controller();
    }

    public function get() {
        if(request()->ajax()) {
            return datatables()->of(App::with('app_type')->get())
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function store(Request $request)
    {
        $role = Auth::user()->access->role_id;

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

        $app = App::create($request->all());

        $data_access = array(
            'role_id' => $role,
            'permission_for' => 'apps',
            'permission_for_id' => $app->id,
            'enable' => 1,
            'add' => 1,
            'edit' => 1,
            'delete' => 1,
            'print' => 1
        );

        Access::create($data_access);

        $this->setup->set_log('App Added', '"'.$request->name.'" was added at App Records.', $request->ip());

        return response()->json(compact('validate'));
    }
    
    public function edit($id)
    {
        $app = App::where('id', $id)->orderBy('id')->firstOrFail();

        $this->setup->set_log('App Viewed', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" viewed the record ID: "'.$id.'"', request()->ip());

        return response()->json(compact('app'));
    }

    public function update(Request $request, $id)
    {
        $request['updated_by'] = Auth::user()->id;
        App::find($id)->update($request->all());

        $this->setup->set_log('App Updated', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" update the record with the ID: "'.$id.'"', request()->ip());

        return "Record Saved";
    }

    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            App::find($item)->delete();

            $this->setup->set_log('App Deleted', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" delete the record with the ID: "'.$item.'"', request()->ip());
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
