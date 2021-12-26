@extends('\layouts.admin')

@section('css')
  {{-- custom style for form --}}
  <link rel="stylesheet" href="{{ asset('css/form.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">

@endsection

@section('content')
@if (session('success'))
  <h2 class="alert alert-success" >{{ session('success') }}</h2>
@endif
@if (session('error'))
  <h2 class="alert alert-success" >{{ session('error') }}</h2>
@endif
        <div class="card card-primary card-outline">
          <div class="card-body">
            <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="custom-content-below-admin-tab" data-toggle="pill" href="#custom-content-below-admin" role="tab" aria-controls="custom-content-below-admin" aria-selected="true">Admins</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-below-profile-teacher" data-toggle="pill" href="#custom-content-below-teacher" role="tab" aria-controls="custom-content-below-teacher" aria-selected="false">TEACHERS</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-below-messages-tab" data-toggle="pill" href="#custom-content-below-messages" role="tab" aria-controls="custom-content-below-messages" aria-selected="false">STUDENTS</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-below-settings-tab" data-toggle="pill" href="#custom-content-below-settings" role="tab" aria-controls="custom-content-below-settings" aria-selected="false">PARENTS</a>
              </li>
            </ul>
            <div class="tab-content" id="custom-content-below-tabContent">
            {{-- Admin section --}}
              <div class="tab-pane fade show active" id="custom-content-below-admin" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
                <ul class="nav nav-tabs" style="color:blue" id="custom-content-below-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Admins</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-content-below-profile-add-new-admin" data-toggle="pill" href="#custom-content-below-add-new-admin" role="tab" aria-controls="custom-content-below-add-new-admin" aria-selected="false">New</a>
                  </li>
                </ul>
                <div class="tab-content" id="custom-content-below-tabContent-admin">
                  {{-- Show admin data --}}
                  <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
                    orem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas sollicitudin, nisi a luctus interdum, nisl ligula placerat mi, quis posuere purus ligula eu lectus.
                    {{-- End Show admin data --}}
                  </div>
                  <div class="tab-pane fade" id="custom-content-below-add-new-admin" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
                    {{-- add admin form --}}
                      @if (session('success'))
                        <h2 class="alert alert-success" >{{ session('success') }}</h2>
                      @endif
                      <section class="add_data">
                        <h1>Add new admin</h1>
                        <form action="{{ route('admin.addNewAdmin') }}" method="post" enctype="multipart/form-data">
                                @csrf
                          <div class="container">
                            <div class="contact-form row">
                              <div class="form-field col-lg-6">
                                <input id="name" type="text" class="input-text" name="">
                                <label for="name" class="label">Name</label>
                              </div>
                              <div class="form-field col-lg-6">
                                <input id="username" type="text" class="input-text" name="">
                                <label for="username" class="label">User Name</label>
                              </div>
                              <div class="form-field col-lg-6">
                                <input id="email" type="email" class="input-text" name="">
                                <label for="email" class="label">Email</label>
                              </div>
                              <div class="form-field col-lg-6">
                                <input id="phone" type="text" class="input-text" name="">
                                <label for="phone" class="label">Phone</label>
                              </div>
                              <div class="form-field col-lg-6">
                                <input id="password" type="password" class="input-text" name="">
                                <label for="password" class="label">Password</label>
                              </div>
                              <div class="form-field col-lg-6">
                                <input id="password" type="password" class="input-text" name="">
                                <label for="password" class="label">Confirm Password</label>
                              </div>
                              <div class="form-field col-lg-6">
                                <input type="file" name="profile_image" id="file">
                                <div class="image">
                                  <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                                </div>
                              </div>
                              <div class="form-field col-lg-6">
                                <input class="submit-btn" type="submit" value="Submit" name="">
                              </div>

                            </div>
                          </div>
                        </form>
                      </section>
                    {{-- End add admin form --}}
                  </div>
                </div>
                {{-- End Admin section --}}
              </div>
              <div class="tab-pane fade" id="custom-content-below-teacher" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
                 Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris pharetra purus ut ligula tempor, et vulputate metus facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas sollicitudin, nisi a luctus interdum, nisl ligula placerat mi, quis posuere purus ligula eu lectus. Donec nunc tellus, elementum sit amet ultricies at, posuere nec nunc. Nunc euismod pellentesque diam.
              </div>
              <div class="tab-pane fade" id="custom-content-below-messages" role="tabpanel" aria-labelledby="custom-content-below-messages-tab">
                 Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare magna.
              </div>
              <div class="tab-pane fade" id="custom-content-below-settings" role="tabpanel" aria-labelledby="custom-content-below-settings-tab">
                 Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
              </div>
            </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.card -->
      </div>
      @endsection

@section('js')
  <!-- jQuery UI 1.11.4 -->
  <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- ChartJS -->
  <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
  <!-- Sparkline -->
  <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
  <!-- JQVMap -->
  <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
  <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
  <!-- jQuery Knob Chart -->
  <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
  <!-- daterangepicker -->
  <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
  <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
  <!-- Summernote -->
  <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
  <!-- overlayScrollbars -->
  <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
@endsection