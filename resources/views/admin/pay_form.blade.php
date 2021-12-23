@extends('layouts.admin')
@section('title','Pay Student Fee')
@section('pay_fee_course','active')


@section('content')

<div class="row" data-select2-id="11">
              
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Fee for : {{$stu_name}} and Roll No: 2020RQ{{ $roll_id }}</h4><br>
          {{-- <p class="card-description"> Horizontal form layout </p> --}}
          <form class="forms-sample" method="post" action="{{route('pay_fees_process')}}">
            @csrf
            <input type="hidden" name="student_id" value={{ $id }}> 
            <div class="form-group row">
              <label for="fee_type" class="col-sm-3 col-form-label">Select Fee type</label>
              <div class="col-sm-9">
                <select id="fee_type" name="fee_type" class="form-control" required>
                    <option value="">Select Fee type</option>
                    @if($reg_pay_fee <= $registration_fee)
                        @if($registration_fee == 0)
                            <option value="Registration_Fee" disabled>Registration Fees</option>
                        @else 
                            <option value="Registration_Fee">Registration Fees</option>
                        @endif
                    @else
                        <option value="Registration_Fee" disabled>Registration Fees</option>
                    @endif
                    @if($exam_pay_fee <= $exam_fee)
                        @if($exam_fee == 0)
                            <option value="Exam_Fee" disabled>Exam Fee</option>
                        @else
                            <option value="Exam_Fee">Exam Fee</option>
                        @endif
                    @else
                        <option value="Exam_Fee" disabled>Exam Fee</option>
                    @endif
                    @if($course_pay_fee <= $course_fee)
                        <option value="Course_Fee">Course Fee</option>
                    @else
                        <option value="Course_Fee" disabled>Course Fee</option>
                    @endif
                    
                </select>
                @error('fee_type')
                  <div class="field_error">{{$message}}</div>
                @enderror
              </div>
            </div>
            <div class="form-group row">
                <label for="fee_amt" class="col-sm-3 col-form-label">Fee Amount</label>
            <div class="col-sm-9">
                <input type="number" class="form-control" id="fee_amt" name="fee_amt" placeholder="Enter amount in ruppees" required>
                @error('fee_amt')
                  <div class="field_error">{{$message}}</div>
                @enderror
            </div>
            </div>
                                      
            <button type="submit" class="btn btn-primary w-100 my-auto">Pay</button>
            
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection