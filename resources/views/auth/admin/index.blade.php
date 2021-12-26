@extends('layouts.admin')

@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Admin Users
                        <a href="{{ url('admin/add-parents') }}" class="btn btn-primary float-right">Add Parents</a>
                        </h4>
                    </div>
                    <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Image</th>
                    <th>Address</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                     @foreach ($parents as $key=>$data)
                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $data->name }}</td>
                      <td>{{ $data->username }}</td>
                      <td>{{ $data->email }}</td>
                      <td>{{ $data->phone }}</td>
                      <td>
                          <img src="{{ asset('uploads/parents/'.$data->profile_image) }}" width="30px" height="30px" alt="image">
                      </td>
                      <td>{{ $data->address }}</td>
                      <td>
                        <a class="text-danger" href="{{ '/admin/edit-parents/'.$data->id }}"><i class="fas fa-edit"></i></a>
                        <a class="text-danger float-right" href="{{ url('/admin/delete_data/'.$data->id) }}" onclick="return confirm('are you sure to delete!')"><i class="fas fa-trash"></i></a>
                      </td>
                    </tr>  
                    @endforeach
                  </tr>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Image</th>
                    <th>Address</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
                </div>
            </div>
        </div>
@endsection