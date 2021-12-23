<!DOCTYPE html>
<html lang="en">
  <head>
    <title>MRQ University</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('front_asset/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('front_asset/css/animate.css')}}">
    
    <link rel="stylesheet" href="{{ asset('front_asset/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('front_asset/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{ asset('front_asset/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{ asset('front_asset/css/aos.css')}}">

    <link rel="stylesheet" href="{{ asset('front_asset/css/ionicons.min.css')}}">
    
    <link rel="stylesheet" href="{{ asset('front_asset/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{ asset('front_asset/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{ asset('front_asset/css/style.css')}}">

	<style>
		/* Start Gallery CSS */
		.thumb {
			margin-bottom: 15px;
		}
		.thumb:last-child {
			margin-bottom: 0;
		}
		/* CSS Image Hover Effects: https://www.nxworld.net/tips/css-image-hover-effects.html */
		.thumb 
		figure img {
		-webkit-filter: grayscale(100%);
		filter: grayscale(100%);
		-webkit-transition: .3s ease-in-out;
		transition: .3s ease-in-out;
		}
		.thumb 
		figure:hover img {
		-webkit-filter: grayscale(0);
		filter: grayscale(0);
		}

	</style>
  </head>
  <body>
	  <div class="bg-top navbar-light">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-center align-items-stretch">
    			<div class="col-md-4 d-flex align-items-center py-4">
    				<a class="navbar-brand" href="{{url('/')}}">MRQ. <span>University</span></a>
    			</div>
	    		<div class="col-lg-8 d-block">
		    		<div class="row d-flex">
					    <div class="col-md d-flex topper align-items-center align-items-stretch py-md-4">
					    	<div class="icon d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
					    	<div class="text">
					    		<span>Email</span>
						    	<span>mohdrehanrq0@gmail.com</span>
						    </div>
					    </div>
					    <div class="col-md d-flex topper align-items-center align-items-stretch py-md-4">
					    	<div class="icon d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <div class="text">
						    	<span>Call</span>
						    	<span>Call Us: +91 9926488445</span>
						    </div>
					    </div>
					    <div class="col-md topper d-flex align-items-center justify-content-end">
					    	<p class="mb-0">
					    		<a href="#" class="btn py-2 px-3 btn-primary d-flex align-items-center justify-content-center">
					    			<span>Contact Us</span>
					    		</a>
					    	</p>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
	  <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container d-flex align-items-center px-4">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <form action="#" class="searchform order-lg-last">
          <div class="form-group d-flex">
            <input type="text" class="form-control pl-3" placeholder="Search">
            <button type="submit" placeholder="" class="form-control search"><span class="ion-ios-search"></span></button>
          </div>
        </form>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav mr-auto">
	        	<li class="nav-item @yield('home_active')"><a href="{{url('/')}}" class="nav-link pl-0">Home</a></li>
	        	<li class="nav-item @yield('about_active')"><a href="{{url('/about')}}" class="nav-link">About</a></li>
	        	<li class="nav-item @yield('courses_active')"><a href="{{url('/courses')}}" class="nav-link">Courses</a></li>
	        	<li class="nav-item @yield('certificate_active')"><a href="{{url('/certificate_download')}}" class="nav-link">Certificate</a></li>
	        	<li class="nav-item @yield('gallery_active')"><a href="{{url('/gallery')}}" class="nav-link">Gallery</a></li>
	          <li class="nav-item @yield('contact_active')"><a href="{{url('/contact')}}" class="nav-link">Contact</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->


    @yield('content')


    

		<section class="ftco-gallery">
    	<div class="container-wrap">
    		<div class="row no-gutters">
					<div class="col-md-3 ftco-animate">
						<a href="images/image_1.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url({{ asset('front_asset/images/course-1.jpg')}});">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="images/image_2.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url({{ asset('front_asset/images/image_2.jpg')}});">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="images/image_3.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url({{ asset('front_asset/images/image_3.jpg')}});">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="images/image_4.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url({{ asset('front_asset/images/image_4.jpg')}});">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
        </div>
    	</div>
    </section>

		
    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-6 col-lg-4">
            <div class="ftco-footer-widget mb-5">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">Pithampur, Dist Dhar, Madhya Pradesh, India 454775</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+91 99264-88445</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">mohdrehanrq0@gmail.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
          
          <div class="col-md-6 col-lg-4">
            <div class="ftco-footer-widget mb-5 ml-md-4">
              <h2 class="ftco-heading-2">Links</h2>
              <ul class="list-unstyled">
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Home</a></li>
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>About</a></li>
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Course</a></li>
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Galery</a></li>
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Contact</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="ftco-footer-widget mb-5">
            	<h2 class="ftco-heading-2">Subscribe Us!</h2>
              <form action="#" class="subscribe-form">
                <div class="form-group">
                  <input type="text" class="form-control mb-2 text-center" placeholder="Enter email address">
                  <input type="submit" value="Subscribe" class="form-control submit px-3">
                </div>
              </form>
            </div>
            <div class="ftco-footer-widget mb-5">
            	<h2 class="ftco-heading-2 mb-0">Connect With Us</h2>
            	<ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p>
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved |</a>
  </p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <script src="{{ asset('front_asset/js/jquery.min.js')}}"></script>
  <script src="{{ asset('front_asset/js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{ asset('front_asset/js/popper.min.js')}}"></script>
  <script src="{{ asset('front_asset/js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('front_asset/js/jquery.easing.1.3.js')}}"></script>
  <script src="{{ asset('front_asset/js/jquery.waypoints.min.js')}}"></script>
  <script src="{{ asset('front_asset/js/jquery.stellar.min.js')}}"></script>
  <script src="{{ asset('front_asset/js/owl.carousel.min.js')}}"></script>
  <script src="{{ asset('front_asset/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{ asset('front_asset/js/aos.js')}}"></script>
  <script src="{{ asset('front_asset/js/jquery.animateNumber.min.js')}}"></script>
  <script src="{{ asset('front_asset/js/scrollax.min.js')}}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{ asset('front_asset/js/google-map.js')}}"></script>
  <script src="{{ asset('front_asset/js/main.js')}}"></script>
         <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>

 
    <script>
		$(document).ready(function() {
		$(".gallery").magnificPopup({
			delegate: "a",
			type: "image",
			tLoading: "Loading image #%curr%...",
			mainClass: "mfp-img-mobile",
			gallery: {
				enabled: true,
				navigateByImgClick: true,
				preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
			},
			image: {
				tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
			}
		});
	});

	</script>
  </body>
</html>



{{-- #21e6c1 --}}