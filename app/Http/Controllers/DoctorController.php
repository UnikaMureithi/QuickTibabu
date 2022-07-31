<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Doctor;
use App\Models\User;
use App\Models\Prescription;
use Illuminate\Support\Facades\Auth;
use App\Models\Appointment;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function doctor()
    {
        return view('doctor.doctor_show_appointments');
    }



    public function doctor_show_appointments()
    {
        $doctor = doctor::where('user_id', Auth::id())->first();
        // dd($doctor);
        $data = appointment::where('doctor_id', $doctor->doctor_id)->get();
        // dd($data);
        return view('doctor.doctor_show_appointments', compact('data'));
    }

    public function approved($appointment_id)
    {
        $data = appointment::find($appointment_id);

        $data->status = 'Approved';

        $data->save();

        return redirect()->back();
    }

    public function canceled($appointment_id)
    {
        $data = appointment::find($appointment_id);

        $data->status = 'Canceled';

        $data->save();

        return redirect()->back();
    }

    public function prescription()
    {
        return view('doctor.prescription');
    }

    public function offer_prescription(Request $request)
    {
        $prescription = Prescription::create([
            'diagnosis' => $request->diagnosis,
            'medication_name' => $request->medication_name,
            'dose' => $request->dose,
            'dates_prescribed' => $request->dates_prescribed,
            'patient_id'=>$
        ]);


        $prescription->save();

        return redirect()->back()->with('message', 'Patient Recieved Prescription Successfully');
    }
}
