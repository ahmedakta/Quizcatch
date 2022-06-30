@extends('layouts.home')
@section('home')

<body>
	
<div class="fh5co-loader"></div>

<div id="page">

<aside id="fh5co-hero" class="js-fullheight">
	<div class="flexslider js-fullheight">
		<ul class="slides">
		   <li style="background-image:url('homepage/images/bg4.jpg')">
			   <div class="overlay-gradient"></div>
			   <div class="container">
				   <div class="col-md-10 col-md-offset-1 text-center js-fullheight slider-text">
					   <div class="slider-text-inner desc mt-15">
						   <p class="fh5co-lead">Developed by <i class="icon-heart3"></i>  <a href="https://www.linkedin.com/in/ahmet-akta/" target="_blank">Ahmed AKTA</a></p>
					   </div>
				   </div>
			   </div>
		   </li>
		  </ul>
	  </div>
</aside>

<div id="fh5co-contact">
	<div class="container">
		<div class="row">
			<div class="col-md-5 col-md-push-1 animate-box">
				
				<div class="fh5co-contact-info">
					<h3>Contact Information</h3>
					<ul>
						{{-- <li class="address">198 West 21th Street, <br> Suite 721 New York NY 10016</li> --}}
						<li class="email"><a href="#">quiizcatch@gmail.com</a></li>
						<li class="url"><a href="http://quizcatch.net">quizcatch.net</a></li>
					</ul>
				</div>

			</div>
			<div class="col-md-6 animate-box">
				<h3>Send A Message</h3>
				<form action="{{route('sendMail')}}" method="POST">
					@csrf
					<div class="row form-group">
						<div class="col-md-6">
							<!-- <label for="fname">First Name</label> -->
							<input type="text"  name="fname" id="fname" class="form-control" placeholder="Your firstname">
						</div>
						<div class="col-md-6">
							<!-- <label for="lname">Last Name</label> -->
							<input type="text" name="lname" id="lname" class="form-control" placeholder="Your lastname">
						</div>
					</div>

					<div class="row form-group">
						<div class="col-md-12">
							<!-- <label for="email">Email</label> -->
							<input type="email"  name="email" id="email" class="form-control" placeholder="Your email address">
						</div>
					</div>

					<div class="row form-group">
						<div class="col-md-12">
							<!-- <label for="subject">Subject</label> -->
							<input type="text"  name="subject" id="subject" class="form-control" placeholder="Your subject of this message">
						</div>
					</div>

					<div class="row form-group">
						<div class="col-md-12">
							<!-- <label for="message">Message</label> -->
							<textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Say something about us"></textarea>
						</div>
					</div>
					<div class="form-group">
						<input type="submit" value="Send Message" class="btn btn-primary">
					</div>

				</form>		
			</div>
		</div>
		
	</div>
</div>

<div id="fh5co-started" style="background-image:url(images/img_bg_2.jpg);">
	<div class="overlay"></div>
	<div class="container">
		<div class="row animate-box">
			<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
				<h2>About</h2>
				<p>Quizcatch is a platform for make quiz quickly and see other people results.</p>
			</div>
		</div>
		{{-- <div class="row animate-box">
			<div class="col-md-8 col-md-offset-2 text-center">
				<p><a href="#" class="btn btn-default btn-lg">Consultation</a></p>
			</div>
		</div> --}}
	</div>
</div>

</div>

<div class="gototop js-top">
	<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
</div>

<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!-- jQuery Easing -->
<script src="js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js"></script>
<!-- Waypoints -->
<script src="js/jquery.waypoints.min.js"></script>
<!-- Stellar Parallax -->
<script src="js/jquery.stellar.min.js"></script>
<!-- Carousel -->
<script src="js/owl.carousel.min.js"></script>
<!-- Flexslider -->
<script src="js/jquery.flexslider-min.js"></script>
<!-- countTo -->
<script src="js/jquery.countTo.js"></script>
<!-- Magnific Popup -->
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/magnific-popup-options.js"></script>
<!-- Google Map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
<script src="js/google_map.js"></script>
<!-- Main -->
<script src="js/main.js"></script>

</body>


@endsection
