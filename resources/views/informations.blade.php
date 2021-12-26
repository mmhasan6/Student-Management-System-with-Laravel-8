@extends('layouts.admin')

@section('content')
        <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Contacts</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Contacts</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
<!-- Students Default box -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Students</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              @foreach ($studentinfo as $key=>$data)
              <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                <div class="card bg-light d-flex flex-fill">
                  <div class="card-header text-muted border-bottom-0">
                    Digital Strategist
                  </div>
                  <div class="card-body pt-0">
                    <div class="row">
                      <div class="col-7">
                        <h2 class="lead"><b>{{ $data->first_name }} {{ $data->last_name }}</b></h2>
                        <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                        <ul class="ml-4 mb-0 fa-ul text-muted">
                          <li class="small"><span class="fa-li"><i class="fas fa-envelope"></i></span> Address: {{ $data->email }}</li>
                          <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: {{ $data->address }}</li>
                          <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 88{{ $data->phone }}</li>
                        </ul>
                      </div>
                      <div class="col-5 text-center">
                        <img src="{{ asset('uploads/students/'.$data->profile_picture) }}" width="110px" height="110px" alt="image" class="img-circle img-fluid">
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                  </div>              
                </div>
              </div>
              @endforeach
            </div>
            <!-- /.row -->
          </div>
        </div>
        <!-- /.card-body -->
{{-- Admin --}}
      <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Admin</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              @foreach ($admininfo as $key=>$data)
              <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                <div class="card bg-light d-flex flex-fill">
                  <div class="card-header text-muted border-bottom-0">
                    Digital Strategist
                  </div>
                  <div class="card-body pt-0">
                    <div class="row">
                      <div class="col-7">
                        <h2 class="lead"><b>{{ $data->name }}</b></h2>
                        <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                        <ul class="ml-4 mb-0 fa-ul text-muted">
                          <li class="small"><span class="fa-li"><i class="fas fa-envelope"></i></span> Address: {{ $data->email }}</li>
                          <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: {{ $data->address }}</li>
                          <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 88{{ $data->phone }}</li>
                        </ul>
                      </div>
                      <div class="col-5 text-center">
                        <img src="{{ asset('uploads/admins/'.$data->profile_image) }}" width="110px" height="110px" alt="image" class="img-circle img-fluid">
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                  </div>              
                </div>
              </div>
              @endforeach
            </div>
            <!-- /.row -->
          </div>
        </div>
        <!-- /.card-body -->
<!-- Teacher Default box -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Teachers</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              @foreach ($teacherinfo as $key=>$data)
              <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                <div class="card bg-light d-flex flex-fill">
                  <div class="card-header text-muted border-bottom-0">
                    Digital Strategist
                  </div>
                  <div class="card-body pt-0">
                    <div class="row">
                      <div class="col-7">
                        <h2 class="lead"><b>{{ $data->first_name }} {{ $data->last_name }}</b></h2>
                        <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                        <ul class="ml-4 mb-0 fa-ul text-muted">
                          <li class="small"><span class="fa-li"><i class="fas fa-envelope"></i></span> Address: {{ $data->email }}</li>
                          <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: {{ $data->address }}</li>
                          <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 88{{ $data->phone }}</li>
                        </ul>
                      </div>
                      <div class="col-5 text-center">
                        <img src="{{ asset('uploads/teachers/'.$data->profile_picture) }}" width="110px" height="110px" alt="image" class="img-circle img-fluid">
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                  </div>              
                </div>
              </div>
              @endforeach
            </div>
            <!-- /.row -->
          </div>
        </div>
        <!-- /.card-body -->
{{-- Parents --}}
      <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Parents</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              @foreach ($parentsinfo as $key=>$data)
              <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                <div class="card bg-light d-flex flex-fill">
                  <div class="card-header text-muted border-bottom-0">
                    Digital Strategist
                  </div>
                  <div class="card-body pt-0">
                    <div class="row">
                      <div class="col-7">
                        <h2 class="lead"><b>{{ $data->name }}</b></h2>
                        <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                        <ul class="ml-4 mb-0 fa-ul text-muted">
                          <li class="small"><span class="fa-li"><i class="fas fa-envelope"></i></span> Address: {{ $data->email }}</li>
                          <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: {{ $data->address }}</li>
                          <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 88{{ $data->phone }}</li>
                        </ul>
                      </div>
                      <div class="col-5 text-center">
                        <img src="{{ asset('uploads/parents/'.$data->profile_image) }}" width="110px" height="110px" alt="image" class="img-circle img-fluid">
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                  </div>              
                </div>
              </div>
              @endforeach
            </div>
            <!-- /.row -->
          </div>
        </div>
        <!-- /.card-body -->


      

    </section>
    <!-- /.content -->
@endsection