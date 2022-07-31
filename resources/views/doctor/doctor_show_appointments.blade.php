<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->

  @include('doctor.css')

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


    <!-- partial:partials/_sidebar.html -->

    @include('doctor.sidebar')

    <!-- partial -->

    @include('admin.navbar')

    <!-- partial -->
    <div class="">

      <div align="center" style="padding-top: 100px;">

        <table>
          <tr style="background-color: black;">
            <th style="padding: 10px">Patient Name</th>
            <th style="padding: 10px">Email</th>
            {{-- <th style="padding: 10px">Doctor Name</th> --}}
            {{-- <th style="padding: 10px">Doctor Type Requested</th> --}}
            <th style="padding: 10px">Date</th>
            <th style="padding: 10px">Symptoms</th>
            <th style="padding: 10px">Experience</th>
            <th style="padding: 10px">Satus</th>
            <th style="padding: 10px">Approved</th>
            <th style="padding: 10px">Canceled</th>
            <th style="padding: 10px">Offer Prescription</th>
          </tr>

          @foreach ($data as $appointment)

          <tr align="center" style="background-color: gray;">
            <td>{{ $appointment->first_name.' '.$appointment->last_name }}</td>
            <td>{{ $appointment->email }}</td>
            {{-- <td>{{ $appointment->doctor }}</td> --}}
            {{-- <td>{{ $appointment->doctor }}</td> --}}
            <td>{{ $appointment->date }}</td>
            <td>{{ $appointment->symptoms }}</td>
            <td>{{ $appointment->experience }}</td>
            <td>{{ $appointment->status }}</td>

            <td>
              <a class="btn btn-success" href="{{ url('approved',$appointment->appointment_id) }}">Approved</a>
            </td>

            <td>
              <a class="btn btn-danger" href="{{ url('canceled',$appointment->appointment_id) }}">Canceled</a>
            </td>

            <td>
              <a class="btn btn-primary" href="{{ url('prescription',$appointment->user_id) }}">Offer Prescription</a>
            </td>
          </tr>

          @endforeach

        </table>

      </div>
    </div>
  </div>

  <!-- container-scroller -->
  <!-- plugins:js -->


  @include('admin.script')
  <!-- End custom js for this page -->
</body>

</html>