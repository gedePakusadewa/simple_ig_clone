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
				<h1>Welcome To Simple Instagram Clone</h1>
			</div>
			<form action="{{route('verify_login')}}" class = "padding-form-input-width" method = "post">
				<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>" /> 
				<div class="form-group">
					<label>Username:</label>
					<input type="text" class="form-control" name="username" />
					<br /><div id="alert-username" class="alert-register-input"><strong>Wrong username format!</strong> Please fill it with alphabet or number or both character. Minimal 5 characters.</div>
				</div>
				<div class="form-group">
					<label>Password:</label>
					<input type="password" class="form-control" name="pwd" />
					<br /><div id="alert-password" class="alert-register-input"><strong>Wrong password format!</strong> Please fill it with at least one letter and one number, minimal characters are four.</div>
				</div>

				<button type="submit" class="btn btn-primary">Log In</button>
				<p class = "pt-2 text-muted">If you forget your username of password, please make a contact with <a href = "" >customer service division.</a></p> 
			</form>
			
		</div>
		<br />
		<a href = "{{route('reset_session')}}">Reset Session</a>
		<footer class = "bg-primary ">
			<div class = "py-3 text-center text-white">
				Copyright 1999-2021 by Gede Pakusadewa. All Rights Reserved.
			</div>
		</footer>
	</body>
</html>