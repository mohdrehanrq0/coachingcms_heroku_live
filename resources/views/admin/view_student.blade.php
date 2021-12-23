@extends('layouts.admin')
@section('title','View Student')
@section('search_active','cactive')

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
              <h4 class="card-title">View Students</h4><br>
            </div>
            <div class="col-md-6">
              <a href="{{url('admin/student')}}" class="btn btn-primary float-right">Back</a>
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
                <td>Name</td>
                <td>{{$data->name}}</td>
              </tr>
              <tr>
                <td>Image</td>
                @if($data->image != '')
                  <td><img src="{{$data->image}}" alt="{{$data->name}}" height="100"></td>
                @else
                  <td><img src="{{asset('admin_asset/no-image.png')}}" alt="img" height="100"></td>
                @endif
              </tr>
              <tr>
                <td>Father Name</td>
                <td>{{$data->father_name}}</td>
              </tr>
              <tr>
                <td>Mother Name</td>
                <td>{{$data->mother_name}}</td>
              </tr>
              <tr>
                <td>DOB</td>
                <td>{{$data->dob}}</td>
              </tr>
              <tr>
                <td>Gender</td>
                <td>{{$data->gender}}</td>
              </tr>
              <tr>
                <td>Current Address</td>
                <td>{{$data->current_address}}</td>
              </tr>
              <tr>
                <td>Permanent Address</td>
                <td>{{$data->permanent_address}}</td>
              </tr>
              <tr>
                <td>Mobile</td>
                <td>{{$data->mobile}}</td>
              </tr>
              <tr>
                <td>Alternate Mobile</td>
                <td>{{$data->alternative_mobile}}</td>
              </tr>
              <tr>
                <td>Email</td>
                <td>{{$data->email}}</td>
              </tr>
              <tr>
                <td>Tenth Marks</td>
                <td>{{$data->tenth}}%</td>
              </tr>
              <tr>
                <td>Twelve Marks</td>
                <td>{{$data->twelveth}}%</td>
              </tr>
              <tr>
                <td>Other Education</td>
                <td>{{$data->other}}</td>
              </tr>
              <tr>
                <td>Other Edu Percentage</td>
                <td>{{$data->percentage}}</td>
              </tr>
              <tr>
                <td>Course</td>
                <td>{{$data->course}}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection

