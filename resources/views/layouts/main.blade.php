<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
        <meta charset="utf-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>quiz catch</title>
        <link  type="text/css" href="{{asset('css/ap.css')}}" rel="stylesheet">
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
							<li class="active"><a href="index.html">Home</a></li>
                            <li class="has-dropdown">
								<a href="#">Language</a>
								<ul class="dropdown">
									<li><a href="{{url('ar/home')}}">Arabic</a></li>
									<li><a href="{{url('en/home')}}">English</a></li>
									<li><a href="{{url('tr/home')}}">Turkish</a></li>
								</ul>
							</li>
							<li class="has-dropdown">
								<a href="blog.html">Quiz</a>
								<ul class="dropdown">
									<li><a href="#">All Quizes</a></li>
									<li><a href="#">My Quizes</a></li>
									<li><a href="#">Tooked Quizes</a></li>
								</ul>
							</li>
							<li><a href="{{asset('homepage/about.html')}}">About</a></li>
							<li><a href="{{asset('homepage/contact.html')}}">Contact</a></li>
                            @if (Route::has('login'))
                                @auth
                                <li class="btn-cta has-dropdown"><a href="{{route('user.profile',Auth::user()->name)}}"><span>{{Auth::user()->name}}</span></a>
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
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container bootstrap snippets bootdey">
    <div class="row profile">
        <div class="col-md-3" id="profileCol">
			<div class="profile-sidebar">
				{{-- side bar --}}
				<div class="row">
					<div class="col-4">
                        <div class="list-group" id="list-tab" role="tablist">
                            <a
                              class="list-group-item list-group-item-action tab-pane {{ $key==0 ? 'active' : ''}}"
                              id="list-home-list"
                              data-mdb-toggle="list"
                              href="{{route('home')}}"
                              role="tab"
                              aria-controls="list-home"
                              >Quizzes</a
                            >
                            <a
                              class="list-group-item list-group-item-action tab-pane {{ $key==1 ? 'active' : ''}}"
                              id="list-profile-list"
                              data-mdb-toggle="list"
                              href="{{route('home.posts')}}"
                              role="tab"
                              aria-controls="list-profile"
                              >Posts</a
                            >
                            <a
                              class="list-group-item list-group-item-action tab-pane {{ $key==2 ? 'active' : ''}}"
                              id="list-messages-list"
                              data-mdb-toggle="list"
                              href="{{route('home.tournaments')}}"
                              role="tab"
                              aria-controls="list-messages"
                              >Tournaments</a
                            >
                            <a
                              class="list-group-item list-group-item-action tab-pane {{ $key==3 ? 'active' : ''}}"
                              id="list-settings-list"
                              data-mdb-toggle="list"
                              href="{{route('user.profile',Auth::user()->name)}}"
                              role="tab"
                              aria-controls="list-settings"
                              >Profile</a
                            >
                          </div>

					</div>
					<div class="col-8">
					  <div class="tab-content" id="nav-tabContent">
						<div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
						  ...
						</div>
						<div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
						  ...
						</div>
						<div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
						  ...
						</div>
						<div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
						  ...
						</div>
					  </div>
					</div>
				  </div>
                    {{-- <ul class="nav-news-feed">
                        <li><i class="fa fa-user icon3"></i><div><a href="#">Profile</a></div></li>
                        <li><i class="fa fa-list-alt icon1"></i><div><a href="#">Quizzes</a></div></li>
                        <li><i class="fa fa-user icon3"></i><div><a href="#">Friends</a></div></li>
                        <li><i class="fa fa-comments icon4"></i><div><a href="#">Messages</a></div></li>
                        <li><i class="fa fa-picture-o icon5"></i><div><a href="#">Posts</a></div></li>
                      </ul><!--news-feed links ends--> --}}
				{{-- end sidebar --}}
			</div>
		</div>
		<div class="col-md-9" id="contentCol">
            <div class="profile-content">
                <div class="row ">
                    {{-- starts right nav --}}   	
					<div class="panel">
						<form>
							<textarea placeholder="Whats in your mind today?" rows="2" class="form-control input-lg p-text-area"></textarea>
						</form>
						<footer class="panel-footer">
							<button class="btn btn-primary pull-right">Post</button>
							<ul class="nav nav-pills">
								<li>
									<a href="#"><i class="fa fa-map-marker"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-camera"></i></a>
								</li>
								<li>
									<a href="#"><i class=" fa fa-film"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-microphone"></i></a>
								</li>
							</ul>
						</footer>
					</div>	
						   {{-- Start Post Page --}}
                        <main class="py-4">
                            @yield('main')
                        </main>
						   {{-- End Post Page --}}
						 {{-- end right nav --}}
                </div>
            </div>
		</div>
	</div>
</div> 


</body>
<section class="footer">
    <footer id="fh5co-footer" role="contentinfo">
        <div class="container">
            <div class="row copyright">
                <div class="col-md-12 text-center">
                    <p>
                        <small class="block">&copy; 2022 AHMED AKTA</small> 
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
</section>
