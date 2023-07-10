<?php

namespace App\Http\Controllers;

use Auth;
use App\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomController extends Controller
{
    protected $func;

    public function __construct() {
        $this->setup = new Controller();
    }

    public function get($id) {
        if(request()->ajax()) {
            return datatables()->of(Room::where('building_id', $id)->get())
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function store(Request $request)
    {
        $validate;

        if($request->action === "save"){
            $room_count = Room::where('building_id', $request->building_id)->where('floor_id', $request->floor_id)->where('room_no', $request->room_no)->count();

            if($room_count === 0) {
                $validate = $request->validate([
                    'building_id' => 'required',
                    'room_no' => 'required',
                    'room_type' => 'required',
                    'room_name' => 'required',
                    'floor_id' => 'required',
                    'capacity' => 'required',
                    'occupancy_status' => 'required'
                ]);
                
                $request['workstation_id'] = Auth::user()->workstation_id;
                $request['created_by'] = Auth::user()->id;
                $request['updated_by'] = Auth::user()->id;

                $building = Room::create($request->all());

                $last_record = array("id" => $building->id);
                $this->setup->set_log('Room Added', '"'.$request->name.'" was added at Room Records.', $request->ip());
            }
            else {
                $validate = $request->validate([
                    'room_no' => 'unique:room'
                ]);
            }
        }

        return response()->json(compact('validate'));
    }
    
    public function edit($id)
    {
        $room = Room::where('id', $id)->orderBy('id')->firstOrFail();

        $this->setup->set_log('Room Viewed', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" viewed the record ID: "'.$id.'"', request()->ip());
        return response()->json(compact('room'));
    }

    public function update(Request $request, $id)
    {
        $request['updated_by'] = Auth::user()->id;
        Room::find($id)->update($request->all());

        $this->setup->set_log('Room Updated', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" update the record with the ID: "'.$id.'"', request()->ip());
        
        return "Record Saved";
    }

    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            Room::find($item)->delete();

            $this->setup->set_log('Room Deleted', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" delete the record with the ID: "'.$item.'"', request()->ip());
        }
        
        return 'Record Deleted';
    }

    public function get_list($id) {
        $data = null;

        if($id === "all") {
            $data = Room::get();
        }
        else {
            $data = Room::where('id', $id)->get();
        }
        
        return response()->json(compact('data'));
    }
}
