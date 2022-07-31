<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Doctor;
use App\Models\User;
use App\Models\Appointment;
use App\Models\Patient;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Notification;
use App\Notifications\SendEmailNotification;

class AdminController extends Controller
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
    public function admin()
    {
        return view('admin.admin_dashboard');
    }

    public function addview()
    {
        return view('admin.add_doctor');
    }

    public function add_user()
    {
        return view('admin.add_user');
    }

    public function upload(Request $request)
    {
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'role_id' => 2,
        ]);

        $doctor = new doctor;

        $doctor_image = $request->file;

        $imagename = time() . '.' . $doctor_image->getClientoriginalExtension();

        $request->file->move('doctorimage', $imagename);

        $doctor->doctor_image = $imagename;

        // $doctor->first_name=$request->first_name;
        // $doctor->last_name=$request->last_name;
        // $doctor->email=$request->email;
        // $doctor->password=$request->password;
        // $doctor->gender=$request->gender;
        $doctor->mobile_number = $request->mobile_number;
        $doctor->doctor_type = $request->doctor_type;
        $doctor->user_id = $user->id;


        $doctor->save();

        return redirect()->back()->with('message', 'Doctor Added Successfully');
    }


    public function upload_user(Request $request)
    {
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'role_id' => 1,
        ]);

        $patient = new patient;

        $patient->patient_dob = $request->patient_dob;

        $patient->user_id = $user->id;

        $patient->save();

        return redirect()->back()->with('message', 'User Added Successfully');
    }

    public function show_appointments()
    {
        $data = appointment::all();
        return view('admin.show_appointments', compact('data'));
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

    public function show_doctors()
    {
        $data = doctor::all();
        return view('admin.show_doctors', compact('data'));
    }

    public function delete_doctor($doctor_id)
    {
        $data = doctor::find($doctor_id);

        $data->delete();

        return redirect()->back();
    }

    public function delete_patient($user_id)
    {
        $data = user::find($user_id);

        $data->delete();

        return redirect()->back();
    }


    public function edit_doctor($doctor_id)
    {
        $data = doctor::find($doctor_id);

        return view('admin.edit_doctor', compact('data'));
    }

    public function edit_patient($user_id)
    {
        $data = user::find($user_id);

        return view('admin.edit_patient', compact('data'));
    }

    public function update_doctor(Request $request, $doctor_id)
    {

        $doctor = doctor::find($doctor_id);
        // dd($doctor);
        $user_id = $doctor->user_id;
        $user = User::find($user_id);
        // dd($user);

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $doctor->mobile_number = $request->mobile_number;
        $doctor->doctor_type = $request->doctor_type;

        $image = $request->doctor_image;

        if ($image) {
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $request->doctor_image->move('doctorimage', $image_name);
            $doctor->doctor_image = $image_name;
        }

        $user->save();
        $doctor->save();

        return redirect()->back()->with('message', 'Doctor Information Has Been Edited Successfully');
    }

    public function update_patient(Request $request, $user_id)
    {
        $user = user::find($user_id);
        // $user_id = $patient->user_id;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->gender = $request->gender;

        // $patient = new patient;

        // $patient->patient_dob = $request->patient_dob;

        // $patient->user_id = $user->id;

        $user->save();
        // $patient->save();

        return redirect()->back()->with('message', 'Patient Information Has Been Edited Successfully');
    }

    public function show_patients()
    {
        $data = user::where('role_id', 1)->get();

        return view('admin.show_patients', compact('data'));
    }

    public function send_email($appointment_id)
    {
        $data = appointment::find($appointment_id);

        return view('admin.send_email', compact('data'));
    }

    public function email_sent(Request $request, $appointment_id)
    {
        $data = appointment::find($appointment_id);

        $details = [
            'greeting' => $request->greeting,
            'body' => $request->body,
            'action_text' => $request->action_text,
            'action_url' => $request->action_url,
            'end_part' => $request->end_part

        ];

        dd($data);

        Notification::send($data, new SendEmailNotification($details));
        // $data->notify(new SendEmailNotification($details));

        return redirect()->back()->with('message', 'Email Notification Sent Successfully');
    }
}
