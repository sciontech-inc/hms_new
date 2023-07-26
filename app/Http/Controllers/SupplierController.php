<?php

namespace App\Http\Controllers;

use Auth;
use App\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SupplierController extends Controller
{
    protected $func;

    public function __construct() {
        $this->setup = new Controller();
    }

    public function get() {
        if(request()->ajax()) {
            return datatables()->of(Supplier::get())
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function store(Request $request)
    {
        $validate = $request->validate([

            'supplier_code' => ['required'],
            'supplier_name' => ['required'],
            'contact_person' => ['required'],
            'address' => ['required'],
            'contact_number_1' => ['required'],
            'email' => ['required'],
            'terms_agreement' => ['required'],
            'pricing_agreement' => ['required'],
            'delivery_terms' => ['required'],

        ]);
        
   
        $request['workstation_id'] = Auth::user()->workstation_id;
        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        $supplier = Supplier::create($request->all());

        $this->setup->set_log('Supplier Record Created', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" created the supplier record with the ID "'.$supplier->id. '"', request()->ip());

        return response()->json(compact('validate'));
    }

    public function edit($id)
    {
        $supplier = Supplier::where('id', $id)->orderBy('id')->firstOrFail();

        $this->setup->set_log('Supplier Record Viewed', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" viewed the supplier record ID "'.$id. '"', request()->ip());

        return response()->json(compact('supplier'));
    }

    public function update(Request $request, $id)
    {
        $request['updated_by'] = Auth::user()->id;
        Supplier::find($id)->update($request->all());

        $this->setup->set_log('Supplier Record Updated', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" updated the supplier record ID "'.$id. '"', request()->ip());

        return "Record Saved";
    }

    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            Supplier::find($item)->delete();

            $this->setup->set_log('Supplier Record Deleted', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" deleted the supplier record ID "'.$item. '"', request()->ip());

        }
        
        return 'Record Deleted';
    }
}
