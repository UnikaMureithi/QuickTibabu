<div class="page-section">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Book a Consultation</h1>

      <form class="main-form" action="{{ url('appointment') }}" method="POST">

        @csrf

        <div class="row mt-5 ">
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
            <input type="text" name="first_name" class="form-control" placeholder="First name">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
            <input type="text" name="last_name" class="form-control" placeholder="Last name">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
            <input type="text" name="email" class="form-control" placeholder="Email address">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <input type="date" name="date" class="form-control">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
            <select name="doctor_id" id="departement" class="custom-select">
              
              <option>---Select Doctor Speciality---</option>

              @foreach($doctor as $doctors)
                
              <option value="{{ $doctors->doctor_id }}">{{ $doctors->user->first_name . " " . $doctors->user->last_name . " - ". $doctors->doctor_type }}</option>

              @endforeach
            </select>
          </div>

          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
            <select name="experience" id="departement" class="custom-select">
              
              <option>---What is your Experience?---</option>
              <option>Constant</option>
              <option>Intermittent</option>

            </select>
          </div>

          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
            <select name="severity" id="departement" class="custom-select" >
              
              <option>--What is the Severity of your symptoms?--</option>
              <option>Worsening</option>
              <option>Unchanged</option>
              <option>Improving</option>

            </select>
          </div>

          {{-- <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <input type="text" class="form-control" placeholder="Number..">
          </div> --}}
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <textarea name="symptoms" id="symptoms" class="form-control" rows="6" placeholder="Enter symptoms..."></textarea>
          </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Book Consultation</button>
      </form>
    </div>
  </div> <!-- .page-section -->