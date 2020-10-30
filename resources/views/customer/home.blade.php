@extends('layouts.customer')

@section('title', 'Home')

@section('content')
<div class="bannerhny-content">
    <div class="content-baner-inf">
        <div id="carouselHome" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselHome" data-slide-to="0" class="active"></li>
                <li data-target="#carouselHome" data-slide-to="1"></li>
                <li data-target="#carouselHome" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                    </div>
                </div>
                <div class="carousel-item item2">
                    <div class="container">
                    </div>
                </div>
                <div class="carousel-item item3">
                    <div class="container">
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselHome" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselHome" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>

<section class="w3l-grids-hny-2">
	<div class="grids-hny-2-mian py-1" style="margin">
		<div class="container py-lg-2">
			<h3 class="hny-title mb-0 text-center">Software <span>Categories</span></h3>
			<p class="mb-4 text-center">pick your software categories</p>
			<div class="welcome-grids row mt-5">
                <div class="col-md-12">
                    <div class="mobile d-inline-block">
						<h4><a href="{{route('software-type', ['type' => 3])}}">Mobile</a></h4>
                    </div>
                    <div class="website d-inline-block">
                        <h4><a href="{{route('software-type', ['type' => 2])}}">Website</a></h4>
                    </div>
                    <div class="desktop d-inline-block">
                        <h4><a href="{{route('software-type', ['type' => 1])}}">Desktop</a></h4>
                    </div>
                </div>
			</div>
		</div>
	</div>
</section>

<section class="w3l-content-w-photo-6">
	<div class="content-photo-6-mian py-5">
		<div class="container py-lg-5">
            <div class="align-photo-6-inf-cols row">
                <div class="photo-6-inf-right col-lg-6">
                        <h3 class="hny-title text-left">All product Office 365 <br><span>30% Discount</span></h3>
                        <p>Visit our shop to see special offer for you.</p>
                        <a href="#" class="read-more btn">
                                Shop Now
                        </a>
                </div>
                <div class="photo-6-inf-left col-lg-6">
                    <img src="img/office365.jpg" class="img-fluid" alt="Office 365">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="w3l-video-6">
	<!-- /video-6-->
	<div class="video-66-info">
		<div class="container-fluid">
			<div class="video-grids-info row">
				<div class="video-gd-right col-lg-8">
                    <img src="img/adobe.jpg" class="img-fluid" alt="Office 365">
				</div>
				<div class="video-gd-left col-lg-4 p-lg-5 p-4">
					<div class="p-xl-4 p-0 video-wrap">
						<h3 class="hny-title text-left">All Product Adobe <br> <span>50% Discount</span>
						</h3>
						<p>Visit our shop to see special offer for you.</p>
						<a href="#" class="read-more btn">
							Shop Now
						</a>
					</div>
				</div>

			</div>
		</div>
	</div>
</section>

<section class="w3l-customers-sec-6">
	<div class="customers-sec-6-cintent py-2">
		<div class="container py-lg-2">
				<h3 class="hny-title text-center mb-0 ">Customers <span>Love</span></h3>
				<p class="mb-5 text-center">What People Say</p>
			<div class="row customerhny my-lg-5 my-4">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-3">
							<div class="customer-info text-center">
								<div class="feedback-hny">
									<span class="fa fa-quote-left"></span>
									<p class="feedback-para">Software in here is very useful and useful</p>
								</div>
								<div class="feedback-review mt-4">
									<h5>Smith Roy</h5>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="customer-info text-center">
								<div class="feedback-hny">
									<span class="fa fa-quote-left"></span>
									<p class="feedback-para">Price offered is friendly, worth it to buy any software in here</p>
								</div>
								<div class="feedback-review mt-4">
									<h5>Lora Grill</h5>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="customer-info text-center">
								<div class="feedback-hny">
									<span class="fa fa-quote-left"></span>
									<p class="feedback-para">The quality of the software in this website is very good</p>
								</div>
								<div class="feedback-review mt-4">
									<h5>Laura Sten</h5>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="customer-info text-center">
								<div class="feedback-hny">
									<span class="fa fa-quote-left"></span>
									<p class="feedback-para">I love any software offered in this website</p>
								</div>
								<div class="feedback-review mt-4">
									<h5>John Lee</h5>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

@section('scripts')
<script>
$('#customerhnyCarousel').carousel({
    interval: 5000
});
</script>
@endsection