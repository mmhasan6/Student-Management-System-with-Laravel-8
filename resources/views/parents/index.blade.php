@extends('layouts.admin')

@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Parents
                        {{-- showing success messange --}}
                        @if (session('status'))
                            <h5 class="alert alert-success">{{ session('status') }}</h5>
                        @endif
                        <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#Add_new_parents_model"><i class="fas fa-plus"></i> Add Parents</button>
                        </h4>
                    </div>
                    <div class="card-body">
                @if (!$parents->isEmpty())
                <table id="example2" class="table table-striped table-bordered table-hover table-sm">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Image</th>
                    <th>Student Id</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Phone</th>
                    <th>Date Of Birth</th>
                    <th>Address</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                     @foreach ($parents as $key=>$data)
                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $data->first_name }}</td>
                      <td>{{ $data->last_name }}</td>
                      <td>
                          <img src="{{ asset('uploads/parents/'.$data->profile_picture) }}" width="30px" height="30px" alt="image">
                      </td>
                      <td>{{ $data->student_id }}</td>
                      <td>{{ $data->email }}</td>
                      <td>{{ $data->gender }}</td>
                      <td>{{ $data->phone }}</td>
                      <td>{{ $data->date_of_birth }}</td>
                      <td>{{ $data->address }}</td>
                      <td>
                        <a class="text-danger" href="{{ '/admin/edit-parents/'.$data->id }}"><i class="fas fa-edit"></i></a>
                        <a class="text-danger float-right" href="{{ url('/admin/delete_parents_data/'.$data->id) }}" onclick="return confirm('are you sure to delete!')"><i class="fas fa-trash"></i></a>
                      </td>
                    </tr>  
                    @endforeach
                  </tr>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Image</th>
                    <th>Student Id</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Phone</th>
                    <th>Date Of Birth</th>
                    <th>Address</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
                @else
                <h3 style="text-align: center">No Student register yet</h3>
              @endif
              </div>
              <!-- /.card-body -->
                </div>
            </div>
        </div>

<!-- Add parents Modal -->
<div class="modal fade" id="Add_new_parents_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
                  
      <form class="needs-validation" action="{{ route('admin.add-parents') }}" method="post" enctype="multipart/form-data" novalidate>
        @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Parents Registration</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>      
      <!-- /.card-header -->
      <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInput">First Name</label>
                    <input type="text" name="first_name" class="form-control" placeholder="Firns name" value="{{ old('first_name') }}">
                    <span class="text-danger">@error('last_name'){{ $message }}@enderror</span></label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInput">Last Name</label>
                    <input type="text" name="last_name" class="form-control" placeholder="last name" value="{{ old('last_name') }}">
                    <span class="text-danger">@error('last_name'){{ $message }}@enderror</span></label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInput">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                     <span class="text-danger">@error('email'){{ $message }}@enderror</span></label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInput">Date of Birth</label>
                    <input type="date" name="date_of_birth" class="form-control" placeholder="Date of Birth" value="{{ old('date_of_birth') }}">
                     <span class="text-danger">@error('date_of_birth'){{ $message }}@enderror</span></label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInput">Phone Number</label>
                    <input type="text" name="phone" class="form-control" placeholder="Phone Number" value="{{ old('phone') }}">
                    <span class="text-danger">@error('phone'){{ $message }}@enderror</span></label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInput">Address</label>
                    <input type="address" name="address" class="form-control" placeholder="Address" value="{{ old('address') }}">
                    <span class="text-danger">@error('address'){{ $message }}@enderror</span></label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Select Child</label>
                    <select class="form-control input-lg dynamic" style="width: 100%;" name="student_id">
                      @foreach ($students_for_registration as $item)
                          <option value="{{ $item->id }}" >{{ $item->first_name }}-{{ $item->last_name }}</option>
                      @endforeach
                    </select>
                    <span class="text-danger">@error('course_short_name_id'){{ $message }}@enderror</span>
                  </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="" for="exampleInput" style="margin-right:10%; ">Gender</label>
                    <label ><input type="radio" name="gender" value="male" {{ 'male' == old('gender') ? 'checked' : ''}}> Male</label>
                    <label ><input type="radio" name="gender" value="female" {{ 'female' == old('gender') ? 'checked' : ''}}> Female</label>
                    <span class="text-danger">@error('gender'){{ $message }}@enderror</span></label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInput">Profile Picture</label>
                    <input type="file" name="profile_picture" id="" value="{{ old('profile_picture') }}">
                    <span class="text-danger">@error('profile_picture'){{ $message }}@enderror</span></label>
                </div>
            </div>
        </div> 
    </div>
    {{-- End card body --}} 
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- End Add course Modal -->

@endsection

@section('js')
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
@endsection