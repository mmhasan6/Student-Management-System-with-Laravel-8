@extends('layouts.admin')

@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Teachers
                        {{-- showing success messange --}}
                        @if (session('status'))
                            <h5 class="alert alert-success">{{ session('status') }}</h5>
                        @endif
                        <a href="{{ url('admin/add-new-student') }}" class="btn btn-primary float-right btn-sm">New Student</a>
                        </h4>
                    </div>
                    <div class="card-body">
              @if (!$teachers->isEmpty())
                <table id="example2" class="table table-striped table-bordered table-hover table-sm">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Image</th>
                    <th>Teacher Id</th>
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
                     @foreach ($teachers as $key=>$data)
                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $data->first_name }}</td>
                      <td>{{ $data->last_name }}</td>
                      <td>
                          <img src="{{ asset('uploads/teachers/'.$data->profile_picture) }}" width="30px" height="30px" alt="image">
                      </td>
                      <td>{{ $data->roll_id }}</td>
                      <td>{{ $data->email }}</td>
                      <td>{{ $data->gender }}</td>
                      <td>{{ $data->phone }}</td>
                      <td>{{ $data->date_of_birth }}</td>
                      <td>{{ $data->address }}</td>
                      <td>
                        <a class="text-danger" href="{{ '/admin/edit-teachers/'.$data->id }}"><i class="fas fa-edit"></i></a>
                        <a class="text-danger float-right" href="{{ url('/admin/delete_teachers_data/'.$data->id) }}" onclick="return confirm('are you sure to delete!')"><i class="fas fa-trash"></i></a>
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
                    <th>Teacher Id</th>
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
                  <h3 style="text-align: center">No data register yet</h3>
                @endif
              </div>
              <!-- /.card-body -->
                </div>
            </div>
        </div>
@endsection