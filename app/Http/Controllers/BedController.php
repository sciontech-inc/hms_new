<?php

namespace App\Http\Controllers;

use Auth;
use App\Bed;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BedController extends Controller
{
    protected $func;

    public function __construct() {
        $this->setup = new Controller();
    }
    
    public function get($id) {
        if(request()->ajax()) {
            return datatables()->of(Bed::where('building_id', $id)->get())
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function store(Request $request)
    {
        $validate;

        if($request->action === "save"){
            $room_count = Bed::where('building_id', $request->building_id)->where('floor_id', $request->floor_id)->where('bed_no', $request->bed_no)->count();

            if($room_count === 0) {
                $validate = $request->validate([
                    'floor_id' => 'required',
                    'room_id' => 'required',
                    'department_id' => 'required',
                    'bed_type' => 'required',
                    'bed_no' => 'required',
                    'price' => 'required',
                    'status' => 'required'
                ]);
                
                $request['workstation_id'] = Auth::user()->workstation_id;
                $request['created_by'] = Auth::user()->id;
                $request['updated_by'] = Auth::user()->id;

                $building = Bed::create($request->all());

                $last_record = array("id" => $building->id);
                $this->setup->set_log('Bed Added', '"'.$request->name.'" was added at Bed Records.', $request->ip());
            }
            else {
                $validate = $request->validate([
                    'bed_no' => 'unique:beds'
                ]);
            }
        }

        return response()->json(compact('validate'));
    }
    
    public function edit($id)
    {
        $bed = Bed::where('id', $id)->orderBy('id')->firstOrFail();

        $this->setup->set_log('Bed Viewed', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" viewed the record ID: "'.$id.'"', request()->ip());
        return response()->json(compact('bed'));
    }

    public function update(Request $request, $id)
    {
        $request['updated_by'] = Auth::user()->id;
        Bed::find($id)->update($request->all());

        $this->setup->set_log('Bed Updated', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" update the record with the ID: "'.$id.'"', request()->ip());
        
        return "Record Saved";
    }

    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            Bed::find($item)->delete();

            $this->setup->set_log('Bed Deleted', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" delete the record with the ID: "'.$item.'"', request()->ip());
        }
        
        return 'Record Deleted';
    }

    public function get_list($id) {
        $data = null;

        if($id === "all") {
            $data = Bed::get();
        }
        else {
            $data = Bed::where('room_id', $id)->get();
        }
        
        return response()->json(compact('data'));
    }

    public function get_info($id) {
        $data = Bed::where('id', $id)->firstOrFail();
        return response()->json(compact('data'));
    }
}
