<!DOCTYPE html>
<html>
	<head>
		<title>Homepage Login</title>
		<meta charset = "utf-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<style>
			.padding-form-input-width{
				padding:0 29%;
			}
		</style>
	</head>
	<body class = "bg-light">
		<div class = "container">
			<div class = "text-center py-4 mt-1">
				<h1>Simple Instagram Clone</h1>
			</div>
			<form name = "signUpForm" onsubmit = "return validateInputDataSignUpForm()" action="{{route('validate_and_save_account')}}" class = "padding-form-input-width" method = "post">
				<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>" /> 
				<div class="form-group">
					<label>email:</label>
					<input type="text" class="form-control" name="email" />
				</div>
				<div class="form-group">
					<label>Full Name:</label>
					<input type="text" class="form-control" name="fullname" />
				</div>
				<div class="form-group">
					<label>Username:</label>
					<input type="text" class="form-control" name="username" />
				</div>
				<div class="form-group">
					<label>Password:</label>
					<input type="password" class="form-control" name="pwd" />
				</div>

				<button type="submit" class="btn btn-primary">Sign Up</button>

				<br /><div id="alert-email" class="alert-register-input"><strong>Wrong Email format!</strong> please fill it with correct format.</div>
				<br /><div id="alert-fullname" class="alert-register-input"><strong>Wrong Name format!</strong> please fill it with at least one letter and maximal characters are 240.</div>
				<br /><div id="alert-username" class="alert-register-input"><strong>Wrong username format!</strong> Please fill it with alphabet or number or both character. Minimal 5 characters.</div>
				<br /><div id="alert-password" class="alert-register-input"><strong>Wrong password format!</strong> Please fill it with at least one letter and one number, minimal characters are four.</div>

				@if(session('status'))
					<div class="alert alert-success">
						{{ session('status') }}
					</div>
				@endif

			</form>
		</div>
		<div>
			Have an account? <a href = "{{route('login_page')}}">Log In</a>
		</div>
		<br />
		<a href = "{{route('reset_session')}}">Reset Session</a>
		<footer>
			<div class = "py-3 text-center text-gray">
			© 2021 Instagram from Facebook.
			</div>
		</footer>
	</body>
	<script src = "/js/subsystem-sign-up.js"></script>
</html>