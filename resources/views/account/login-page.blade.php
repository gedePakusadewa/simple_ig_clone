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
				padding:0 10%;
			}
		</style>
	</head>
	<body class = "bg-light">
		<div class = "container" style = "margin-top:3%; ">
			<div class = "d-flex justify-content-center"> 
				<div>
					<img src = "/icon/login-pic.png" alt = "loing-picture" width = "300px"/>
				</div>
				<div>
					<div style = "background-color:white; border:1px solid #dbdbdb; width:300px;">
						<div class = "text-center py-4 mt-1">
							<img src = "/icon/font-only-ig.png" alt = "loing-picture" width = "200px"/>
						</div>
						<form name = "loginForm" onsubmit = "return validateInputDataLoginForm()" action="{{route('verify_login')}}" class = "padding-form-input-width" method = "post">
							<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>" /> 
							<div class="form-group">
								<input type="text" class="form-control" name="username" placeholder = "username" style = "background-color:#f8f9fa;" />
							</div>
							<div class="form-group">
								<input type="password" class="form-control" name="pwd" placeholder = "Password" style = "background-color:#f8f9fa;" />
							</div>

							<div class="form-group">
								<input type="submit" class="form-control" value = "Log In" style = "background-color:#007bff; color:white;"/>
							</div>

							<br /><div id="alert-username" class="alert-register-input"><strong>Wrong username format!</strong> Please fill it with alphabet or number or both character. Minimal 5 characters.</div>
							<br /><div id="alert-password" class="alert-register-input"><strong>Wrong password format!</strong> Please fill it with at least one letter and one number, minimal characters are four.</div>

							@if(session('status'))
								<div class="alert alert-success">
									{{ session('status') }}
								</div>
							@endif
						</form>
					</div>
					<div style = "margin: 10px 0; padding:20px 0; text-align:center; border:1px solid #dbdbdb; background-color:white;">
						Don't have an account? <a href = "">Sign up</a>
					</div>
				</div>
			</div>
		</div>
		<br />
		<footer>
			<div class = "py-3 text-center text-gray">
			© 2021 Instagram from Facebook.
			</div>
		</footer>
	</body>
	<script src = "/js/subsystem-login.js"></script>
</html>