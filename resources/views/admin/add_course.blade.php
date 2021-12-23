@extends('layouts.admin')
@section('title','Add Course')
@section('add_course','active')


@section('content')

<div class="row" data-select2-id="11">
              
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Add Course</h4><br>
          {{-- <p class="card-description"> Horizontal form layout </p> --}}
          <form class="forms-sample" method="post" action="{{route('add_course')}}">
            @csrf
            <input type="hidden" name="id" value={{$id}}> 
            <div class="form-group row">
              <label for="course_name" class="col-sm-3 col-form-label">Course Name</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="course_name" name="course_name" placeholder="Enter Course Name" value="{{$course_name}}">
                @error('course_name')
                  <div class="field_error">{{$message}}</div>
                @enderror
              </div>
            </div>
            <div class="form-group row">
                <label for="course_length" class="col-sm-3 col-form-label">Course Length (Month)</label>
            <div class="col-sm-9">
                <input type="number" class="form-control" id="course_length" name="course_length" placeholder="Enter Stuents Father Name" value="{{$course_length}}">
                @error('course_length')
                  <div class="field_error">{{$message}}</div>
                @enderror
            </div>
            </div>
            <div class="form-group row">
                <label for="course_price" class="col-sm-3 col-form-label">Course Price</label>
            <div class="col-sm-9">
                <input type="number" class="form-control" id="course_price" name="course_price" placeholder="Enter Stuents Mother Name" value="{{$course_price}}">
                @error('course_price')
                  <div class="field_error">{{$message}}</div>
                @enderror
            </div>
            </div>
            <div class="form-group row">
              <label for="course_detail" class="col-sm-3 col-form-label">Course Details</label>
              <div class="col-sm-9">
                <textarea name="course_detail" id="course_detail" rows="5" class="form-control">{{$course_detail}}</textarea>
                @error('course_detail')
                  <div class="field_error">{{$message}}</div>
                @enderror
              </div>
            </div>
                          
            <button type="submit" class="btn btn-primary w-100 my-auto">Submit</button>
            
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection