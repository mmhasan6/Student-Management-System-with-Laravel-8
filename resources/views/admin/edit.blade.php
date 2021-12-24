@extends('layouts.admin')

@section('css')
      {{-- custom style for form --}}
  <link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endsection

@section('content')
<section class="add_data">
  <h1>Edit Admin User</h1>
  @if (session('status'))
      <h5 class="alert alert-success">{{ session('status') }}</h5>
  @endif
  <form action="{{ url('admin/update-admin/'.$adminUser->id) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('put')
    <div class="container">
      <div class="contact-form row">
        <div class="form-field col-lg-6">
          <input id="name" type="text" class="input-text" value="{{ $adminUser->name }}" name="name">
          <label for="name" class="label">Name
            <span class="text-danger">@error('name'){{ $message }}@enderror</span>
          </label>
        </div>
        <div class="form-field col-lg-6">
          <input id="username" type="text" class="input-text" value="{{ $adminUser->username }}" name="username">
          <label for="username" class="label">User Name
            <span class="text-danger">@error('username'){{ $message }}@enderror</span>
          </label>
        </div>
        <div class="form-field col-lg-6">
          <input id="email" type="email" class="input-text" value="{{ $adminUser->email }}" name="email">
          <label for="email" class="label">Email
            <span class="text-danger">@error('email'){{ $message }}@enderror</span>
          </label>
        </div>
        <div class="form-field col-lg-6">
          <input id="phone" type="text" class="input-text" value="{{ $adminUser->phone }}" name="phone">
          <label for="phone" class="label">Phone
            <span class="text-danger">@error('phone'){{ $message }}@enderror</span>
          </label>
        </div>
        <div class="form-field col-lg-6">
          <input id="password" type="password" class="input-text" name="password">
          <label for="password" class="label">Password
            <span class="text-danger">@error('password'){{ $message }}@enderror</span>
          </label>
        </div>
        <div class="form-field col-lg-6">
          <input id="password" type="password" class="input-text" name="cpassword">
          <label for="password" class="label">Confirm Password
            <span class="text-danger">@error('cpassword'){{ $message }}@enderror</span>
          </label>
        </div>
        <div class="form-field col-lg-12">
          <input id="address" type="text" class="input-text" value="{{ $adminUser->address }}" name="address">
          <label for="address" class="label">Address
            <span class="text-danger">@error('address'){{ $message }}@enderror</span>
          </label>
        </div>
        <div class="form-field col-lg-6">
          <input type="file" name="profile_image" id="file">
        </div>
        <div class="form-field col-lg-6">
            <button type="submit" class="submit-btn">Save Admin User</button>
        </div>
      </div>
    </div>
  </form>
</section>
{{-- End add admin form --}}
@endsection