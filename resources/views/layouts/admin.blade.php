<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title') | Coaching CMS Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('admin_asset/vendors/simple-line-icons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_asset/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_asset/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('admin_asset/vendors/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_asset/vendors/chartist/chartist.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('admin_asset/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('admin_asset/images/favicon.png') }}" />
    @yield('custom_style')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex align-items-center">
          <a class="navbar-brand brand-logo" href="#">
            <img src="{{ asset('admin_asset/images/logo.svg')}}" alt="logo" class="logo-dark" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="#"><img src="{{ asset('admin_asset/images/logo-mini.svg')}}" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
          <h5 class="mb-0 font-weight-medium d-none d-lg-flex">Welcome Coaching CMS dashboard!</h5>
          <ul class="navbar-nav navbar-nav-right ml-auto">
            
            
            
            <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <img class="img-xs rounded-circle ml-2" src="{{ asset('admin_asset/images/faces/face8.jpg')}}" alt="Profile image"> <span class="font-weight-normal"> Master Admin </span></a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <img class="img-md rounded-circle" src="{{ asset('admin_asset/images/faces/face8.jpg')}}" alt="Profile image">
                  <p class="mb-1 mt-3">Master Admin</p>
                  {{-- <p class="font-weight-light text-muted mb-0">allenmoreno@gmail.com</p> --}}
                </div>
                <a class="dropdown-item" href="{{url('/admin/logout')}}"><i class="dropdown-item-icon icon-power text-primary"></i>Sign Out</a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="profile-image">
                  <img class="img-xs rounded-circle" src="{{ asset('admin_asset/images/faces/face8.jpg')}}" alt="profile image">
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                  <p class="profile-name">Master Admin</p>
                  <p class="designation">Administrator</p>
                </div>
                {{-- <div class="icon-container">
                  <i class="icon-bubbles"></i>
                  <div class="dot-indicator bg-danger"></div>
                </div> --}}
              </a>
            </li>
            <li class="nav-item nav-category">
              <span class="nav-link">Dashboard</span>
            </li>
            <li class="nav-item  @yield('dashboard')">
              <a class="nav-link" href="{{url('admin/dashboard')}}">
                <span class="menu-title">Dashboard</span>
                <i class="icon-screen-desktop menu-icon"></i>
              </a>
            </li>
            <li class="nav-item nav-category">
              <span class="nav-link">Student</span>
            </li>
            <li class="nav-item @yield('register_active')">
              <a class="nav-link" href="{{url('admin/register_student')}}">
                <span class="menu-title">Register Student</span>
                <i class="icon-user-follow menu-icon"></i>
              </a>
            </li>
            <li class="nav-item @yield('search_active')">
              <a class="nav-link" href="{{url('admin/student')}}">
                <span class="menu-title">Search Student</span>
                <i class="icon-user menu-icon"></i>
              </a>
            </li>
            {{-- fees --}}
            <li class="nav-item nav-category">
              <span class="nav-link">Fees</span>
            </li>
            <li class="nav-item @yield('pay_fee_active')">
              <a class="nav-link" href="{{url('admin/pay_fee')}}">
                <span class="menu-title">Pay Fee</span>
                <i class="fas fa-rupee-sign menu-icon"></i>
              </a>
            </li>
            <li class="nav-item @yield('fee_receipt_active')">
              <a class="nav-link" href="{{url('admin/fee_receipt')}}">
                <span class="menu-title">Fee Receipt</span>
                <i class="fas fa-file-invoice-dollar menu-icon"></i>
              </a>
            </li>

            <li class="nav-item nav-category">
              <span class="nav-link">Courses</span>
            </li>
            <li class="nav-item @yield('course_active')">
              <a class="nav-link" href="{{url('admin/add_course')}}">
                <span class="menu-title">Add Course</span>
                <i class="fas fa-graduation-cap menu-icon"></i>
              </a>
            </li>
            <li class="nav-item @yield('courses')">
              <a class="nav-link" href="{{url('admin/courses')}}">
                <span class="menu-title">Courses</span>
                <i class="fas fa-user-graduate menu-icon"></i>
              </a>
            </li>
            <li class="nav-item nav-category">
              <span class="nav-link">Certificate</span>
            </li>
            <li class="nav-item @yield('certificate_active')">
              <a class="nav-link" href="{{url('admin/certificate')}}">
                <span class="menu-title">Generate Certificate</span>
                <i class="fas fa-certificate menu-icon"></i>
              </a>
            </li>
            <li class="nav-item @yield('down_certificate_active')">
              <a class="nav-link" href="{{url('admin/view_certificate')}}">
                <span class="menu-title">Download Certificate</span>
                <i class="fas fa-file-download menu-icon"></i>
              </a>
            </li>
          
           
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            
           @yield('content')
            

          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © Rehan | 2021</span>
              
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('admin_asset/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('admin_asset/vendors/chart.js/Chart.min.js')}}"></script>
    <script src="{{ asset('admin_asset/vendors/moment/moment.min.js')}}"></script>
    <script src="{{ asset('admin_asset/vendors/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{ asset('admin_asset/vendors/chartist/chartist.min.js')}}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('admin_asset/js/off-canvas.js')}}"></script>
    <script src="{{ asset('admin_asset/js/misc.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('admin_asset/js/dashboard.js')}}"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- End custom js for this page -->
    @yield('custom_script')
  </body>
</html>