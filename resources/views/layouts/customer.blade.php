<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>@yield('title')</title>
	
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link href="{{ asset('css/style-customer.css') }}" rel="stylesheet">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Icon -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Fonts -->
	<link href="//fonts.googleapis.com/css?family=Oswald:300,400,500,600&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900&display=swap" rel="stylesheet">
	@yield('extra-header')
</head>
<body>
<!--w3l-banner-slider-main-->
<section class="w3l-banner-slider-main">
	<div class="top-header-content">
		<header class="tophny-header">
			<div class="container-fluid">
				<div class="top-right-strip row">
					<!--/left-->
					<div class="top-hny-left-content col-lg-6 pl-lg-0">
						<a class="navbar-brand" href="{{route('home')}}">
							Soft<span class="lohny">W</span>are</a>
					</div>
					<!--//left-->
					<!--/nav-->
					<nav class="navbar navbar-expand-lg navbar-light ml-auto">
						<div class="container-fluid serarc-fluid">
							<button class="navbar-toggler" type="button" data-toggle="collapse"
								data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
								aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon fa fa-bars" style="color:#d8cdb1"> </span>
							</button>
							<div class="collapse navbar-collapse" id="navbarSupportedContent">
								<ul class="navbar-nav ml-auto">
									<li class="nav-item active">
										<a class="nav-link" href="{{route('home')}}">Home</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#">About</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="{{route('software-type')}}">Shop</a>
									</li>
									@if(Auth::check()))
									<li class="nav-item">
										<a class="nav-link" href="{{ route('profile.edit') }}">Profile</a>
									</li>
										@if (Auth::user()->isSeller())
										<li class="nav-item">
											<a class="nav-link" href="{{ route('seller.page') }}">Dashboard</a>
										</li>
										@endif
									@endif
									<li class="nav-item">
										@if(Auth::check())
										<a class="nav-link" href="{{ route('logout') }}">Logout</a>
										@else
										<a class="nav-link" href="{{ route('login') }}">Login</a>
										@endif
									</li>
								</ul>
							</div>
						</div>
					</nav>
					<!--//nav-->
				</div>
			</div>
		</header>

	<!-- Content -->
	<main>
		@yield('content')
	</main>
	<!-- End Content -->
</section>

<section class="w3l-footer-22">
    <!-- footer-22 -->
    <div class="footer-hny">
        <div class="container">
            <div class="below-section row">
                <div class="columns col-lg-6" style="margin-top:-5px">
                    <ul class="jst-link">
                        <li><a href="#">Privacy Policy </a> </li>
                        <li><a href="#">Term of Service</a></li>
                        <li><a href="contact.html">Customer Care</a> </li>
                    </ul>
                </div>
                <div class="columns col-lg-6 text-lg-right" style="margin-top:10px">
                    <p>© Webpro - Midterm
                    </p>
                </div>
                <button onclick="topFunction()" id="movetop" title="Go to top">
                    <span class="fa fa-angle-double-up"></span>
                </button>
            </div>
        </div>
    </div>
	<!-- //titels-5 -->
</section>

<script src="{{ asset('js/jquery.magnific-popup.js') }}" defer></script>
<script src="{{ asset('js/main-customer.js') }}" defer></script>

<!-- Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

@yield('scripts')
</body>
</html>
