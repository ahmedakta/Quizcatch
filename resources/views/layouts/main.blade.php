<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

	<head>
        <meta charset="utf-8">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="shortcut icon" href="{{ asset('wh2.png') }}">
        <link rel="icon" type="image/png" href="{{ asset('wh2.png') }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" >
        <meta name="keywords"  />
        <meta name="author"  />


        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
      
        <meta property="og:title" content=""/>
        <meta property="og:image" content=""/>
        <meta property="og:url" content=""/>
        <meta property="og:site_name" content=""/>
        <meta property="og:description" content=""/>
        <meta name="twitter:title" content="" />
        <meta name="twitter:image" content="" />
        <meta name="twitter:url" content="" />
        <meta name="twitter:card" content="" />
    
        
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

        <link  type="text/css" href="{{asset('css/tabe.css')}}" rel="stylesheet">
        <link  type="text/css" href="{{asset('css/post.css')}}" rel="stylesheet">
        @livewireStyles
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
							{{-- <li class="active"><a href="{{route('home')}}">Home</a></li>
                            <li class="has-dropdown">
								<a >Language</a>
								<ul class="dropdown">
									<li><a href="{{url('ar/home')}}">Arabic</a></li>
									<li><a href="{{url('en/home')}}">English</a></li>
									<li><a href="{{url('tr/home')}}">Turkish</a></li>
								</ul>
							</li> --}}
							<li><a href="{{route('about')}}">About</a></li>
                            @if (Route::has('login'))
                                @auth
                                <li class="btn-cta has-dropdown"><a href="{{route('user.profile',Auth::user())}}"><span>{{Auth::user()->name}}</span></a>
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
                            {{-- <a
                              class="list-group-item list-group-item-action tab-pane {{ $key==9 ? 'active' : ''}}"
                              id="list-home-list"
                              data-mdb-toggle="list"
                              href="{{route('messages.index')}}"
                              role="tab"
                              aria-controls="list-home"
                              ><i class="fa fa-comment"></i> Messages</a
                            > --}}
                            {{-- <a
                              class="list-group-item list-group-item-action tab-pane {{ $key==9 ? 'active' : ''}}"
                              id="list-home-list"
                              data-mdb-toggle="list"
                              href="{{route('messages.index')}}"
                              role="tab"
                              aria-controls="list-home"
                              ><i class="fa fa-bell"></i> Notifications</a
                            > --}}
                            <a
                              class="list-group-item list-group-item-action tab-pane {{ $key==0 ? 'active' : ''}}"
                              id="list-home-list"
                              data-mdb-toggle="list"
                              href="{{route('home')}}"
                              role="tab"
                              aria-controls="list-home"
                              ><i class="fa fa-question" aria-hidden="true"></i>  Quizzes</a
                            >
                            @if ($key==0 || $key == 30)
                            <a
                              class="list-group-item list-group-item-action tab-pane"
                              id="list-home-list"
                              data-mdb-toggle="list"
                              href="#"
                              role="tab"
                              aria-controls="list-home"
                              ><i class="fa fa-gamepad"></i>  Game</a
                            >
                            <a
                              class="list-group-item list-group-item-action tab-pane {{$key == 30 ? 'active' : ''}}"
                              id="list-home-list"
                              data-mdb-toggle="list"
                              href="{{route('class.index')}}"
                              role="tab"
                              aria-controls="list-home"
                              ><i class="fa fa-users"></i>  Class</a
                            >
                            @endif
                            <a
                              class="list-group-item list-group-item-action tab-pane {{ $key==1 ? 'active' : ''}}"
                              id="list-profile-list"
                              data-mdb-toggle="list"
                              href="{{route('home.posts')}}"
                              role="tab"
                              aria-controls="list-profile"
                              ><i class="fa fa-pencil"></i> Posts</a
                            >
                            @if ($active_tabs != null)
                            <a
                            class="list-group-item list-group-item-action tab-pane {{ $key==5 ? 'active' : ''}}"
                            id="list-profile-list"
                            data-mdb-toggle="list"
                            href="{{route('saved.posts',['user' => $user->name])}}"
                            role="tab"
                            aria-controls="list-profile"
                            ><i class="fa fa-bookmark"></i> Saved</a
                          >
                            <a
                            class="list-group-item list-group-item-action tab-pane {{ $key==4 ? 'active' : ''}}"
                            id="list-profile-list"
                            data-mdb-toggle="list"
                            href="{{route('private.posts',['user' => $user->name])}}"
                            role="tab"
                            aria-controls="list-profile"
                            ><i class="fa fa-lock"></i> Private</a
                          >
                            @endif
                            <a
                              class="list-group-item list-group-item-action tab-pane {{ $key==2 ? 'active' : ''}}"
                              id="list-messages-list"
                              data-mdb-toggle="list"
                              href="{{route('tournaments.index')}}"
                              role="tab"
                              aria-controls="list-messages"
                              ><i class="fa fa-trophy" aria-hidden="true"></i> Tournaments</a
                            >
                            <a
                              class="list-group-item list-group-item-action tab-pane {{ $key==3 ? 'active' : ''}}"
                              id="list-settings-list"
                              data-mdb-toggle="list"
                              href="{{route('user.profile',Auth::user()->user_name)}}"
                              role="tab"
                              aria-controls="list-settings"
                              ><i class="fa fa-user"></i> Profile</a
                            >
                          </div>
                        {{-- under tabs --}}
                        <div class="container d-flex justify-content-center mt-5">
                          <div class="card" >
                            @if ($user->profile == null)
                            <div class="top-container"> <img src="{{asset('media/quizcatchAvatar.svg')}}" class="img-fluid profile-image" width="70">
                            @else
                              <div class="top-container"> <img src="{{asset($user->profile->photo)}}" class="img-fluid profile-image" width="70">
                            @endif
                                  <div class="ml-3" style="margin-left: 10px">
                                      <h5 class="name">{{$user->name}}</h5>
                                      <div style="width:150px;overflow:hidden;height:50px;line-height:50px;">
                                        <p>{{$user->email}}</p>
                                      </div>
                                  </div>
                              </div>
                              <div class="middle-container d-flex justify-content-between align-items-center mt-3 p-2">
                                  <div class="d-flex flex-column"> <span class="current-balance">Quiz Count</span> <span class="amount">{{$quiz_count}}</span> </div>
                              </div>
                              {{-- <div class="wishlist-border pt-2"> <span class="wishlist">2 Messages</span> </div> todo--}} 
                              <div class="wishlist-border pt-2"> <span class="wishlist">
                                @if($user->profile->education != null)
                                <i class="fa fa-graduation-cap"></i>  {{$profile->education}}
                                @endif
                               </span> </div>
                              <div class="recent-border mt-4"> <span class="recent-orders">
                                @if($user->isOnline())
                                <i class="text-success"><i class="fa fa-circle"></i> ONLINE</i>
                               @else
                                <i class="text-muted"><i class="fa fa-circle"></i> OFFLINE</i>
                               @endif
                              </span></div>
                          </div>
                      </div>

                         {{-- /under tabs --}}

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
    {{--  Start Right Side Nav --}}
    {{-- <div class="list-group" id="list-tab" role="tablist" style="float: right">
        <a
                              class="list-group-item list-group-item-action tab-pane {{ $key==0 ? 'active' : ''}}"
                              id="list-home-list"
                              data-mdb-toggle="list"
                              href="{{route('home')}}"
                              role="tab"
                              aria-controls="list-home"
                              ><i class="fa fa-question" aria-hidden="true"></i>  Quizzes</a
                            >
    </div> --}}

    {{-- End Right Side Nav --}}
		<div class="col-md-9" id="contentCol">
            <div class="profile-content">
                <div class="row ">
                    {{-- starts right nav --}}   	
          @if($key==0)
					<div class="panel" style="margin-left:15px">
             <div style="padding-top: 10px">
							<a type="btn btn-primary" class="btn btn-primary pull-right" href="{{route('quiz.my-quizzes')}}">My Quizzes</a>
							<a type="btn btn-primary" class="btn btn-primary pull-right" href="{{route('quiz.my-results')}}">My Results</a>
							<a type="btn btn-primary" class="btn btn-info pull-right" href="{{route('quiz.create')}}">Create</a>
             </div>
              <form action="#" method="GET">
                <button class="btn btn-light" type="submit" style="margin: 15px;"><i class="fa fa-search"></i></button>
                <div class="input-group pull-left">
                  <input type="text" name="search" class="form-control" placeholder="Search"  style=" margin : 15px" value="{{request('search') }}" />
                </form>
              </div>
              {{-- start show Page --}}
             
              {{-- end Show page --}}
							<ul class="nav nav-pills">
						
							</ul>
					</div>
          @elseif($key ==30)
          <div class="panel" style="margin-left:15px">
             <div style="padding-top: 10px">
							<a type="btn btn-primary" class="btn btn-info pull-right" href="{{route('class.create')}}">Create Class</a>
             </div>
              <div class="input-group pull-left">
              </div>
              {{-- start show Page --}}
             
              {{-- end Show page --}}
							<ul class="nav nav-pills">
						
							</ul>
					</div>
          @elseif($key == 1)	
          <div class="panel" style="margin-left:15px;">
						<form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
              @csrf
							<input placeholder="Post Now" rows="2" class="form-control input-lg p-text-area " name="content" id="mytextarea" type="textarea" required>
              {{-- <a  type="submit" >Post</a> --}}
              <button class="btn btn-primary pull-right" type="submit" style="margin: 10px">Post</button>
              <style>
                 input[type="file"] {
                display: none;
              }
              </style>
                <ul class="nav nav-pills" style="margin: 10px">
                  <li>
                      <label style="color:#f95959" >
                        <i class="fa fa-camera" style="margin-top: 15px"></i>
                        <input name="image" class="custom-file-input" type="file" accept="image/*">
                      </label>
                  </li>
                  <li>
                      <label style="color:#f95959" >
                        <i class="fa fa-video-camera" style="margin: 15px"></i>
                        <input name="video" class="custom-file-input" type="file"  accept="video/*" controls preload>
                      </label>
                  </li>
                  <li>
                      <select name="private" id="" style="margin-top: 15px; border:0px; background-color:transparent">
                        <option value="0">Public</option>
                        <option value="1">Private</option>
                      </select>                    
                  </li>
                  
                </ul>
						</form>
					</div>
          @elseif($key == 2)
          <div class="panel" style="margin-left:15px">
            <div style="padding-top: 10px">
                <a type="btn btn-primary" class="btn btn-info pull-right" href="{{route('tournament.create')}}"><i class="fa fa-trophy" aria-hidden="true"></i> Make</a>
             </div>

							<ul class="nav nav-pills">
                  <li>  Tournaments</li>
							</ul>
					</div>
          @endif

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
@livewireScripts
</body>
<section class="footer">
    <footer id="fh5co-footer" role="contentinfo">
        <div class="container">
            <div class="row copyright">
                <div class="col-md-12 text-center">
                    <p>
                        <small class="block" title="Ahmed AKTA">&copy; 2022 WEBCATCH</small> 
                    </p>
                    <p>
                        <ul class="fh5co-social-icons">
                            <li><a href="#"><i class="icon-twitter"></i></a></li>
                            <li><a href="#"><i class="icon-linkedin"></i></a></li>
                        </ul>
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <script>
//       tinymce.init({
//   selector: "#mytextarea",
//   plugins: "emoticons autoresize",
//   toolbar: "emoticons",
//   toolbar_location: "bottom",

// });
    </script>
</section>
