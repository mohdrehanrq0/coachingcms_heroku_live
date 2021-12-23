@extends('layouts.front')
@section('gallery_active','active');


@section('content')

<section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('front_asset/images/bg_1.jpg')}}');">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
          <h1 class="mb-2 bread">Gallery</h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="{{url('/')}}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Gallery <i class="ion-ios-arrow-forward"></i></span></p>
        </div>
      </div>
    </div>
  </section>
  <br />
  <br />

<section class="container">
	{{-- <h1 class="my-4 text-center text-lg-left">Image Gallery</h1> --}}
	<div class="row gallery" style="display: flex; margin-bottom:1rem;height:auto;">
		<div class="col-lg-3 col-md-4 col-xs-6 thumb">
			<a href="https://picsum.photos/940/650?random=1">
				<figure><img class="img-fluid img-thumbnail" src="https://picsum.photos/940/650?random=1" alt="Random Image"></figure>
			</a>
		</div>

		<div class="col-lg-3 col-md-4 col-xs-6 thumb">
			<a href="https://picsum.photos/940/650?random=2">
				<figure><img class="img-fluid img-thumbnail" src="https://picsum.photos/940/650?random=2" alt="Random Image"></figure>
			</a>
		</div>

		<div class="col-lg-3 col-md-4 col-xs-6 thumb">
			<a href="https://picsum.photos/940/650?random=3">
				<figure><img class="img-fluid img-thumbnail" src="https://picsum.photos/940/650?random=3" alt="Random Image"></figure>
			</a>
		</div>

		<div class="col-lg-3 col-md-4 col-xs-6 thumb">
			<a href="https://picsum.photos/940/650?random=4">
				<figure><img class="img-fluid img-thumbnail" src="https://picsum.photos/940/650?random=4" alt="Random Image"></figure>
			</a>
		</div>

		<div class="col-lg-3 col-md-4 col-xs-6 thumb">
			<a href="https://picsum.photos/940/650?random=5">
				<figure><img class="img-fluid img-thumbnail" src="https://picsum.photos/940/650?random=5" alt="Random Image"></figure>
			</a>
		</div>

		<div class="col-lg-3 col-md-4 col-xs-6 thumb">
			<a href="https://picsum.photos/940/650?random=6">
				<figure><img class="img-fluid img-thumbnail" src="https://picsum.photos/940/650?random=6" alt="Random Image"></figure>
			</a>
		</div>

		<div class="col-lg-3 col-md-4 col-xs-6 thumb">
			<a href="https://picsum.photos/940/650?random=6">
				<figure><img class="img-fluid img-thumbnail" src="https://picsum.photos/940/650?random=6" alt="Random Image"></figure>
			</a>
		</div>

		<div class="col-lg-3 col-md-4 col-xs-6 thumb">
			<a href="https://picsum.photos/940/650?random=7">
				<figure><img class="img-fluid img-thumbnail" src="https://picsum.photos/940/650?random=7" alt="Random Image"></figure>
			</a>
		</div>

		<div class="col-lg-3 col-md-4 col-xs-6 thumb">
			<a href="https://picsum.photos/940/650?random=8">
				<figure><img class="img-fluid img-thumbnail" src="https://picsum.photos/940/650?random=8" alt="Random Image"></figure>
			</a>
		</div>

        <div class="col-lg-3 col-md-4 col-xs-6 thumb">
			<a href="https://picsum.photos/940/650?random=8">
				<figure><img class="img-fluid img-thumbnail" src="https://picsum.photos/940/650?random=8" alt="Random Image"></figure>
			</a>
		</div>

        <div class="col-lg-3 col-md-4 col-xs-6 thumb">
			<a href="https://picsum.photos/940/650?random=8">
				<figure><img class="img-fluid img-thumbnail" src="https://picsum.photos/940/650?random=8" alt="Random Image"></figure>
			</a>
		</div>

        <div class="col-lg-3 col-md-4 col-xs-6 thumb">
			<a href="https://picsum.photos/940/650?random=8">
				<figure><img class="img-fluid img-thumbnail" src="https://picsum.photos/940/650?random=8" alt="Random Image"></figure>
			</a>
		</div>
	</div>
</section>

@endsection