@extends('layouts.admin')

@section('content')
<section class="add_data">
  <h1>Edit Parents</h1>
  @if (session('status'))
      <h5 class="alert alert-success">{{ session('status') }}</h5>
  @endif
  <form action="{{ url('admin/update-parents/'.$parents->id) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('put')
    <div class="container">
      <!-- /.card-header -->
      <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInput">First Name</label>
                    <input type="text" name="first_name" class="form-control" placeholder="Firns name" value="{{ $parents->first_name }}">
                    <span class="text-danger">@error('last_name'){{ $message }}@enderror</span></label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInput">Last Name</label>
                    <input type="text" name="last_name" class="form-control" placeholder="last name" value="{{ $parents->last_name }}">
                    <span class="text-danger">@error('last_name'){{ $message }}@enderror</span></label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInput">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $parents->email }}">
                     <span class="text-danger">@error('email'){{ $message }}@enderror</span></label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInput">Date of Birth</label>
                    <input type="date" name="date_of_birth" class="form-control" placeholder="Date of Birth" value="{{ $parents->date_of_birth }}">
                     <span class="text-danger">@error('date_of_birth'){{ $message }}@enderror</span></label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInput">Phone Number</label>
                    <input type="text" name="phone" class="form-control" placeholder="Phone Number" value="{{ $parents->phone }}">
                    <span class="text-danger">@error('phone'){{ $message }}@enderror</span></label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInput">Address</label>
                    <input type="address" name="address" class="form-control" placeholder="Address" value="{{ $parents->address }}">
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
                    <label ><input type="radio" name="gender" value="male" {{ 'male' == $parents->gender ? 'checked' : ''}}> Male</label>
                    <label ><input type="radio" name="gender" value="female" {{ 'female' == $parents->gender ? 'checked' : ''}}> Female</label>
                    <span class="text-danger">@error('gender'){{ $message }}@enderror</span></label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInput">Profile Picture</label>
                    <input type="file" name="profile_picture" id="" value="{{ $parents->profile_picture }}"> 
                    <span class="text-danger">@error('profile_picture'){{ $message }}@enderror</span></label>
                    <img src="{{ asset('uploads/parents/'.$parents->profile_picture) }}" width="30px" height="30px" alt="image">
                </div>
            </div>
        </div> 
    </div>
            {{-- End card body --}}
            <div class="card-footer">
                <button type="submit" class="btn btn-primary floar-right btn-sm">UPDATE</button>
            </div> 
    </div>
  </form>
</section>
{{-- End add admin form --}}
@endsection