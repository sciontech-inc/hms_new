<?php

namespace App\Http\Controllers;

use Auth;
use App\Floor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FloorController extends Controller
{
    protected $func;

    public function __construct() {
        $this->setup = new Controller();
    }

    public function get($id) {
        if(request()->ajax()) {
            return datatables()->of(Floor::where('building_id', $id)->get())
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function store(Request $request)
    {
        $validate;

        if($request->action === "save"){
            $floor_count = Floor::where('building_id', $request->building_id)->where('floor_no', $request->floor_no)->count();

            if($floor_count === 0) {
                $validate = $request->validate([
                    'building_id' => 'required',
                    'floor_no' => 'required',
                    'floor_name' => 'required'
                ]);
                
                $request['workstation_id'] = Auth::user()->workstation_id;
                $request['created_by'] = Auth::user()->id;
                $request['updated_by'] = Auth::user()->id;

                $building = Floor::create($request->all());

                $last_record = array("id" => $building->id);
                $this->setup->set_log('Floor Added', '"'.$request->name.'" was added at Floor Records.', $request->ip());
            }
            else {
                $validate = $request->validate([
                    'floor_no' => 'unique:floors'
                ]);
            }
        }

        return response()->json(compact('validate'));
    }
    
    public function edit($id)
    {
        $floor = Floor::where('id', $id)->orderBy('id')->firstOrFail();

        $this->setup->set_log('Floor Viewed', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" viewed the record ID: "'.$id.'"', request()->ip());
        return response()->json(compact('floor'));
    }

    public function update(Request $request, $id)
    {
        $request['updated_by'] = Auth::user()->id;
        Floor::find($id)->update($request->all());

        $this->setup->set_log('Floor Updated', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" update the record with the ID: "'.$id.'"', request()->ip());
        
        return "Record Saved";
    }

    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            Floor::find($item)->delete();

            $this->setup->set_log('Floor Deleted', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" delete the record with the ID: "'.$item.'"', request()->ip());
        }
        
        return 'Record Deleted';
    }

    public function get_list($id) {
        $data = null;

        if($id === "all") {
            $data = Floor::get();
        }
        else {
            $data = Floor::where('building_id', $id)->get();
        }
        
        return response()->json(compact('data'));
    }
}
