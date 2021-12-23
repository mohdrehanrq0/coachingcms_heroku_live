@extends('layouts.front')
@section('certificate_active','active');


@section('content')

<section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('front_asset/images/bg_1.jpg')}}');">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
          <h1 class="mb-2 bread">Certificate</h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="{{url('/')}}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Certificate <i class="ion-ios-arrow-forward"></i></span></p>
        </div>
      </div>
    </div>
  </section>
  <br />

  <div class="container">
    @if (session()->has('error'))
      <div class="alert alert-danger alert-dismissible fade show w-100" role="alert">
          <strong>Error !</strong> {{ session()->get('error') }}.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
  @endif
  <br />
      <h1>Enter the detail to get the Certificate.</h1><br /><br />
    <form id="certificate_frm">
        @csrf
      <div class="row flex">
            <div class="col-lg-3 col-md-4 col-xs-6">
                <div class="form-group">
                    <p>Enter your Roll No</p>
                    <div class="d-flex">
                      <span class="form-control d-flex justify-content-center align-items-center" >2020RQ</span>
                      <div>
                        <input type="text" class="form-control" id="roll_no" name="roll_no" placeholder="Roll Number" autocomplete="off" >
                      </div>
                    </div>
                    <label id="roll_no-error" class="error" for="roll_no"></label>
                    <label class="error roll_no_error"></label>
                  </div>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6">
                <div class="form-group">
                    <p>Enter your DOB</p>
                    <input type="date" class="form-control" id="dob" name="dob" style="width:auto;" >
                    <label id="dob-error" class="error" for="dob"></label>
                    <label class="error dob_error"></label>

                  </div>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6">
                <div class="form-group">
                    <p>&nbsp;</p>
                    <input type="submit" id="search_btn" class="btn btn-primary py-3 px-5" value="Search">
                  </div>
            </div>
            <label class="error main_error px-4 h5"></label>

      </div>
    </form>
    <br />

    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Mobile</th>
            <th scope="col">Download</th>
          </tr>
        </thead>
        <tbody>
          <tr id="certificate_detail_show">
            <td colspan="3" class="text-center">No Details found.</td>
          </tr>
        </tbody>
      </table>


  </div>

@endsection