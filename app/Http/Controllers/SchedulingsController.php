<?php

namespace App\Http\Controllers;

use Auth;
use App\PatientAppointment;
use App\Schedulings;
use App\Doctor;
use App\Classes\TimeKeeping\Scheduling;
use Illuminate\Http\Request;

class SchedulingsController extends Controller
{
    public function save(Request $request)
    {
        if($request->type === "1") {
            $request['start_time'] = null;
            $request['end_time'] = null;
            $validate = $request->validate([
                'type' => 'required',
                'type_description' => 'required'
            ]);
        }
        else {
            $validate = $request->validate([
                'type' => 'required',
                'start_time' => 'required',
                'end_time' => 'required'
            ]);
        }

        $request['workstation_id'] = 1;
        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        Schedulings::create($request->all());

        return response()->json(compact('validate'));
    }

    public function get($department, $first, $last) {
        $scheduling = new Scheduling;
        if(request()->ajax()) {
            if($department === "all") {
                $doctor_schedule = Doctor::selectRaw($scheduling->query($first, $last))
                ->leftJoin('schedulings', 'doctors.id', '=', 'schedulings.doctors_id')
                ->groupBy("doctors.id")
                ->get();
            }
            else {
                $doctor_schedule = Doctor::selectRaw($scheduling->query($first, $last))
                ->leftJoin('schedulings', 'doctors.id', '=', 'schedulings.doctors_id')
                ->groupBy("doctors.id")
                ->get();
            }

            return datatables()->of(
                $doctor_schedule
            )
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function copy_schedule(Request $request) {
        $schedulings = Schedulings::selectRaw('DAYOFWEEK(date) as no_day, date, doctors_id, start_time, end_time, details, type, type_description, status')->whereBetween('date', [$request->data['first'], $request->data['last']])->orderBy('no_day')->get();

        return response()->json(compact('schedulings'));
    }
    
    public function paste_schedule(Request $request) {
        $request['workstation_id'] = 1;
        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        Schedulings::create($request->all());
    }

    public function get_schedule(Request $request) {
        $schedulings = Schedulings::where('doctors_id', $request->doctors_id)->where('date', '=', $request->date)->first();
        $time = array();

        if($schedulings !== null) {
            for($i=strtotime($schedulings->start_time); $i<strtotime($schedulings->end_time); $i+=3600){
                if(PatientAppointment::where('doctor_id', $request->doctors_id)->where('date', '=', $request->date)->where('time', '=', date("H:i",$i))->where('appointment_status', '!=', '0')->count() === 0) {
                    array_push($time, date("H:i",$i));
                }
            }
        }
        return response()->json(compact('time'));
    }
}
