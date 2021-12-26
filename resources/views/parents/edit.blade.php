@extends('layouts.admin')

@section('css')
      {{-- custom style for form --}}
  <link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endsection

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
      <div class="contact-form row">
        <div class="form-field col-lg-6">
          <input id="name" type="text" class="input-text" value="{{ $parents->name }}" name="name">
          <label for="name" class="label">Name</label>
        </div>
        <div class="form-field col-lg-6">
          <input id="username" type="text" class="input-text" value="{{ $parents->username }}" name="username">
          <label for="username" class="label">User Name</label>
        </div>
        <div class="form-field col-lg-6">
          <input id="email" type="email" class="input-text" value="{{ $parents->email }}" name="email">
          <label for="email" class="label">Email</label>
        </div>
        <div class="form-field col-lg-6">
          <input id="phone" type="text" class="input-text" value="{{ $parents->phone }}" name="phone">
          <label for="phone" class="label">Phone</label>
        </div>
        <div class="form-field col-lg-6">
          <input id="password" type="password" class="input-text" value="{{ $parents->password }}" name="password">
          <label for="password" class="label">Password</label>
        </div>
        <div class="form-field col-lg-6">
          <input id="password" type="password" class="input-text" value="{{ $parents->password }}" name="cpassword">
          <label for="password" class="label">Confirm Password</label>
        </div>
        <div class="form-field col-lg-12">
          <input id="address" type="text" class="input-text" value="{{ $parents->address }}" name="address">
          <label for="address" class="label">Address</label>
        </div>
        <div class="form-field col-lg-6">
          <input type="file" name="profile_image" id="file">
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