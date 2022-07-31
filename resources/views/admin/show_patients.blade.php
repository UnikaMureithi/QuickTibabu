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
      </div>
    </div>

    <!-- partial:partials/_sidebar.html -->

    @include('admin.sidebar')

    <!-- partial -->

    @include('admin.navbar')

    <!-- partial -->

    <div class="container-fluid page-body-wrapper">
      <div align="center" style="padding-top: 60px;">
        <h1>LIST OF PATIENTS</h1>

        <table>
          <tr style="background-color: black;">
            <th style="padding: 10px">Patient Name</th>
            <th style="padding: 10px">Email</th>
            <th style="padding: 10px">Patient Gender</th>
            <th style="padding: 10px">Patient Date Of Birth</th>
            <th style="padding: 10px">Delete</th>
            <th style="padding: 10px">Edit</th>

          </tr>
          @foreach($data as $user)
          <tr align="center" style="background-color: gray;">

            <td>{{ $user->first_name . " " . $user->last_name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->gender }}</td>
            <td>{{ $user->patient_dob }}</td>
            <td><a onclick="return confirm('Are you sure you want to delete this patient information?')"
                class="btn btn-danger" href="{{ url('delete_patient', $user->id) }}">Delete</a></td>
            <td><a class="btn btn-primary" href="{{ url('edit_patient', $user->id) }}">Edit</a></td>

            @endforeach
          </tr>
        </table>

      </div>
    </div>

    <!-- container-scroller -->
    <!-- plugins:js -->


    @include('admin.script')
    <!-- End custom js for this page -->
</body>

</html>