<!doctype html>
<html lang="en">
  <head>


  	<title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ asset('wh2.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('wh2.png') }}"> 
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{asset('loginpage/css/style.css')}}">

	</head>
	<body>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Quiz Catch
                </a>
            </div>
        </nav>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Register</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
							<div class="text w-100">
								<h2>Welcome to Register</h2>
								<p>have account? Login</p>
								<a href="{{route('login',app()->getLocale())}}" class="btn btn-white btn-outline-white">Login</a>
							</div>
			      </div>
						<div class="login-wrap p-4 p-lg-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Register</h3>
			      		</div>
								<div class="w-100">
									<p class="social-media d-flex justify-content-end">
										<a href="https://www.linkedin.com/in/ahmet-akta/" class="social-icon d-flex align-items-center justify-content-center"><i class="fa fa-linkedin" aria-hidden="true"></i> </a>
										<a href="https://twitter.com/ahmd_akta" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
									</p>
								</div>
			      	</div>
							<form action="{{route('register',app()->getLocale())}}" method="POST" class="signin-form">
                                @csrf
			      		<div class="form-group mb-3">
			      			<label class="label" for="name">Name</label>
			      			<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Username" required>
                              @error('name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                                @enderror
			      		</div>
                          <div class="form-group mb-3">
                            <label class="label" for="name">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" required>
                        </div>

                             @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                             @enderror
		            <div class="form-group mb-3">
		            	<label class="label" for="password">Password</label>
		              <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required>
                      @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
		            </div>
                    <div class="form-group mb-3">
		            	<label class="label" for="password">Confirm Password</label>
		              <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
		            </div>
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary submit px-3">Register</button>
		            </div>
		            <div class="form-group d-md-flex">
		            	<div class="w-50 text-left">
			            	<label class="checkbox-wrap checkbox-primary mb-0">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
										</label>
									</div>
									<div class="w-50 text-md-right">
										<a href="#">Forgot Password</a>
									</div>
		            </div>
		          </form>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>
    <section class="footer">
        <!-- Footer -->
        <footer class="text-center text-white" style="background-color:#cb5464;">
          <div class="container p-4 pb-0">
            <section class="">
              <p class="d-flex justify-content-center align-items-center">
                <span class="me-3">Create Quiz For FREE</span>
              </p>
            </section>
          </div>
          <div class="text-center p-3" style="background-color: #cb5464;">
            © 2022
            <a class="text-white" href="https://twitter.com/ahmd_akta" target="blank">WEBCATCH</a>
          </div>
        </footer>
        <!-- Footer -->
      </section>

	<script src="{{asset('loginpage/js/jquery.min.js')}}"></script>
  <script src="{{asset('loginpage/js/popper.js')}}"></script>
  <script src="{{asset('loginpage/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('loginpage/js/main.js')}}"></script>

	</body>
</html>
