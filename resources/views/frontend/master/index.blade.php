<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> MedIQ EMR </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="frontend/img/logo/loder.png">

	<!-- CSS here -->
	<link rel="stylesheet" href="{{asset('/frontend/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('/frontend/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('/frontend/css/slicknav.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/css/gijgo.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/css/animated-headline.css')}}">
	<link rel="stylesheet" href="{{asset('/frontend/css/magnific-popup.css')}}">
	<link rel="stylesheet" href="{{asset('/frontend/css/fontawesome-all.min.css')}}">
	<link rel="stylesheet" href="{{asset('/frontend/css/themify-icons.css')}}">
	<link rel="stylesheet" href="{{asset('/frontend/css/slick.css')}}">
	<link rel="stylesheet" href="{{asset('/frontend/css/nice-select.css')}}">
	<link rel="stylesheet" href="{{asset('/frontend/css/style.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    @yield('scripts')
    @yield('styles')

</head>
<body>
    @include('frontend.partial.header')
    @yield('content')
    @include('frontend.partial.footer')

    <!-- JS here -->

    <script src="{{asset('/frontend/js/vendor/modernizr-3.5.0.min.js')}}"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{asset('/frontend/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('/frontend/js/popper.min.js')}}"></script>
    <script src="{{asset('/frontend/js/bootstrap.min.js')}}"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{asset('/frontend/js/jquery.slicknav.min.js')}}"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{asset('/frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('/frontend/js/slick.min.js')}}"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="{{asset('/frontend/js/wow.min.js')}}"></script>
    <script src="{{asset('/frontend/js/animated.headline.js')}}"></script>
    <script src="{{asset('/frontend/js/jquery.magnific-popup.js')}}"></script>

    <!-- Date Picker -->
    <script src="{{asset('/frontend/js/gijgo.min.js')}}"></script>
    <!-- Nice-select, sticky -->
    <script src="{{asset('/frontend/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('/frontend/js/jquery.sticky.js')}}"></script>
    
    <!-- counter , waypoint -->
    <script src="{{asset('/frontend/js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('/frontend/js/waypoints.min.js')}}"></script>
    <script src="{{asset('/frontend/js/jquery.countdown.min.js')}}"></script>
    <!-- contact js -->
    <script src="{{asset('/frontend/js/contact.js')}}"></script>
    <script src="{{asset('/frontend/js/jquery.form.js')}}"></script>
    <script src="{{asset('/frontend/js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('/frontend/js/mail-script.js')}}"></script>
    <script src="{{asset('/frontend/js/jquery.ajaxchimp.min.js')}}"></script>
    
    <!-- Jquery Plugins, main Jquery -->	
    <script src="{{asset('/frontend/js/plugins.js')}}"></script>
    <script src="{{asset('/frontend/js/main.js')}}"></script>

    </body>
</html>