@extends('layouts.admin')
@section('title', 'Register Students')
@section('register_active', 'cactive')

@section('content')
    <div class="row" data-select2-id="11">

        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Register Student</h4><br>
                    {{-- <p class="card-description"> Horizontal form layout </p> --}}
                    <form class="forms-sample" method="post" action="{{ route('student_register') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value={{ $id }}>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter Stuents Name" value="{{ $name }}">
                                @error('name')
                                    <div class="field_error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="father_name" class="col-sm-3 col-form-label">Father Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="father_name" name="father_name"
                                    placeholder="Enter Stuents Father Name" value="{{ $father_name }}">
                                @error('father_name')
                                    <div class="field_error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mother_name" class="col-sm-3 col-form-label">Mother Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="mother_name" name="mother_name"
                                    placeholder="Enter Stuents Mother Name" value="{{ $mother_name }}">
                                @error('mother_name')
                                    <div class="field_error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter Stuents Email Address" value="{{ $email }}">
                                @error('email')
                                    <div class="field_error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image" class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="image" class="form-control-file" id="image">
                                @if ($image != '')
                                    <img src="{{ $image }}" alt="img" height="100px" />
                                @endif
                                @error('image')
                                    <div class="field_error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 row">
                                <label for="dob" class="col-sm-3 col-form-label">DOB</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="dob" name="dob" placeholder="dd/mm/yyyy"
                                        value="{{ $dob }}">
                                    @error('dob')
                                        <div class="field_error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            @php
                                $malecheck = '';
                                $femalecheck = '';
                                $othercheck = '';
                                if ($gender == 'male') {
                                    $malecheck = 'checked';
                                } elseif ($gender == 'female') {
                                    $femalecheck = 'checked';
                                } elseif ($gender == 'other') {
                                    $othercheck = 'checked';
                                }
                            @endphp
                            <div class="col-md-6 row">
                                <label for="gender" class="col-sm-3 col-form-label">Gender</label>
                                <div class="col-sm-9 d-flex">
                                    <div class="form-check mx-2">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="gender" id="gender"
                                                value="male" {{ $malecheck }}> Male <i
                                                class="input-helper"></i></label>
                                    </div>
                                    <div class="form-check mx-2">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="gender" id="gender"
                                                value="female" {{ $femalecheck }}> Female <i
                                                class="input-helper"></i></label>
                                    </div>
                                    <div class="form-check mx-2">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="gender" id="gender"
                                                value="other" {{ $othercheck }}> Other <i
                                                class="input-helper"></i></label>
                                    </div>
                                </div>
                                <div class="offset-md-3">
                                    @error('gender')
                                        <div class="field_error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 row">
                                <label for="mobile" class="col-sm-3 col-form-label">Mobile</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="mobile" name="mobile"
                                        placeholder="Enter Student Mobile" value="{{ $mobile }}">
                                    @error('mobile')
                                        <div class="field_error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 row">
                                <label for="alt_mobile" class="col-sm-3 col-form-label">Alternate No.</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="alt_mobile" name="alt_mobile"
                                        placeholder="Enter Alternate Student Mobile" value="{{ $alt_mobile }}">
                                    @error('alt_mobile')
                                        <div class="field_error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="c" class="col-sm-3 col-form-label">Current Address</label>
                            <div class="col-sm-9">
                                <textarea name="caddress" id="caddress" rows="5"
                                    class="form-control">{{ $caddress }}</textarea>
                                @error('caddress')
                                    <div class="field_error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="paddress" class="col-sm-3 col-form-label">Permanent Address</label>
                            <div class="col-sm-9">
                                <textarea name="paddress" id="paddress" rows="5"
                                    class="form-control">{{ $paddress }}</textarea>
                                @error('paddress')
                                    <div class="field_error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 row ">
                                <label for="tenth" class="col-sm-3 col-form-label">10'th</label>
                                <div class="col-sm-9 input-group" style="height:min-content;">
                                    <input type="number" class="form-control" id="tenth" name="tenth"
                                        placeholder="Enter Student 10'th percentage" value="{{ $tenth }}">
                                    <div class="input-group-append">
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>
                                <div class="offset-md-3">
                                    @error('tenth')
                                        <div class="field_error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 row ">
                                <label for="twelveth" class="col-sm-3 col-form-label">12'th</label>
                                <div class="col-sm-9 input-group" style="height:min-content;">
                                    <input type="number" class="form-control" id="twelveth" name="twelveth"
                                        placeholder="Enter Student 12'th percentage" value={{ $twelveth }}>
                                    <div class="input-group-append">
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>
                                <div class="offset-md-3">
                                    @error('twelveth')
                                        <div class="field_error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 row ">
                                <label for="othered" class="col-sm-3 col-form-label">Other Education</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="othered" name="othered"
                                        placeholder="Enter Student other Education" value="{{ $othered }}">
                                    @error('othered')
                                        <div class="field_error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 row ">
                                <label for="otherper" class="col-sm-3 col-form-label">Percentage</label>
                                <div class="col-sm-9 input-group" style="height:min-content;">
                                    <input type="number" class="form-control" id="otherper" name="otherper"
                                        placeholder="Enter Student Education Percentage" value="{{ $other_per }}">
                                    <div class="input-group-append">
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>
                                <div class="offset-md-3">
                                    @error('otherper')
                                        <div class="field_error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="form-group row">
                          <div class="col-md-6 row ">
                              <label for="registration_fee" class="col-sm-3 col-form-label">Registration Fee</label>
                              <div class="col-sm-9 input-group" style="height:min-content;">
                                  <input type="number" class="form-control" id="registration_fee" name="registration_fee"
                                      placeholder="Enter Student 10'th percentage" value="{{ $registration_fee }}">
                                  <div class="input-group-append">
                                      <span class="input-group-text">₹</span>
                                  </div>
                              </div>
                              <div class="offset-md-3">
                                  @error('registration_fee')
                                      <div class="field_error">{{ $message }}</div>
                                  @enderror
                              </div>
                          </div>
                          <div class="col-md-6 row ">
                              <label for="exam_fee" class="col-sm-3 col-form-label">Exam Fee</label>
                              <div class="col-sm-9 input-group" style="height:min-content;">
                                  <input type="number" class="form-control" id="exam_fee" name="exam_fee"
                                      placeholder="Enter Student 12'th percentage" value={{ $exam_fee }}>
                                  <div class="input-group-append">
                                      <span class="input-group-text">₹</span>
                                  </div>
                              </div>
                              <div class="offset-md-3">
                                  @error('exam_fee')
                                      <div class="field_error">{{ $message }}</div>
                                  @enderror
                              </div>
                          </div>
                      </div>
                      <div class="form-group row">
                        <label for="course" class="col-sm-3 col-form-label">Course</label>
                        <div class="col-sm-9">
                            <select id="course" name="course" class="form-control">
                                <option value="">Select Course</option>
                                @foreach($course as $list)
                                    @if($list->id == $course_id)
                                        <option value="{{ $list->id}}" selected>{{$list->course_name}}</option>
                                    @else
                                        <option value="{{ $list->id}}">{{$list->course_name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('course')
                                <div class="field_error">{{ $message }}</div>
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

@section('custom_script')
    <script type="text/javascript">

    </script>
@endsection
