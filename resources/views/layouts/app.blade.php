<!DOCTYPE html>
<html lang="zxx">

<head>
	<!--====== Required meta tags ======-->
	<meta charset="utf-8" />
	<meta http-equiv="x-ua-compatible" content="ie=edge" />
	<meta name="description" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<!--====== Title ======-->
	<title> @yield('baslik') | Blog App </title>
	<!--====== Favicon Icon ======-->
	<link rel="shortcut icon" href="{{url('assets/img/favicon.ico')}}" type="img/png" />
	<!--====== Animate Css ======-->
	<link rel="stylesheet" href="{{url('assets/css/animate.min.css')}}">
	<!--====== Bootstrap css ======-->
	<link rel="stylesheet" href="{{url('assets/css/bootstrap.min.css')}}" />
	<!--====== Fontawesome css ======-->
	<link rel="stylesheet" href="{{url('assets/css/font-awesome.min.css')}}" />
	<!--====== Magnific Popup css ======-->
	<link rel="stylesheet" href="{{url('assets/css/magnific-popup.css')}}" />
	<!--====== Slick  css ======-->
	<link rel="stylesheet" href="{{url('assets/css/slick.css')}}" />
	<!--====== Nice Select ======-->
	<link rel="stylesheet" href="{{url('assets/css/jquery-nice-select.min.css')}}" />
	<!--====== Style css ======-->
	<link rel="stylesheet" href="{{url('assets/css/style.css')}}" />
	@yield('ekstracss')
</head>

<body>
	<!--[if lte IE 9]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
	<![endif]-->

	@include('layouts.header')

    @yield('icerik')

	@include('layouts.footer')

	
	<!--====== jquery js ======-->
	<script src="{{url('assets/js/vendor/modernizr-3.6.0.min.js')}}"></script>
	<script src="{{url('assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
	<!--====== Bootstrap js ======-->
	<script src="{{url('assets/js/bootstrap.min.js')}}"></script>
	<script src="{{url('assets/js/popper.min.js')}}"></script>
	<!--====== Slick js ======-->
	<script src="{{url('assets/js/slick.min.js')}}"></script>
	<!--====== Images Loaded ======-->
	<script src="{{url('assets/js/imagesloaded.pkgd.min.js')}}"></script>
	<!--====== Isotope js ======-->
	<script src="{{url('assets/js/isotope.pkgd.min.js')}}"></script>
	<!--====== Magnific Popup js ======-->
	<script src="{{url('assets/js/jquery.magnific-popup.min.js')}}"></script>
	<!--====== Nice Select js ======-->
	<script src="{{url('assets/js/jquery.nice-select.min.js')}}"></script>
	<!--====== Main js ======-->
	<script src="{{url('assets/js/main.js')}}"></script>
	
	@yield('ekstrajs')
</body>

</html>