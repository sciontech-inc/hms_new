<?php

namespace App\Http\Controllers;

use App\LabTest;
use App\LabTestCategory;
use Illuminate\Http\Request;
use Auth;
use Hash;
class LabTestController extends Controller
{
    protected $func;

    public function __construct() {
        $this->setup = new Controller();
    }

    public function get() {
        if(request()->ajax()) {
            return datatables()->of(LabTest::with('patient', 'performedBy', 'validatedBy', 'notedBy')->get())
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function validated_get() {
        if(request()->ajax()) {
            return datatables()->of(LabTest::where('result_status', '!=','PENDING')->with('patient', 'performedBy', 'validatedBy', 'notedBy')->get())
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function noted_get() {
        if(request()->ajax()) {
            return datatables()->of(LabTest::where('result_status', '!=', 'PENDING')->where('result_status', '!=', 'PERFORMED')->with('patient', 'performedBy', 'validatedBy', 'notedBy')->get())
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function validateTest(Request $request, $id)
    {
         $request->validate([
            'password' => 'required|string'
        ]);

        $user = auth()->user();

        // Verify password
        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Invalid password'
            ], 401);
        }

        $labTest = LabTest::findOrFail($id);

        $labTest->update([
            'result_status' => 'PERFORMED',
            'perform_by' => $user->id,
            'datetime_collected' => now()
        ]);

        return response()->json([
            'message' => 'Lab test successfully marked as PERFORMED'
        ]);
    }

    public function noteTest(Request $request, $id)
    {
         $request->validate([
            'password' => 'required|string'
        ]);

        $user = auth()->user();

        // Verify password
        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Invalid password'
            ], 401);
        }

        $labTest = LabTest::findOrFail($id);

        $labTest->update([
            'result_status' => 'VALIDATED',
            'perform_by' => $user->id,
            'datetime_collected' => now()
        ]);

        return response()->json([
            'message' => 'Lab test successfully marked as VALIDATED'
        ]);
    }

    public function releaseTest(Request $request, $id)
    {
         $request->validate([
            'password' => 'required|string'
        ]);

        $user = auth()->user();

        // Verify password
        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Invalid password'
            ], 401);
        }

        $labTest = LabTest::findOrFail($id);

        $labTest->update([
            'result_status' => 'NOTED',
            'perform_by' => $user->id,
            'datetime_collected' => now()
        ]);

        return response()->json([
            'message' => 'Lab test successfully marked as NOTED and it can be release'
        ]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'patient_id'         => ['required'],
            'transaction_number' => ['required', 'string', 'max:50'],
            'request_number'     => ['required', 'string', 'max:50'],
            'physician_name'     => ['nullable', 'string', 'max:255'],
            'datetime_collected' => ['nullable'],
        ]);
        $request['result_status'] = "PENDING";
        $request['perform_by'] = Auth::user()->id;
        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        $lab_test = LabTest::create($request->all());

        $this->setup->set_log('LabTest Record Created', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" created the lab_test name "'.$lab_test->name. '"', request()->ip());

        return response()->json(compact('validate'));
    }

    public function edit($id)
    {
        $lab_test = LabTest::where('id', $id)->orderBy('id')->firstOrFail();

        $this->setup->set_log('LabTest Record Viewed', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" viewed the lab_test record ID "'.$id. '"', request()->ip());

        return response()->json(compact('lab_test'));
    }

    public function update(Request $request, $id)
    {
        $request['updated_by'] = Auth::user()->id;
        LabTest::find($id)->update($request->all());

        $this->setup->set_log('LabTest Record Updated', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" updated the lab_test record ID "'.$id. '"', request()->ip());

        return "Record Saved";
    }

    public function destroy(Request $request)
    {
        $record = $request->data;

        foreach($record as $item) {
            LabTest::find($item)->delete();

            $this->setup->set_log('LabTest Record Deleted', '"'.Auth::user()->firstname.' '.(Auth::user()->middlename!==null&&Auth::user()->middlename!==''?Auth::user()->middlename.' ':'').Auth::user()->lastname.'" deleted the lab_test record ID "'.$item. '"', request()->ip());

        }
        
        return 'Record Deleted';
    }
}
