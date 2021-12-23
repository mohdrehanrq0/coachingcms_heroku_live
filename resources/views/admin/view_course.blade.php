@extends('layouts.admin')
@section('title','View Course')
@section('courses','cactive')

@section('content')
<div class="row">
  @if(session()->has('msg'))
    <div class="alert alert-success alert-dismissible fade show w-100" role="alert">
      <strong>Success !</strong> {{session()->get('msg')}}.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif
              
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <h4 class="card-title">View Course</h4><br>
            </div>
            <div class="col-md-6">
              <a href="{{url('admin/courses')}}" class="btn btn-primary float-right">Back</a>
            </div>
          </div>
          {{-- <p class="card-description"> Add class <code>.table-hover</code>
          </p> --}}
          <table class="table table-hover" id="searchStudent">
            <thead>
              <tr class="bg-dark text-white">
                <th>Name</th>
                <th>Details</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>ID</td>
                <td>{{$data->id}}</td>
              </tr>
              <tr>
                <td>Course Name</td>
                <td>{{$data->course_name}}</td>
              </tr>
              <tr>
                <td>Course Length</td>
                <td>{{$data->course_length}}</td>
              </tr>
              <tr>
                <td>Course Price</td>
                <td>{{$data->course_price}}</td>
              </tr>
              <tr>
                <td>Course Details</td>
                <td>{{$data->course_detail}}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection

