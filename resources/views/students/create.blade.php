@extends('layouts.admin')

@section('content')
  <!-- Main content -->
<section class="content">
    <div class="container-fluid">
    <div class="card card-default">
       <form action="{{ route('admin.add-new-teachers') }}" method="post" enctype="multipart/form-data">
        @csrf
           <div class="card-header">
        <h1 class="card-title">Register New teacher</h1>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
            </button>
            {{-- <button type="button" class="btn btn-tool" data-card-widget="remove">
            <i class="fas fa-times"></i>
            </button> --}}
        </div>
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
                        <label for="exampleInput">Teacher Id</label>
                        <input type="text" name="roll_id" class="form-control"  placeholder="Student id" value="{{ old('roll_id') }}">
                        <span class="text-danger">@error('roll_id'){{ $message }}@enderror</span></label>
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
                        <label class="" for="exampleInput" style="margin-right:10%; ">Gender</label>
                        <label ><input type="radio" name="gender" value="male"> Male</label>
                        <label ><input type="radio" name="gender" value="female"> Female</label>
                        <span class="text-danger">@error('gender'){{ $message }}@enderror</span></label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInput">Profile Picture</label>
                        <input type="file" name="profile_picture" id="" value="{{ old('profile_picture') }}">
                    </div>
                </div>

            </div> 
        </div>
        {{-- End card body --}}
        <div class="card-footer">
            <button type="submit" class="btn btn-primary floar-right">SAVE Teacher</button>
        </div> 
    </form> 
    </div>          
</section>
<!--End Main content -->
@endsection