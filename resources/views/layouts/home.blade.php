<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
        <meta charset="utf-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="shortcut icon" href="{{ asset('wh2.png') }}">
        <link rel="icon" type="image/png" href="{{ asset('wh2.png') }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
        <meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
        <meta name="author" content="FreeHTML5.co" />
        {{--  --}}
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        {{--  --}}
        <!-- 
        //////////////////////////////////////////////////////
    
        FREE HTML5 TEMPLATE 
        DESIGNED & DEVELOPED by FreeHTML5.co
            
        Website: 		http://freehtml5.co/
        Email: 			info@freehtml5.co
        Twitter: 		http://twitter.com/fh5co
        Facebook: 		https://www.facebook.com/fh5co
    
        //////////////////////////////////////////////////////
         -->
    
          <!-- Facebook and Twitter integration -->
        <meta property="og:title" content=""/>
        <meta property="og:image" content=""/>
        <meta property="og:url" content=""/>
        <meta property="og:site_name" content=""/>
        <meta property="og:description" content=""/>
        <meta name="twitter:title" content="" />
        <meta name="twitter:image" content="" />
        <meta name="twitter:url" content="" />
        <meta name="twitter:card" content="" />
    
        <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,700,800" rel="stylesheet">
        
        <!-- Animate.css -->
        <link rel="stylesheet" href="{{asset('homepage/css/animate.css')}}">
        <!-- Icomoon Icon Fonts-->
        <link rel="stylesheet" href="{{asset('homepage/css/icomoon.css')}}">
        <!-- Bootstrap  -->
        <link rel="stylesheet" href="{{asset('homepage/css/bootstrap.css')}}">
    
        <!-- Magnific Popup -->
        <link rel="stylesheet" href="{{asset('homepage/css/magnific-popup.css')}}">
    
        <!-- Owl Carousel  -->
        <link rel="stylesheet" href="{{asset('homepage/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('homepage/css/owl.theme.default.min.css')}}">
        <!-- Flexslider  -->
        <link rel="stylesheet" href="{{asset('homepage/css/flexslider.css')}}">
    
        <!-- Theme style  -->
        <link rel="stylesheet" href="{{asset('homepage/css/style.css')}}">
    
        <!-- Modernizr JS -->
        <script src="{{asset('homepage/js/modernizr-2.6.2.min.js')}}"></script>
        <!-- FOR IE9 below -->
        <!--[if lt IE 9]>
        <script src="js/respond.min.js"></script>
        <![endif]-->
    
        </head>
<body>
    {{-- <style>
        input[type="file"] {
       display: none;
     }
     </style> --}}
	<div class="fh5co-loader"></div>
	
	<div id="page">
	<nav class="fh5co-nav" role="navigation">
		<div class="top-menu">
			<div class="container">
				<div class="row">
					<div class="col-xs-2">
						<div id="fh5co-logo"><a href="/">QuizCatch<span>.</span></a></div>
					</div>
					<div class="col-xs-10 text-right menu-1">
						<ul>
							<li class="active"><a href="{{route('home')}}">Home</a></li>
                            <li class="has-dropdown">
								<a href="#">Language</a>
								<ul class="dropdown">
									<li><a href="{{url('ar/home')}}">Arabic</a></li>
									<li><a href="{{url('en/home')}}">English</a></li>
									<li><a href="{{url('tr/home')}}">Turkish</a></li>
								</ul>
							</li>
							<li><a href="{{route('about')}}">About</a></li>
                            @if (Route::has('login'))
                                @auth
                                <li class="btn-cta has-dropdown"><a href="{{route('user.profile',Auth::user()->user_name)}}"><span>{{Auth::user()->name}}</span></a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                     {{ __('Logout') }}
                                 </a>
         
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                     @csrf
                                 </form>         
                            </li>
                                @else
                                <li class="btn-cta"><a href="{{route('login',app()->getLocale())}}"><span>Login</span></a></li>
            
                                    @if (Route::has('register'))
                                    <li class="btn-cta"><a href="{{route('register')}}"><span>Sign Up</span></a></li>
                                    @endif
                                @endauth
                        @endif
						</ul>
					</div>
				</div>
				
			</div>
		</div>
	</nav>
    <div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="{{asset('homepage/js/jquery.min.js')}}"></script>
	<!-- jQuery Easing -->
	<script src="{{asset('homepage/js/jquery.easing.1.3.js')}}"></script>
	<!-- Bootstrap -->
	<script src="{{asset('homepage/js/bootstrap.min.js')}}"></script>
	<!-- Waypoints -->
	<script src="{{asset('homepage/js/jquery.waypoints.min.js')}}"></script>
	<!-- Stellar Parallax -->
	<script src="{{asset('homepage/js/jquery.stellar.min.js')}}"></script>
	<!-- Carousel -->
	<script src="{{asset('homepage/js/owl.carousel.min.js')}}"></script>
	<!-- Flexslider -->
	<script src="{{asset('homepage/js/jquery.flexslider-min.js')}}"></script>
	<!-- countTo -->
	<script src="{{asset('homepage/js/jquery.countTo.js')}}"></script>
	<!-- Magnific Popup -->
	<script src="{{asset('homepage/js/jquery.magnific-popup.min.js')}}"></script>
	<script src="{{asset('homepage/js/magnific-popup-options.js')}}"></script>
	<!-- Main -->
	<script src="{{asset('homepage/js/main.js')}}"></script>
    <main class="py-4">
        @yield('home')
    </main>
</body>
<section class="footer">
    <footer id="fh5co-footer" role="contentinfo">
        <div class="container">
            <div class="row copyright">
                <div class="col-md-12 text-center">
                    <p>
                        <small class="block">&copy; 2022 AKTA</small> 
                    </p>
                    <p>
                        <ul class="fh5co-social-icons">
                            <li><a href="#"><i class="icon-twitter"></i></a></li>
                            <li><a href="#"><i class="icon-facebook"></i></a></li>
                            <li><a href="#"><i class="icon-linkedin"></i></a></li>
                            <li><a href="#"><i class="icon-dribbble"></i></a></li>
                        </ul>
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <script>

    </script>
</section>
