<!DOCTYPE html>
<html lang="en">

<head>
  <style>
    th,
    td {
      border-style: solid;
    }
  </style>
  <!-- Required meta tags -->

  @include('admin.css')

  <style>
    table,
    th,
    td {
      border: 1px solid rgb(178, 223, 238);
    }
  </style>
</head>

<body>
  <div class="container-scroller">
    <div class="row p-0 m-0 proBanner" id="proBanner">
      <div class="col-md-12 p-0 m-0">
        {{-- <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
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
        </div> --}}
      </div>
    </div>

    <!-- partial:partials/_sidebar.html -->

    @include('admin.sidebar')

    <!-- partial -->

    @include('admin.navbar')

    <!-- partial -->
    <div class="">

      <div align="center" style="padding-top: 100px;">
        <h1>LIST OF ALL APPOINTMENTS</h1>

        <table>
          <tr style="background-color: black;">
            <th style="padding: 10px">Patient Name</th>
            {{-- <th style="padding: 10px">Email</th> --}}
            {{-- <th style="padding: 10px">Doctor Name</th> --}}
            <th style="padding: 10px">Doctor Type Requested</th>
            <th style="padding: 10px">Date</th>
            <th style="padding: 10px">Symptoms</th>
            <th style="padding: 10px">Experience</th>
            <th style="padding: 10px">Severity</th>
            <th style="padding: 10px">Satus</th>
            <th style="padding: 10px">Approved</th>
            <th style="padding: 10px">Canceled</th>
            <th style="padding: 10px">Send Notification</th>
          </tr>

          @foreach ($data as $appointment)

          <tr align="center" style="background-color: grey;">
            <td>{{ $appointment->first_name.' '.$appointment->last_name }}</td>
            {{-- <td>{{ $appointment->email }}</td> --}}
            {{-- <td>{{ $appointment->doctor }}</td> --}}
            <td>{{ $appointment->doctor }}</td>
            <td>{{ $appointment->date }}</td>
            <td>{{ $appointment->symptoms }}</td>
            <td>{{ $appointment->experience }}</td>
            <td>{{ $appointment->severity }}</td>
            <td>{{ $appointment->status }}</td>

            <td>
              <a class="btn btn-success" href="{{ url('approved',$appointment->appointment_id) }}">Approved</a>
            </td>

            <td>
              <a class="btn btn-danger" href="{{ url('canceled',$appointment->appointment_id) }}">Canceled</a>
            </td>

            <td>
              <a class="btn btn-primary" href="{{ url('send_email',$appointment->appointment_id) }}">Send
                Notification</a>
            </td>
          </tr>

          @endforeach

        </table>

      </div>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->


    @include('admin.script')
    <!-- End custom js for this page -->
</body>

</html>