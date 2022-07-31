<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [HomeController::class, 'index']);

Auth::routes();

// Route::get('/home', [HomeController::class, 'index'])->name('home');


// Route::get('/home', function(){
//     return view ('index');
// });

Route::get('/about', function () {
    return view('about');
});

Route::get('/faqs', function () {
    return view('faqs');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/payment', function () {
    return view('payment');
});

// Route::get('/admin', function(){
//     return view ('admin/admin_dashboard');
// });

// Route::get('/admin', [AdminController::class, 'index']);

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'admin'])->name('admin');


Route::get('/add_doctor_view', [App\Http\Controllers\AdminController::class, 'addview'])->name('add_doctor_view');

Route::post('/upload_doctor', [App\Http\Controllers\AdminController::class, 'upload'])->name('add_doctor_view');

Route::post('/appointment', [App\Http\Controllers\HomeController::class, 'appointment'])->name('appointment');

Route::get('/myappointment', [App\Http\Controllers\HomeController::class, 'myappointment'])->name('myappointment');

Route::get('/cancel_appointment/{id}', [App\Http\Controllers\HomeController::class, 'cancel_appointment'])->name('cancel_appointment');

Route::get('/show_appointments', [App\Http\Controllers\AdminController::class, 'show_appointments'])->name('show_appointments');

Route::get('/approved/{id}', [App\Http\Controllers\AdminController::class, 'approved'])->name('approved');

Route::get('/canceled/{id}', [App\Http\Controllers\AdminController::class, 'canceled'])->name('canceled');

Route::get('/show_doctors', [App\Http\Controllers\AdminController::class, 'show_doctors'])->name('show_doctors');

Route::get('/delete_doctor/{id}', [App\Http\Controllers\AdminController::class, 'delete_doctor'])->name('delete_doctor');

Route::get('/edit_doctor/{id}', [App\Http\Controllers\AdminController::class, 'edit_doctor'])->name('edit_doctor');

Route::post('/update_doctor/{id}', [App\Http\Controllers\AdminController::class, 'update_doctor'])->name('update_doctor');

Route::get('/send_email/{id}', [App\Http\Controllers\AdminController::class, 'send_email'])->name('send_email');

Route::post('/email_sent/{id}', [App\Http\Controllers\AdminController::class, 'email_sent'])->name('email_sent');

Route::get('/doctor_show_appointments', [App\Http\Controllers\DoctorController::class, 'doctor_show_appointments'])->name('doctor_show_appointments');

Route::get('/add_user', [App\Http\Controllers\AdminController::class, 'add_user'])->name('add_user');

Route::post('/upload_user', [App\Http\Controllers\AdminController::class, 'upload_user'])->name('upload_user');

Route::get('/show_patients', [App\Http\Controllers\AdminController::class, 'show_patients'])->name('show_patients');

Route::get('/prescription/{id}', [App\Http\Controllers\DoctorController::class, 'prescription'])->name('prescription');

Route::post('/offer_prescription', [App\Http\Controllers\DoctorController::class, 'offer_prescription'])->name('offer_prescription');

Route::get('/delete_patient/{id}', [App\Http\Controllers\AdminController::class, 'delete_patient'])->name('delete_patient');

Route::get('/edit_patient/{id}', [App\Http\Controllers\AdminController::class, 'edit_patient'])->name('edit_patient');

Route::post('/update_patient/{id}', [App\Http\Controllers\AdminController::class, 'update_patient'])->name('update_patient');
