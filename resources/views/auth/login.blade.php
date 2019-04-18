<!DOCTYPE html>
	<html lang="en">
	<head>
		<title>BPW System</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
		<link rel="shortcut icon" href="{{ asset('images/logo.png') }}" />
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css') }}">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css') }}">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
	<!--===============================================================================================-->
	</head>
	<body>

		<div class="limiter">
			<div class="container-login100">
				<div class="wrap-login100">
					<div class="login100-pic js-tilt" data-tilt>
						<img src="{{ asset('images/logo.png') }}" alt="IMG">
					</div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

						<span class="login100-form-title">
							BPW System
						</span>

						<div class="wrap-input100 validate-input">
							<input id="email" type="text" class="input100{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="อีเมล/บัญชีผู้ใช้งาน" name="email" value="{{ old('email') }}" required autofocus>
								@if ($errors->has('email'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('email') }}</strong>
									</span>
								@endif
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-envelope" aria-hidden="true"></i>
							</span>
						</div>

						<div class="wrap-input100 validate-input" data-validate = "Password is required">
							<input id="password" type="password" class="input100{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="รหัสผ่าน" required>
								@if ($errors->has('password'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('password') }}</strong>
									</span>
								@endif
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-lock" aria-hidden="true"></i>
							</span>
						</div>

						<div class="container-login100-form-btn">
							<button type="submit" class="login100-form-btn">
								เข้าสู่ระบบ
							</button>
						</div>

						<div class="text-center p-t-12">
						</div>

						<div class="text-center p-t-136">
						</div>
					</form>
				</div>
			</div>
		</div>




	<!--===============================================================================================-->
		<script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
	<!--===============================================================================================-->
		<script src="{{ asset('vendor/bootstrap/js/popper.js') }}"></script>
		<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	<!--===============================================================================================-->
		<script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
	<!--===============================================================================================-->
		<script src="{{ asset('vendor/tilt/tilt.jquery.min.js') }}"></script>
		<script >
			$('.js-tilt').tilt({
				scale: 1.1
			})
		</script>
	<!--===============================================================================================-->
		<script src="{{ asset('js/main.js') }}"></script>

	</body>
	</html>
