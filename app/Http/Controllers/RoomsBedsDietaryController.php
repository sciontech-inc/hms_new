<?php

namespace App\Http\Controllers;

use Auth;
use App\RoomsBedsDietary;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomsBedsDietaryController extends Controller
{
    protected $func;

    public function __construct() {
        $this->setup = new Controller();
    }

    public function get() {
        if(request()->ajax()) {
            return datatables()->of(RoomsBedsDietary::with('patient')->get())
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'building_id' => 'required',
            'floor_id' => 'required',
            'room_id' => 'required',
            'bed_id' => 'required',
            'start_datetime' => 'required',
            'end_datetime' => 'required',
        ]);

        $request['workstation_id'] = Auth::user()->workstation_id;
        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        $count_data = RoomsBedsDietary::where('patient_admission_id', $request->patient_admission_id)->count();

        if($count_data === 0) {
            $rooms_beds_dietary = RoomsBedsDietary::create($request->all());
            $this->setup->set_log('Rooms, Beds and Dietary Added', '"'.$request->patient_id.'" was added at Rooms, Beds and Dietary Records.', $request->ip());
        }
        else {
            $rooms_beds_dietary = RoomsBedsDietary::where('patient_admission_id', $request->patient_admission_id)->update($request->except(['_token']));
            $this->setup->set_log('Rooms, Beds and Dietary Updated', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" update the record with the Patient Admission ID: "'.$request->patient_admission_id.'"', request()->ip());
        }


        return response()->json(compact('validate'));
    }
    
    public function edit($id)
    {
        $rooms_beds_dietary = RoomsBedsDietary::where('patient_admission_id', $id)->orderBy('id')->firstOrFail();

        return response()->json(compact('rooms_beds_dietary'));
    }

    public function update(Request $request, $id)
    {
        $request['updated_by'] = Auth::user()->id;
        RoomsBedsDietary::find($id)->update($request->all());

        $this->setup->set_log('Rooms, Beds and Dietary Updated', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" update the record with the ID: "'.$id.'"', request()->ip());
        
        return "Record Saved";
    }

    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            RoomsBedsDietary::find($item)->delete();

            $this->setup->set_log('Rooms, Beds and Dietary Deleted', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" delete the record with the ID: "'.$item.'"', request()->ip());
        }
        
        return 'Record Deleted';
    }

    public function get_list($id) {
        $data = null;

        if($id === "all") {
            $data = RoomsBedsDietary::orderBy('floor_no','asc')->get();
        }
        else {
            $data = RoomsBedsDietary::where('building_id', $id)->orderBy('floor_no','asc')->get();
        }
        
        return response()->json(compact('data'));
    }

    public function get_info($id) {
        $data = RoomsBedsDietary::where('id', $id)->firstOrFail();
        return response()->json(compact('data'));
    }
}
