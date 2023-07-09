<?php

namespace App\Http\Controllers;

use App\Building;
use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\Controller;

class BuildingController extends Controller
{
    protected $func;

    public function __construct() {
        $this->setup = new Controller();
    }

    public function get() {
        if(request()->ajax()) {
            return datatables()->of(Building::get())
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'province' => 'required',
            'postal_code' => 'required',
            'contact_number' => 'required',
            'email' => 'required',
            'construction_date' => 'required'
        ]);

        $request['workstation_id'] = Auth::user()->workstation_id;
        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        $building = Building::create($request->all());

        $last_record = array("id" => $building->id);
        $this->setup->set_log('Building Added', '"'.$request->name.'" was added at Building Records.', $request->ip());

        return response()->json(compact('validate'));
    }
    
    public function edit($id)
    {
        $building = Building::where('id', $id)->orderBy('id')->firstOrFail();

        $this->setup->set_log('Buidling Viewed', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" viewed the record ID: "'.$id.'"', request()->ip());
        return response()->json(compact('building'));
    }

    public function update(Request $request, $id)
    {
        $request['updated_by'] = Auth::user()->id;
        Building::find($id)->update($request->all());

        $this->setup->set_log('Building Updated', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" update the record with the ID: "'.$id.'"', request()->ip());
        
        return "Record Saved";
    }

    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            Building::find($item)->delete();

            $this->setup->set_log('Building Deleted', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" delete the record with the ID: "'.$item.'"', request()->ip());
        }
        
        return 'Record Deleted';
    }

    public function get_list($id) {
        $data = null;

        if($id === "all") {
            $data = Building::where('status', 1)->get();
        }
        else {
            $data = Building::where('id', $id)->where('status', 1)->get();
        }
        
        return response()->json(compact('data'));
    }
}
