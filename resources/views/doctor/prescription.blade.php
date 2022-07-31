<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->

  <style>
    label {
      display: inline-block;

      width: 200px;
    }
  </style>

  @include('doctor.css')


</head>

<body>
  <div class="container-scroller">

    @include('doctor.sidebar')

    <!-- partial -->

    @include('admin.navbar')

    <!-- partial -->

    <div class="container-fluid page-body-wrapper">

      <div class="container" align="center" style="padding-top: 100px;">

        @if(session()->has('message'))

        <div class="alert alert-success">

          <button type="button" class="close" data-dismiss="alert">
            x
          </button>

          {{ session()->get('message') }}

        </div>

        @endif

        <form action="{{ url('offer_prescription') }}" method="POST" enctype="multipart/form-data">

          @csrf

          <div style="padding: 15px;">

            <label>Diagnosis</label>
            <input type="text" style="color:black" name="diagnosis" required="">

          </div>

          <div style="padding: 15px;">

            <label>Medication Name</label>
            <input type="text" style="color:black" name="medication_name" required="">

          </div>

          <div style="padding: 15px;">

            <label>Dose</label>
            <input type="text" style="color:black" name="dose" required="">

          </div>


          <div style="padding: 15px;">

            <label>Dates & Times to take medicines</label>
            <input type="text" style="color:black" name="dates_prescribed" required="">

          </div>

          <div>
            <input type="hidden" name="patient_id" value="{{ $patient_id }}">
          </div>

          <div style="padding: 15px;">
            <input type="submit" class="btn btn-success">
          </div>


        </form>

      </div>

    </div>
  </div>
  <!-- container-scroller --