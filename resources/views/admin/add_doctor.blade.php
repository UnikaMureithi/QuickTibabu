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

  @include('admin.css')

</head>

<body>
  <div class="container-scroller">
    {{-- <div class="row p-0 m-0 proBanner" id="proBanner">
      <div class="col-md-12 p-0 m-0">
        <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
          <div class="ps-lg-1">
            <div class="d-flex align-items-center justify-content-between">
              <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with
                this template!</p>
              <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo"
                target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
            </div>
          </div>
          <div class="d-flex align-items-center justify-content-between">
            <a href="https://www.bootstrapdash.com/product/corona-free/"><i
                class="mdi mdi-home me-3 text-white"></i></a>
            <button id="bannerClose" class="btn border-0 p-0">
              <i class="mdi mdi-close text-white me-0"></i>
            </button>
          </div>
        </div>
      </div>
    </div> --}}

    <!-- partial:partials/_sidebar.html -->

    @include('admin.sidebar')

    <!-- partial -->

    @include('admin.navbar')

    <!-- partial -->

    <div class="container-fluid page-body-wrapper">

      <div class="container" align="center" style="padding-top: 30px;">

        @if(session()->has('message'))

        <div class="alert alert-success">

          <button type="button" class="close" data-dismiss="alert">
            x
          </button>

          {{ session()->get('message') }}

        </div>

        @endif

        <form action="{{ url('upload_doctor') }}" method="POST" enctype="multipart/form-data">

          @csrf

          <div style="padding: 15px;">

            <label>Doctor First Name</label>
            <input type="text" style="color:black" name="first_name" placeholder="Write the first name" required="">

          </div>

          <div style="padding: 15px;">

            <label>Doctor Last Name</label>
            <input type="text" style="color:black" name="last_name" placeholder="Write the last name" required="">

          </div>

          <div style="padding: 15px;">

            <label>Doctor Gender</label>
            <select name="gender" style="color: black; width: 200px;">
              <option value="male">Male</option>
              <option value="female">Female</option>
            </select>

          </div>

          <div style="padding: 15px;">

            <label>Mobile Number</label>
            <input type="text" style="color:black" name="mobile_number" placeholder="Write the phone number" required=""
              minlength="10" maxlength="10">

          </div>

          <div style="padding: 15px;">

            <label>Email</label>
            <input type="text" style="color:black" name="email" placeholder="Write the email" required="">

          </div>

          <div style="padding: 15px;">

            <label>Password</label>
            <input type="text" style="color:black" name="password" placeholder="Write the password" required="">

          </div>

          <div style="padding: 15px;">

            <label>Doctor Type</label>
            <select name="doctor_type" style="color: black; width: 200px;">
              <option>--Select--</option>
              <option value="Orthopaedics">Orthopaedics</option>
              <option value="General Physician">General Physician</option>
              <option value="Cardiologist">Cardiologist</option>
              <option value="Obstetrician">Obstetrician</option>
              <option value="Gynecologist">Gynecologist</option>
              <option value="Ophthalmologist">Ophthalmologist</option>
              <option value="Oncologist">Oncologist</option>
              <option value="Pediatrician">Pediatrician</option>
              <option value="Dentist">Dentist</option>

            </select>

          </div>

          <div style="padding: 15px;">

            <label>Doctor Image</label>
            <input type="file" name="file" required="">

          </div>

          <div style="padding: 15px;">
            <input type="submit" class="btn btn-success">
          </div>


        </form>

      </div>

    </div>
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->


  @include('admin.script')
  <!-- End custom js for this page -->
</body>

</html>