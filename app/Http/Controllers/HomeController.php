<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Doctor;

use App\Models\Appointment;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function redirect()
    {
        if (Auth::id()) {
            if (Auth::user()->role_id == '1') {
                return view('index');
            } else {
                return view('admin.admin_dashboard');
            }
        } else {
            return redirect()->back();
        }
    }

    public function index()
    {

        $doctor = doctor::all();
        if (Auth::id()) {
            if (Auth::user()->role_id == '2') {
                return redirect('/doctor_show_appointments');
            }
            if (Auth::user()->role_id == '3') {
                return redirect('/show_appointments');
            }
        }

        return view('index', compact('doctor'));
    }


    public function appointment(Request $request)
    {
        $data = new appointment;

        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->email = $request->email;
        $data->experience = $request->experience;
        $data->severity = $request->severity;
        $doctor = doctor::find($request->doctor_id);
        $data->doctor = $doctor->doctor_type;
        $data->date = $request->date;
        $data->symptoms = $request->symptoms;
        $data->status = 'In Progress';
        $data->doctor_id = $request->doctor_id;

        if (Auth::id()) {
            $data->user_id = Auth::user()->id;
        }

        $data->save();

        return redirect()->back()->with('message', 'Appointment Request Successful . We will contact you soon');
    }

    public function myappointment()
    {
        if (Auth::id()) {

            $userid = Auth::user()->id;

            $appoint = appointment::where('user_id', $userid)->get();

            return view('user.my_appointment', compact('appoint'));
        } else {
            return redirect()->back();
        }
    }

    public function cancel_appointment($appointment_id)
    {
        $data = appointment::find($appointment_id);

        $data->delete();

        return redirect()->back();
    }
}
