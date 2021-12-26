
@extends('layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Validation</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Validation</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">S <small>Add Student</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             @if (Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif
                @if (Session::has('error'))
                    <div class="alert alert-danger">{{ Session::get('error') }}</div>
                @endif
              <form action="{{ route('admin.store_data') }}" method="POST" id="student_add_form">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInput">Full Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputPassword1" placeholder="Name">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInput">Roll Id</label>
                    <input type="text" name="rollid" class="form-control" id="exampleInputPassword1" placeholder="ID">
                    @error('rollid')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInput">User Name</label>
                    <input type="text" name="username" class="form-control" id="exampleInputPassword1" placeholder="User name">
                    @error('username')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInput">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="password">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInput">Gender</label>
                    <div class="radio">
                      <label><input type="radio" name="gender" value="male"> Male</label>
                    </div>
                    <div class="radio">
                      <label><input type="radio" name="gender" value="female"> Female</label>
                    </div>
                  </div>
                  <div id="date-picker-example" class="md-form md-outline input-with-post-icon datepicker">
                    <label for="example">Date of Birth</label>
                    <input placeholder="Select date" name="dob" type="text" id="example" class="form-control">
                    <i class="fas fa-calendar input-prefix" tabindex=0></i> 
                  </div>
                  <div class="form-group">
                    <label for="exampleInput">Phone Number</label>
                    <input type="text" name="phone" class="form-control" id="exampleInputPassword1" placeholder="Phone Number">
                    @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group mb-0">
                      <label for="inputStatus">Status</label>
                      <select id="inputStatus" class="form-control custom-select">
                        <option selected disabled>Select one</option>
                        <option>On Hold</option>
                        <option>Canceled</option>
                        <option>Success</option>
                      </select>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection
<script>
  // Data Picker Initialization
$('.datepicker').datepicker();
</script>

{{-- @section('js') //jquery validation

<!-- jquery-validation -->
<script src="{{ asset('plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-validation/additional-methods.min.js') }}"></script>

<script>
$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  });
  $('#student_add_form').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      name: {
        required: true,
        minlength: 3
      },
      terms: {
        required: true
      },
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a valid email address"
      },
      name: {
        required: "Please provide a name",
        minlength: "Your name must be at least 3 characters long"
      },
      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
    
@endsection --}}