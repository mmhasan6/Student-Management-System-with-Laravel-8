@extends('layouts.admin')

@section('css')
      {{-- custom style for form --}}
  <link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endsection
{{-- @section('content')
   
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Parendt with Image
                        <a href="{{ url('admin/add-parents') }}" class="btn btn-danger float-right">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                           <div class="form-control mb-3">
                               <label for="">Parents Name</label>
                                <input type="text" name="name" class="form-control">
                           </div>
                           <div class="form-control mb-3">
                               <label for="">Parents Email</label>
                                <input type="email" name="email" class="form-control">
                           </div>
                           <div class="form-control mb-3">
                               <label for="">Parents Name</label>
                                <input type="file" name="profile_image" class="form-control">
                           </div>
                           <div class="form-control mb--3">
                               <button type="submit" class="btn btn-primary">Save Parents</button>
                           </div>
                        </form>
                    </div>
                </div>
            </div>
        
    </div>
@endsection --}}
@section('content')
<section class="add_data">
  <h1>Add Parents</h1>
  @if (session('status'))
      <h5 class="alert alert-success">{{ session('status') }}</h5>
  @endif
  <form action="{{ route('admin.add-parents') }}" method="post" enctype="multipart/form-data">
          @csrf
    <div class="container">
      <div class="contact-form row">
        <div class="form-field col-lg-6">
          <input id="name" type="text" class="input-text" name="name">
          <label for="name" class="label">Name</label>
        </div>
        <div class="form-field col-lg-6">
          <input id="username" type="text" class="input-text" name="username">
          <label for="username" class="label">User Name</label>
        </div>
        <div class="form-field col-lg-6">
          <input id="email" type="email" class="input-text" name="email">
          <label for="email" class="label">Email</label>
        </div>
        <div class="form-field col-lg-6">
          <input id="phone" type="text" class="input-text" name="phone">
          <label for="phone" class="label">Phone</label>
        </div>
        <div class="form-field col-lg-6">
          <input id="password" type="password" class="input-text" name="password">
          <label for="password" class="label">Password</label>
        </div>
        <div class="form-field col-lg-6">
          <input id="password" type="password" class="input-text" name="cpassword">
          <label for="password" class="label">Confirm Password</label>
        </div>
        <div class="form-field col-lg-12">
          <input id="address" type="text" class="input-text" name="address">
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