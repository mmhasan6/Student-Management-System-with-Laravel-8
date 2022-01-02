@extends('layouts.admin')

@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Courses
                        {{-- showing success messange --}}
                        @if (session('status'))
                            <h5 class="alert alert-success">{{ session('status') }}</h5>
                        @endif
                        <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#Add_new_course_model"><i class="fas fa-plus"></i> New Course</button>
                        </h4>
                    </div>
                    <div class="card-body">
                @if (!$courses->isEmpty())
                <table id="datatable" class="table table-bordered table-hover table-striped table-sm">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Short Name</th>
                    <th>Full Name</th>
                    <th>Created Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                     @foreach ($courses as $key=>$data)
                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $data->course_short_name }}</td>
                      <td>{{ $data->course_full_name }}</td> 
                      <td>{{ $data->created_at }}</td>
                      <td>
                        <a class="text-danger" href="{{ '/admin/edit_course/'.$data->id }}"><i class="fas fa-edit"></i></a>
                        <a class="text-danger float-right" href="{{ url('/admin/delete_course_data/'.$data->id) }}" onclick="return confirm('are you sure to delete!')"><i class="fas fa-trash"></i></a>
                      </td>
                    </tr>  
                    @endforeach
                  </tr>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Short Name</th>
                    <th>Full Name</th>
                    <th>Created Date</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
                @else
                <h3 style="text-align: center">No data yet</h3>
                 @endif
              </div>
              <!-- /.card-body -->
                </div>
            </div>
        </div>
<!-- Add course Modal -->
    <div class="modal fade" id="Add_new_course_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
                      
          <form class="needs-validation" action="{{ route('admin.add_new_course') }}" method="post" novalidate>
            @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Create New Course</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>      
          <div class="modal-body">
            <div class="card-body">                                           
              <div class="form-group">
                  <label>Short Name</label>
                  <input type="text" class="form-control" placeholder="Short Name " name="course_short_name" required>
                    <div class="invalid-feedback">
                      <span class="text-danger">@error('course_short_name'){{ $message }}@enderror</span>
                    </div>    
              </div>
              <div class="form-group">
                  <label>Course Full Name</label>
                  <textarea name="course_full_name" cols="20" rows="5" class="form-control" placeholder="Course Full Name"></textarea> 
                  <div class="invalid-feedback">
                      <span class="text-danger">@error('course_full_name'){{ $message }}@enderror</span>
                  </div> 
              </div>
              {{-- <div class="form-group">
                  <label>Created At</label>
                  <input name="created_at" cols="20" rows="5" class="form-control" placeholder="Created At" disabled>
              </div>  --}}
            </div>
          </div>     
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
          </form>
        </div>
      </div>
    </div>
<!-- End Add course Modal -->
<!-- Add course Modal -->
    <div class="modal fade" id="Add_new_course_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
                      
          <form class="needs-validation" action="{{ route('admin.add_new_course') }}" method="post" novalidate>
            @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Create New Course</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>      
          <div class="modal-body">
            <div class="card-body">                                           
              <div class="form-group">
                  <label>Short Name</label>
                  <input type="text" class="form-control" placeholder="Short Name " name="course_short_name" id="course_short_name" required>
                    <div class="invalid-feedback">
                      <span class="text-danger">@error('course_short_name'){{ $message }}@enderror</span>
                    </div>    
              </div>
              <div class="form-group">
                  <label>Course Full Name</label>
                  <textarea name="course_full_name" cols="20" rows="5" class="form-control" id="course_full_name" placeholder="Course Full Name"></textarea> 
                  <div class="invalid-feedback">
                      <span class="text-danger">@error('course_full_name'){{ $message }}@enderror</span>
                  </div> 
              </div>
              {{-- <div class="form-group">
                  <label>Created At</label>
                  <input name="created_at" cols="20" rows="5" class="form-control" placeholder="Created At" disabled>
              </div>  --}}
            </div>
          </div>     
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
          </form>
        </div>
      </div>
    </div>
<!-- End Add Todo Modal -->

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