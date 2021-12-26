@extends('layouts.admin')

@section('css')
      {{-- custom style for form --}}
  <link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endsection

@section('content')
<section class="add_data">
  <h1>Add Admin Users</h1>
  @if (session('status'))
      <h5 class="alert alert-success">{{ session('status') }}</h5>
  @endif
  <form action="{{ route('admin.add-new-student') }}" method="post" enctype="multipart/form-data">
          @csrf
    <div class="container">
      <div class="contact-form row">
        <div class="form-field col-lg-6">
          <input id="firstname" type="text" class="input-text" name="firstname" value="{{ old('firstname') }}">
          <label for="firstname" class="label">First Name    
            <span class="text-danger">@error('firstname'){{ $message }}@enderror</span></label>
        </div>
        <div class="form-field col-lg-6">
          <input id="lastname" type="text" class="input-text" name="lastname" value="{{ old('lastname') }}">
          <label for="lastname" class="label">Last Name    
            <span class="text-danger">@error('lastname'){{ $message }}@enderror</span></label>
        </div>
        <div class="form-field col-lg-6">
          <input id="roll_id" type="text" class="input-text" name="roll_id" value="{{ old('roll_id') }}">
          <label for="roll_id" class="label">Student Id  
            <span class="text-danger">@error('roll_id'){{ $message }}@enderror</span></label>
        </div>
        <div class="form-field col-lg-6">
          <input id="email" type="email" class="input-text" name="email" value="{{ old('email') }}">
          <label for="email" class="label">Email    
            <span class="text-danger">@error('email'){{ $message }}@enderror</span></label>
        </div>
        <div class="form-field col-lg-6">
          <input id="phone" type="text" class="input-text" name="phone" value="{{ old('phone') }}">
          <label for="phone" class="label">Phone    
            <span class="text-danger">@error('phone'){{ $message }}@enderror</span></label>
        </div>
        <div class="form-field col-lg-6">
            <label class="" for="exampleInput" style="color: #5543ca; margin-right:10%; ">Gender</label>
            <label style="color: #5543ca;" ><input type="radio" name="gender" value="male"> Male</label>
            <label style="color: #5543ca;"><input type="radio" name="gender" value="female"> Female</label>
        </div>
        <div class="form-field col-lg-6">
          <input id="date_of_birth" type="date" class="input-text" name="date_of_birth">
          <label for="date_of_birth" class="label">Date of Bith    
          <span class="text-danger">@error('password'){{ $message }}@enderror</span></label>
        </div>
        <div class="form-field col-lg-6">
            <select id="inputStatus" class="form-control custom-select">
              <option selected disabled>Select one</option>
              <option>Math</option>
              <option>English</option>
              <option>Bangla</option>
            </select>
            <label for="date_of_birth" class="label">Select a Subject</label>
        </div>
        <div class="form-field col-lg-6">
          <input id="password" type="password" class="input-text" name="cpassword">
          <label for="password" class="label">Confirm Password
            <span class="text-danger">@error('cpassword'){{ $message }}@enderror</span>
          </label>
        </div>
        <div class="form-field col-lg-12">
          <input id="address" type="text" class="input-text" name="address" value="{{ old('address') }}">
          <label for="address" class="label">Address
            <span class="text-danger">@error('address'){{ $message }}@enderror</span>
          </label>
        </div>
        <div class="form-field col-lg-6">
          <input type="file" name="profile_image" id="file"  >
        </div>
        <div class="form-field col-lg-6">
            <button type="submit" class="submit-btn">Save Parents</button>
        </div>
      </div>
    </div>
  </form>
</section>
{{-- End add admin form --}}
@endsection