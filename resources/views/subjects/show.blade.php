@extends('layouts.admin')

@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Subjects
                        {{-- showing success messange --}}
                        @if (session('status'))
                            <h5 class="alert alert-success">{{ session('status') }}</h5>
                        @endif
                        <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#Add_new_subjects_model"><i class="fas fa-plus"></i> Add Subjects</button>
                        </h4>
                    </div>
                    <div class="card-body">

                      {{-- for small table table-sm --}}
                <table id="datatable" style="text-align: center" class="table table-bordered table-hover table-striped table-responsive-xl table-sm">
                  <thead >
                  <tr>
                    <th>#</th>
                    <th>Course</th>
                    <th colspan="3">Subjects</th>
                    <th>Created Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                     @foreach ($subjects as $key=>$data)
                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $data->course_short_name }}</td>
                        <td>{{ $data->Subject1 }}</td>
                        <td>{{ $data->Subject2 }}</td>
                        <td>{{ $data->Subject3 }}</td>
                      <td>{{ $data->created_at }}</td>
                      <td>
                        <a class="text-danger" href="{{ '/admin/edit_subjects/'.$data->id }}"><i class="fas fa-edit"></i></a>
                        <a class="text-danger float-right" href="{{ url('/admin/delete_subjects_data/'.$data->id) }}" onclick="return confirm('are you sure to delete!')"><i class="fas fa-trash"></i></a>
                      </td>
                    </tr>
                    @endforeach
                  </tr>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Course</th>
                    <th colspan="3">Subjects</th>
                    <th>Created Date</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
                </div>
            </div>
        </div>
<!-- Add course Modal -->
    <div class="modal fade" id="Add_new_subjects_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form class="needs-validation" action="{{ route('admin.add_new_subjects') }}" method="post" novalidate>
            @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Create New Subjects</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="card-body">
                <div class="form-group">
                  <label>Course Short Name</label>
                  <select class="form-control select2" style="width: 100%;" name="course_short_name_id">
                    @foreach ($course_for_add_new_subjects as $item)
                        <option value="{{ $item->id }}" >{{ $item->course_short_name }}</option>
                    @endforeach
                  </select>
                  <span class="text-danger">@error('course_short_name_id'){{ $message }}@enderror</span>
                </div>
                <div class="form-group">
                  <label>Course Full Name</label>
                  <select class="form-control select2" style="width: 100%;" name="course_full_name_id">
                     @foreach ($course_for_add_new_subjects as $item)
                        <option value="{{ $item->id }}">{{ $item->course_full_name }}</option>
                    @endforeach
                  </select>
                  <span class="text-danger">@error('course_full_name_id'){{ $message }}@enderror</span>
                </div>
              <div class="form-group">
                  <label>Subject1</label>
                  <input type="text" class="form-control" placeholder="Short Name " name="Subject1" required>
                  <span class="text-danger">@error('Subject1'){{ $message }}@enderror</span>
              </div>
              <div class="form-group">
                  <label>Subject2</label>
                  <input type="text" class="form-control" placeholder="Short Name " name="Subject2" required>
                  <span class="text-danger">@error('Subject2'){{ $message }}@enderror</span>
              </div>
              <div class="form-group">
                  <label>Subject3</label>
                  <input type="text" class="form-control" placeholder="Short Name " name="Subject3" required>
                  <span class="text-danger">@error('Subject3'){{ $message }}@enderror</span>
              </div>
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
