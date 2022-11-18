{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}




<!doctype html>
<html lang="en">
  <head>
  	<title>QuizCatch | Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{asset('loginpage/css/style.css')}}">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Regsiter</h2>
				</div>  
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
							<div class="text w-100">
								<h2>Welcome to Register</h2>
								<p>Already have an account?</p>
								<a href="{{route('login')}}" class="btn btn-white btn-outline-white">Log In</a>
							</div>
			      </div>
						<div class="login-wrap p-4 p-lg-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Register</h3>
			      		</div>
								<div class="w-100">
									<p class="social-media d-flex justify-content-end">
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
									</p>
								</div>
			      	</div>
                      <form method="POST" action="{{ route('register') }}">
                        @csrf			      		
                        <div class="form-group mb-3">
			      			<label class="label" for="name">Name</label>
                              <x-input id="name" placeholder="Name" class="form-control" type="text" name="name" :value="old('name')" required autofocus />
                            </div>
                        <div class="form-group mb-3">
			      			<label class="label" for="name">Email</label>
                              <x-input id="email" placeholder="Email" class="form-control" type="email" name="email" :value="old('email')" required />
                            </div>
		            <div class="form-group mb-3">
		            	<label class="label" for="password">Password</label>
                        <x-input id="password" class="form-control"
                        type="password"
                        name="password"
                        placeholder="Password"
                        required autocomplete="new-password" />		            
                    </div>
		            <div class="form-group mb-3">
		            	<label class="label" for="password">Confirm Password</label>
                        <x-input id="password_confirmation" class="form-control"
                        type="password"
                        placeholder="Confirm Password"
                        name="password_confirmation" required />		           
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
		            </div>
		          </form>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{asset('loginpage/js/jquery.min.js')}}"></script>
  <script src="{{asset('loginpage/js/popper.js')}}"></script>
  <script src="{{asset('loginpage/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('loginpage/js/main.js')}}"></script>

	</body>
</html>