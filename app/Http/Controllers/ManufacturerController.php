<?php

namespace App\Http\Controllers;

use Auth;
use App\Manufacturer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManufacturerController extends Controller
{
    protected $func;

    public function __construct() {
        $this->setup = new Controller();
    }

    public function get() {
        if(request()->ajax()) {
            return datatables()->of(Manufacturer::get())
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function store(Request $request)
    {
        $validate = $request->validate([

            'manufacturer_code' => ['required'],
            'manufacturer_name' => ['required'],
            'contact_person' => ['required'],
            'contact_number_1' => ['required'],
            'email' => ['required'],
            'payment_terms' => ['required'],
            'tax_information' => ['required'],
            'products' => ['required'],
            'lead_time' => ['required'],
            'delivery_terms' => ['required'],
            'performance_metrics' => ['required'],

        ]);
        
   
        $request['workstation_id'] = Auth::user()->workstation_id;
        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        $manufacturer = Manufacturer::create($request->all());

        $this->setup->set_log('Manufacturer Record Created', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" created the manufacturer record with the ID "'.$manufacturer->id. '"', request()->ip());

        return response()->json(compact('validate'));
    }

    public function edit($id)
    {
        $manufacturer = Manufacturer::where('id', $id)->orderBy('id')->firstOrFail();

        $this->setup->set_log('Manufacturer Record Viewed', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" viewed the manufacturer record ID "'.$id. '"', request()->ip());

        return response()->json(compact('manufacturer'));
    }

    public function update(Request $request, $id)
    {
        $request['updated_by'] = Auth::user()->id;
        Manufacturer::find($id)->update($request->all());

        $this->setup->set_log('Manufacturer Record Updated', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" updated the manufacturer record ID "'.$id. '"', request()->ip());

        return "Record Saved";
    }

    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            Manufacturer::find($item)->delete();

            $this->setup->set_log('Manufacturer Record Deleted', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" deleted the manufacturer record ID "'.$item. '"', request()->ip());

        }
        
        return 'Record Deleted';
    }
}
