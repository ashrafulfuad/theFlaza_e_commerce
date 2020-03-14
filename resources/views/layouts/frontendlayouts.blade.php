<!DOCTYPE html>
<html lang="en">
<head>
	<title>The Plaza - eCommerce Template</title>
	<meta charset="UTF-8">
	<!-- Favicon -->
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{ asset('frontend_asset/css/bootstrap.min.css') }}"/>
	<link rel="stylesheet" href="{{ asset('frontend_asset/css/font-awesome.min.css') }}"/>
	<link rel="stylesheet" href="{{ asset('frontend_asset/css/owl.carousel.css') }}"/>
	<link rel="stylesheet" href="{{ asset('frontend_asset/css/style.css') }}"/>
	<link rel="stylesheet" href="{{ asset('frontend_asset/css/animate.css') }}"/>
</head>
<body>
	<!-- Page Preloder -->

	<!-- Header section -->
	<header class="header-section" style="background: linear-gradient(to right, #f0f9ff 0%, #aa7ad0 0%, #d07acd 100%); padding: 30px 40px 36px;">
		<div class="container-fluid">
			<!-- logo -->
			<div class="site-logo">
				<a href="{{ url('/') }}"><img src="{{ asset('frontend_asset/img/logo.png') }}" alt="logo"></a>
			</div>
			<!-- responsive -->
			<div class="nav-switch">
				<i class="fa fa-bars"></i>
			</div>
			<div class="header-right">
				<a href="{{ route('cart') }}" class="card-bag"><img src="{{ asset('frontent_asset/img/icons/bag.png') }}" alt=""><span>{{ App\Cart::where('customer_ip', '127.0.0.1')->count() }}</span></a>
			</div>
			<!-- site menu -->
			<ul class="main-menu">
				<li><a href="{{ url('/') }}">Home</a></li>
				<li><a href="categorie.html">Woman</a></li>
				<li><a href="categorie.html">Child</a></li>
				<li><a href="{{ url('/contact') }}">Contact</a></li>
				<li><a href="{{ url('/home') }}">Admin</a></li>
			</ul>
		</div>
	</header>
	<!-- Header section end -->

@yield('your_section')


	<!-- Footer top section -->
	<section class="footer-top-section home-footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-8 col-sm-12">
					<div class="footer-widget about-widget">
						<img src="img/logo.png" class="footer-logo" alt="">
						<p>Donec vitae purus nunc. Morbi faucibus erat sit amet congue mattis. Nullam fringilla faucibus urna, id dapibus erat iaculis ut. Integer ac sem.</p>
						<div class="cards">
							<img src="img/cards/5.png" alt="">
							<img src="img/cards/4.png" alt="">
							<img src="img/cards/3.png" alt="">
							<img src="img/cards/2.png" alt="">
							<img src="img/cards/1.png" alt="">
						</div>
					</div>
				</div>
				<div class="col-lg-2 col-md-4 col-sm-6">
					<div class="footer-widget">
						<h6 class="fw-title">usefull Links</h6>
						<ul>
							<li><a href="#">Partners</a></li>
							<li><a href="#">Bloggers</a></li>
							<li><a href="#">Support</a></li>
							<li><a href="#">Terms of Use</a></li>
							<li><a href="#">Press</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-4 col-sm-6">
					<div class="footer-widget">
						<h6 class="fw-title">Sitemap</h6>
						<ul>
							<li><a href="#">Partners</a></li>
							<li><a href="#">Bloggers</a></li>
							<li><a href="#">Support</a></li>
							<li><a href="#">Terms of Use</a></li>
							<li><a href="#">Press</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-4 col-sm-6">
					<div class="footer-widget">
						<h6 class="fw-title">Shipping & returns</h6>
						<ul>
							<li><a href="#">About Us</a></li>
							<li><a href="#">Track Orders</a></li>
							<li><a href="#">Returns</a></li>
							<li><a href="#">Jobs</a></li>
							<li><a href="#">Shipping</a></li>
							<li><a href="#">Blog</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-4 col-sm-6">
					<div class="footer-widget">
						<h6 class="fw-title">Contact</h6>
						<div class="text-box">
							<p>Your Company Ltd </p>
							<p>1481 Creekside Lane  Avila Beach, CA 93424, </p>
							<p>+53 345 7953 32453</p>
							<p>office@youremail.com</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Footer top section end -->

		<!-- Footer section -->
	<footer class="footer-section">
		<div class="container">
			<p class="copyright">
				<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This website is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://www.facebook.com/fuadmia44" target="_blank">Ashraful Fuad</a>
				<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
			</p>
		</div>
	</footer>
	<!-- Footer section end -->


	<!--====== Javascripts & Jquery ======-->
	<script src="{{ asset('frontend_asset/js/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ asset('frontend_asset/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('frontend_asset/js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('frontend_asset/js/mixitup.min.js') }}"></script>
	<script src="{{ asset('frontend_asset/js/sly.min.js') }}"></script>
	<script src="{{ asset('frontend_asset/js/jquery.nicescroll.min.js') }}"></script>
	<script src="{{ asset('frontend_asset/js/main.js') }}"></script>
    </body>
</html>
