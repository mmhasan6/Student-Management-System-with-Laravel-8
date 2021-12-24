@extends('layouts.admin')

@section('content')
  <!-- Main content -->
<section class="content">
    <div class="container-fluid">
    <div class="card card-default">
       <form action="{{ url('admin/update_course/'.$courses->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
           <div class="card-header">
        <h1 class="card-title">UPDATE THE COURSE</h1>
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
              <div class="form-group">
                  <label>Short Name</label>
                  <input type="text" class="form-control" placeholder="Short Name " name="course_short_name" id="course_short_name" value="{{ $courses->course_short_name }}">
                    <span class="text-danger">@error('course_short_name'){{ $message }}@enderror</span>    
              </div>
              <div class="form-group"> 
                  <label>Course Full Name</label>
                  <input type="textarea" name="course_full_name" cols="20" rows="5" class="form-control" id="course_full_name" placeholder="Course Full Name" value="{{ $courses->course_full_name }}" >
                  <span class="text-danger">@error('course_full_name'){{ $message }}@enderror</span>
              </div>
              {{-- <div class="form-group">
                  <label>Created At</label>
                  <input name="created_at" cols="20" rows="5" class="form-control" placeholder="Created At" disabled>
              </div>  --}}
            </div>
        {{-- End card body --}}
        <div class="card-footer">
            <button type="submit" class="btn btn-primary floar-right">UPDATE COURSE</button>
        </div> 
    </form> 
    </div>          
</section>
<!--End Main content -->
@endsection