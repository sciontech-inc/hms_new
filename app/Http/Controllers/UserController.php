<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    protected $func;

    public function __construct() {
        $this->setup = new Controller();
    }

    public function get() {
        if(request()->ajax()) {
            return datatables()->of(User::get())
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function store(Request $request)
    {
        $department = $request->validate([
            'firstname' => ['required'],
            'lastname' => ['required'],
            'email' => ['required'],
            'status' => ['required'],
        ]);

        $request->request->add([
            'workstation_id' => Auth::user()->workstation_id, 
            'created_by' => Auth::user()->id, 
            'updated_by' => Auth::user()->id, 
            'password' => Hash::make('P@ssw0rd')
        ]);

        User::create($request->all());

        $this->setup->set_log('User Added', '"'.$request->firstname.' '.($request->middlename!==null&&$request->middlename!==''?$request->middlename.' ':'').$request->lastname.'" was added at Role Records.', $request->ip());

        return redirect()->back()->with('success','Successfully Added');
    }

    public function edit($id)
    {
        $users = User::where('id', $id)->orderBy('id')->firstOrFail();
        
        $this->setup->set_log('User Viewed', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" viewed the record ID: "'.$id.'"', request()->ip());

        return response()->json(compact('users'));
    }

    public function update(Request $request, $id)
    {
        $request['status'] = isset($request['status'])?1:0;
        User::find($id)->update($request->all());
        
        $this->setup->set_log('User Updated', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" update the record with the ID: "'.$id.'"', request()->ip());

        return response()->json(['Successfully Updated']);
    }
    
    
    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            User::find($item)->delete();
            
            $this->setup->set_log('User Deleted', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" delete the record with the ID: "'.$item.'"', request()->ip());

        }
        
        return 'Record Deleted';
    }

}
